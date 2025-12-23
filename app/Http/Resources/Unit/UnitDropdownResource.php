<?php

namespace App\Http\Resources\Unit;

use Illuminate\Http\Resources\Json\JsonResource;

class UnitDropdownResource extends JsonResource
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
            'value' => $this->code,
            'label' => $this->name
        ];
    }
}
