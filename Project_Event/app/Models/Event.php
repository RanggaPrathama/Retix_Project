<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $primaryKey = 'id_event';
    protected $fillable = [
        'nama_lokasi',
        'nama_event',
        'deskripsi_event',
        'gambar_event',
        'tgl_event',
        'provinsi',
        'kota',
        'kecamatan',
        'slug',
        'id_kecamatan'

    ];


}
