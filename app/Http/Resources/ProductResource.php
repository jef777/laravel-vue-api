<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
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
            'supplier_id' => $this->supplier_id,
            'supplier' =>$this->supplier,
            'product_name' => $this->product_name,
            'order_detail' => $this->order_detail,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            
            
        ];
    }
}

