<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChildResource extends JsonResource
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
            'guaridanId' => $this->guardian_id,
            'classroomId' => $this->classroom_id,
            'status' => $this->status,
            'birthDate' => $this->birth_date,
            'guardian' => new GuardianResource($this->whenLoaded('guardian')),
            'classroom' => new ClassroomResource($this->whenLoaded('classroom')),
            'image' => new ChildImageResource($this->whenLoaded('image')),
            'orders' => new OrderCollection($this->whenLoaded('orders'))
        ];
    }
}
