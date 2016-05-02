@extends('layouts.admin')
@section('main')



@if (Session::has('message'))
   <div class="alert-box success">
   {{ Session::get('message') }}
 </div>

@endif

<h1>All Reported Images</h1>
@if(count($image) == "0")
			<tr>
				<td>
					No images under spam
				</td>
			</tr>
	@else
<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Images</th>
				<th>Reason</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($image as $images)
				<tr>
					<td>{{ $images->itemid }}</td>
					<td>{{$images->username}}</td>


					<td>
<div>{{$images->text}} </div>
<img width="300px" height="250px" src="assets/protofolio/{{$images->image_file}}"></td>


<td>{{$images->reson}}</td>
                    <td>
		        <a href="/admindelete_image/{{$images->itemid}}" class ='btn btn-info'>Delete</a>


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
