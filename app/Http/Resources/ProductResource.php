<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'Code'              => $this->code,
            'Name'              => $this->name,
            'Few'               => $this->fewtak,
            'SellPrice'         => (int)$this->sell_price,
            'LastBuyPrice'      => (int)$this->getPrice(),
            'MainGroupName'     => $this->main_group_name ?? 'هلو اصلی',
            'SideGroupName'     => $this->side_group_name ?? 'هلو فرعی',
            'MainGroupErpCode'  => $this->main_group_code,
            'SideGroupErpCode'  => $this->side_group_code,
            'VisitCount'        => (int)$this->visit_count,
            'Image'             => $this->getImage(),
            'IsAvailable'       => (bool)$this->isAvailable(),
            'UnitName'          => $this->getUnitName(),
            'UnitFew'           => $this->getUnitFew(),
            'MinUnitFew'        => $this->getMinUnitFew(),
            'BuyPrice'          => 0,
            'DiscountPrice'     => 0,
            'IsVendor'          => $this->isVendor() ?? 0,
            'LimitOrder'        => $this->limit_order,
            'Attr'              => array_filter([
                $this->other1,
                $this->other2,
                $this->other3,
                $this->other4,
                $this->other5,
                $this->other1,
                $this->other2,
                $this->other3,
                $this->other4,
                $this->other5,
            ])
        ];
    }
}
