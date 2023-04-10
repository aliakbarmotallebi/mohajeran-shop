<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'Id'                => (int)$this->id,
            'ErpCode'           => $this->erp_code,
            'Name'              => $this->name,
            'Few'               => $this->fewtak,
            'SellPrice'         => (int)$this->sell_price,
            'LastBuyPrice'      => (int)$this->getPrice(),
            'MainGroupName'     => $this->main_group_name,
            'SideGroupName'     => $this->side_group_name,
            'MainGroupErpCode'  => $this->main_group_code,
            'SideGroupErpCode'  => $this->side_group_code,
            'VisitCount'        => (int)$this->visit_count,
            'Image'             => $this->getImage(),
            'IsAvailable'       => (bool)$this->isAvailable(),
            'UnitName'          => $this->getUnitName(),
            'UnitFew'           => $this->getUnitFew(),
            'Quantity'          => $this->quantity,
            'Attr'              => $this->attr,
            'IsVendor'          => $this->isVendor(),
            "MinUnitFew"        => 1
        ];
    }
}