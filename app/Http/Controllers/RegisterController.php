<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|alpha|string|min:4|max:255',
            'email' => 'required|email:rfc',
            'password' => 'required|confirmed|min:6'
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }
}
