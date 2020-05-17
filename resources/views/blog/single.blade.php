@extends('main')
<!--  you can use this instead of the tag below to prevent cross site scripting and put the tag inside the tag section below because we escaped the characters<?php $titleTag = htmlspecialchars($post->title); ?> -->
<!-- you can put variables inside of double quotation marks and it will extract it (interpolate) but you cant do same with single quotation marks,thats the only difference between them  -->
@section('title',"- $post->title")

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
        <p>Posted In:{{$post->category->name}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{-- loop through the comments --}}
            @foreach ($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="" class="author-image">
                        <div class="author-name">
                            <h4>{{$comment->name}}</h4>
                            <p class="author-time">{{$comment->created_at}}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{$comment->comment}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
            {!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) !!}
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('name', 'Name:') !!} 
                    {!! Form::text('name', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255')) !!}
                </div>

                <div class="col-md-6">
                    {!! Form::label('email', 'Email:') !!} 
                    {!! Form::text('email', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255')) !!}
                </div>

                <div class="col-md-12">
                    {!!  Form::label('comment', "Comment:")   !!}
                    {!!   Form::textarea('comment', null, array('class'=>'form-control', 'rows'=>'5', 'required'=>'')) !!}

                    {!! Form::submit('Add Comment', array('class'=>'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;' )) !!}
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
@endsection