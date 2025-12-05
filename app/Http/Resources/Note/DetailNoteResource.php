<?php

namespace App\Http\Resources\Note;

use App\Http\Resources\File\FileResource;
use App\Http\Resources\Param\ParamResource;
use App\Models\NoteFollowUp;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class DetailNoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $count_note_follow_status = $this->note_follow_up()->select(
            DB::raw("SUM(IF(status = 'progress', 1,0)) as total_progress"),
            DB::raw("SUM(IF(status = 'finish', 1,0)) as total_finish"),
        )->first();

        $total_follow_up = $count_note_follow_status->total_progress + $count_note_follow_status->total_finish;
        $progress = round($total_follow_up > 0 ? ($count_note_follow_status->total_finish / $total_follow_up) * 100 : 100, 2);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'name' => $this->name,
            'institution' => $this->institution,
            'date' => $this->date,
            'content' => $this->content,
            'instruction' => $this->instruction,
            'participant' => $this->participant,
            'note_unit' => NoteUnitResource::collection($this->note_unit),
            'note_follow_up' => NoteFollowUpResource::collection($this->note_follow_up),
            'material_preparation' => $this->material_preparation,
            'files' => FileResource::collection($this->note_file),
            'document_notulensi' => FileResource::collection($this->document_notulensi),
            'progress' => $progress,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
