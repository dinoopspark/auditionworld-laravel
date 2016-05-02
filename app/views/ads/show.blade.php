@extends('layouts.admin')

@section('main')

<h1>Show Ad</h1>

<p>{{ link_to_route('ads.index', 'Return to all ads') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Location</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $ad->location }}}</td>
                    <td>{{ link_to_route('ads.edit', 'Edit', array($ad->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('ads.destroy', $ad->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
