<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $validateddata = $request->validate([
            'nama_kategori'=>'required'
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
        ->get();

        return view('pages.admin.table.kategori.update',['kategoris',$kategoris]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
