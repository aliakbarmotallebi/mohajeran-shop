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
            'StartAt' => verta($this->start_at, 'Y-M-D'),
            'EndAt' => verta($this->end_at, 'Y-M-D'),
            'Status' => $this->end_at->isPast(),
            'Prizes' => LotteryPrizeResource::collection($this->prizes)
        ];
    }
}
