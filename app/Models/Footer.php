<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model {
    protected $fillable = [
        'address','phone','email','copyright',
        'fb_name','fb_url','tw_name','tw_url','ig_name','ig_url','is_active',
        'biaya_judul','biaya_items',
    ];
    protected $casts = [
        'is_active'    => 'boolean',
        'biaya_items'  => 'array',
    ];

    public static function getActive(): ?self {
        return self::where('is_active', true)->latest()->first();
    }
}