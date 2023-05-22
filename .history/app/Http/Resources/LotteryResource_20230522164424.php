<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LotteryResource extends JsonResource
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
            'Name' => $this->name,
            'Description' => $this->description,
            'ImageUrl' => $this->image_url,
            'StartAt' => $this->start_at,
            'EndAt' => $this->end_at,
        ];
    }
}
