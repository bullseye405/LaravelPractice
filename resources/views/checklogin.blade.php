<!doctype html>
<html>
    <head>
        <title>Login page</title>
    </head>
    <body>
    
    {{Form::open(array('url'=>'login')) }}
        <h1>Login</h1>
        {{-- if there are login error, show them here --}}
        <p>
            {{$errors->first('email')}}
            {{$errors->first('password')}}
        </p>
        <p>
            {{ Form::label('email', 'Email Address') }}
            {{ Form::text('email', '', array('placeholder' => 'enter email')) }}
        </p>
        <p>
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password') }}
        </p>
        <p>{{ Form::submit('Submit!') }}</p>
       {{ Form::close() }}

    </body>