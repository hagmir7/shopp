<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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



    public function loginAPI(Request $request)
    {
        $validatedData = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $login = $validatedData['login'];
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $user = User::where($fieldType, $login)->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;



        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }
}
