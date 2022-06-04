@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名','UserName') }}<br>
{{ Form::text('username',null,['class' => 'input', 'placeholder'=>'dawntown']) }}<br>
@if($errors->has('username'))
{{ $errors->first('username')}}
@endif

{{ Form::label('メールアドレス','MailAddress') }}<br>
{{ Form::text('mail',null,['class' => 'input', 'placeholder'=>'dawn@dawn.jp']) }}<br>
@if($errors->has('mail'))
{{ $errors->first('mail')}}
@endif

{{ Form::label('パスワード','Password') }}<br>
{{ Form::password('password',['class' => 'input']) }}<br>
@if($errors->has('password'))
{{ $errors->first('password')}}
@endif

{{ Form::label('パスワード確認','Password confirm') }}<br>
{{ Form::password('password_confirmation',['class' => 'input']) }}<br>
@if($errors->has('password_confirmation'))
{{ $errors->first('password_confirmation')}}
@endif

{{ Form::submit('REGISTER') }}<br>

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
