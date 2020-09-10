<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nis', 'role', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // relation Student
    public function student()
    {
        return $this->hasMany('App\Student');
    }
    // relation guru
    public function teacher()
    {
        return $this->hasMany('App\Teacher');
    }
    // relation book
    public function book()
    {
        return $this->hasMany('App\Book');
    }

    //relation reading
    public function reading()
    {
        return $this->hasMany('App\Reading');
    }
    //relation recap
    public function recap()
    {
        return $this->hasMany('App\Recap');
    }
}
