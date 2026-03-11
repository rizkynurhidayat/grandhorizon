<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HubungiKami extends Model
{
    protected $fillable = [
        'user',
        'no_hp',
        'email',
        'tanggal',
        'pesan',
        'teks_tombol',
        'link_tombol',
        'is_read',
    ];
}