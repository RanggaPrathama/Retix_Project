<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\verifytoken;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user) {
            $get_user = User::where('email', $user->email)->first();

            if ($get_user->is_actived == 1) {
                return view('pages.user.index')->with('success', 'Berhasil Aktif!');
            } else {
                return redirect()->route('verifyaccount');
            }
        } else {
            // Pengguna belum terotentikasi, lakukan sesuatu di sini
            return redirect()->route('login'); // Misalnya, arahkan ke halaman login
        }
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
