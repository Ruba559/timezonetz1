<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class AuthenticatedSessionController extends Controller
{
    
    public function create()
    {
        return view('auth.login');
    }

   
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        $cart = session()->get('cart');

        if ($cart) {

            foreach ($cart as  $item) 
            {
                Cart::create([
                    'product_id' => $item["id"],
                    'quantity' => $item["quantity"],
                    'price' => $item["price"], 
                    'user_id' => auth::user()->id,
                    'total_price' => $item["total_price"],
                ]);
            }
            session()->forget('cart');
           
        
        }
       
        return redirect()->intended(RouteServiceProvider::HOME);
    }

  
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
