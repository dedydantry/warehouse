<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;


class BarangResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'part_number' => $this->part_number, 
            'description' => $this->description, 
            'price' => $this->price,
            'cover' => $this->cover,
            'stok' => $this->stok,
            'category_id' => $this->category_id, 
            'brand_id' => $this->brand_id, 
            'satuan_id' => $this->satuan_id,
            'category' => new CategoryResource($this->categories), 
            'brand' => new BrandResource($this->whenLoaded('brands')), 
            'satuan' => new SatuanResource($this->satuans)
        ];
    }
}
