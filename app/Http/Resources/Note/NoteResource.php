<?php

namespace App\Http\Resources\Note;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
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
            'title' => $this->title,
            'name' => $this->name,
            'institution' => $this->institution,
            'date' => $this->date,
            'instruction' => $this->instruction,
            'participant' => $this->participant,
            'note_unit' => NoteUnitResource::collection($this->note_unit),
            'material_preparation' => $this->material_preparation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
