<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        //there are additional parameters you can place in the below function like name of table and name of intermediary table, but we will leave it as it is since we are following the convention
       //when naming the table laravel expects the table name to have a name as stated below
        return $this->belongsToMany('App\Post');
    }
}
