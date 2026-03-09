<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    // Pakai guarded kosong supaya semua data (user, rating, pesan, profile) bisa masuk
    protected $guarded = [];
    protected $fillable = [
        'rating',
        'pesan',
        'user',
        'profile',
         

    ];
}