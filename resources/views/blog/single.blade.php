@extends('main')

<!-- you can put variables inside of double quotation marks and it will extract it (interpolate) but you cant do same with single quotation marks,thats the only difference between them  -->
@section('title',"- $post->title")

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
        </div>
    </div>

@endsection