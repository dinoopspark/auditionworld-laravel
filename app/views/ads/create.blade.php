@extends('layouts.admin')

@section('main')

<h1>Create Ad</h1>

{{ Form::open(array('route' => 'ads.store','files'=> true)) }}
	<ul>
		 <li>
            {{ Form::label('file_name', 'Upload ADS:') }}
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


