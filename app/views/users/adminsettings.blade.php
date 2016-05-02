@extends('layouts.admin')

@section('main')

<h1>Change Email</h1>


  @if (Session::has('message'))
                           <?php  echo \Session::get('message');?>
                 
  @endif

{{ Form::open(array('url' => 'updateadmin','files'=>true)) }}



    <ul style="list-style:none;">


       <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email',Input::old('username')) }}
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
