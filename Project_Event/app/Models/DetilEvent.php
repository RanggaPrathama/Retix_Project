<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetilEvent extends Model
{
    use HasFactory;
    protected $table='detil_events';
    protected $primaryKey='id_detilEvent';
    protected $fillable = [
        'id_event',
        'id_kategori',
        'kuota_event',
        'harga_event',
    ];
}
