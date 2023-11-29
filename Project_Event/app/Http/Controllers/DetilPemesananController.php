<?php

namespace App\Http\Controllers;

use App\Models\DetilPemesanan;
use App\Http\Requests\StoreDetilPemesananRequest;
use App\Http\Requests\UpdateDetilPemesananRequest;

class DetilPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function riwayatPemesanan()
    {
        //DB::table('pemesanans as p')
        //->select()
        return view('pages.user.riwayatpesan.detailpesan');
    }

    public function index(){
        // $detilpesan = DB::table('detil_pesan')
        // ->select('id_detilEvent','events.id_event','events.nama_event','kategoris.id_kategori','kategoris.nama_kategori','kuota_event','harga_event', 'detil_events.status')
        // ->join('events','detil_events.id_event','=','events.id_event')
        // ->join('kategoris','detil_events.id_kategori','=','kategoris.id_kategori')
        // ->get();
        // return view('pages.admin.table.detilEvent.index',['detilEvents'=>$detilpesan]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetilPemesananRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DetilPemesanan $detilPemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetilPemesanan $detilPemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetilPemesananRequest $request, DetilPemesanan $detilPemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetilPemesanan $detilPemesanan)
    {
        //
    }
}
