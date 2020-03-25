<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//because we have a second controller using post we need to use the post recource here
use App\Post;

class BlogController extends Controller
{
    public function getIndex(){
        $posts = Post::paginate(10);

        return view('blog.index')->withPosts($posts); 
    }

    //this function should correspond to what you named your nethod in the routes
    public function getSingle($slug){
        //lets just use the below line to test if our slug is working
        //return $slug; 
        
        //fetch from the database based on slug
        //action is thesame thing as method in laravel
        //we used an example of a query builder below
        // the first option below says stop at the first item you find in the database instead of using get becasue get a nested array of all similar items but since we made the slug unique,we can use first
        $post = Post::where('slug', '=', $slug )->first();

        //return the view and pass  in to the view
        return view('blog.single')->withPost($post); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

  
}
