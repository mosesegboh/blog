<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource -- which is a post.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blog posts in it from the database
//from the below variable Post::all();,we changed all to the item below to paginate the page, we also added orderedBy function to get the most recent postscs
        $posts = Post::orderBy('id', 'desc') ->paginate(5);

        //return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body'  => 'required'
            ));

        //store in the database
        //eloquent is bascially working with databases without actually having to write code
        $post=new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request ->body;

        $post->save();
        Session::flash('success', 'The blog post was successfully saved!!');


        //redirect to another page
        return redirect()->route('posts.show', $post->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        //we want to find the post with the particular id we want to show in our database using the laravel method find()
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the dataebase and save it as a variable
        $post = Post::find($id);

        //return the view and pass the var we previously created
        return view('posts.edit')->withPost($post);
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
        //validate the data
        //the request parameter below contains all the data we need fron the database
        //we used an if statement below to validate if the slug has being changed before because it causes a bug
        $post = Post::find($id);

        if ($request->input('slug') == $post->slug ) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body'  => 'required'
           ));
        }else{
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body'  => 'required'
            ));
        }

        //save the data to the database
        //find the post you want to edit first
        $post = Post::find($id);
        //input will grab parameters from either the post or get request and it will get whatever it being referenced as
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        $post->save();


        //set flash data with success message
        Session::flash('success', 'This post was successfully saved' );

        //redirect with flash data to posts.show
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the item
        $post = Post::find($id);
        //call the delete function in out eloquent model
        $post->delete();
        //redirect
        Session::Flash('success','the post was successfully deleted');
        return redirect()->route('posts.index');
    }
}
