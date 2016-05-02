@extends('layouts.new_temp')
@section('title')
About Audition World
@stop
@section('active_aud')
active
@stop

@section('metadata')
<meta content="Vision and Mission of Audition world" name=description />

<meta content="Auditions for Actor, Auditions for Actress, Malayalam tv channel auditions, Film Auditions, Film Auditions kerala, Malayalam Channel auditioins" name=keywords />


<!--<meta property="og:url"           content="http://auditionworldtv.com/talents_hunt/1" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Audition World" />
	<meta property="og:description"   content="Your description" />
	<meta property="og:image"         content="http://auditionworldtv.com/path/image.jpg" />-->

@stop

@section('main')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="signin">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Login to your Account</h4>
      </div>
      <div class="modal-body">
	<div id="invalid"></div>
        <!--<div class="col-sm-12 fb"><a href="#"><i class="fa fa-facebook"></i>&nbsp; Sign up with Facebook</a></div>
        <div class="col-sm-12 g-plus"><a href="#"><i class="fa fa-google-plus"></i>&nbsp; Sign up with Google+</a></div>
        <div class="clearfix"></div>
        <div class="divider"><span class="or"><span>OR</span></span></div>-->
        <div class="form-group">
          <input type="email" id="logemail" name="email" class="form-control" placeholder="Email">
          <span><i class="fa fa-envelope-o"></i></span> </div>
        <div class="form-group">
          <input type="password" id="logpass" name="password" class="form-control" placeholder="Password">
          <span><i class="fa fa-key"></i></span> </div>
        <a href="#" onclick="checklog()" class="bten">Login</a>
	<p class="text-center"><a href="#forgot_password" data-toggle="modal" data-dismiss="modal">Forgot your Password?</a></p>

	<p class="text-center"><a href="#registration" data-toggle="modal" data-dismiss="modal">Register Here?</a></p>


        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>



<section class="audition">
  <div class="container">
    <div class="row" >
      <ul id="myTabs" class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"> Upcoming Auditions </a></li>
        <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Previous  Auditions </a></li>
      </ul>


      <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
	<?php $i =1; ?>
	@foreach ($events as $event)
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="col-md-12">
              <div class="image" style="background:  url(/assets/thumbnails/{{$event->thumbnail}}) no-repeat center center; background-size: cover;"></div>
              <h1>{{$event->name}}</h1>
              <p>{{str_limit($event->description,100)}}</p>
		<!--@if(!empty($event->user_id))
			<a href="talents_hunt/{{$event->id}}" class="bten know">Know More</a> <a href="#" class="bten apply">Applied</a>
		@else
	              <a href="talents_hunt/{{$event->id}}" class="bten know">Know More</a> <a href="#"  event="{{$event->id}}" class="bten apply apply_aud" data-toggle="modal" data-target="#apply">Apply Now</a>
		@endif -->


		@if (Auth::check())
				   <?php $userid= Auth::user()->id; ?>
				   <?php   $checkApp=checkApplied($event->id,$userid); ?>
					@if(empty($checkApp))
                    			  <a href="talents_hunt/{{$event->id}}" class="bten know">Know More</a> <a href="#"  data-toggle="modal" data-target="#uploadpro_video" event="{{$event->id}}" class="bten apply apply_aud">Apply Now</a>
					@else
					<a href="talents_hunt/{{$event->id}}" class="bten know">Know More</a> <a href="#" class="bten apply">Applied</a>
					@endif

  <div class="fb-share-button" data-href="http://auditionworldtv.com/talents_hunt/{{$event->id}}" data-layout="button_count"></div>

                    @else
                          <a href="talents_hunt/{{$event->id}}" class="bten know">Know More</a> <a href="#"  event="{{$event->id}}" class="bten apply apply_aud" data-toggle="modal" data-target="#signin">Apply Now</a>
                    @endif


		 </div>
          </div>
	@endforeach	
        </div>





        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
	@foreach ($prev_events as $pevent)
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="col-md-12">
              <div class="image" style="background:  url(/assets/thumbnails/{{$pevent->thumbnail}}) no-repeat center center; background-size: cover;"></div>
              <h1>{{$pevent->name}}</h1>
              <p>{{str_limit($pevent->description,100)}}</p>
              <a href="talents_hunt/{{$pevent->id}}" class="bten know">Know More</a> <a href="#" class="bten apply">Closed</a> </div>
          </div>
	@endforeach
        </div>
      </div>
    </div>
  </div>
</section>


<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="apply">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Apply for this audition</h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
		@if(Auth::check())
	    <form action="{{URL::to('participate')}}" method="POST" id="applynow-form" enctype="multipart/form-data"> 
              <div class="input-group" style="display:block;"> <span class="input-group-btn"> </span>
                <input class="form-control" readonly style="height:40px;" type="text" placeholder="Upload a video">
                <input type="hidden" name="event_id" id="event">
                <span class="bten  btn-file pull-left" style="text-transform: none; margin-top:15px;"> Browse…<input multiple type="file" name="video_file"></span>
                <button type="submit" class="bten pull-right"  style="margin-top:15px;">Submit</button>
              </div> 
	    </form>    
		@else
		<p> Please Login </p>
		@endif
          </div>
        </div>
        <div class="clearfix"></div>
      </div>

    </div>
  </div>
</div>








<div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="uploadpro_video">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left">Apply for this audition</h4>
      </div>
      <div class="modal-body">         
	<form action="{{URL::to('participate')}}" enctype="multipart/form-data" method="post" class="vidupdate">   
	    <div class="form-group">
		      <input type="hidden" name="event_id" id="eventid">
<!--
		<div id="fileselectvideo">
		   <a style="text-decoration:none;" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video">
		      <span class="btn-file">
             		<input type="file" id="video"  name="video_file" accept="video/*"  >+Upload Video
                      </span>  
                  </a>
        </div>
-->
<div class="browsw_div">
      <div id="fileselectvideo">
		       <div class="bfd-dropfield">
				 <div class="bfd-dropfield-inner" style="height: 200px; padding-top: 56px;">  
				            <div class="col-md-12">
						        <div class="fileUpload choose-btn">
						          <span><i class="fa fa-plus" aria-hidden="true"></i> Upload</span>
						          <input type="file" id="video" name="video_file" accept="video/*" class="upload">
						        </div>
				            </div>         
				 </div>
		        </div>
      </div>      
</div>
            


		<div id="video_prev"></div>
		<div id="onload_video" style="display:none;"><img src="assets/new_theme/images/ajax_loader2.gif" height='100px' width='150px'></div>
		<div id="video_load"></div>
	    </div>        
            <div class="clearfix"></div>
      </div>
     <div class="modal-footer">
           <button type="button" class="btn btn-primary pull-right"  id="pvbtn" disabled='true'  onclick="videofrm();"><i class="fa fa-pencil-square-o"></i> Update</button>
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="cancelbtn">Cancel</button>
     </div>

	</form>
    </div>
  </div>
</div>














<style>
    .btn-file {
	position: relative;

}
.btn-file input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	min-width: 100%;
	min-height: 100%;
	text-align: right;
	filter: alpha(opacity=0);
	opacity: 0;
	background: red;
	cursor: pointer;
	display: block;
}
</style>
<script>
	$(".apply_aud").click(function(){
		$("#eventid").val($(this).attr('event'));
		
	});
</script>

<script>

function placechange(){


$('#status_text').attr('placeholder', ' ');

}


function changeplaceorg(){

$('#status_text').attr('placeholder', 'Enter your thoughts about the video you are about to upload  :)');

}

</script>



<script>


function test1fg(){


$(".mydiv" ).html("<img src='assets/new_theme/images/ajax_loader2.gif' height='100px' width='150px'>");

 $(".custom").submit();

}
</script>

<script>

function videofrm(){

$("#video_prev" ).hide();

$("#onload_video" ).show();

  $('#cancelbtn').prop("disabled", true);
$( "#removevideo" ).hide(); 	
$(".vidupdate").submit();
}



 function handleVideoSelect(evt) {
    var files = evt.target.files;

    for (var i = 0, f; f = files[i]; i++) {
	      if (!f.type.match('video.*')) {
		continue;
	      }
	   var kilobyte = 1024;
           var megabyte = kilobyte * 1024;	
	  var fsize=Math.round(f.size/megabyte);		
	if(fsize<=10){

}
else{
alert('Maximum filesize is 10MB');
break;


}

  	var reader = new window.FileReader();
	$("#fileselectvideo").hide();
	$("#userimg_video").hide();
	
$( "#video_load" ).html("<div class='col-xs-7 col-sm-4 bfd-info'> <span id='removevideo' class='fa fa-times-circle bfd-remove'></span>  "+ f.name +" </div><div class='col-xs-5 col-sm-8 bfd-progress'>  <div class='progress'> <div id='m' class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='" + f.size + "'> <span class='sr-only'>0%</span> </div></div></div>");
$( "#video_load" ).show();
$("#removevideo").click(function(){
        $("#fileselectvideo").show();
	$("#userimg_video").show();
	$( "#video_prev" ).hide();
	$( "#video_load" ).hide();
	 $('#pvbtn').prop("disabled", true);       
});

 reader.onprogress = function(f) {
                    var o = Math.round(100 * f.loaded / f.total) + "%";
                   $("#m").attr("aria-valuenow", f.loaded), $("#m").css("width", o);
                };

         reader.onload = (function(theFile) {

        return function(e) {
		  $( "#video_prev" ).html("<video src='"+e.target.result+"' height='250px' width='350px'></video>"  );	
 		  $( "#video_prev" ).show();
		  $("#m").attr("aria-valuenow", e.total), $("#m").css("width", e.total);
		  $('#pvbtn').prop("disabled", false); 				            
        };
       
      })(f);

      reader.readAsDataURL(f);
    }
  }
 document.getElementById('video').addEventListener('change', handleVideoSelect, false);


</script>

@stop
