<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'users_id',
        'penulis',
        'penerbit',
        'tempat_terbit',
        'judul_buku',
        'jumlah_halaman',
    ];
}
