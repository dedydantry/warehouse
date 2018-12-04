<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TransactionResource extends Resource
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
            'picker' => $this->picker,
            'faktur_number' => $this->faktur_number,
            'supplier' => $this->supplier,
            'remark' => $this->remark,
            'status' => $this->status,
            'order' =>  OrderResource::collection($this->whenLoaded('order'))
        ];
    }
}
