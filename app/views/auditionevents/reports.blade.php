@extends('layouts.admin')

@section('main')
 	{{ Form::label('event', 'Select The Event:') }}
            <select name="eventreport" id="eventreport" class="txt-fld025">
            <option value="0">Select a event</option>
            @foreach ($category as $role)
            <option value="{{$role->id}}"> {{ $role->name}}</option>
            @endforeach
            </select>
            <div id="resultevent">

            </div>
@stop