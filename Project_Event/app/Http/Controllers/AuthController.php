<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use App\Models\verifytoken;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(){
        return view('pages.login');
    }

    public function register(){
        return view('pages.register');
    }

    public function register_post(Request $request){
        $validateddata = $request->validate([
            'name'=>'required',
            'email'=>'required||unique:users|email',
            'password'=>'required|unique:users|confirmed|min:8',
            'no_telp'=>'required',
        ]);

        $name = $request->input('name');
        $email=$request->input('email');
        $password = bcrypt($request->input('password'));
        $no_telp = $request->input('no_telp');
        $role='0';

        $user = User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'no_telp'=>$no_telp,
            'role'=>$role,

        ]);
                
        $validToken = rand(10, 100) . '2023';
        $get_token = new verifytoken();
        $get_token->token = $validToken;
        $get_token->email = $email;
        $get_token->save();
        $get_user_email = $email;
        $get_user_name = $name;
       Mail::to($email)->send(new WelcomeMail($get_user_email,$validToken,$get_user_name ));
        return redirect()->route('verifyaccount');
}
}
