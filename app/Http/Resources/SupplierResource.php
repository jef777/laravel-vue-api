<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SupplierResource extends Resource
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
            'delivery_date' => $this->delivery_date,
            'delivery' => $this->delivery,
            'supplier_name' => $this->supplier_name,  
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            
        ];
    }
}
