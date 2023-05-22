<?php

namespace App\Http\Resources;

use App\Models\Lottery;
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
        if( ! $this instanceof Lottery ){ return NULL; }

        return [
            'Name' => $this->name,
            'Description' => $this->description,
            'ImageUrl' => $this->image_url,
            'StartAt' => verta($this->start_at)->format('Y-m-d'),
            'EndAt' => verta($this->end_at)->format('Y-m-d'),
            'Past' => $this->isPast(),
            'Winners' => LotteryStockResource::collection($this->whenLoaded('stocks')),
            'Prizes' => LotteryPrizeResource::collection($this->whenLoaded('prizes'))

        ];
    }
}
