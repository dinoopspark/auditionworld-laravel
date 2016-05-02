@extends('layouts.admin')

@section('main')

<h1>Edit User</h1>
{{ Form::model($user, array('method' => 'PATCH','route' => array('users.update', $user->id))) }}
	{{ Form::open(array('url' => 'update')) }}
    <ul>

        {{ Form::hidden('id', $user->id) }}
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::text('password') }}
        </li>

        <li>
            {{ Form::label('address', 'Address:') }}
            {{ Form::textarea('address') }}
        </li>

        <li>
            {{ Form::label('gender', 'Gender:') }}
            {{ Form::text('gender') }}
        </li>

        <li>
            {{ Form::label('dob', 'Dob:') }}
            {{ Form::text('dob') }}
        </li>

        <li>
            {{ Form::label('language', 'Language:') }}
            {{ Form::text('language') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
