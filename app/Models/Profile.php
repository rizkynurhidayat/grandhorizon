<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'logo',
        'deskripsi',
        'link_whatsapp',
        'no_hp',
        'email',
        'twitter',
        'facebook',
        'instagram',
        'link_map',
    ];
    //
}
