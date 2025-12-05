<?php

namespace App\Http\Controllers\API\Note;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\Note\DetailNoteResource;
use App\Http\Resources\Note\NoteResource;
use App\Models\Note;
use App\Models\NoteFollowUp;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'start__date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'unit_id' => [
                'nullable', 
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category', 'note_unit');
                })
            ],
            'paginate' => ['nullable', 'in:0,1'],
            'limit' => ['nullable', 'integer'],
        ]);

        $limit = $request->input('limit', 10);
        $start_date = $request->start_date;
        $unit_id = $request->unit_id;
        $end_date = $request->end_date;

        $note = Note::when($start_date, function($query, $start_date) {
                        $query->whereDate('date', '>=', $start_date);
                    })
                    ->when($end_date, function($query, $end_date) {
                        $query->whereDate('date', '<=', $end_date);
                    })
                    ->when($unit_id, function($query, $unit_id) {
                        $query->whereHas('note_unit', function(Builder $sub_query) use ($unit_id) {
                            $sub_query->where('unit_id', $unit_id);
                        });
                    })
                    ->orderBy('created_at', 'desc');
        $result = ($request->paginate) ? $note->paginate($limit) : $note->get();

        return ResponseFormatter::success(NoteResource::collection($result)->response()->getData(true), 'success get note data');
    }

    public function store(NoteRequest $request)
    {
        $input = $request->except([
            'participant',
            'unit_id',
            'material_preparation',
        ]);

        if($request->participant) {
            $input['participant'] = json_encode($request->participant);
        }

        if($request->material_preparation) {
            $input['material_preparation'] = json_encode($request->material_preparation);
        }

        $note = Note::create($input);

        if(!empty($request->unit_id)) {
            $unit_ids = $this->unit_array_data($request->unit_id);
            $note->note_unit()->createMany($unit_ids);
        }

        if(!empty($request->note_follow_up)) {
            $this->follow_up_array_data($request->note_follow_up, $note->id);
        }

        // insert additional file
        $this->file_insert($request->file, $note->id);

        // insert document notulensi
        $this->insert_document_notulensi($request->document_notulensi, $note->id);

        return ResponseFormatter::success(new DetailNoteResource($note), 'success create note data');
    }

    public function show(Note $note)
    {
        return ResponseFormatter::success(new DetailNoteResource($note), 'success show note data');
    }

    public function update(NoteRequest $request, Note $note)
    {
        $input = $request->except([
            'participant',
            'unit_id',
            'material_preparation',
        ]);
        
        $input['participant'] = json_encode($request->participant);
        $input['material_preparation'] = json_encode($request->material_preparation);
        
        $note->update($input);

        // insert note unit
        $note->note_unit()->delete();
        if(!empty($request->unit_id)) {
            $unit_ids = $this->unit_array_data($request->unit_id);
            $note->note_unit()->createMany($unit_ids);
        }

        // insert follow up data
        $this->follow_up_array_data($request->note_follow_up, $note->id);

        // insert additional file
        $this->file_insert($request->file, $note->id);

        // insert document notulensi
        $this->insert_document_notulensi($request->document_notulensi, $note->id);

        return ResponseFormatter::success(new DetailNoteResource($note), 'success update note data');
    }

    public function delete(Note $note)
    {

        $note_file = $note->note_file()->pluck('file')->toArray();
        $document_notulensi = $note->document_notulensi()->pluck('file')->toArray();
        $collapse = Arr::collapse([$note_file, $document_notulensi]);
        Storage::disk('public')->delete($collapse);

        $note->note_file()->delete();
        $note->document_notulensi()->delete();
        $note->delete();

        return ResponseFormatter::success(null, 'success delete note data');
    }

    public function unit_array_data(array $unit_id)
    {
        foreach($unit_id as $value) {
            $unit_ids[] = [
                'unit_id' => $value
            ];
        };

        return $unit_ids;
    }

    public function follow_up_array_data($follow_ups, $note_id)
    {
        $note = Note::find($note_id);
        $user_id = auth()->user()->id;

        if(!empty($follow_ups)) {
            $follow_up_ids = $note->note_follow_up()->get()->pluck('id')->toArray();
            foreach ($follow_ups as $follow_up) {
                if(!empty($follow_up)) {
                    $note_follow_ups = [
                        'title' => $follow_up['title'],
                        'target_date' => $follow_up['target_date'],
                        'status' => $follow_up['status'],
                    ];
    
                    if(empty($follow_up['id'])) {
                        $note_follow_ups['user_id'] = $user_id;
                    }
    
                    // if id already exists
                    $follow_up['id'] = (!empty($follow_up['id'])) ? $follow_up['id'] : 'new';
                    if(in_array($follow_up['id'], $follow_up_ids)) {
                        $follow_up_d = $note->note_follow_up()->find($follow_up['id']);
                        $follow_up_d->update($note_follow_ups);
                    } else {
                        $note->note_follow_up()->create($note_follow_ups);
                    }
                }
                $fids[] = $follow_up['id'];
            }
    
            $except_fids = array_values(array_diff($follow_up_ids, $fids));
            if(!empty($except_fids)) {
                $except_follow_up = $note->note_follow_up()->whereIn('id', $except_fids);
                $except_follow_up->delete();
            }
        } else {
            $note->note_follow_up()->delete();
        }
    }

    public function file_insert ($files, $note_id)
    {
        $note = Note::find($note_id);
    
        if(!empty($files)) {
            $file_ids = $note->note_file()->get()->pluck('id')->toArray();
            foreach ($files as $file) {
                // if file exists from request
                if(!empty($file['file'])) {
                    $file_path = FileHelpers::upload_file('note', $file['file']);
                    $files = [
                        'file' => $file_path,
                        'type' => 'note',
                    ];

                    // if id exists in evidence file
                    $file['id'] = (!empty($file['id'])) ? $file['id'] : 'new';
                    if(in_array($file['id'], $file_ids)) {
                        $file_d = $note->note_file()->find($file['id']);
                        if(!empty($file['file'])) {
                            Storage::disk('public')->delete($file_d['file']);
                        }
                        $file_d->update($files);
                    } else {
                        $note->note_file()->create($files);
                    }
                }
                $fids[] = $file['id'];
            }
            $except_fids = array_values(array_diff($file_ids, $fids));
            if(!empty($except_fids)) {
                $except_file = $note->note_file()->whereIn('id', $except_fids);
                $e_files = $except_file->get()->pluck('file')->toArray();
                Storage::disk('public')->delete($e_files);
                $except_file->forceDelete();
            }
        } else {
            $note_file = $note->note_file()->pluck('file')->toArray();
            Storage::disk('public')->delete($note_file);
            $note->note_file()->delete();
        }
        // end update file 
    }

    public function insert_document_notulensi ($files_notulensi, $note_id)
    {
        $note = Note::find($note_id);
        
        // update docoument notulensi 
        if(!empty($files_notulensi)) {
            $document_notulensi_ids = $note->document_notulensi()->get()->pluck('id')->toArray();
            foreach ($files_notulensi as $document_notulensi) {
                // if file exists from request
                if(!empty($document_notulensi['file'])) {
                    $document_notulensi_path = FileHelpers::upload_file('note', $document_notulensi['file']);
                    $files_notulensi = [
                        'file' => $document_notulensi_path,
                        'type' => 'document_notulensi',
                    ];

                    // if id exists in docoument notulensi file
                    $document_notulensi['id'] = (!empty($document_notulensi['id'])) ? $document_notulensi['id'] : 'new';
                    if(in_array($document_notulensi['id'], $document_notulensi_ids)) {
                        $document_notulensi_d = $note->document_notulensi()->find($document_notulensi['id']);
                        if(!empty($document_notulensi['file'])) {
                            Storage::disk('public')->delete($document_notulensi_d['file']);
                        }
                        $document_notulensi_d->update($files_notulensi);
                    } else {
                        $note->document_notulensi()->create($files_notulensi);
                    }
                }
                $fids[] = $document_notulensi['id'];
            }
            $except_dcids = array_values(array_diff($document_notulensi_ids, $fids));
            if(!empty($except_dcids)) {
                $except_file = $note->document_notulensi()->whereIn('id', $except_dcids);
                $e_files = $except_file->get()->pluck('file')->toArray();
                Storage::disk('public')->delete($e_files);
                $except_file->forceDelete();
            }
        } else {
            $document_notulensi = $note->document_notulensi()->pluck('file')->toArray();
            Storage::disk('public')->delete($document_notulensi);

            $note->document_notulensi()->delete();
        }
        // end update file 
    }


}
