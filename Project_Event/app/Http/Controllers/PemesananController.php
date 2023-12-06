<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function riwayatPemesanan(){
    //     return view('pages.user.riwayatpesan.index');
    // }

    // USER

    public function index($slug)
    {
        $payments = DB::table('payments')->select('*')->where('status','=',1)->get();
        $users = DB::table('users')->where('id_user',auth()->user()->id_user)->first();
        $pemesanans = DB::table('pemesanans')->select('*')->where('slug',$slug)->first();
        $orders = DB::table('detil_pemesanans as de')
                ->select('e.nama_event','k.nama_kategori','de.quantity','d.harga_event',DB::raw('de.quantity * d.harga_event AS "SUBTOTAL"'))
                ->join('detil_events as d','de.id_detilEvent','=','d.id_detilEvent')
                ->join('events as e','d.id_event','=','e.id_event')
                ->join ('kategoris as k','k.id_kategori','=','d.id_kategori')
                ->join('pemesanans as p','p.id_pemesanan','=','de.id_pemesanan')
                ->where('p.slug','=',$slug)
                ->get();

        return view('pages.user.pemesanan.index',['payments'=>$payments,'users'=>$users,'pemesanans'=>$pemesanans,'orders'=>$orders]);
    }

    public function deletePemesanan($slug){

        DB::beginTransaction();

        try {
            $pemesanans = DB::table('pemesanans')->where('slug',$slug)->first();

            $detil_pesan =  DB::table('detil_pemesanans')->where('id_pemesanan',$pemesanans->id_pemesanan)->get();



            foreach($detil_pesan as $detil){
             $event = DB::table('detil_events')->where('id_detilEvent',$detil->id_detilEvent)->first();

             DB::table('detil_events')->where('id_detilEvent',$detil->id_detilEvent)->update(['sisa_kuota'=>$event->sisa_kuota + $detil->quantity]);

            }

            DB::table('pemesanans')->where('slug', $slug)->delete();

            DB::commit();

             return response()->json(['status'=> 'success']);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

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
        // $validatedData['status_pemesanan'] = 1;
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

       $pesan = DB::table('pemesanans')->where('id_pemesanan',$pemesanan)->first();

       return redirect("/checkout/$pesan->slug");
    }

    public function checkout($slug, Request $request){

        $validatedDataUser = $request->validate([
            'name'=>'required',
            'no_ktp'=>'required',
            'no_telp'=>'required',

        ]);

        $inputData = [
            'status_pemesanan' => 1,
            'id_payments'=>$request->input('id_payments'),
        ];




        $users = DB::table('users')->where('id_user',auth()->user()->id_user);
      $updateU=  $users->update( $validatedDataUser);
        $pemesanan = DB::table("pemesanans")->where('slug',$slug);
       $updateP= $pemesanan->update($inputData);

       $pemesanan1 = DB::table("pemesanans")->where('slug',$slug)->first();
        $slug = Str::random(40);
       $inputDataPembayaran= [
        'id_user' => auth()->user()->id_user,
        'id_pemesanan' => $pemesanan1->id_pemesanan,
        'tgl_pembayaran'=>Carbon::now()->setTimezone('Asia/Jakarta'),
        'status_pembayaran'=>2,
        'slug'=>$slug,
       ];


       $pembayaran = DB::table('pembayarans');
       $pembayaran->insert($inputDataPembayaran);

       return redirect("/bayar/$slug");



   }

   //TUTUP USER



   // ADMIN

//    public function indexPemesanan(){
//         $pemesanans= DB::table('pemesanans')->get();

//         return view('pages.admin.table.pemesanan.index',['pemesanans'=>$pemesanans]);
//    }

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
