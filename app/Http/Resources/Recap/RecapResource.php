<?php

namespace App\Http\Resources\Recap;

use Illuminate\Http\Resources\Json\JsonResource;

class RecapResource extends JsonResource
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
            'total' => $this->total,
            'type' => $this->type,
            'order' => $this->order,
            'created_at' => $this->created_at,
        ];
    }
}
