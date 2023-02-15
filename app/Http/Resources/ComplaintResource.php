<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user'=> ! $this->user ? null : $this->user->name,
            'product'=>! $this->product ? null : $this->product->name,
            'description'=> $this->description ?? "",
            'reply' => $this->reply_message ?? "", 
            'replier' => ! $this->replier ? null : $this->replier->name,
            'type' => $this->type ?? "",
            'created_at'=> $this->created_at ?? "",
        ];
    }
}
