<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title ?? "" ,
            'description' => $this->description ?? "",
            'user'=> ! $this->user ? " " : $this->user->name,
            'created_at'=> $this->created_at ?? "",
        ];
    }
}
