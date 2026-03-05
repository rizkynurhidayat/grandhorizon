<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $fillable = [
        'judul',
        'subjudul',
        'gambar',
        'deskripsi',
        'logo',
        'tekstombol',
         'judul_unggulan_1', 'desc_unggulan_1', 'logo_unggulan_1',
         'judul_unggulan_2', 'desc_unggulan_2', 'logo_unggulan_2',
         'judul_unggulan_3', 'desc_unggulan_3', 'logo_unggulan_3',
         'judul_unggulan_4', 'desc_unggulan_4', 'logo_unggulan_4',

    ];
    //
}
