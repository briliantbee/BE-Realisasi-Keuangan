<?php

namespace App\Http\Resources\Recap;

use Illuminate\Http\Resources\Json\JsonResource;

class RetireResource extends JsonResource
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
            'name' => $this->name,
            'unit' => $this->unit,
            'date' => $this->date,
        ];
    }
}
