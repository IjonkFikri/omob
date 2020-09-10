<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    // relation to level 
    public function level()
    {
        return $this->hasMany('App\Level');
    }
    //relation recap
    public function recap()
    {
        return $this->hasMany('App\Recap');
    }
}
