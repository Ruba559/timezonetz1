<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use App\Http\Requests\NotificationRequest;


class NotificationController extends Controller
{
    
    public function index()
    {

        $notification = Notification::get();

        return  NotificationResource::collection($notification);
     
    }


    public function getNotificationByUserId($id)
    {

      return Notification::NotificationByUserId($id);
    
    }


    public function store(NotificationRequest $request)
    {
      
        $notification = Notification::create([
            'title' => $request->title,
            'description' =>  $request->description,
            'user_id' =>  $request->user_id,
        ]);

       
        return response($notification, 201);
    }


    public function update(NotificationRequest $request, $id)
    {

        $notification = Notification::find($id); 

        $notification->update([
            'title' => $request->title,
            'description' =>  $request->description,
            'user_id' =>  $request->user_id,
        ]);

        return response($notification, 201);
    }


    public function destroy($id)
    {

        $notification = Notification::find($id); 

        $notification->delete();

        return response($notification, 201);
    }
}
