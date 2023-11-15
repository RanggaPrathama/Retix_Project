<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatalogController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $events = DB::table('detil_events as d')
            ->select(
                DB::raw('MIN(d.harga_event) AS min_harga'),
                'e.id_event',
                'e.nama_event',
                'e.gambar_event',
                DB::raw('DATE_FORMAT(e.tgl_event, "%e %b %y") AS Tanggal_Event'),
                'e.nama_lokasi')
            ->join('events as e', 'e.id_event', '=', 'd.id_event')
            ->groupBy('e.id_event', 'e.nama_event', 'e.gambar_event', 'e.tgl_event', 'e.nama_lokasi')
            ->where('e.nama_event','LIKE','%'.request('search').'%')
            ->get()
            ;

        }
        else{
            $events = DB::table('detil_events as d')
            ->select(
                DB::raw('MIN(d.harga_event) AS min_harga'),
                'e.id_event',
                'e.nama_event',
                'e.gambar_event',
                DB::raw('DATE_FORMAT(e.tgl_event, "%e %b %y") AS Tanggal_Event'),
                'e.nama_lokasi')
            ->join('events as e', 'e.id_event', '=', 'd.id_event')
            ->groupBy('e.id_event', 'e.nama_event', 'e.gambar_event', 'e.tgl_event', 'e.nama_lokasi')
            ->paginate(6);
        }


        return view('pages.user.katalog.index',
    ['title' => 'Katalog',
    'events'=>$events]);
    }
}
