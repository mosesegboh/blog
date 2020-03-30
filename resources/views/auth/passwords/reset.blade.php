@extends('main')
  @section('title', '- Forgot Password')


  @section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {{-- the below class creates a nice little box around the wrapped element --}}
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    {{-- the below line is like posting the form to the corresponding controller --}}
                    {!! Form::open(['url' => 'password/email', 'method' => 'post']) !!}
                        {!! Form::label('email', 'Email:') !!}
                        {!!Form::email('email', null, ['class' => 'form-control'])!!}
                        {!!Form::submit('Reset Password', ['class' => 'btn btn-primary btn-block'])!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>    
    </div>
  @endsection 