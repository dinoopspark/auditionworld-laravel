@extends('layouts.admin')
@section('main')

@if(empty($_REQUEST['type']))

<?php $t=''; ?>
<h1>All Users</h1>


@elseif($_REQUEST['type']==2)
<?php $t=2; ?>

<h1>Audition Managers</h1>

@else
<?php $t=3; ?>
<h1>Users</h1>
@endif
		

@if(Auth::user()->user_type=="admin")
<p style="line-height:32px;float:right;font-size:16px;">{{ link_to_route('users.create', 'Add new user') }}</p>
@endif
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name </th>
				<th>Email</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Dob</th>
				<th>Language</th>
			</tr>
		</thead>

		<tbody>
			 @foreach ($users as $user) 
				<tr>
					<td>{{{ $user->name }}}</td>
					<td>{{{ $user->email }}}</td>
					<td>{{{ $user->address }}}</td>
					<td>{{{ $user->gender }}}</td>
					<td>{{{ $user->dob }}}</td>
					<td>{{{ $user->language }}}</td>
					<td> <a href="/details/{{$user->id}}" class ='btn btn-info'>View</a></td>
                    @if(Auth::user()->id==1)
                    <td>
                    	<a href="/user_edit/{{$user->id}}" class ='btn btn-info'>Edit</a>

                    </td>
		    <td>
                        <a href="/communicateuser/{{$user->id}}" class ='btn btn-info'>Contact</a>

                    </td>

                    
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                    @endif
				</tr>
			 @endforeach 
		</tbody>
	</table>
<?php echo $users->appends(array('type' => $t))->links(); ?>




@stop
