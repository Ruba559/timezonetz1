<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Http\Requests\FavoriteRequest;

class FavoriteController extends Controller
{
   
    public function index()
    {

        $category = Favorite::get();

        return  FavoriteResource::collection($category);
     
    }


    public function getFavoriteByUserId($id)
    {
      return Favorite::FavoriteByUserId($id);
    }


    public function store(FavoriteRequest $request)
    {
      
        $favorite = Favorite::create([
            'user_id' => $request->user_id,
            'product_id' =>  $request->product_id,
        ]);

       
        return response($favorite, 201);
    }


    public function update(FavoriteRequest $request, $id)
    {

        $favorite = Favorite::find($id); 

        $favorite->update([
            'user_id' => $request->user_id,
            'product_id' =>  $request->product_id,
        ]);

        return response($favorite, 201);
    }


    public function destroy($id)
    {

        $favorite = Favorite::find($id); 

        $favorite->delete();

        return response($favorite, 201);
    }
}
