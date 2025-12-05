<?php

namespace App\Http\Resources\Realization;

use Illuminate\Http\Resources\Json\JsonResource;

class RealizationResource extends JsonResource
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
            'name' => $this->name,
            'code' => $this->code,
            'budget' => $this->budget,
            'aa' => $this->aa,
            'budget_aa' => $this->budget_aa,
            'realization_spp' => $this->realization_spp,
            'sp2d' => $this->sp2d,
            'budget_percent' => ($this->budget > 0) ?round($this->realization_spp / $this->budget * 100, 2) : 0,
            'budget_aa_percent' => ($this->budget_aa > 0) ? round($this->realization_spp / $this->budget_aa * 100, 2) : 0,
            'date' => $this->date,
            'created_at' => $this->created_at,
        ];
    }
}
