@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p>DAWNSNSへようこそ</p>

{{ Form::label('e-mail','MailAddress') }}<br>
{{ Form::text('mail',null,['class' => 'input','placeholder'=>'dawn@dawn.jp']) }}<br>
@if($errors->has('mail'))
{{ $errors->first('mail')}}
@endif

{{ Form::label('password','Password') }}<br>
{{ Form::password('password',['class' => 'input']) }}<br>
@if($errors->has('password'))
{{ $errors->first('password')}}
@endif

{{ Form::submit('LOGIN') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
