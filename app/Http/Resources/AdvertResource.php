<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=> $this->title ?? "",
            'subtitle'=> $this->subtitle ?? "",
            'image'=> $this->image ? asset('storage/'.$this->image) :  "" ,
            'created_at'=> $this->created_at ?? "",
        ];
    }
}
