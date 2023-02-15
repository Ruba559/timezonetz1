<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function product($slug)
    {
        
        $product = Product::where('slug',$slug)->firstorfail();
        
        $related = Product::where('brand_id',$product->brand_id)->orWhere('category_id',$product->category_id)->orWhere('gender',$product->gender)->inRandomOrder()->get()->take(8);
        return view('pages.product',['product'=>$product,'related'=>$related]);
    }
}
