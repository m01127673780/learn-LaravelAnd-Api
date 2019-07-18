<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class Admin extends Controller
{
     public function login_get()
    {
        return view('login-admin');
    }
      public function login_post()
    {
        $remember =request()->has('remember') ?true:false;
        if(Auth::guard('webadmin')->attempt(['email'=>request('email'),'password'=>request('password')],$remember)){
        return redirect('admin/path');
        }else{
            //return redirect('login');
          return back();

        }

    }
} 
