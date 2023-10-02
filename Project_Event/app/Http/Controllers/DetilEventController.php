<?php

namespace App\Http\Controllers;

use App\Models\DetilEvent;
use App\Http\Requests\StoreDetilEventRequest;
use App\Http\Requests\UpdateDetilEventRequest;
use Illuminate\Support\Facades\DB;
class DetilEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detilEvents = DB::table('detil_events')
            ->select('*')
            ->get();
            return view('pages.admin.table.detilEvent.index',['detilEvents'=>$detilEvents]);
    }

    /**
     *
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detilEvents = DB::table('detil_events')
                        ->select('events.id_event','events.nama_event','kategoris.id_kategori','kategoris.nama_kategori')
                        ->join('events','detil_event.id_event','=','events.id_event')
                        ->join('kategoris','detil_event.id_kategori','=','kategoris.id_kategori')
                        ->get();

        return view('pages.admin.table.detilEvent.create',['detilEvents'=>$detilEvents]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetilEventRequest $request)
    {
        //
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
    public function edit(DetilEvent $detilEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetilEventRequest $request, DetilEvent $detilEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetilEvent $detilEvent)
    {
        //
    }
}
