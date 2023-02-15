<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderDetailResource;
use App\Models\OrderDetail;

class OrderResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user'=> ! $this->user ? null : $this->user->name,
            'delivery'=> ! $this->delivery ? null : $this->delivery->name,
            'total_price'=> $this->total_price ?? "",
            'status'=> $this->status ?? "",
            'created_at'=> $this->created_at ?? "",
        ];
    }
}
