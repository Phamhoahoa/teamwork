<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    public function CourseUser(){
        return $this->belongsToMany('App\User');
    }
}
