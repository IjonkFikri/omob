<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $fillable = ['users_id', 'kelas_id', 'books_id', 'start', 'end', 'total_baca', 'status'];
    // relation user kelas dan book 
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
    public function level()
    {
        return $this->belongsTo('App\Level', 'kelas_id');
    }
    public function book()
    {
        return $this->belongsTo('App\Book', 'books_id');
    }
    
}
