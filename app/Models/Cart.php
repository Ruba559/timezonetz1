<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\CartResource;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ScopeCartByUserId($querry , $id)
    {
      return  CartResource::collection($querry->where('user_id' ,$id)->get());
    }

}
