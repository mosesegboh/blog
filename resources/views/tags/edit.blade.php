@extends ('main')

	@section('title', '-Edit Tag')

    @section('content')
    
		{{-- we are also doing a form binding below which is basically getting our tag details and binding it to the form --}}
		{!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => "PUT"]) !!}

            {!! Form::label('name', 'Title:', ["class"=>'form-spacing-top']) !!}
            {!! Form::text('name', null, ["class" => 'form-control']) !!}
 		
			{!! Form::submit('Save Changes', ['class' => 'btn btn-success', 'style'=>'margin-top:20px;']) !!}
 		{!! Form::close() !!}
@stop
 
