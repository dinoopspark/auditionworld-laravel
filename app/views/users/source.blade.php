@extends('layouts.admin')
@section('main')
<h1>Edit</h1>

        {{ Form::open(array('url' => 'source_update')) }}
    <ul>

        <li>
            {{ Form::label('you_tube', 'Select Source:') }}
		<input type="radio" @if($source->you_tube==1) checked="checked"@endif value="1" name="you_tube" style="position:relative;left:0;margin-top:-4px;"> Youtube
		<input type="radio" value="0" name="you_tube" @if($source->you_tube==0) checked="checked"@endif style="position:relative;left:0;margin-top:-4px;"> From Website
        </li>
        <li>
                {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        </li>
        {{ Form::close() }}
        </ul>


@stop

