<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeRumah extends Model
{
    protected $fillable = [
        'nama_tipe_rumah',
        'luas_bangunan',
        'harga',
        'cicilan',
        'kamar_tidur',
        'kamar_mandi',
        'garasi',
        'gambar',
        'tekstombol',
    ];
    //
}
