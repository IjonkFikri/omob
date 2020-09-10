<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['units_id', 'nama_kelas'];
    // relation unit 
    public function unit()
    {
        return  $this->belongsTo('App\Unit', 'units_id');
    }
    // relation student
    public function student()
    {
        return $this->hasMany('App\Student');
    }
    //relation teacher
    public function teacher()
    {
        return $this->hasMany('App\Teacher');
    }
    //relation book
    public function book()
    {
        return $this->hasMany('App\Book');
    }

    // relation reading
    public function reading()
    {
        return $this->hasMany('App\Reading');
    }
}
