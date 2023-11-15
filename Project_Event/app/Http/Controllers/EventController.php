<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = DB::table('events')
        ->select('id_event','nama_lokasi','nama_event',DB::raw("DATE_FORMAT(tgl_event, '%d %M %y') as tgl_event"),'gambar_event','status','deskripsi_event','slug')
        ->get();
        return view('pages.admin.table.Event.index',['events'=>$events]);

    }

    public function provinsi(){
        $data = DB::table('provinsis')
                    ->select('*')
                    ->where('nama_provinsi','LIKE','%'.request('q').'%')
                    ->paginate(35);
        return response()->json($data);
    }


    public function kota($id){
        $data = DB::table('kotas')
                ->select('*')
                ->where('id_provinsi',$id)
                ->where('nama_kota','LIKE','%'.request('q').'%')

                ->paginate(100);
        return response()->json($data);
    }

    public function kecamatan($id)
{
    $data = DB::table('kecamatans')
                ->select('*')
                ->where('id_kota',$id)
                ->where('nama_kecamatan','LIKE','%'.request('q').'%')
                ->paginate(100);

    return response()->json($data);
}    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = [
             0 => 'Non Aktif',
             1 => 'Aktif',
             2 => 'Coming Soon',
        ];
        return view('pages.admin.table.Event.create',['status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateddata=$request->validate([
            'nama_lokasi'=>'required',
            'nama_event'=>'required',
            'tgl_event'=>'required',
            'gambar_event'=>'required|mimes:png,jpg,jpeg',
            'deskripsi_event'=>'required',
            'provinsi'=>'required',
            'kota'=>'required',
            'kecamatan'=>'required',
            'status' => 'required',


        ],
        ['nama_event.required'=>'Silahkan Mengisi ',
        'gambar_event.mimes'=>'Hanya bisa diisi dengan Png,Jpg,Jpeg']
    );


        $validateddata['slug'] = Str::random(100);
        $provinsi = DB::table('provinsis')->select('*')->where('id_provinsi',$request->provinsi)->first();
        $kota = DB::table('kotas')->select('*')->where('id_kota',$request->kota)->first();
        $kecamatan = DB::table('kecamatans')->select('*')->where('id_kecamatan',$request->kecamatan)->first();
        $validateddata['id_kecamatan']=$kecamatan->id_kecamatan;
        $validateddata['provinsi'] =$provinsi->nama_provinsi;
        $validateddata['kota']=$kota->nama_kota;
        $validateddata['kecamatan']=$kecamatan->nama_kecamatan;
        $namalokasi = $request->input('nama_lokasi'). ' ' . ' | '. ' ' . $provinsi->nama_provinsi. ' ' . ' | '. ' ' . $kota->nama_kota;
        $validateddata['nama_lokasi']=$namalokasi;

        if($request->hasFile('gambar_event')){
           $gambar = $request->file('gambar_event')->getClientOriginalName();
            $request->file('gambar_event')->move(public_path('gambarEvent'),$gambar);
            $validateddata['gambar_event']=$gambar;

        }

        $create = db::table('events')->insert($validateddata);

       if($create){

        return redirect()->route('event.index')->with('success','Berhasil !');
       }
       else{
        return redirect()->back()->with('error','Event Tidak ditemukan');
       }

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $events = DB::table('events')
                    ->select('*')
                    ->where('slug',$slug)
                    ->first();

                    $status = [
                        0 => 'Non Aktif',
                        1 => 'Aktif',
                        2 => 'Coming Soon',
                   ];
                // ->where('lokasis,id_lokasi',$id)
        return view('pages.admin.table.Event.update',['events'=>$events,'status'=>$status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$slug)
    {
        $validateddata = $request->validate([
            'nama_lokasi'=>'required',
            'nama_event'=>'required',
            'tgl_event'=>'required',
            'gambar_event'=>'required|mimes:png,jpg,jpeg',
            'deskripsi_event'=>'required',
            'provinsi'=>'required',
            'kota'=>'required',
            'kecamatan'=>'required',
        ],
    [
        'gambar_event.mimes'=>'Hanya bisa diisi dengan Png,Jpg,Jpeg',
    ]);

        $events= Event::where('slug',$slug);

        $provinsi = DB::table('provinsis')->select('*')->where('id_provinsi',$request->provinsi)->first();
        $kota = DB::table('kotas')->select('*')->where('id_kota',$request->kota)->first();
        $kecamatan = DB::table('kecamatans')->select('*')->where('id_kecamatan',$request->kecamatan)->first();
        $validateddata['id_kecamatan']=$kecamatan->id_kecamatan;
        $validateddata['provinsi'] =$provinsi->nama_provinsi;
        $validateddata['kota']=$kota->nama_kota;
        $validateddata['kecamatan']=$kecamatan->nama_kecamatan;
        $namalokasi = $request->input('nama_lokasi').''. '/'.''. $provinsi->nama_provinsi.''.'/'.''. $kota->nama_kota;
        $validateddata['nama_lokasi']=$namalokasi;

        if($request->has('gambar_event')){
            $gambar = $request->file('gambar_event')->getClientOriginalName();
            $request->file('gambar_event')->move(public_path('gambarEvent'),$gambar);
            $validateddata['gambar_event']=$gambar;
            $dataFoto = Event::where('slug',$slug)->first();
            File::delete(public_path('gambarEvent').'/'.$dataFoto->gambar_event);
        }


        $update = $events->update($validateddata);

        if($update){
            return redirect()->route('event.index')->with('success','Berhasil !');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $datafoto = Event::where('slug',$slug)->first();
        File::delete(public_path('gambarEvent'),$datafoto->gambar_event);
        $event = Event::where('slug',$slug);
        $event->delete();
        return redirect()->route('event.index')->with('success','Berhasil !');

    }

    public function event(){
        return view('pages.user.event.index');
    }
}
