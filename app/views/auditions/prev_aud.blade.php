@extends('layouts.audition_manager')
@section('main')
<!--left-->
<div class="left-aud">
            <div class="left-container-audition-des">
            
            <div class="head-title ">
             <h1 class="head-title-aud">{{ $type}} Auditions </h1></div>
 <div class="space-gen1"> </div>
 </div>
</div>

<?php $i =1; ?>
<table class="table table-striped table-bordered">
	<th>Sl.No</th>

	<th>Name</th>

	<th>Thumbnail</th>

	<th>Description</th>

	<th>No.of Participants</th>

	<th>View Contestants</th>

	<th>Know More</th>

@foreach ($events as $event)
<tr>

	<td>{{ $i }}</td>
	<td>{{$event->name}}</td>
	<td><img width="140" src="/assets/thumbnails/{{$event->thumbnail}}"></td>
	<td> {{str_limit($event->description,100)}}</td>
 <?php  $usercount=getParticipantCount($event->id); ?>


	<td> {{ $usercount }}</td>


	<td><a class="apply-now" href="viewall/{{$event->id}}"> View contestants</a></td>

	
	<td><a target="blank_" href="talents_hunt/{{$event->id}}" class="knw-mre flt-left"> Know More >> </a></td>
<!--<div class="lft-cnt"> 
<div class="aud-list-outer">
<div class="aud-list-lft"> 
<h1>{{$event->name}}</h1><br/><br/>
<div class="aud-list-lft-logo"> 
<img src="<?php echo URL::asset('assets/images/dummy/audition/logo.jpg')?>"> 
</div>
<div class="aud-list-lft-pa">
<p> {{str_limit($event->description,100)}} </p>
<a href="talents_hunt/{{$event->id}}" class="knw-mre flt-left"> Know More >> </a>


 
        <a class="apply-now" href="viewall/{{$event->id}}"> View contestants</a>

</div>
</div>
<div class="aud-list-rgtt">
<img src="/assets/thumbnails/{{$event->thumbnail}}">
<div class="play-smal-but"></div>
</div>
</div>
</div>-->
<?php $i++ ; ?>
@endforeach
</table>


</div>
<style>
.foter-main {
        position: fixed;
        bottom: 0px;
        }
</style>

@stop
