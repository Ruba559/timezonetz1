<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    
    public function index()
    {

        $category = Category::get();

        return  CategoryResource::collection($category);
     
    }


    public function store(CategoryRequest $request)
    {
      
        $imageName = "";

        if($request->image){

         $image= $request->file('image');
          $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('/category', $name, 'public');
        }
      
        $category = Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'image' => $imageName,
            'slug' => $this->slug($request->name),
        ]);

       
        return response($category, 201);
    }


    public function update(CategoryRequest $request, $id)
    {

        $category = Category::find($id); 

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $this->slug($request->name),
        ]);

        if ($request->image) {
            if($category->image)
            {
                if(File_exists(public_path().'/storage/'.$category->image))
                {
        
                   unlink(public_path().'/storage/'.$category->image);
                }

            $image= $request->file('image');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('\category', $name, 'public');

                $category->update(['image' => $imageName]);
        }else{
            
            $image= $request->file('image');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('\category', $name, 'public');
    
             $category->update(['image' => $imageName]);
        }
        }

        return response($category, 201);
    }


    public function destroy($id)
    {

        $category = Category::find($id); 

        if(File_exists(public_path().'/storage/'.$category->image))
        {

           unlink(public_path().'/storage/'.$category->image);
        }

        $category->delete();

        return response($category, 201);
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
