@extends('layouts.admin')

@section('main')

<h1>All Audition Events</h1>

<p style="line-height:32px;float:right;font-size:16px;">{{ link_to_route('auditionevents.create', 'Add new audition event') }}</p>

@if ($auditionevents->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Date</th>
				<th>Time</th>
				<th>Venue</th>
				<th>Type</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($auditionevents as $audition_event)
				<tr>
					<td>{{{ $audition_event->name }}}</td>
					<td>{{{ $audition_event->description }}}</td>
					<td>{{{ $audition_event->date }}}</td>
					<td>{{{ $audition_event->time }}}</td>
					<td>{{{ $audition_event->venue }}}</td>
					<td>{{{ $audition_event->type }}}</td>
                    <td>{{ link_to_route('auditionevents.edit', 'Edit', array($audition_event->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('auditionevents.destroy', $audition_event->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no audition events
@endif

@stop
