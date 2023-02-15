<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;
use Illuminate\Support\Facades\Redirect;

class LocaleController extends Controller
{
   
    public function switch($locale)
    { 

        App::setLocale($locale);
       
        Session::put('locale', $locale);
      
        return Redirect::back();

    }
}
