<?php

namespace App\Http\Controllers\API\PriorityProgram;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\MonevRequest;
use App\Http\Resources\PriorityProgram\MonevResource;
use App\Models\Monev;
use Illuminate\Http\Request;

class MonevController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'program_activity_id' => ['nullable', 'exists:program_activities,id'],
            'limit' => ['nullable', 'integer']
        ]);

        $program_activity_id = $request->program_activity_id;
        $limit = $request->input('limit', 10);

        $monev = Monev::when($program_activity_id, function($query) use ($program_activity_id) {
                        $query->where('program_activity_id', $program_activity_id);
                    })
                    ->orderBy('created_at', 'asc')->paginate($limit);
        return ResponseFormatter::success(MonevResource::collection($monev)->response()->getData(true), 'success get monev data');
    }


    public function store(MonevRequest $request)
    {
        $input = $request->all();

        $monev = Monev::create($input);
        return ResponseFormatter::success(new MonevResource($monev), 'success create monev data');
    }

    public function show(Monev $monev)
    {
        return ResponseFormatter::success(new MonevResource($monev), 'success show monev data');
    }
    
    public function update(MonevRequest $request, Monev $monev)
    {
        $input = $request->all();
        $monev->update($input);
        return ResponseFormatter::success(new MonevResource($monev), 'success update monev data');
    }

    public function delete(Monev $monev)
    {
        $monev->delete();
        return ResponseFormatter::success(null, 'success delete monev data');
    }
}
