<?php

namespace App\Http\Resources\Honor;

use Illuminate\Http\Resources\Json\JsonResource;

class HonorResource extends JsonResource
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
            'satker_code' => $this->satker_code,
            'province'  => $this->province->province,
            'value' => $this->value,
            'data_target' => $this->data_target,
            'data_input' => $this->data_input,
            'realization_value' => $this->realization_value,
            'paid' => $this->paid,
            'date' => $this->date,
            'realization_percent' => ($this->value > 0) ? round($this->realization_value / $this->value * 100, 2) : 0,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
