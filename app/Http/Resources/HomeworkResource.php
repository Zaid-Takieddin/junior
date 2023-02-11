<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeworkResource extends JsonResource
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
            'classroomId' => $this->classroom_id,
            'name' => $this->name,
            'description' => $this->description,
            'expiration' => $this->expiration,
            'attachment' => $this->attachment,
            'answers' => new HomeworkAnswerCollection($this->whenLoaded('answers')),
            'classroom' => new ClassroomResource($this->whenLoaded('classroom'))
        ];
    }
}
