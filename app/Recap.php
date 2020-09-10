<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recap extends Model
{
    protected $fillable = ['users_id', 'units_id'];
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
    public function unit()
    {
        return $this->belongsTo('App\Unit', 'units_id');
    }
}
