<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    
    public function Pricing()
    {

       $products =  Product::get();

      return view('dashboard.whole-pricing' , ['products' => $products]);
    }
}
