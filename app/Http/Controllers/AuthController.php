<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login()
    {
        return view("auth.login");
    }


    public function register(){
        return view("auth.register");
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }

    public function forgot()
    {
        $title = "Mot de passe oublié";
        return view("auth.forgot", compact('title'));
    }


    public function reset(string $token){
        return view('auth.reset', ['token' => $token]);
    }
}
