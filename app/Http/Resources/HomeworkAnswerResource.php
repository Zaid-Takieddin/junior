<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeworkAnswerResource extends JsonResource
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
            'homeworkId' => $this->homework_id,
            'childId' => $this->child_id,
            'answer' => $this->answer,
            'homework' => new HomeworkResource($this->whenLoaded('homework')),
            'child' => new ChildResource($this->whenLoaded('child'))
        ];
    }
}
