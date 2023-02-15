<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name ?? "",
            'email'=>$this->email ?? "",
            'mobile_number'=>$this->mobile_number ?? "",
            'address'=>$this->address ?? "",
            'work_time_start'=>$this->work_time ?? "",
            'work_time_end' => $this->work_time_end ?? "",
        ];
    }
}
