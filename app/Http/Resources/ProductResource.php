<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource extends JsonResource
{
    
    public function toArray($request)
    {
         
        $final_images = [];
        $images = json_decode($this->images);
        foreach($images  as $imagesitem){
          
                    array_push($final_images,asset('storage/'.$imagesitem));
              
        }
  
        return [
            'id'=>$this->id,
            'name'=> $this->name ?? "",
            'price'=> $this->price ?? "",
            'description'=> $this->description ?? "",
            'offer' => $this->offer ?? "",
            'model_name' => $this->model_name ?? "",
            'short_description' => $this->short_description ?? "",
            'brand'=> ! $this->brand ? null : $this->brand->name,
            'category'=> ! $this->category ? null : $this->category->name,
            
            'images' => ! $final_images? [asset('storage/product/clothes.png')] : $final_images,
           
        ];

    }
}
 