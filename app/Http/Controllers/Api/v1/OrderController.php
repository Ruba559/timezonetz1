<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{

   
    public function index()
    {

        $order = Order::get();

        return  OrderResource::collection($order);
     
    }


    public function store(Request $request)
    {
        
        $order = Order::create([
            'user_id' => $request->user_id,
            'delivery_id' =>  $request->delivery_id,
            'total_price' => $request->total_price,
            'status' => '0',
        ]);

       
        return response($order, 201);
    }


    public function update(OrderRequest $request, $id)
    {

        $order = Order::find($id); 

        $order->update([
            'user_id' => $request->user_id,
            'delivery_id' =>  $request->delivery_id,
            'total_price' => $request->total_price,
            'status' => '0',
        ]);

        return response($order, 201);
    }


    public function destroy($id)
    {

        $order = Order::find($id); 

        $order->delete();

        return response($order, 201);
    }
}
