<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasPerumahan extends Model
{
    protected $table = 'fasilitas_perumahans'; // Menegaskan nama tabelnya
    protected $fillable = ['nama_fasilitas', 'gambar'];
}