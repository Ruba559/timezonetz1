<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AdvertResource;
use App\Models\Advert;
use App\Http\Requests\AdvertRequest;


class AdvertController extends Controller
{
    public function index()
    {

        $adverts = Advert::get();

        return  AdvertResource::collection($adverts);
     
    }


    public function store(AdvertRequest $request)
    { 
      
        $imageName = "";

        if($request->image){

         $image= $request->file('image');
          $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('/advert', $name, 'public');
        }
      
        $advert = Advert::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' =>  $imageName,
        ]);

       
        return response($advert, 201);
    }


    public function update(AdvertRequest $request, $id)
    {

        $advert = Advert::find($id); 

        $advert->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
        ]);

        if ($request->image) {
            if($advert->image)
            {
                if(File_exists(public_path().'/storage/'.$advert->image))
                {
        
                   unlink(public_path().'/storage/'.$advert->image);
                }

            $image= $request->file('image');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('\advert', $name, 'public');

                $advert->update(['image' => $imageName]);
        }else{
            
            $image= $request->file('image');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('\advert', $name, 'public');
    
             $advert->update(['image' => $imageName]);
        }
        }

        return response($advert, 201);
    }


    public function destroy($id)
    {

        $advert = Advert::find($id); 

        if(File_exists(public_path().'/storage/'.$advert->image))
        {

           unlink(public_path().'/storage/'.$advert->image);
        }

        $advert->delete();

        return response($advert, 201);
    }
}
