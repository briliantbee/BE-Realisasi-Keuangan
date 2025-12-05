<?php

namespace App\Http\Resources\PriorityProgram;

use App\Http\Resources\Param\ParamResource;
use App\Http\Resources\User\UserResource;
use App\Models\Monev;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $monev = Monev::where('program_activity_id', $this->id)->orderBy('date', 'desc')->first();
        $realization_percent = !empty($monev) ? round($monev->realization / $monev->program_activity->budget * 100, 2) : 0;

        return [
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],
            'priority_program' => new ParamResource($this->priority_program),
            'name' => $this->name,
            'executor' => ProgramActivityExecutorResource::collection($this->program_activity_executor),
            'target' => $this->target,
            'unit' => new ParamResource($this->unit),
            'budget' => $this->budget,
            'recommendation' => $this->recommendation,
            'narrative' => $this->narrative,
            'narrative_outcome' => $this->narrative_outcome,
            'realization_percent' => $realization_percent,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
