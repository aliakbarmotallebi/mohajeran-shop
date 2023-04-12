<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
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
            'Amount' => $this->amount,
            'Balance' => $this->getBalance(),
            'Summery' => $this->summery,
            'Type' => $this->type,
            'Status' => $this->status,
            'CreatedAt'  => verta($this->created_at)->format('H:i Y-m-d'),
        ];
    }
}
