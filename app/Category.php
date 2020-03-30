<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //if you name your table something different from the laravel convention, you need to tell laravel what is done 
    protected $table = 'categories';

     //to set a one hasmany function which tells laravel that the categories table has many posts in it we write the code below
    //the below function has basically linked the id column of the categorie table to the posts table
    //has many basically means one category can have many post but onetoone is vice versa
    //if you do not follow the laravel convertion you might need to add the collumn name that the  id is in here but we did so thats not necessary
    //we will also need to go to the post model and do thesame thing there
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
