<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{

    public function addBanner(Request $request)
    {

        $imageNameStatic = "";

        if($request->static_image){

         $image= $request->file('static_image');
          $name = $image->getClientOriginalName();
            $imageNameStatic = $image->storeAs('/staticImage', $name, 'public');
        }
        $imageNameDynamic = "";

        if($request->dynamic_image){

         $image= $request->file('dynamic_image');
          $name = $image->getClientOriginalName();
            $imageNameDynamic = $image->storeAs('/dynamicImage', $name, 'public');
        }
        if ($request->type == 'static')
        {
            Banner::create([
                'type' => $request->type,
                'static_image' => $imageNameStatic ,
                'static_url' => $request->static_url,

            ]);
        }else{
            Banner::create([
                'type' => $request->type,
                'background_color' => $request->background_color,
                'dynamic_image' => $imageNameDynamic,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'button_text' => $request->button_text,
                'button_url' => $request->button_url,

            ]);
        }



            return redirect('/admin/banners');
    }


    public function editBanner(Request $request)
    {


        $banner = Banner::find($request->id); 

        if ($request->type == 'static')
        {
            $banner->update([
                'type' => $request->type,
                'static_url' => $request->static_url,

            ]);
        }else{
            $banner->update([
                'type' => $request->type,
                'background_color' => $request->background_color,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'button_text' => $request->button_text,
                'button_url' => $request->button_url,

            ]);
        }
        $imageNameDynamic = "";

        $imageNameStatic = "";
        if($request->static_image){
            if($banner->static_image)
            {
                if(File_exists(public_path().'/storage/'.$banner->static_image))
                {
        
                   unlink(public_path().'/storage/'.$banner->static_image);
                }

            $image= $request->file('static_image');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('/banner/staticImage', $name, 'public');

                $banner->update(['static_image' => $imageName]);
        }else{
            
            $image= $request->file('static_image');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('/banner/staticImage', $name, 'public');
    
             $banner->update(['static_image' => $imageName]);
        }
        }


        if($request->dynamic_image){
            if($banner->dynamic_image)
            {
                if(File_exists(public_path().'/storage/'.$banner->dynamic_image))
                {
        
                   unlink(public_path().'/storage/'.$banner->dynamic_image);
                }

            $image= $request->file('dynamic_image');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('/banner/dynamicImage', $name, 'public');

                $banner->update(['dynamic_image' => $imageName]);
        }else{
            
            $image= $request->file('dynamic_image');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('/banner/dynamicImage', $name, 'public');
    
             $banner->update(['dynamic_image' => $imageName]);
        }
        }

        return redirect('/admin/banners');
    }
}
