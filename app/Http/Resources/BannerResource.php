<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'LinkToSideGroup' => $this->side_group_code,
            'LinkToMainGroup' => $this->getMainGroup()->main_erp_code ?? NULL,
            'Image' => $this->getImage(),
            'Status' => $this->status,
        ];
    }
}
