@extends('layouts.admin')
@section('main')
<h1>Edit</h1>

	{{ Form::open(array('url' => 'manage_clients_update')) }}
    <ul>

        {{ Form::hidden('id', $user_data[0]->id) }}
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name',$user_data[0]->name,array('disabled')) }}
        </li>
        <li>
            {{ Form::label('api_key', 'Api Key:') }}
            {{ Form::text('api_key',$user_data[0]->api_key) }}
        </li>
	<li>
		{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
	</li>
	{{ Form::close() }}
	</ul>


@stop
