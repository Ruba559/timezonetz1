<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
  
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name ?? "" ,
            'image'=>   $this->image ? asset('storage/'.$this->image) :  "" ,
            'created_at'=> $this->created_at ?? "",
        ];
    }
}
