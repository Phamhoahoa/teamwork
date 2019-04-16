<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public function CategoryStatus(){
        return $this->hasMany('App\Status','id_category','id');
    }
    public function CategoryComment(){
        return $this->hasManyThrough('App\Comment','App\Post','id_post','id' );
    }
}
