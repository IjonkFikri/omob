<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['users_id', 'kelas_id'];

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
}
