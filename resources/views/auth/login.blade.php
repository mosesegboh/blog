@extends('main')
  @section('title', '- Login')


  @section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}
                {!! Form::label('email', 'Email:') !!}
                {!!Form::email('email', null, ['class' => 'form-control'])!!}
                
                {!!Form::label('password', 'Password:')!!}
                {!!Form::password('password', ['class' => 'form-control'])!!}
                <br>
                {!! Form::checkbox('remember') !!}{!!Form::label('remember', 'Remember Me:')!!}
            
                {!!Form::submit('Login', ['class' => 'btn btn-primary btn-block'])!!}
            {{-- the url takes you to the particular url but routes takes you to whats definde in the routes --}}
        <p><a href="{{url('password/email')}}">Forgot My Password</a></p>

                {!! Form::close() !!}
        </div>
    </div>

  @endsection