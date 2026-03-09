<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasPerumahan extends Model
{
    protected $table = 'fasilitas_perumahans';

    protected $fillable = ['nama_fasilitas', 'gambar'];
}
