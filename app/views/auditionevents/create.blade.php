@extends('layouts.admin')

@section('main')

<h1>Create Event</h1>

{{ Form::open(array('route' => 'auditionevents.store','files'=>true)) }}
    <ul>
        <li>

            {{ Form::label('manager_id', 'Manager:') }}
            {{ Form::select('manager_id', $roles ) }}
        </li>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>
         <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>
        <li>
            {{ Form::label('date', 'Date:') }}
            {{ Form::text('date',NULL,array('id'=>'eventdate','class' => 'calnder','placeholder'=>'yyyy-mm-dd')) }}
        </li>

        <li>
            {{ Form::label('time', 'Time:') }}
            {{ Form::hidden('time') }}
            {{ Form::label('', 'Hour:') }}
             {{Form::selectRange('Hour', 0, 24,null, array('onchange'=>"setTime()",'id'=>'hour','placeholder'=>'Hour'))}}
            -{{ Form::label('', 'Minute:') }}
            {{Form::selectRange('Minute',0,59,null, array('onchange'=>"setTime()",'id'=>'minute','placeholder'=>'Minute'))}}
            -{{ Form::label('', 'Seconds:') }}
            {{Form::selectRange('Second', 0, 59,null, array('onchange'=>"setTime()",'id'=>'second','placeholder'=>'Second'))}}
        </li>

        <li>
            {{ Form::label('venue', 'Venue:') }}
            {{ Form::text('venue') }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            <select name="type"  class="txt-fld025">
            @foreach ($category as $role)
            <option value="{{$role->name}}"> {{ $role->name}}</option>
            @endforeach
            </select>
        </li>
         <li>
            {{ Form::label('promo', 'Upload Promo Video:') }}
            {{ Form::file('promo') }}
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


