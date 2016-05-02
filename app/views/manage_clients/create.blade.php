@extends('layouts.admin')
@section('main')
<h1>Add New</h1>
	{{ Form::open(array('url' => 'manage_clients_create','onsubmit'=>'return validate()')) }}
    <ul>

        
        
	<li>
		{{ Form::label('user_id', 'Select UserId:') }}
		<select name="user_id" required>
            		@foreach($user_ids as $user_id)
				<option  >{{$user_id->id}}</option>
	   		@endforeach
		</select>
        </li>
        <li>
            {{ Form::label('api_key', 'Api Key:') }}
            <input type="text" name="api_key" required/>
        </li>
	<li>
		{{ Form::submit('Create', array('class' => 'btn btn-info')) }}
	</li>
	{{ Form::close() }}
	</ul>
<script>
function validate(){
	var userId=document.getElementsByName('user_id');
	var api=document.getElementsByName('api_key');
	if (userId ==""&&api=="") {
        alert("The form must be filled out");
        return false;
    }
}
</script>
@stop
