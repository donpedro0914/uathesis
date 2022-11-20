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
        'store_id', 'name', 'email', 'password', 'type', 'username', 'p2', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function store()
    {
        return $this->belongsTo('App\Store', 'store_id');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function brands()
    {
        return $this->hasOne('App\Brand', 'user_id');
    }

    public function attendances()
    {
        return $this->hasMany('App\Attendance', 'user_id');
    }
}
