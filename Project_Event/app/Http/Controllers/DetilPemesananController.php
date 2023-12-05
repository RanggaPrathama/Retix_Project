<?php

namespace App\Http\Controllers;

use App\Models\DetilPemesanan;
use App\Http\Requests\StoreDetilPemesananRequest;
use App\Http\Requests\UpdateDetilPemesananRequest;
use Illuminate\Support\Facades\DB;

class DetilPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function detailRiwayat($slug){

            // $ticketDetail = DB::table('pembayarans as pem')
            // ->select('pem.slug','detp.quantity',DB::raw('detE.harga_event * detp.quantity AS "SUBTOTAL"'),'k.nama_kategori','detE.harga_event')
            // ->join('pemesanans as p','pem.id_pemesanan','=','p.id_pemesanan')
            // ->join('detil_pemesanans as detp ','detp.id_pemesanan','=','p.id_pemesanan')
            // ->join('detil_events as detE','detE.id_detilEvent','=','detp.id_detilEvent')
            // ->join('kategoris as k','detE.id_kategori','=','k.id_kategori')
            // // ->where(
            // //     function($query){
            // //         $query ->where('pem.id_user','=',auth()->user()->id_user)
            // //         ->orWhere('pem.slug','=',$slug);
            // //     }
            // // );
            // ->where('pem.id_pembayaran','=',$id)
            // ->get();

           $detilEvent = DB::table('detil_events as detE')
                        ->select('e.nama_event',  DB::raw('TIME_FORMAT(e.tgl_event,"%H:%i") AS time_event'),  DB::raw('DATE_FORMAT(e.tgl_event,"%d %M %Y") AS tgl_event'),'e.nama_lokasi','e.gambar_event')
                        ->join('events as e','e.id_event','=','detE.id_event')
                        ->join('detil_pemesanans as detp','detp.id_detilEvent','=','detE.id_detilEvent')
                        ->join('pemesanans as p','p.id_pemesanan','=','detp.id_pemesanan')
                        ->join('pembayarans as pem','pem.id_pemesanan','=','p.id_pemesanan')
                        ->where('pem.slug','=',$slug)
                        ->first();
            $puchaseDetail = DB::table('pembayarans as pem')
                            ->select('pem.slug','pay.id_payments','pem.tgl_pembayaran','pay.nama','p.total_tagihan','pem.status_pembayaran')
                            ->join('pemesanans as p','p.id_pemesanan','=','pem.id_pemesanan')
                            ->join('payments as pay','p.id_payments','=','pay.id_payments')
                            ->where('pem.slug',$slug)
                            ->get();

            $ticketDetail = DB::table('detil_pemesanans as detp')
            ->select('pem.slug','detp.quantity',DB::raw('detE.harga_event * detp.quantity AS "SUBTOTAL"'),'k.nama_kategori','detE.harga_event',)
            ->join('pemesanans as p','p.id_pemesanan','=','detp.id_pemesanan')
            ->join('pembayarans as pem','pem.id_pemesanan','=','p.id_pemesanan')
            ->join('detil_events as detE','detE.id_detilEvent','=','detp.id_detilEvent')
            ->join('kategoris as k','detE.id_kategori','=','k.id_kategori')
            ->where('pem.slug','=',$slug)
            ->get();


             return view('pages.user.riwayatpesan.detailpesan',['ticketDetail' => $ticketDetail,'puchaseDetail'=>$puchaseDetail,'detilEvent'=>$detilEvent]);




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
