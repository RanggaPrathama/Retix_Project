<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $users = DB::table('users')->select('*')->get();
        return view('pages.admin.table.user.index',['users'=>$users]);
    }

    public function edit($id){
        $users = DB::table('users')->where('id_user',$id)->first();
        return view('pages.admin.table.user.update',['users'=>$users]);
    }

    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'no_telp'=>'required',
            'password'=>'nullable',
        ]);

        $users = DB::table('users')->where('id_user',$id);
       $valid= $users->update($validatedData);
        if($valid){
            return redirect()->route('user.index')->with('success','Update Data Berhasil !');
        }
    }

    public function destroy($id){
        $users = DB::table('users')->where('id_user',$id);
        $users->delete();
        return redirect()->route('user.index')->with('success','Data Berhasil Di hapus');
    }

    public function upgrade($id){
        $users = DB::table('users')->where('id_user',$id)->where('role',0);
        $users->update(['role'=>1]);
        return redirect()->route('user.index')->with('success','Role User menjadi Admin');
    }

    public function down($id){
        $users = DB::table('users')->where('id_user',$id)->where('role',1);
        $users->update(['role'=>0]);
        return redirect()->route('user.index')->with('success','Role Admin menjadi User');
    }


    public function profile(){
        return view('pages.user.profile.index');
    }
}
