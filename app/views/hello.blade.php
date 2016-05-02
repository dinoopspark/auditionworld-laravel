@extends('layouts.frontpage')
@section('upcoming')
<article>
@foreach ($events as $event)
<div class="upcoming-outer"> 
<div class="upcoming-lft">
    <a href="talents_hunt/{{$event->id}}">

    	<img src="/assets/thumbnails/{{$event->thumbnail}}">
    </a>
    <div class="play-smal-but"></div>
 </div>
<div class="upcoming-rgt">
<h3>{{$event->name}}</h3>
<p class="width_100">{{str_limit($event->description,100)}} </p>
<a href="talents_hunt/{{$event->id}}" class="knw-mre"> Know More >> </a>
 </div>

</div>
@endforeach
</article>
<style>
.caroufredsel_wrapper{
	height:241px !important;
}
</style>
@stop


@section('actors')
	<ul id="foo4">
	@foreach ($actor as $actors)	
		<li>
					<div class="smple-video21" style="width:100%">
                                                <div class="smple-vid-in21">



                                                        <a href="/videoplayer/{{$actors->vid}}" class="here">
                                                                        <div class="play"></div>
                                                             
                                                                        <img class="img" src="/assets/thumbnails/{{$actors->thumbnail}}" height="154" width="100%">
                                                        </a>

                                                </div>

                                         </div>

			<div class="pop-video-caption">
				<div class="pop-video-captionlft"> {{$actors->name}}
					<span> Actor</span>
				</div>
			  </div>
		</li>
	@endforeach			
			</ul>
		

@stop

@section('models')
<!--		<ul id="foo5">
			@foreach ($model as $models)
				<li>
					<div class="smple-video21" style="width:100%">
                	    			<div class="smple-vid-in21">



							<a href="/videoplayer/{{$models->vid}}" class="here">
									<div class="play"></div>
				              				<img class="img" src="/assets/thumbnails/{{$models->thumbnail}}" height="154" width="100%">
							</a>
               
						</div>

		                         </div>
					<div class="pop-video-caption">
					<div class="pop-video-captionlft"> {{$models->name}}
						<span> Model</span>
					</div>
					  </div>
				</li>
		@endforeach
				
			</ul>
-->
@stop
