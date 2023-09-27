<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Http\Requests\StoreLokasiRequest;
use App\Http\Requests\UpdateLokasiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasis = DB::table('lokasis')
        ->select('lokasis.id_lokasi','lokasis.nama_lokasi','kecamatans.id_kecamatan','kecamatans.nama_kecamatan')
        ->join('kecamatans','kecamatans.id_kecamatan','=','lokasis.id_kecamatan')
        ->get();
        return view('pages.admin.table.lokasi.index',['lokasis'=>$lokasis]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatans=DB::table('kecamatans')
        ->select('*')
        ->get();
        return view('pages.admin.table.lokasi.create',['kecamatans'=>$kecamatans]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateddata= $request->validate([
            'id_kecamatan'=>'required',
            'nama_lokasi'=>'required|min:10',

        ]);
        $validate = Lokasi::create($validateddata);
        if($validate){
            return redirect()->route('lokasi.index')->with('success','Berhasil !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lokasis=DB::table('lokasis')
        ->select('lokasis.id_lokasi','lokasis.nama_lokasi')
         ->where('id_lokasi',$id)
        ->first();

        $kecamatans=DB::table('kecamatans')
        ->select('id_kecamatan','nama_kecamatan')
        ->get();
        return view('pages.admin.table.lokasi.update',['lokasis'=>$lokasis,'kecamatans'=>$kecamatans]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validateddata=$request->validate([
            'id_kecamatan'=>'required',
            'nama_lokasi'=>'required|min:10',
        ]);
        $lokasi=Lokasi::findOrfail($id);
        $validate=$lokasi->update($validateddata);
        if($validate){
            return redirect()->route('lokasi.index')->with('success','Berhasil !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lokasi=Lokasi::findOrfail($id);
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with('success','Berhasil !');
    }
}
