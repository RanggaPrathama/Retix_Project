<?php

namespace App\Http\Controllers;

use App\Models\DetilEvent;
use App\Http\Requests\StoreDetilEventRequest;
use App\Http\Requests\UpdateDetilEventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DetilEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detilEvents = DB::table('detil_events')
            ->select('id_detilEvent','events.id_event','events.nama_event','kategoris.id_kategori','kategoris.nama_kategori','kuota_event','harga_event', 'detil_events.status')
            ->join('events','detil_events.id_event','=','events.id_event')
            ->join('kategoris','detil_events.id_kategori','=','kategoris.id_kategori')
            ->get();
            return view('pages.admin.table.detilEvent.index',['detilEvents'=>$detilEvents]);
    }

    /**
     *
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $events = DB::table('events')
                    ->select('*')
                    ->get();
        $kategoris = DB::table('kategoris')
                    ->select('*')
                    ->get();

        return view('pages.admin.table.detilEvent.create',['events'=>$events,'kategoris'=>$kategoris]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateddata = $request->validate([
            'id_event'=>'required|exists:events,id_event',
            'id_kategori'=>'required|exists:kategoris,id_kategori',
            'kuota_event'=>'required|numeric',
            'harga_event'=>'required|numeric',

        ]);

        $validateddata['slug'] = Str::random(40);
        $validateddata['sisa_kuota']= $validateddata['kuota_event'];



       $create = DB::table('detil_events')->insert($validateddata);
       if($create){
        return redirect()->route('detilevent.index')->with('success','Behasil !');
       }
       else{
        return redirect()->back()->with('error');
       }

    }

    /**
     * Display the specified resource.
     */
    public function show(DetilEvent $detilEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $detilEvents=DB::table('detil_events')
                    ->select('id_detilEvent','id_event','id_kategori','harga_event','kuota_event')
                    ->where('slug',$slug)
                    ->first();

        $kategoris = DB::table('kategoris')
                    ->select('id_kategori','nama_kategori')
                    ->get();
         $events  = DB::table('events')
                    ->select('id_event','nama_event')
                    ->get();
        return view('pages.admin.table.detilEvent.update',['detilEvents'=>$detilEvents,'kategoris'=>$kategoris,'events'=>$events]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validateddata = $request->validate(
            [
                'id_event'=>'required|exists:events,id_event',
                'id_kategori'=>'required|exists:kategoris,id_kategori',
                'kuota_event'=>'required|numeric',
                'harga_event'=>'required|numeric',
            ]
            );

        $detilEvent = DB::table('detil_events')->where('slug',$slug);
        $validateddata['sisa_kuota']=$validateddata['kuota_event'];
        $update = $detilEvent->update($validateddata);
        if($update){
            return redirect()->route('detilevent.index')->with('success','Berhasil !');
        }
        else{
            return redirect()->back()->with('error');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $detilEvent=DB::table('detil_events')->where('slug',$slug);
        $detilEvent->delete();
        return redirect()->route('detilevent.index')->with('success','berhasil !');
    }
}
