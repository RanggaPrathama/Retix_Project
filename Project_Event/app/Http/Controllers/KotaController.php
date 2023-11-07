<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotaController extends Controller
{
    public function index(){
        $kotas = DB::table('kotas')->select('*')->join('provinsis','provinsis.id_provinsi','=','kotas.id_provinsi')->get();
        return view('pages.admin.table.kota.index',['kotas'=>$kotas]);
    }
    public function provinsi(){
        $data = DB::table('provinsis')
                    ->select('*')
                    ->where('nama_provinsi','LIKE','%'.request('q').'%')
                    ->paginate(35);
        return response()->json($data);
    }

    public function create(){
        return view('pages.admin.table.kota.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'id_provinsi'=>'required',
            'nama_kota'=>'required',
        ]);

        DB::table('kotas')->insert($validatedData);

    }

    public function edit($id){

    }

    public function update($id){

    }

    public function destroy($id){

    }
}
