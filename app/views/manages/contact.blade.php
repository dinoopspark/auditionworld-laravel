@extends('layouts.admin')
@section('main')
<h1>Contact Request</h1>
@if(count($contact) == "0")
			<tr>
				<td>
					No Request Recieved
				</td>
			</tr>
	@else
<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Participate Name</th>
				<th>Requested by</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($contact as $contacts)
				<tr>
					<td>{{{ $contacts->id }}}</td>
					<td>{{$contacts->name}}</td>
					<td>{{$contacts->req}}</td>
				</tr>
			@endforeach
		</tbody>

	</table>
 {{$contact->links(); }}

	@endif
@stop
