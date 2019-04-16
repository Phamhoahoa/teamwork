<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     
    protected $table = 'user';
    public function UserCourse(){
        return $this->belongsToMany('App\Course');
    }
    public function UserStatus(){
        return $this->hasMany('App\Status','id_user','id');
    }
    public function UserComment(){
        return $this->hasMany('App\Comment','id_user','id');
    }
}

