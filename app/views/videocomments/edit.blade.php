@extends('layouts.admin')

@section('main')

<h1>Edit Videocomment</h1>
{{ Form::model($ad, array('method' => 'PATCH', 'route' => array('videocomments.update', $ad->id))) }}
	<ul>
        	 <li>
            {{ Form::label('file_name', 'Upload PDF:') }}
            {{ Form::text('file_name') }}
            {{ Form::file('file_name') }}
        </li>
         <li>
            {{ Form::label('start_date', 'Start date:') }}
            {{ Form::text('start_date') }}
        </li>
         <li>
            {{ Form::label('end_date', 'End date:') }}
            {{ Form::text('end_date') }}
        </li>
        <li>
            {{ Form::label('location', 'Location:') }}
            {{ Form::text('location') }}
        </li>
          <li>
            {{ Form::label('order', 'Order:') }}
            {{ Form::text('order') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('videocomments.show', 'Cancel', $videocomment->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
