<?php

namespace App\Http\Controllers\API\PriorityProgram;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramActivityRequest;
use App\Http\Resources\PriorityProgram\ProgramActivityResource;
use App\Models\ProgramActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProgramActivityController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'priority_program_id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category', 'priority_program');
                })
            ],
            'limit' => ['nullable', 'integer'],
        ]);

        $priority_program_id = $request->priority_program_id;
        $limit = $request->input('limit', 10);
        
        $program_activity = ProgramActivity::when($priority_program_id, function($query) use ($priority_program_id) {
                                    $query->where('priority_program_id', $priority_program_id);
                                })
                                ->orderBy('created_at', 'desc')->paginate($limit);

        return ResponseFormatter::success(ProgramActivityResource::collection($program_activity)->response()->getData(true), 'success get program activity data');
    }

    public function store(ProgramActivityRequest $request)
    {       
        $executor_ids = $this->executor_array_data($request->executor_id);
        $input = $request->except('executor_id');
        
        $input['user_id'] = auth()->user()->id;
        $program_activity = ProgramActivity::create($input);
        $program_activity->program_activity_executor()->createMany($executor_ids);

        return ResponseFormatter::success(new ProgramActivityResource($program_activity), 'succes create program activity data');
    }

    public function show(ProgramActivity $program_activity) 
    {
        return ResponseFormatter::success(new ProgramActivityResource($program_activity), 'succes show program activity data');
    }

    public function update(ProgramActivityRequest $request, ProgramActivity $program_activity)
    {
        $input = $request->except('executor_id');
        $executor_ids = $this->executor_array_data($request->executor_id);

        $program_activity->update($input);
        $program_activity->program_activity_executor()->delete();
        $program_activity->program_activity_executor()->createMany($executor_ids);
        return ResponseFormatter::success(new ProgramActivityResource($program_activity), 'succes update program activity data');
    }

    public function update_recommendation(Request $request, ProgramActivity $program_activity)
    {
        $request->validate([
            'recommendation' => ['string', 'required'],
        ]);

        $program_activity->update([
            'recommendation' => $request->recommendation,
        ]);

        return ResponseFormatter::success(new ProgramActivityResource($program_activity), 'succes update recommendation program activity data');
    }

    public function delete(ProgramActivity $program_activity)
    {
        $program_activity->delete();
        return ResponseFormatter::success(null, 'succes delete program activity data');
    }
    
    public function total(Request $request)
    {
        $request->validate([
            'priority_program_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category', 'priority_program');
                })
            ]
        ]);

        $program_activity = ProgramActivity::select(
                                DB::raw('SUM(target) as total_target'),
                                DB::raw('SUM(budget) as total_budget'),
                            )
                            ->where('priority_program_id', $request->priority_program_id);
        
        $data = $program_activity->first();
        $result = [
            'total_program_activity' => $program_activity->count(),
            'total_target' => $data->total_target,
            'total_budget' => $data->total_budget,
        ];
        return ResponseFormatter::success($result, 'success get total program activity data');
    }

    public function executor_array_data(array $executor_id)
    {
        foreach($executor_id as $value) {
            $executor_ids[] = [
                'executor_id' => $value
            ];
        };

        return $executor_ids;
    }
}
