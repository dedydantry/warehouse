<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SatuanResource extends Resource
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
            'satuan_name' => $this->satuan_name,
            'slug' => $this->slug 
        ];
    }
}
