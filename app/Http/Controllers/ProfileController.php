<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function profile()
    {
        $user = User::where('id' , auth::user()->id)->first();

        return view('pages.profile' , ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        
        $user = User::where('id' , auth::user()->id)->first();  

        $user->update([
           'name' => $request->name,
           'email' => $request->email,
           'mobile_number' => $request->mobile_number,
        ]);
  
        $imageName = ""; 
        if ($request->avatar) {
           if($user->avatar)
           {
               if(File_exists(public_path().'/storage/'.$user->avatar))
               {
       
                  unlink(public_path().'/storage/'.$user->avatar);
               }
               
           $image= $request->file('avatar');
           $name = $image->getClientOriginalName();
           $imageName = $image->storeAs('user', $name, 'public');
    
               $user->update(['avatar' => $imageName]);  
       }else{
           
           $image= $request->file('avatar');
           $name = $image->getClientOriginalName();
           $imageName = $image->storeAs('\user', $name, 'public');
   
            $user->update(['avatar' => $imageName]);
       }
       }
       if ($request->password) {
        
           $user->update(['password' => Hash::make($request->password)]);
       }
  
        return redirect()->back();
    }



    // public function edit(Request $request)
    // {
    //     return view('profile.edit', [
    //         'user' => $request->user(),
    //     ]);
    // }

    // /**
    //  * Update the user's profile information.
    //  *
    //  * @param  \App\Http\Requests\ProfileUpdateRequest  $request
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function update(ProfileUpdateRequest $request)
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function destroy(Request $request)
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current-password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
