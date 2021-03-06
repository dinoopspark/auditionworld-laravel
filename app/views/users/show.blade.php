 @extends('layouts.admin')

@section('main')

<h1>Show User</h1>

<p>{{ link_to_route('users.index', 'Return to all users') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Dob</th>
				<th>Language</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $user->name }}}</td>
					<td>{{{ $user->email }}}</td>
					<td>{{{ $user->password }}}</td>
					<td>{{{ $user->address }}}</td>
					<td>{{{ $user->gender }}}</td>
					<td>{{{ $user->dob }}}</td>
					<td>{{{ $user->language }}}</td>
                    <td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
