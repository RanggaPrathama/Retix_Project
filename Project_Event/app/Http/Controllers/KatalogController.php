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
                'e.status',
                'e.slug',
                DB::raw('DATE_FORMAT(e.tgl_event, "%e %b %y") AS Tanggal_Event'),
                DB::raw('CONCAT(e.nama_lokasi," | ",e.provinsi," | ",e.kota," | ", e.kecamatan) AS "nama_lokasi"')
                )
            ->join('events as e', 'e.id_event', '=', 'd.id_event')
            ->groupBy('e.id_event', 'e.nama_event', 'e.gambar_event', 'e.tgl_event', 'e.nama_lokasi','e.provinsi','e.kota','e.kecamatan','e.status','e.slug')
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
                'e.status',
                'e.slug',
                DB::raw('DATE_FORMAT(e.tgl_event, "%e %b %y") AS Tanggal_Event'),
                DB::raw('CONCAT(events.nama_lokasi," | ",events.provinsi," | ",events.kota," | ", events.kecamatan) AS "nama_lokasi"'))
            ->join('events as e', 'e.id_event', '=', 'd.id_event')
            ->groupBy('e.id_event', 'e.nama_event', 'e.gambar_event', 'e.tgl_event', 'e.nama_lokasi','e.provinsi','e.kota','e.kecamatan','e.status','e.slug')
            ->get();
        }


        return view('pages.user.katalog.index',
    ['title' => 'Katalog',
    'events'=>$events]);
    }
}
