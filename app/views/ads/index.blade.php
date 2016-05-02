@extends('layouts.admin')

@section('main')

<h1>All Ads</h1>

<p style="line-height:32px;float:right;font-size:16px;">{{ link_to_route('ads.create', 'Add new ad') }}</p>

@if ($ads->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Add</th>
				<th>Location</th>
				<th>Start Date</th>
				<th>End Date</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($ads as $ad)
				<tr>
					<td>{{{ $ad->file_name }}}</td>
					<td>{{{ $ad->location }}}</td>
					<td>{{{ $ad->start_date }}}</td>
					<td>{{{ $ad->end_date }}}</td>
                    <td>{{ link_to_route('ads.edit', 'Edit', array($ad->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('ads.destroy', $ad->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no ads
@endif

@stop
