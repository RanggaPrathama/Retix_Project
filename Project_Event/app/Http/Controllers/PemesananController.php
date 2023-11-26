<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function riwayatPemesanan(){
        return view('pages.user.riwayatpesan.index');
    }

    public function pemesanan(){

    }

    public function index()
    {
        $payments = DB::table('payments')->select('*')->where('status','=',1)->get();
        // $pemesanans = DB::table('pemesanans')->select('*')->where('slug',$slug)->first();
        // $detilPesan = DB::table('detil_pemesanans')->select('*')->where('id_pemesanan',$pemesanans->id_pemesanan)->get();
        // return view('pages.user.pemesanan.index',['payments'=>$payments,'pemesanans'=>$pemesanans,'detilPesan'=>$detilPesan]);
        return view('pages.user.pemesanan.index',['payments'=>$payments]);
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
    public function store(Request $request)
    {

        // $validatedData = $request->validate([
        //     'id_user' =>'unique:pemesanans,id_user'
        // ]);


        $validatedData['id_user'] = $request->input('id_user');
        $validatedData['tgl_pemesanan'] = now();
        $validatedData['status_pemesanan'] = 1;
        $validatedData['total_tagihan'] = $request->input('total_tagihan');
        $validatedData['slug'] = Str::random(40);
        $pemesanan = DB::table('pemesanans')->insertGetId($validatedData);

        $detilEvent_list = $request->input('id_detilEvent');
        $quantity_list = $request->input('quantity');

        $inputDataList = [];


        foreach($detilEvent_list as $index => $id_detilEvent){
            $quantity = $quantity_list[$index];

            if($quantity > 0){
                $inputdata = [
                    'id_pemesanan' => $pemesanan,
                    'id_detilEvent' => $id_detilEvent,
                    'quantity' => $quantity,
                    'created_at' => now(),
                ];
                $inputDataList[] = $inputdata;

                $events = DB::table('detil_events')->where('id_detilEvent',$id_detilEvent)->first();

                $update = $events->sisa_kuota -= $inputdata['quantity'];

                // $inputDataKuota[]= $update;
                DB::table('detil_events')->where('id_detilEvent', $id_detilEvent)->update(['sisa_kuota' => $update]);
            }




        }


        $create =DB::table('detil_pemesanans')->insert( $inputDataList);
    //    $update1 = $events->update(['sisa_kuota'=> $inputDataKuota]);

       $pesan = DB::table('pemesanans')->where('id_pemesanan',$pemesanan)->get();
       return redirect("/checkout/$pesan->slug");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
