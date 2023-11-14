<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\verifytoken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function homeAdmin()
    {
        return view('pages.admin.home');
    }
    public function index()
    {
        return view('pages.user.home');
    }

    public function homepage()
    {
        $events =  DB::select('SELECT
       MIN(d.harga_event) AS min_harga,
       e.id_event,
       e.nama_event,
       e.gambar_event,
       DATE_FORMAT(e.tgl_event, "%e %b %y") AS Tanggal_Event,
       e.nama_lokasi
   FROM
       detil_events d
   JOIN
       events e ON e.id_event = d.id_event
   GROUP BY
       e.id_event, e.nama_event, e.gambar_event, e.tgl_event, e.nama_lokasi');

        return view('pages.user.home', ['events' => $events]);
    }

    // public function verifotp(){
    //     return view('pages.verifyaccount');
    // }

    // public function useractivation(Request $request){
    //     $get_token = $request->token;
    //     $get_token = verifytoken::where('token',$get_token)->first();
    //     if($get_token){
    //         $get_token->is_actived=1;
    //         $get_token->save();
    //         $user = User::where('email',$get_token->email)->first();
    //         $user->is_actived=1;
    //         $user->save();
    //         $getting_token = verifytoken::where('token',$get_token->token)->first();
    //         $getting_token->delete();
    //         return redirect()->route('home')->with('activated','Your Account Actived');


    //     }
    // }


}
