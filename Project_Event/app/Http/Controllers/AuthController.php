<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use App\Models\verifytoken;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    public function register()
    {
        return view('pages.user.auth.register');
    }

    public function register_post(Request $request)
    {
        $validateddata = $request->validate([
            'name' => 'required',
            'email' => 'required||unique:users|email',
            'password' => 'required|unique:users|confirmed|min:8',
            'no_telp' => 'required|min:11',
            'token' => 'required|unique:users'

        ]);
        $users = DB::table('users')->get();
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $token = $request->input('token');
        $no_telp = $request->input('no_telp');

        if (count($users) < 1) {
            $role = '1';
        } else {
            $role = '0';
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'no_telp' => $no_telp,
            'role' => $role,
            'token' => $token,

        ]);

        Mail::send('emails.verifikasiemail', ['token' => $request->token, 'user' => $user], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Verifikasi Email Retix');
        });
        return redirect()->route('verifyaccount')->with('success', 'Silahkan Verifikasi Akun, Sistem telah mengirim kode otp ke email ');
    }

    public function verifikasi()
    {
        return view('pages.user.auth.verifyaccount');
    }

    public  function verifikasi_post(Request $request)
    {
        $user = User::where('token', $request->token)->first();

        if ($user) {
            if ($user->token == $request->token) {
                $rules = [
                    'token' => 'required'
                ];
            }
            $validateddata = $request->validate($rules);
            $validateddata['is_actived'] = 1;
            $validateddata['email_verified_at'] = date("Y-m-d H:i:s");
            $user->update($validateddata);
            $user->update($validateddata);
            $data['token'] = null;
            $user->update($data);

            return redirect()->route('login')->with('success', 'Akun anda terverifikasi');
        } else {
            return back()->with('error', 'Kode otp salah, silahkan coba lagi');
        }
    }

    public function login()
    {
        return view('pages.user.auth.login');
    }

    public function login_post(Request $request)
    {
        $validateddata = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validateddata)) {
            $request->session()->regenerate();
            if (auth()->user()->is_actived == 1) {
                if (auth()->user()->role == 0) {
                    return redirect()->route('home')->with('success', 'Berhasil Login !');
                } else {
                    return redirect()->route('admin.home')->with('success', 'Berhasil Login !');
                }
            } else {
                return redirect()->back()->with('errors', 'Akun anda tidak aktif');
            }
        } else {
            return redirect()->back()->with('errors', 'Email atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
    protected function loggedOut(Request $request)
    {
        //
    }
}
