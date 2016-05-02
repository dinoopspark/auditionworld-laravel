@extends('layouts.admin')

@section('main')

<h1>Change Password</h1>


  @if (Session::has('message'))
                           <?php  echo \Session::get('message');?>
                 
  @endif


{{ Form::open(array('url' => 'adminupdatepassword','files'=>true)) }}
    <ul style="list-style:none;">


        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password') }}
        </li>

      

        
        <li>
               {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        </li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
