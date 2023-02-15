<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'product' => ! $this->product ? null : $this->product->name,
            'quantity' => $this->quantity ?? "",
            'order'=> ! $this->order ? null : $this->order->id,
            'total_price'=>$this->total_price ?? "",
            'price'=>$this->price ?? "",
            'created_at'=> $this->created_at ?? "",
        ];
    }
}
