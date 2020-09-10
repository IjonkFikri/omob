<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['users_id', 'kelas_id'];
    // relation user dan level
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
        return $this->hasMany('App\Book');
    }
}
