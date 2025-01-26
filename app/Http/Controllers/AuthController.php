<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login()
    {
        $title = __("Login");
        return view("auth.login", compact('title'));
    }


    public function register(){
        $title = __("Register");
        return view("auth.register", compact('title'));
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }

    public function forgot()
    {
        $title = __("Forgot Password");
        return view("auth.forgot", compact('title'));
    }


    public function reset(string $token){
        return view('auth.reset', ['token' => $token]);
    }
}
