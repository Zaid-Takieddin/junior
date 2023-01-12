<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassroomResource extends JsonResource
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
            'teacherId' => $this->teacher_id,
            'level' => $this->level,
            'teacher' => new TeacherResource($this->whenLoaded('teacher')),
            'children' => new ChildCollection($this->whenLoaded('children'))
        ];
    }
}
