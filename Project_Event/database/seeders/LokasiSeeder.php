<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lokasis')->insert([
            'id_kecamatan'=>'1',
            'nama_lokasi'=>'Jalan Kodam bla bla',

        ]);

        DB::table('lokasis')->insert([
            'id_kecamatan'=>'2',
            'nama_lokasi'=>'Jalan Gubeng bla bla',

        ]);
    }
}
