@extends('main')

@section('title', '-categories')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{$category->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- </div>end of column md 8 --}}
        <div class="col-md-3">
            <div class="well">
            {!! Form::open(array('route' => 'categories.store')) !!}
                <h2>New Category</h2>
                {!! Form::label('name', 'Name:') !!} 
                {!! Form::text('name', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255')) !!}

                {!! Form::submit('Create Category', array('class'=>'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;' )) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection