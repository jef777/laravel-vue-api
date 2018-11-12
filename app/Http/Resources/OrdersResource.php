<?php

namespace App\Http\Resources;

use App\Order;
use App\Supplier;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class OrdersResource extends ResourceCollection
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
            'data' => OrderResource::collection($this->collection),
        ];
    }
}
