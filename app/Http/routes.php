<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//the base url and about
//the @ sign tells it what part in the pages controller to go to which is pbviously the function we do same for post aswell
//this particular version does not have a routes middleware but hte tutorial does

//authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin' );
Route::post('auth/login', 'Auth\AuthController@postLogin' );
Route::get('auth/logout', 'Auth\AuthController@getLogout' );

//registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister' );
Route::post('auth/register', 'Auth\AuthController@postRegister' );


Route::get('contact','PagesController@getContact');
//the where at the end of the below routes means that no regular expressions shouldnbe allowed in the slugs so it should not accept anything outseide those characters 
Route::get('blog/{slug}', ['as' => 'blog.single','uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex'], ['as' => 'blog.index']);
Route::get('about', 'PagesController@getAbout' );

Route::get('/', 'PagesController@getIndex');

//we use the  resource below to merge all our routes in one line and we use namespacing aswell for our posts
Route::resource('posts','PostController');