@extends('layouts.admin')

@section('main')

<h1>Show Ad</h1>

<p>{{ link_to_route('videocomments.index', 'Return to all videocomments') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Location</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $ad->location }}}</td>
                    <td>{{ link_to_route('videocomments.edit', 'Edit', array($videocomment->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('videocomments.destroy', $videocomment->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
