<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class OrderResource extends Resource
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
            'order_date' => $this->order_date,
            'headquater_id' => $this->headquater_id,
            // 'headquater' => $this->headquater,
            'order_detail' => $this->order_detail,
            'delivery_details' => $this->delivery_detail,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            
        ];
    }
}
