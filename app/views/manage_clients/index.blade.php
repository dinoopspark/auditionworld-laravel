@extends('layouts.admin')
@section('main')
		<h1>All Users</h1>

@if(Auth::user()->user_type=="admin")
<p style="line-height:32px;float:right;font-size:16px;"><a href="/manage_clients_add_new">ADD NEW</a></p>
@endif
<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Api Key</th>
				<th></th>
				<th></th>
				<th></th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($manage_clients as $client)
			<tr>
				<td>{{$client->id}}</td>
				<td>{{$client->name}}</td>
				<td>{{$client->api_key}}</td>
				<td><a href="/manage_clients_view/{{$client->id}}" class="btn btn-info">View</a></td>
				<td><a href="/manage_clients_edit/{{$client->id}}" class ='btn btn-info'>Edit</a></td>
				<td><a href="/manage_clients_delete/{{$client->id}}" class="btn btn-danger">Delete</a></td>
			</tr>
			@endforeach
		</tbody>
</table>
@stop
