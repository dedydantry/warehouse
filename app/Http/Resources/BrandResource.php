<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BrandResource extends Resource
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
            'brand_name' => $this->brand_name,
            'slug' => $this->slug 
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('http://google.com')
        ];
    }
}
