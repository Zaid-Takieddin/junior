<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuardianResource extends JsonResource
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
            'firstName' => $this->first_name,
            'LastName' => $this->last_name,
            'address' => $this->address,
            'phoneNumber' => $this->phone_number,
            'balance' => $this->balance,
            'children' => new ChildCollection($this->whenLoaded('children'))
        ];
    }
}
