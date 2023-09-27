<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table='kecamatans';
    protected $primaryKey='id_kecamatan';
    protected $fillable=[
        'id_kecamatan',
        'nama_kecamatan'
    ];

    public function lokasi(){
        return $this->hasMany(Lokasi::class,'id_lokasi');
    }
}
