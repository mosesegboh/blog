<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //set up relationship-commente belong to one post and one post belong to many comments
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
