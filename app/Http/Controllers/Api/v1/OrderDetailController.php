<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\OrderDetailResource;
use App\Models\OrderDetail;
use App\Http\Requests\OrderDetailRequest;

class OrderDetailController extends Controller
{
    
    public function index()
    {

        $orderDetail = OrderDetail::get();

        return  OrderDetailResource::collection($orderDetail);
     
    }


    public function store(OrderDetailRequest $request)
    {
      
        $orderDetail = OrderDetail::create([
            'product_id' => $request->product_id,
            'quantity' =>  $request->quantity,
            'order_id' => $request->order_id,
            'total_price' => $request->total_price,
            'price' => $request->price,
        ]);

       
        return response($orderDetail, 201);
    }


    public function update(OrderDetailRequest $request, $id)
    {

        $orderDetail = OrderDetail::find($id); 

        $orderDetail->update([
            'product_id' => $request->product_id,
            'quantity' =>  $request->quantity,
            'order_id' => $request->order_id,
            'total_price' => $request->total_price,
            'price' => $request->price,
        ]);

        return response($orderDetail, 201);
    }


    public function destroy($id)
    {

        $orderDetail = OrderDetail::find($id); 

        $orderDetail->delete();

        return response($orderDetail, 201);
    }
}
