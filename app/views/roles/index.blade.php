@extends('layouts.admin')

@section('main')

<h1>All Roles</h1>

<p>{{ link_to_route('admin_add_role', 'Add new role') }}</p>

@if ($roles->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($roles as $role)
				<tr>
					<td>{{{ $role->name }}}</td>
                    <td>{{ link_to_route('admin_edit_role', 'Edit', array($role->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin_destroy_role', $role->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no roles
@endif

@stop
