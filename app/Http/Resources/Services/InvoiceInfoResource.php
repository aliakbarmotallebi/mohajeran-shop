<?php

namespace App\Http\Resources\Services;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class InvoiceInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $dt = Carbon::now();
        \Log::debug($this->items);
        return [
            "invoiceinfo" => [
                [
                    "id"              => $this->id,
                    "customererpcode" => $this->getCustomerErpCode(),
                    "date"            => $dt->toDateString(), //"2019-05-06",
                    "time"            => $dt->toTimeString(), //14:15:16
                    "detailinfo"      => DetailInfoResource::collection($this->items),
                    "type"            => 1,
                    "customeraddress" => $this->customeraddress
                ]
            ]
        ];
    }
}
