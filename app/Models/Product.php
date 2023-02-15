<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\ProductResource;
use TCG\Voyager\Traits\Translatable;
use Laravel\Scout\Searchable;
use Auth;

class Product extends Model
{
    use HasFactory;

    use Translatable;
    use Searchable;

    protected $guarded = [];

    protected $translatable = ['name' , 'description'];


    public static function boot() {
  
      parent::boot();

      static::creating(function($item) {          

          $item->user_id =  auth::user()->id;
      });

    }

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class , 'product_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class , 'product_id');
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    
    public function ScopeProductByCategoryId($querry , $id)
    {
      return  ProductResource::collection($querry->where('category_id' ,$id)->where('status' , '1')->where('stock' , '1')->orderBy('created_at','DESC')->get());
    }

    public function ScopeProductByBrandId($querry , $id)
    {
      return ProductResource::collection($querry->where('brand_id' ,$id)->where('status' , '1')->where('stock' , '1')->orderBy('created_at','DESC')->get());
    }

    public function ScopeNewProducts($querry)
    {
      return ProductResource::collection($querry->where('status' , '1')->where('stock' , '1')->orderBy('created_at','DESC')->limit(8)->get());
    }

    
    public function ScopeBigDealsProducts($querry)
    {

      $topSalesProducts  = OrderDetail::groupBy('product_id')
      ->orderBy( DB::raw('count(*)'), 'DESC')
      ->limit(8)->with('product', function ($query) {
          return $query->where('stock', 1)->where('status' , 1);
      })->get();

      return $topSalesProducts;

    }


}
