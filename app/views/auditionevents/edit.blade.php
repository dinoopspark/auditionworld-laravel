@extends('layouts.admin')

@section('main')

<h1>Edit Audition event</h1>
{{ Form::model($auditionevent, array('method' => 'PATCH', 'route' => array('auditionevents.update', $auditionevent->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('date', 'Date:') }}
            {{ Form::text('date') }}
        </li>

        <li>
            {{ Form::label('time', 'Time:') }}
            {{ Form::text('time') }}
        </li>

        <li>
            {{ Form::label('venue', 'Venue:') }}
            {{ Form::text('venue') }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::text('type') }}
        </li>

        <li>
            {{ Form::label('promo', 'Upload Promo Video:') }}
            {{ Form::text('promo') }}
            {{ Form::file('promo') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('auditionevents.show', 'Cancel', $auditionevent->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
