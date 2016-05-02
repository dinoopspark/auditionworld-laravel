@extends('layouts.admin')
@section('main')
  <ul>

        
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name',$user_data[0]->name,array('disabled')) }}
        </li>
        <li>
            {{ Form::label('api_key', 'Api Key:') }}
            {{ Form::text('api_key',$user_data[0]->api_key,array('disabled')) }}
        </li>
	

	</ul>

@stop

