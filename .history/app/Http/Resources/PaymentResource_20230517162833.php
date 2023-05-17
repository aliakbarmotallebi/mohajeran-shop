<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'Resnumber' => $this->resnumber,
            'Amount' => $this->amount,
            'BankName' => $this->back_name,
            'Status' => $this->status,
            'CreatedAt'  => verta($this->created_at)->format('H:i Y-m-d'),
        ];
    }
}
