<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{

    public function index()
    {

        $cart = Cart::get();

        return  CartResource::collection($cart);
     
    }


    public function getCartByUserId($id)
    {

      return Cart::cartByUserId($id);
    
    }


    public function store(CartRequest $request)
    {
      

        $cart = Cart::create([
            'product_id' => $request->product_id,
            'price' =>   $request->price,
            'quantity' =>  $request->quantity,
            'user_id' => $request->user_id,
        ]);

       
        return response($cart, 201);
    }


    public function update(CartRequest $request, $id)
    {

        $cart = Cart::find($id); 

        $cart->update([
             'product_id' => $request->product_id,
             'price' =>   $request->price,
            'quantity' =>  $request->quantity,
            'user_id' => $request->user_id,
        ]);

        return response($cart, 201);
    }


    public function destroy($id)
    {

        $cart = Cart::find($id); 

        $cart->delete();

        return response($cart, 201);
    }
}
