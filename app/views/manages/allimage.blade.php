@extends('layouts.admin')
@section('main')



@if (Session::has('message'))
   <div class="alert-box success">
   {{ Session::get('message') }}
 </div>

@endif

<h1>All Images</h1>
@if(count($image) == "0")
			<tr>
				<td>
					No images to approve
				</td>
			</tr>
	@else
<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Images</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($image as $images)
				<tr>
					<td>{{{ $images->id }}}</td>
					<td>{{$images->name}}</td>


					<td>
<div>{{$images->text}} </div>
<img width="300px" height="250px" src="assets/protofolio/{{$images->image_file}}"></td>
                    <td>
                      <a href="/adminapprove_image/{{$images->id}}" class ='btn btn-info'>Approve</a>
		        <a href="/admindelete_image/{{$images->id}}" class ='btn btn-info'>Delete</a>


                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<div style="">
 {{$image->links(); }}
</div>
@stop
