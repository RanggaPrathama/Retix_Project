<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use App\Http\Requests\StorepembayaranRequest;
use App\Http\Requests\UpdatepembayaranRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $pembayarans = DB::table('pembayarans as pe')->select('*','pe.slug','p.total_tagihan','pay.logo','pay.gambar')
        ->join('pemesanans as p','p.id_pemesanan','=','pe.id_pemesanan')
        ->join('payments as pay','pay.id_payments','=','p.id_payments')
        ->where('p.slug',$slug)
        ->first();

        return view('pages.user.pembayaran.index',['pembayarans'=>$pembayarans]);


    }

    public function payment($slug, Request $request){


        $inputData = [
            'status_pembayaran'=> 1,
            'updated_at' =>Carbon::now()->setTimezone('Asia/Jakarta'),
        ];
        $pembayarans = DB::table('pembayarans')->where('slug',$slug);

        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('buktiBayar'),$gambar);
            $inputData['gambar'] = $gambar;


        }
      $cek =  $pembayarans->update($inputData);

       return redirect('/riwayatpemesanan')->with('success','Berhasil ! ');
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
    public function store(StorepembayaranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepembayaranRequest $request, pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembayaran $pembayaran)
    {
        //
    }
}
