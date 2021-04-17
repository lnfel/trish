<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhilippineBaranggay extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'region_code' => $this->region_code,
            'province_code' => $this->province_code,
            'city_municipality_code' => $this->city_municipality_code,
            'baranggay_code' => $this->baranggay_code,
        ];
    }
}
