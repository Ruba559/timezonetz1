<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Banner;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Legal;
use DB;
use Illuminate\Support\Facades\Log;
use Auth;

class HomeController extends Controller
{
  
    
     public function index()
     {

        $brands  = Brand::get();

        $newProducts  = Product::where('status' , '1')->where('stock' , '1')->orderBy('created_at','DESC')->limit(8)->get();

        $topSalesProducts  = OrderDetail::groupBy('product_id')
        ->orderBy( DB::raw('count(*)'), 'DESC')
        ->limit(8)->with('product', function ($query) {
            return $query->where('stock', 1)->where('status' , 1);
        })->get();

        return view('welcome2' , ['brands' =>  $brands , 'newProducts' => $newProducts , 'brands' => $brands , 'topSalesProducts' => $topSalesProducts]);
     }
     

    public function search($word)
    {
        
        $products = Product::search(trim($word) ?? '')->query(function ($query) {
            $query->join('categories', 'products.category_id', 'categories.id')
                ->select(['products.id'])
                ->orderBy('products.id', 'DESC');
                $query->join('brands', 'products.brand_id', 'brands.id')
                ->select(['products.id'])
                ->orderBy('products.id', 'DESC');
        })->get();  
 
        return response()->json($products);
    }


    public function cart()
    {

        if(auth::user())
        {
            $orders = Order::where('user_id' , auth::user()->id)->get();

        }else
        {
            $orders = null;
        }

        return view('pages.cart' , ['orders' => $orders]);
    }


    public function brand($slug)
    {

        $brand = Brand::where('slug' , $slug)->first();
        $products = Product::where('brand_id' , $brand->id)->get();

        return view('pages.brand' ,  ['products' => $products , 'brand' => $brand]);
    }
 

    public function category($slug)
    {

        $category = Category::where('slug' , $slug)->first();
        $products = Product::where('category_id' , $category->id)->get();

        return view('pages.category' ,  ['products' => $products , 'category' => $category]);
    }


    public function forHim()
    {

        $products = Product::where('gender' , '0')->get();

        return view('pages.for-him' ,  ['products' => $products]);
    }


    public function forHer()
    {

        $products = Product::where('gender' , '1')->get();

        return view('pages.for-her' ,  ['products' => $products]);
    }

    public function newArrivals()
    {

        $products  = Product::where('status' , '1')->where('stock' , '1')->orderBy('created_at','DESC')->get();
        
         return view('pages.new-arrivals' ,  ['products' => $products]);
    }

    public function topSales()
    {

        $products  = OrderDetail::groupBy('product_id')
        ->orderBy( DB::raw('count(*)'), 'DESC')
        ->with('product', function ($query) {
            return $query->where('stock', 1)->where('status' , 1);
        })->get();

        return view('pages.top-sales' ,  ['products' => $products]);
    }

    public function Offers()
    {

        $products  = Product::where('status' , '1')->where('stock' , '1')->where('offer' , '<>' ,'0')->orderBy('created_at','DESC')->get();
        
         return view('pages.offers' ,  ['products' => $products]);
    }


    public function brands()
    {

        $brands  = Brand::get();

        return view('pages.brands' ,  ['brands' => $brands]);
    }

    public function favorite()
    {

        $favorite  = Favorite::where('user_id' , auth::user()->id)->pluck('product_id');
        $products = Product::whereIn('id' , $favorite)->get();

        return view('pages.favorite' ,  ['products' => $products]);
    }

    public function legals()
    {

        $legals  = Legal::get();

        return view('pages.legals' ,  ['legals' => $legals]);
    }
 
}
  