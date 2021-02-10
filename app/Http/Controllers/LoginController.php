<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            dd(Auth::user());
            return "Logged In";
        }

        return back()->withErrors([
            'invalid_credentials' => 'The provided credentials do not match our records.',
        ]);
    }
}
