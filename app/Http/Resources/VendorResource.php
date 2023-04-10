<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $images = [
            "https://shopjozi.ir/uploads/sliders/b363fbec947cea59747396734bd8bc61.png",
            "https://shopjozi.ir/uploads/sliders/ba1468054a6f0ff72f0b14a186cfcaf2.png",
            "https://shopjozi.ir/uploads/sliders/1b160ed5dc705bc597e15aa6343c3b80.png",
            // "https://shopjozi.ir/uploads/sliders/641e84fa04dbe1a2f215c613890711fc.png",
            // "https://shopjozi.ir/uploads/sliders/c69ea399c14b896e19b853c14b8e2eb3.png",
        ];
        return [
            'Id'                => $this->id,
            'ErpCode'           => $this->erp_code,
            'Name'              => $this->name,
            'Image'             => $this->getImage(), //$images[rand(0, count($images)-1)],
            'TimeWork'          => $this->time,
            "Subcategories"     => SubCategoryResource::collection($this->subcategories),
        ];
    }
}
