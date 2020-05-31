@extends ('main')

	@section('title', '-Delete Comments')

    @section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>DELETE THIS COMMENT?</h1>
            <p>
                <strong>Name: </strong>{{$comment->name}}<br>
                <strong>Email:</strong>{{$comment->email}}<br>
                <strong>Comment:</strong>{{$comment->comment}}<br>
            </p>
            {{-- we are also doing a form binding below which is basically getting our tag details and binding it to the form --}}
            {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}

               
            
                {!! Form::submit('YES DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger', 'style'=>'margin-top:20px;']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
 
