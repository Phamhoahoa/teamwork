<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    public function CommentStatus(){
        return $this->belongsTo('App\Status','id_status','id');
    }
    public function CommentUser(){
        return $this->belongsTo('App\User','id_user', 'id');
    }
}
