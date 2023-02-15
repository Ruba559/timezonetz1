<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user'=> ! $this->user ? null : $this->user->name,
            'product'=>! $this->product ? null : $this->product->name,
            'created_at'=> $this->created_at ?? "",
        ];
    }
}
