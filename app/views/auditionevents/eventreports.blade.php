<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.min.css')}}"> 
@if(count($event) == "0")
			<tr>
				<td>
					No participants 
				</td>
			</tr>
	@else
<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Sl.no</th>
				<th>Name</th>
				<th>Video</th>
			</tr>
		</thead>

		<tbody>
			<?php $i= 1; ?>
			@foreach ($event as $events)
				<tr>
					<td>{{$i}}</td>
					<td>{{$events->name}}</td>
					<td><img src="assets/thumbnails/{{$events->thumbnail}}" style="width:106px;height:105px;">
							<div class="play-but"></div>
					</td>
				
				</tr>
				<?php $i++; ?>
			@endforeach
		</tbody>
	</table>
	@endif