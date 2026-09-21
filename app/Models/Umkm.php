<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'nama_umkm',
        'nama_pemilik',
        'slug',
        'foto',
        'deskripsi',
        'whatsapp',
        'instagram',
        'facebook',
        'tiktok',
        'produk_unggulan',
        'alamat',
        'maps',
    ];
}