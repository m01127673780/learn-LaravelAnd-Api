<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class Users extends Controller
{
  public function login_get()
    {
        return view('login');
    }
      public function login_post()
    {
        $remember =request()->has('remember') ?true:false;
        if(auth()->attempt(['email'=>request('email'),'password'=>request('password')],$remember))
        {
return view('home');
        }else{
            //return redirect('login');
          return back();

        }

    }
   
}
