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
@stop

@section('main')
<!--<script type="text/javascript" src="/assets/js/jwplayer/jwplayer.js"></script>-->

<script type="text/javascript" src="/jwp/jwplayer/jwplayer.js">
</script>
<script>jwplayer.key="9va04HUO4z+9XAZ89ReCYGNtMmGS3EAqgJncFA==";</script>

<section class="know-more">
  <div class="container">
    <div class="row" >

	@foreach ($events as $event)
      <div class="col-md-8">
        <div class="col-md-12" style=" min-height: 525px;" >

          <h1>{{ucfirst($event->name)}}</h1>
	<?php
	   $stream="";
        $url="";
  $streaming_server_ip=  Config::get('app.streaming_server_ip');
  $streaming_app_name = Config::get('app.streaming_app_name');
  $info = pathinfo($event->promo);
    $streaming_format_flv = Config::get('app.streaming_format_flv');
    $streaming_format_mp4 = Config::get('app.streaming_format_mp4');
  if($event->converted == 1){

        $event->promo = 'converted_'.$event->promo;

  }


$str = $_SERVER['HTTP_USER_AGENT'];
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
        $webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $protocol   =   "";
        if( $iPod || $iPhone ){
                if($info["extension"] == "flv"){
                        $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$event->promo."/playlist.m3u8";
                } else{
                        $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$event->promo."/playlist.m3u8";
                }
        }else if($Android){
	  preg_match('/Android ?([0-9]+\.[0-9]+)/',$str,$ar1);
                //$ar1 = preg_match('/Android ?([0-9]+\.[0-9]+)/');
                if((float)$ar1[1]>4.0){
                        if($info["extension"] == "flv"){
                                $protocol = "rtmp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$event->promo;

                        } else{
                                $protocol = 'rtmp://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$event->promo;
                        }
                } else {
                        if($info["extension"] == "flv"){
                                $protocol = "rtsp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$event->promo;
                        } else{
                                $protocol = "rtsp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$event->promo;
                        }
                }
        }else{
                 if($info["extension"] == "flv"){
                        $protocol = 'rtmp://'.$streaming_server_ip."/".$streaming_app_name."/".$streaming_format_flv.":".$event->promo;
                 } else{
                        $protocol = 'rtmp://'.$streaming_server_ip."/".$streaming_app_name."/".$streaming_format_mp4.":".$event->promo;
                }
        }




 ?>

	<div id="demoid" eventid="{{ $event->id }}">
	<div class="" id="myElement" style="border: 10px solid #CCC;border-radius:10px;" >	
	
	</div>
</div>

 <script type="text/javascript">
       jwplayer("myElement").setup({
         primary: "flash",
           file: "{{$protocol}}",
            image: "/assets/thumbnails/{{$event->thumbnail}}",
         skin: { name: "bekle" },
           autoplay : true,
	 logo: { hide: 'true' },
		width: "100%",
          aspectratio: "12:5",
       });

     </script>

          <!--<img src="{{asset('assets/new_theme/images/video-tumb-two.jpg')}}" alt="">-->
          <p class="ful-width mar-bot">End On : {{$event->date}}
                        <br />
                        Venue : {{$event->venue}}</p>

			<p>Conducting By:<a href="../view_manager_profile/{{ $event->manager_id}}" style="color:#337ab7">{{ucfirst($event->manager)}}</a></p>

			<p>{{ucfirst($event->description)}}</p>
			
                     @if (Auth::check())
				   <?php $userid= Auth::user()->id; ?>
				   <?php   $checkApp=checkApplied($event->id,$userid); ?>
					@if(empty($checkApp))
                    			  <a href="#"  event="{{$event->id}}" class="bten apply apply_aud" data-toggle="modal" data-target="#uploadpro_video">Apply Now</a>
					@else
					 <a href="#" class="bten apply">Applied</a>
					@endif

                    @else
                            <a href="#"  event="{{$event->id}}" class="bten apply apply_aud" data-toggle="modal" data-target="#signin">Apply Now</a>
                    @endif

             


          </div>
      </div>

	@endforeach

      <div class="col-md-4">
        <div class="col-md-12" >
          <h1><a href="#">Upcoming Auditions </a></h1>
	@foreach ($events_2 as $event)
          <div class="audition-side-box">
            <div class="image" style="background:  url({{asset('/assets/thumbnails/'.$event->thumbnail)}}) no-repeat center center; background-size: cover;"></div>
            <h1>{{ucfirst($event->name)}}</h1>
            <p>{{ucfirst($event->description)}}</p>
            <a href="{{URL::to('talents_hunt/'.$event->id)}}" class="bten know">Know More</a> 

		 @if (Auth::check())
				   <?php $userid= Auth::user()->id; ?>
				   <?php   $checkApp=checkApplied($event->id,$userid); ?>
					@if(empty($checkApp))
                    			  <a href="#"  event="{{$event->id}}" class="bten apply apply_aud" data-toggle="modal" data-target="#apply">Apply Now</a>
					@else
					 <a href="#" class="bten apply">Applied</a>
					@endif

                 @else
                            <a href="#"  event="{{$event->id}}" class="bten apply apply_aud" data-toggle="modal" data-target="#signin">Apply Now</a>
                  @endif
	 </div>
	@endforeach

          <p><a href="/audition">View more...</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!--start apply modal
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
                <input class="form-control" placeholder="Upload a video" readonly style="height:40px;" type="text">
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
</div>-->




<!-- audition apply real-->
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
		<!--<div id="fileselectvideo">
		   <a style="text-decoration:none;" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video">
		      <span class="btn-file">
             		<input type="file" id="video"  name="video_file" accept="video/*"  >+Upload Video
                      </span>  
                  </a>
               </div>-->



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
		<div id="onload_video" style="display:none;"><img src="/assets/new_theme/images/ajax_loader2.gif" height='100px' width='150px'></div>
		<div id="video_load"></div>
	    </div>        
            <div class="clearfix"></div>
      </div>
     <div class="modal-footer">
           <button type="button" class="btn btn-primary pull-right"   id="pvbtn" disabled='true' onclick="videofrm();"><i class="fa fa-pencil-square-o"></i> Update</button>
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



$("#demoid").click(function(){
var id=$(this).attr('eventid');

		 $.ajax({
         url : "/viewevent",
          type: "POST",
          data:{eventid:id},
          success: function()
          {
            return true;
          }
      });
});


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
<!--end apply modal-->
