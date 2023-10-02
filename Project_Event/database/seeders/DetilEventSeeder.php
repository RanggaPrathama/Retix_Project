<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetilEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detil_events')->insert([
            'id_event'=>'1',
            'id_kategori'=>'2',
            'kuota_event'=>'90',
            'harga_event'=>'100000',
        ]);
    }
}
