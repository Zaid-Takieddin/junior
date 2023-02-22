<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'birthDate' => $this->birth_date,
            'address' => $this->address,
            'phoneNumber' => $this->phone_number,
            'classroom' => new ClassroomResource($this->whenLoaded('classroom')),
            'children' => new ChildCollection($this->whenLoaded('children'))
        ];
    }
}
