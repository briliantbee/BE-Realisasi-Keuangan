<?php

namespace App\Http\Resources\PadananData;

use App\Http\Resources\Param\ParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PadananDataResource extends JsonResource
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
            'segment' => $this->segment,
            'category' => new ParamResource($this->category),
            'data_source' => new ParamResource($this->data_source),
            'non_jkn' => $this->non_jkn,
            'jkn' => $this->jkn,
            'active_jkn' => $this->active_jkn,
            'not_active_jkn' => $this->not_active_jkn,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
