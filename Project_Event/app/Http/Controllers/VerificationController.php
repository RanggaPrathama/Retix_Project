<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    public function notice(){
        return "Mohon melakukan verifikasi email dahulu";
    }
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return 'akun berhasil di verifikasi, selamat datang di dashboard !';
    }

    public function send(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return 'Verifikasi Email berhasil dikirim';
    }
}
