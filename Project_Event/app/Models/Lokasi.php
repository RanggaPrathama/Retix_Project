<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $table = 'lokasis';
    protected $primaryKey='id_lokasi';
    protected $fillable = [
        'id_lokasi',
        'id_kecamatan',
        'nama_lokasi',
    ];

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'id_kecamatan');
    }
}
