@extends ('main')

	@section('title', '-Edit Comments')

    @section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Comment</h1>
            {{-- we are also doing a form binding below which is basically getting our tag details and binding it to the form --}}
            {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => "PUT"]) !!}

                {!! Form::label('name', 'Name:', ["class"=>'form-spacing-top']) !!}
                {!! Form::text('name', null, ["class" => 'form-control', 'disabled'=>'disabled']) !!}

                {!! Form::label('email', 'Email:', ["class"=>'form-spacing-top']) !!}
                {!! Form::text('email', null, ["class" => 'form-control', 'disabled'=>'disabled']) !!}

                {!! Form::label('comment', 'Comment:', ["class"=>'form-spacing-top']) !!}
                {!! Form::textarea('comment', null, ["class" => 'form-control']) !!}
            
                {!! Form::submit('Save Changes', ['class' => 'btn btn-success', 'style'=>'margin-top:20px;']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
 
