<?php

namespace App\Http\Resources\Ministry;

use Illuminate\Http\Resources\Json\JsonResource;

class MinistryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $percent = ($this->budget > 0) ?  round($this->realization / $this->budget * 100, 2) : 0;
        return [
            'id' => $this->id,
            'name' => $this->kl->name,
            'photo_url' => $this->kl->photo_url,
            'budget' => $this->budget,
            'realization' => $this->realization,
            'oder' => $this->kl->order,
            'percent' => $percent,
            'date' => $this->kl->date,
        ];
    }
}
