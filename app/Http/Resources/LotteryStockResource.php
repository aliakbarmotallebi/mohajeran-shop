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
            'PrizeName' => $this->prize_name,
            'FuLLNameWinner' => $this->user->name,
            'Score' => $this->user->id,
            'PhoneNumber' => $this->user->stringToSecret($this->user->mobile)
        ];
    }
}
