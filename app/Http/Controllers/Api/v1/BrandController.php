<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function index()
    {

        $brand = Brand::get();

        return  BrandResource::collection($brand);
     
    }


    public function store(BrandRequest $request)
    {
      
        $imageName = "";

        if($request->image){

         $image= $request->file('image');
          $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('/brand', $name, 'public');
        }
      
        $brand = Brand::create([
            'name' => $request->name,
            'slug' => $this->slug($request->name),
            'image' => $imageName,
        ]);

       
        return response($brand, 201);
    }


    public function update(BrandRequest $request, $id)
    {

        $brand = Brand::find($id); 

        $brand->update([
            'name' => $request->name,
            'slug' => $this->slug($request->name),
        ]);

        if ($request->image) {
            if($brand->image)
            {
                if(File_exists(public_path().'/storage/'.$brand->image))
                {
        
                   unlink(public_path().'/storage/'.$brand->image);
                }

            $image= $request->file('image');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('\brand', $name, 'public');

                $brand->update(['image' => $imageName]);
        }else{
            
            $image= $request->file('image');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('\brand', $name, 'public');
    
             $brand->update(['image' => $imageName]);
        }
        }

        return response($brand, 201);
    }


    public function destroy($id)
    {

        $brand = Brand::find($id); 

        if(File_exists(public_path().'/storage/'.$brand->image))
        {

           unlink(public_path().'/storage/'.$brand->image);
        }

        $brand->delete();

        return response($brand, 201);
    }

    public function slug($string, $separator = '-')
    {
        if (is_null($string)) {
            return "";
        }
    
        $string = trim($string);
        $string = mb_strtolower($string, "UTF-8");;
        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
    
        return $string;
    }
}
