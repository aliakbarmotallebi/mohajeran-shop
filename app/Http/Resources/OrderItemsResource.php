<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class OrderItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $product = Product::withoutGlobalScopes()->whereErpCode($this->product_erp_code)->first();

        if( ! $product ){
            return [];
        }

        return [
            'Id'       => $this->id,
            'Code'     => $this->code,
            'Products'  => [
                new ProductResource($product)
            ],
            'Quantity'  => $this->quantity,
            'Price'     => (int)$this->price,
            'Comment'   => $this->comment,
            'UnitName' => $product->getUnitName(),
            'Total'     => ($this->getPrice() * $this->getQuantity())
        ];
    }
}
