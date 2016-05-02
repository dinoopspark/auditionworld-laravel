@extends('layouts.admin')

@section('main')

<h1>Add User</h1>
{{ Form::open(array('route' => 'users.store','files'=>true)) }}
    <ul style="list-style:none;">

        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>

            {{ Form::label('user_type', 'Role:') }}
            {{ Form::select('user_type', $roles ) }}
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
            {{ Form::label('phone', 'Phone Num:') }}
            {{ Form::text('phone') }}
        </li>
        <li>
               {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        </li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
