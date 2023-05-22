<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LotteryStockResource extends JsonResource
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
            'LotteryName' => $this->lottery_name,
            'PrizeName' => $this->lottery_prize_id,
            'FuLLNameWinner' => $this->user->name,
        ];
    }
}
