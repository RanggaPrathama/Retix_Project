<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\verifytoken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function homeAdmin()
    {
        return view('pages.admin.home');
    }
    public function index()
    {
        return view('pages.user.home');
    }

    public function homepage(Request $request)
    {


        $events = DB::table('detil_events as d')
            ->select(
                DB::raw('MIN(d.harga_event) AS min_harga'),
                'e.id_event',
                'e.status',
                'e.slug',
                'e.nama_event',
                'e.gambar_event',
                DB::raw('DATE_FORMAT(e.tgl_event, "%e %b %y") AS Tanggal_Event'),
                DB::raw('CONCAT(e.nama_lokasi," | ",e.provinsi," | ",e.kota," | ", e.kecamatan) AS "nama_lokasi"')
            )
            ->join('events as e', 'e.id_event', '=', 'd.id_event')
            ->groupBy('e.id_event', 'e.nama_event', 'e.gambar_event', 'e.tgl_event', 'e.nama_lokasi','e.provinsi','e.kota','e.kecamatan','e.status','e.slug')
            ->where(
                function ($query) {
                    $query->where('e.status', '=', 1)
                        ->orWhere('e.status', '=', 2);
                }
            )
            ->paginate(6);

        if ($request->ajax()) {

            return response()->json(['html' => view('pages.user.data', compact('events'))->render()]);
        }


        return view('pages.user.home', ['events' => $events]);
    }

    public function event($slug){
        $events = DB::table('detil_events as d')
                ->select(
                    'd.id_detilEvent',
                    'e.id_event',
                    'e.nama_event',
                    'e.slug',
                    'e.maps',
                    'e.status',
                    DB::raw('CONCAT(e.nama_lokasi," | ",e.provinsi," | ",e.kota," | ", e.kecamatan) AS "nama_lokasi"'),
                    'e.gambar_event',
                    'e.deskripsi_event',
                    DB::raw('DATE_FORMAT(e.tgl_event,"%d %M %Y") AS tgl_event'),
                    DB::raw('TIME_FORMAT(e.tgl_event,"%H:%i") AS time_event'),
                    'k.id_kategori',
                    'k.nama_kategori'
                )
                    ->join('events as e','e.id_event','=','d.id_event')
                    ->join('kategoris as k','k.id_kategori','=','d.id_kategori')
                    ->where('e.slug','=',$slug)
                    ->first();

        $kategoris = DB::table('detil_events as d')
                    ->select('d.id_detilEvent','k.id_kategori','k.nama_kategori','d.harga_event','d.kuota_event','d.sisa_kuota')
                    ->join('kategoris as k','k.id_kategori','=','d.id_kategori')
                    ->join('events as e','e.id_event','=','d.id_event')
                    ->where('e.slug','=',$slug)
                    ->get();
                    return view('pages.user.event.index',['events'=>$events,'kategoris'=>$kategoris]);
    }







}
