<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChildParentResource extends JsonResource
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
            'fatherName' => $this->father_name,
            'motherName' => $this->mother_name,
            'lastName' => $this->last_name,
            'address' => $this->address,
            'phoneNumber' => $this->phone_number
        ];
    }
}
