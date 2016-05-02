@extends('layouts.admin')

@section('main')

<h1>Show Audition event</h1>

<p>{{ link_to_route('auditionevents.index', 'Return to all audition events') }}</p>

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
		<tr>
			<td>{{{ $auditionevent->name }}}</td>
					<td>{{{ $auditionevent->description }}}</td>
					<td>{{{ $auditionevent->date }}}</td>
					<td>{{{ $auditionevent->time }}}</td>
					<td>{{{ $auditionevent->venue }}}</td>
					<td>{{{ $auditionevent->type }}}</td>
                    <td>{{ link_to_route('auditionevents.edit', 'Edit', array($auditionevent->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('auditionevents.destroy', $auditionevent->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
