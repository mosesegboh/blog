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
Route::get('contact','PagesController@getContact');

Route::get('about', 'PagesController@getAbout' );

Route::get('/', 'PagesController@getIndex');