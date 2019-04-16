<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    public function StatusUser(){
        return $this->belongsTo('App\User','id_user','id');
    }
    public function StatusComment(){
        return $this->hasMany('App\Comment','id_status','id');
    }
    public function StatusCategory(){
        return $this->belongsTo('App\Category','id_category','id');
    }
}
