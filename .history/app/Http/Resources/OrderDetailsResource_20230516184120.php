<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class OrderDetailsResource extends JsonResource
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
            'Id'          => $this->id,
            'Code'        => $this->code,
            'TotalPrice'  => $this->getTotal(),
            'ItemsCount'  => $this->items->count(),
            'Suggest'      => $this->is_suggest ?? 0,
            'Cancelled'      => $this->is_cancelled ?? 0,
            'Status'      => $this->status,
            'ShippingMethod' => ($this->shipping_method),
            'CreatedAt'   => verta($this->created_at)->format('H:i Y-m-d'),
            'StatusPaid' => $this->getStatusPaid(),
            'items' => $this->when($this->items, OrderProductResource::collection($this->items)),
        ];
    }
}
