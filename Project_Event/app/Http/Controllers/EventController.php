<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = DB::table('events')
        ->select('id_event','lokasis.id_lokasi','lokasis.nama_lokasi','nama_event',DB::raw("DATE_FORMAT(tgl_event, '%d %M %y') as tgl_event"),'gambar_event','deskripsi_event')
        ->join('lokasis','events.id_lokasi','=','lokasis.id_lokasi')
        ->get();
        return view('pages.admin.table.Event.index',['events'=>$events]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lokasis = DB::table('lokasis')
                ->select('*')
                ->get();
        return view('pages.admin.table.Event.create',['lokasis'=>$lokasis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateddata=$request->validate([
            'id_lokasi'=>'required|exists:lokasis',
            'nama_event'=>'required',
            'tgl_event'=>'required',
            'gambar_event'=>'required|mimes:png,jpg,jpeg',
            'deskripsi_event'=>'required',
        ],
        ['nama_event.required'=>'Silahkan Mengisi ',
        'gambar_event.mimes'=>'Hanya bisa diisi dengan Png,Jpg,Jpeg']
    );
        if($request->hasFile('gambar_event')){
           $gambar = $request->file('gambar_event')->getClientOriginalName();
            $request->file('gambar_event')->move(public_path('gambarEvent'),$gambar);
            $validateddata['gambar_event']=$gambar;
        }

        $create = Event::create($validateddata);
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
    public function edit($id)
    {
        $events = DB::table('events')
                ->select('id_event','lokasis.id_lokasi','lokasis.nama_lokasi','events.nama_event','gambar_event','tgl_event','deskripsi_event')
                ->join('lokasis','lokasis.id_lokasi','=','events.id_lokasi')
                ->where('id_event',$id)
                // ->where('lokasis,id_lokasi',$id)
                ->first();
       $lokasis = DB::table('lokasis')
       ->select('lokasis.id_lokasi','lokasis.nama_lokasi')
       ->get();
        return view('pages.admin.table.Event.update',['events'=>$events,'lokasis'=>$lokasis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validateddata = $request->validate([
            'id_lokasi'=>'nullable|exists:lokasis|numeric',
            'nama_event'=>'required',
            'gambar_event'=>'required|mimes:png,jpg,jpeg',
            'tgl_event'=>'required',
            'deskripsi_event'=>'required',
        ],
    [
        'gambar_event.mimes'=>'Hanya bisa diisi dengan Png,Jpg,Jpeg',
    ]);

        $events= Event::findOrfail($id);
        if($request->has('gambar_event')){
            $gambar = $request->file('gambar_event')->getClientOriginalName();
            $request->file('gambar_event')->move(public_path('gambarEvent'),$gambar);
            $validateddata['gambar_event']=$gambar;
            $dataFoto = Event::where('id_event',$id)->first();
            File::delete(public_path('gambarEvent').'/'.$dataFoto->gambar_event);
        }
        DB::table('events')
        ->select('id_lokasis')
        ->where('id_event',$events->id_event)
        ->update(['id_lokasi'=>$request->input('id_lokasi')]);
        $update = $events->update($validateddata);

        if($update){
            return redirect()->route('event.index')->with('success','Berhasil !');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datafoto = Event::where('id_event',$id)->first();
        File::delete(public_path('gambarEvent'),$datafoto->gambar_event);
        $event = Event::findOrfail($id);
        $event->delete();
        return redirect()->route('event.index')->with('success','Berhasil !');

    }
}
