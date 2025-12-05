<?php

namespace App\Http\Resources\PriorityProgram;

use App\Http\Resources\Param\ParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MonevResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'program_activity_id' => $this->program_activity_id,
            'date' => $this->date,
            'target' => $this->target,
            'target_percent' => round($this->target / $this->program_activity->target * 100, 2),
            'realization' => $this->realization,
            'realization_percent' => round($this->realization / $this->program_activity->budget * 100, 2),
            'unit' => new ParamResource($this->unit),
            'narasi' => $this->narasi,
            'constraint' => $this->constraint,
            'solution' => $this->solution,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
