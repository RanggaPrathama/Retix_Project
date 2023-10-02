<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            'id_lokasi'=>'1',
            'nama_event'=>'TES1',
            'gambar_event'=>'card1.jpg',
            'tgl_event'=>'2023-02-02',
            'deskripsi_event'=>'Tes lvamfnhf s fgf gsfvdsg ',
        ]);
    }
}
