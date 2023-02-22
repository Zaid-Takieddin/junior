<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusLineResource extends JsonResource
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
            'lineSupervisorId' => $this->line_supervisor_id,
            'name' => $this->name,
            'children' => new ChildCollection($this->whenLoaded('children')),
            'lineSupervisor' => new LineSupervisorResource($this->whenLoaded('lineSupervisor'))
        ];
    }
}
