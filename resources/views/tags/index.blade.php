@extends('main')

@section('title', '-tags')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag )
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td>{{$tag->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- </div>end of column md 8 --}}
        <div class="col-md-3">
            <div class="well">
            {!! Form::open(array('route' => 'tags.store', 'method' => 'POST')) !!}
                <h2>New Tag</h2>
                {!! Form::label('name', 'Name:') !!} 
                {!! Form::text('name', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255')) !!}

                {!! Form::submit('Create Tag', array('class'=>'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;' )) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection