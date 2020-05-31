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
//as is what is used to name your route,the eidt we did below basically names our route for use and you can also view it in the route list
Route::get('auth/login', ['as' => 'login','uses' => 'Auth\AuthController@getLogin'] );
Route::post('auth/login', 'Auth\AuthController@postLogin' );
Route::get('auth/logout', ['as' => 'logout','uses' => 'Auth\AuthController@getLogout'] );

//registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister' );
Route::post('auth/register', 'Auth\AuthController@postRegister' );


//passwords reset routes
//the question mark below means that the token might not really exist
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
 //the controller method in this route is located in the address as shown below, but you need to access laravel/vendor folders to get to it

//categories
//the second parameter is where you can list out all the resources you dont need in routelist,you can use except and only in the array.words taken literally
Route::resource('categories','CategoryController',['except' => ['create']]);

//comments route, you can do manually like we did below or you canjust use the resource like we did above
Route::post('comments/{post_id}', ['uses' =>'CommentsController@store', 'as' =>'comments.store']);
Route::get('comments/{id}/edit',['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}/edit',['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}',['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete', 'as' => 'comments.delete']);

//Tags
//the second parameter is where you can list out all the resources you dont need in routelist,you can use except and only in the array.words taken literally
Route::resource('tags','TagController',['except' => ['create']]);

//for the contact page and contact form
Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact'); 

//the where at the end of the below routes means that no regular expressions shouldnbe allowed in the slugs so it should not accept anything outseide those characters 
Route::get('blog/{slug}', ['as' => 'blog.single','uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex'], ['as' => 'blog.index']);
Route::get('about', 'PagesController@getAbout' );

Route::get('/', 'PagesController@getIndex');
Route::get('/home', 'PagesController@getIndex');

//we use the  resource below to merge all our routes in one line and we use namespacing aswell for our posts
Route::resource('posts','PostController');