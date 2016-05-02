@extends('layouts.admin')

@section('main')

<h1>All Videocomments</h1>
	@if(count($videocomments) == "0")
			<tr>
				<td>
					No Comments to approve
				</td>
			</tr>
	@else
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>sl</th>
				<th>Comment</th>
				<th>Video id</th>
			</tr>
		</thead>

		<tbody>
			
			@foreach ($videocomments as $videocomment)
				<tr>
					<td>{{{ $videocomment->id }}}</td>
					<td>{{{ $videocomment->comment }}}</td>
					<td>{{{ $videocomment->video_id }}}</td>
                    <td>{{ link_to_route('videocomments.edit', 'Approve', array($videocomment->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('videocomments.destroy', $videocomment->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

@stop
