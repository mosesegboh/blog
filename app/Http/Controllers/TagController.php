<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//because the tag model is outside the controllers folder which is where the tagcontroller is,we have to namespce it below to use all() funtions of the tag model
use App\Tag;
use Session;

class TagController extends Controller
{

      //to lock down our post controller functions
      public function  __construct(){
        //the auth middleware uses only authenticated users then if there are other methods you want to exclude, you will use the except array and call the function
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //grab all tags from the database
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
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
        //we wont use the create function because we already have a form to submit all we need is the store method
        $this->validate($request,array('name'=>'required|max:255'));
        //new will create an empty instance of that tag, then we start adding stuff to it
        $tag = new Tag;
        $tag->name=$request->name;
        $tag->save();

        Session::flash('success', 'New Tag was successfully created!');
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get the particular id from the database
        $tag = Tag::find($id);
        return view('tags.show')->withTag($tag);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get the tag data from the database...same old process
        $tag = Tag::find($id);
        return view ('tags.edit')->withTag($tag);
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
        //find the tag
        $tag = Tag::find($id);
        $this->validate($request, ['name' => 'required|max:255']);
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', ' Tag was successfully Saved!');
        return redirect()->route('tags.show',$tag->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find tag
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();

        Session::flash('success', ' Tag was successfully deleted!');
        return redirect()->route('tags.index');
    }
}
