<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\verifytoken;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function homeAdmin(){
        return view('pages.admin.home');
    }
    public function index()
    {
        return view('pages.user.home');
    }


    public function verifotp(){
        return view('pages.verifyaccount');
    }

    public function useractivation(Request $request){
        $get_token = $request->token;
        $get_token = verifytoken::where('token',$get_token)->first();
        if($get_token){
            $get_token->is_actived=1;
            $get_token->save();
            $user = User::where('email',$get_token->email)->first();
            $user->is_actived=1;
            $user->save();
            $getting_token = verifytoken::where('token',$get_token->token)->first();
            $getting_token->delete();
            return redirect()->route('home')->with('activated','Your Account Actived');


        }
    }

    
}
