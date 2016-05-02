@extends('layouts.main')
@section('main')
	<form  action="password" method="post" id="login-form">
		{{ Form::label('email', 'Email') }}
		{{ Form::text('email') }}
		{{ Form::submit('Save') }}
	</form>
  @if (Session::has('message'))
                    <div class="flash alert">
                       <p style="color:red;;margin-left: 28px;margin-top:40px;">{{ Session::get('message') }}</p>
                    </div>
  @endif
@stop
