<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //we are basically pointint to the categories table here to complete the relationship
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

}
