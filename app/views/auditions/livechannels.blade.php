@extends('layouts.new_temp')
@section('title')
About Audition World
@stop
@section('active_live')
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

	
      <div class="col-md-8">
        <div class="col-md-12" style=" min-height: 525px;" >

          <h1>Live video Streaming</h1>
	<?php /*
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


*/

 ?>


	<div class="" id="myElement" style="border: 10px solid #CCC;border-radius:10px;" >	
	
	</div>


 <script type="text/javascript">
       jwplayer("myElement").setup({
         primary: "flash",
           file: "rtmp://192.99.232.158:1935/live/livestream",
            image: "/assets/thumbnails/novideo.png",
         skin: { name: "bekle" },
           autoplay : true,
	 logo: { hide: 'true' },
		width: "100%",
		height: "100%",
          aspectratio: "12:5",
       });

     </script>

          <!--<img src="{{asset('assets/new_theme/images/video-tumb-two.jpg')}}" alt="">-->
          <p class="ful-width mar-bot">
                        </p>

		<p> Instructions to Publish Livestream:</p>
                         
			<p>Enter the provided details in a encoder like FMLE,or Wirecast</p>

			<p>Server: rtmp://192.99.232.158:1935/live</p>
			<p>StreamName: livestream</p>

			<p>When prompted for Authentication, enter </p>
			<p>username: sparkuser</p>
			<p>password: spark123</p>

			
		

<!--<p>Enter your publishing URL</p><input type="text" name="publishingurl" class="form-control" id="urlpublishing" value="">	
<button class="bten" type="submit" name="ok" id="urlok" value="OK">Publish</button>-->



          </div>
      </div>



      <!--<div class="col-md-4">
        <div class="col-md-12" >
          <h1><a href="#">Upcoming Auditions</a></h1>
	


        </div>
      </div>-->
    </div>
  </div>
</section>

<!--start apply modal-->

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
                $("#event").val($(this).attr('event'));
                
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
@stop
<!--end apply modal-->
