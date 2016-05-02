@extends('layouts.admin')

@section('main')

<h1>Contact User</h1>

<form action="/send_mail_user" method="post">
    <ul>

        {{ Form::hidden('id', $user->id) }}
        <li>
            {{ Form::label('name', 'Name:') }}
	    <h2>{{$user->name}} </h2>
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
		<h2>{{$user->email}} </h2>
        </li>

        <li>
            {{ Form::label('message', 'Message:') }}
            {{ Form::textarea('message') }}
        </li>
		<input type="submit" value="Send" class="btn btn-info">
    </ul>
</form>
<style>

textarea{
	width:600px;
}
</style>
@stop

