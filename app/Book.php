<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['users_id', 'kelas_id', 'judul_buku', 'jumlah_halaman','penulis','penerbit','tempat_terbit','status'];
    // relation user
    public function user()
    {
        return  $this->belongsTo('App\User', 'users_id');
    }

    // relation kelas
    public function level()
    {
        return $this->belongsTo('App\Level', 'kelas_id');
    }
    // relation student 
    public function student()
    {
        return $this->belongsTo('App\Student', 'students_id');
    }
    // relation reading 
    public function reading()
    {
        return $this->hasMany('App\Reading');
    }

    //  relation review 
    public function review(){
        return $this->hasOne(Review::class);
    }
}
