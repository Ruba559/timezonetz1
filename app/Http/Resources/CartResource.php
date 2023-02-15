<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'price'=> $this->price ?? "",
            'quantity'=> $this->quantity ?? "",
            'product'=> ! $this->product ? null : $this->product,
            'user'=> ! $this->user ? null : $this->user->name,
        ];
    }
}
