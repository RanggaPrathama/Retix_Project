<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = DB::table('kategoris')
            ->select('id_kategori','nama_kategori')
            ->get();
        return view('pages.admin.table.kategori.index',['kategoris'=>$kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.table.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_kategori',$request->nama_kategori);
        $validateddata = $request->validate([
            'nama_kategori'=>'required|min:5|unique:kategoris'
        ]);
        $kategori =Kategori::create($validateddata);

        if($kategori){
            session()->flash('success', 'Data kategori berhasil disimpan.');
            return redirect()->route('kategori.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoris=DB::table('kategoris')
        ->select('id_kategori','nama_kategori')
        ->where('id_kategori',$id)
        ->first();

        return view('pages.admin.table.kategori.update',['kategoris'=> $kategoris]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateddata= $request->validate([
            'nama_kategori'=>'required'
        ]);
        $kategori= Kategori::findorFail($id);
       $validasi= $kategori->update($validateddata);
       if($validasi){
        return redirect()->route('kategori.index')->with('success','Berhasil');
       }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori=Kategori::findorFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success','Berhasil !');
    }
}
