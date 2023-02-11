<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'childId' => $this->child_id,
            'description' => $this->description,
            'createdAt' => $this->created_at,
            'child' => new ChildResource($this->whenLoaded('child')),
            'reporter' => new TeacherResource($this->whenLoaded('reporter'))
        ];
    }
}
