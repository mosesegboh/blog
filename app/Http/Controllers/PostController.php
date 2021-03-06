<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
//we will be needing access to this model
use App\Tag;
use App\Category;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    //to lock down our post controller functions
    public function  __construct(){
        //the auth middleware uses only authenticated users then if there are other methods you want to exclude, you will use the except array and call the function
        $this->middleware('auth');
    }
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

        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //we can also do dd($request) in laravel as well to get whatis in the request aswell
        //validate the data
        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id' => 'required|integer',
                'body'  => 'required',
                //sometimes basically means validate if something is in it
                'featured_image' => 'sometimes|image'
            ));

        //store in the database
        //eloquent is bascially working with databases without actually having to write code
        $post=new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request ->body);

        //save our image since the feild is optional we use an if statement
        //also the functions below are running with the image intervention library..it does not run with laravel ...read documentation for laravel method
        if($request->hasFile('featured_image')){
            $image= $request->file('featured_image');
            $filename= time() . '.' . $image->getClientOriginalExtension();
            //if you are storing in the storage path use the storage location as well below
            $location = public_path('images/' . $filename);
            //use image intervention to resize
            Image::make($image)->resize(800,400)->save($location);

            $post->image= $filename;

        }

        $post->save();
        //we want to associate post to our tag to laravel below
        //the second parameter is false because we only want to add them to our associations not overide them

        $post->tags()->sync($request->tags, false);
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
        $categories = Category::all();
        //we brought the looping of the catgory in the the controller becasue it is a good prcatice
        $cats = [];
        foreach($categories as $category)
{
        $cats[$category->id] = $category->name;
}

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tag2[$tag->id] = $tag->name;
        }
        //return the view and pass the var we previously created
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tag2);
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
        //we used an if statement below to validate if the slug has being changed before because it causes a bug but we later removed it
        $post = Post::find($id);
            //we removed the if statement for uniqueness below and added $id for the unique slug
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'body'  => 'required',
                'featured_image' => 'image'
            ));

        //save the data to the database
        //find the post you want to edit first
        $post = Post::find($id);
        //input will grab parameters from either the post or get request and it will get whatever it being referenced as
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id =$request->input('category_id');
        $post->body = $request->input('body');

        //below to check if someone added a photo,if not it will ignore it
        if ($request->hasFile('featured_image')) {
            //add new photo
            $image= $request->file('featured_image');
            $filename= time() . '.' . $image->getClientOriginalExtension();
            //if you are storing in the storage path use the storage location as well below
            $location = public_path('images/' . $filename);
            //use image intervention to resize
            Image::make($image)->resize(800,400)->save($location);
            $oldFilename = $post->image;
            //update database
            $post->image= $filename;
            //delete old photo
            //make sure you change where the storage faces ssaves the file in the conig/filesystem to correspond with whatever you are using to save
            Storage::delete($oldFilename);
        }

        $post->save();

        //we will sync our post/tag  association here aswell as we did before when we were saving it,the second parameter will be true here because we want to overide them the default is true
        //inorder to prevent an error we need to check if the request isset first
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        }else{
            //pass in an empty array with no associations to prevent the error
            $post->tags()->sync(array());
        }
        


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
        //this is for detaching the tags and relationships the post is linked to
        $post->tags()->detach();
        Storage::delete($post->image);
        //call the delete function in out eloquent model
        $post->delete();
        //redirect
        Session::Flash('success','the post was successfully deleted');
        return redirect()->route('posts.index');
    }
}
