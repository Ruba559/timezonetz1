<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ComplaintResource;
use App\Models\Complaint;
use App\Http\Requests\ComplaintRequest;

class ComplaintController extends Controller
{
    public function index()
    {

        $complaint = Complaint::get();

        return  ComplaintResource::collection($complaint);
     
    }


    public function store(ComplaintRequest $request)
    {
      
        $complaint = Complaint::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'type' => $request->type,
            'description' => $request->description,
        ]);

       
        return response($complaint, 201);
    }


    public function update(ComplaintRequest $request, $id)
    {

        $complaint = Complaint::find($id); 

        $complaint->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return response($complaint, 201);
    }


    public function destroy($id)
    {

        $complaint = Complaint::find($id); 

        $complaint->delete();

        return response($complaint, 201);
    }

}
