<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Http\Requests\StoreKecamatanRequest;
use App\Http\Requests\UpdateKecamatanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatans = DB::table('kecamatans')
        ->select('*')
        ->join('kotas','kotas.id_kota','=','kecamatans.id_kota')
        ->get();
    return view('pages.admin.table.kecamatan.index',['kecamatans'=>$kecamatans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.table.kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateddata = $request->validate([
            'nama_kecamatan'=>'required|min:5'
        ]);

        $kecamatan =Kecamatan::create($validateddata);

        if($kecamatan){
            session()->flash('success', 'Data kecamatan berhasil disimpan.');
            return redirect()->route('kecamatan.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kecamatans=Kecamatan::findorFail($id);
        return view('pages.admin.table.kecamatan.update',compact('kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validateddata= $request->validate([
            'nama_kecamatan'=>'required|min:5'
        ]);
        $kecamatans = Kecamatan::findOrFail($id);
        $valid = $kecamatans->update($validateddata);
        if($valid){
            return redirect()->route('kecamatan.index')->with('success','Berhasil!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kecamatans = Kecamatan::findOrFail($id);
        $kecamatans->delete();
        return redirect()->route('kecamatan.index')->with('success','Berhasil !');
    }
}
