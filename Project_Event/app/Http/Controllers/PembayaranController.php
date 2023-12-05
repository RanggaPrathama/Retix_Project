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

    public function riwayatPemesanan()
    {

        try {
            $riwayat = DB::table('pembayarans as pem')
                ->select('e.gambar_event', 'e.nama_event', 'pem.slug', 'p.total_tagihan', 'pem.status_pembayaran','pem.tgl_pembayaran','pem.id_pembayaran')
                ->join('pemesanans as p', 'p.id_pemesanan', '=', 'pem.id_pemesanan')
                ->join('detil_pemesanans as dep', 'dep.id_pemesanan', '=', 'p.id_pemesanan')
                ->join('detil_events as dev', 'dev.id_detilEvent', '=', 'dep.id_detilEvent')
                ->join('events as e', 'e.id_event', '=', 'dev.id_event')
                ->where('pem.id_user', '=', auth()->user()->id_user)
                ->groupBy('e.gambar_event', 'e.nama_event', 'pem.slug', 'p.total_tagihan', 'pem.status_pembayaran','pem.tgl_pembayaran','pem.id_pembayaran')
                ->orderBy('pem.tgl_pembayaran','DESC')
                ->get();

            return view('pages.user.riwayatpesan.index', ['riwayat' => $riwayat]);

        } catch (\Throwable $e) {
            return view('pages.user.riwayatpesan.index', ['error' => $e->getMessage()]);
        }


    }


    public function index($slug)
    {
        $pembayarans = DB::table('pembayarans as pe')->select('*', 'pe.slug', 'p.total_tagihan', 'pay.logo', 'pay.gambar')
            ->join('pemesanans as p', 'p.id_pemesanan', '=', 'pe.id_pemesanan')
            ->join('payments as pay', 'pay.id_payments', '=', 'p.id_payments')
            ->where('pe.slug', $slug)
            ->first();

        return view('pages.user.pembayaran.index', ['pembayarans' => $pembayarans]);
    }

    public function payment($slug, Request $request)
    {


        $inputData = [
            'status_pembayaran' => 3,
            'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        ];
        $pembayarans = DB::table('pembayarans')->where('slug', $slug);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('buktiBayar'), $gambar);
            $inputData['gambar'] = $gambar;
        }
        $cek =  $pembayarans->update($inputData);

        return redirect('/riwayatpemesanan')->with('success', 'Berhasil ! ');
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
