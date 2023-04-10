<?php

namespace App\Http\Resources\Services;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailInfoResource extends JsonResource
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
            "ProductErpCode" => $this->getProductErpCode(),
            "few"            => $this->getQuantity(),
            "price"          => $this->getUnitPrice(),
            "comment"        => $this->comment,
            "discountprice"  => ( ($this->product->getDiscountPriceWithRial() ??  0) * $this->getQuantity())
        ];
    }
}
