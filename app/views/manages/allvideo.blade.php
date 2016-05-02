@extends('layouts.admin')
<script type="text/javascript" src="/jwp/jwplayer/jwplayer.js">
</script>
<script>jwplayer.key="9va04HUO4z+9XAZ89ReCYGNtMmGS3EAqgJncFA==";</script>

@section('main')
<h1>All Videos</h1>

<?php 
                        		    $stream="";
                                $url="";
                                $streaming_server_ip=  Config::get('app.streaming_server_ip');
                                $streaming_app_name = Config::get('app.streaming_app_name');
                                $streaming_format_flv = Config::get('app.streaming_format_flv');
                                $streaming_format_mp4 = Config::get('app.streaming_format_mp4');
                        	?>

@if(count($video) == "0")
			<tr>
				<td>
					No videos to approve
				</td>
			</tr>
	@else
<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				
				<th>Video</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($video as $videos)
				<tr>
					<td>{{{ $videos->id }}}</td>
					<td>{{$videos->name}}</td>
					<td  style="width:500px;">
						
							

					<div> {{$videos->text }} </div>

					<div class="container2">
                                    <div class="" id="myElement_{{$videos->id}}" style="border: 10px solid #CCC;border-radius:10px;">
                                    </div>
                                            	<?php
                                            	$info = pathinfo($videos->video_file);
                                              	 if($videos->converted == 1){
                                      	               $videos->video_file = 'converted_'.$videos->video_file;
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
                                                              $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$videos->video_file."/playlist.m3u8";
                                                      } else{
                                                              $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$videos->video_file."/playlist.m3u8";
                                                      }
                                              }else if($Android){
                                                preg_match('/Android ?([0-9]+\.[0-9]+)/',$str,$ar1);
                                                      //$ar1 = preg_match('/Android ?([0-9]+\.[0-9]+)/');
                                                      if((float)$ar1[1]>4.0){
                                                              if($info["extension"] == "flv"){
                                                                      $protocol = "rtmp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$videos->video_file;

                                                              } else{
                                                                      $protocol = 'rtmp://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$videos->video_file;
                                                              }
                                                      } else {
                                                              if($info["extension"] == "flv"){
                                                                      $protocol = "rtsp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$videos->video_file;
                                                              } else{
                                                                      $protocol = "rtsp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$videos->video_file;
                                                              }
                                                      }
                                              }else{
                                                       if($info["extension"] == "flv"){
                                                              $protocol = 'rtmp://'.$streaming_server_ip."/".$streaming_app_name."/".$streaming_format_flv.":".$videos->video_file;
                                                       } else{
                                                              $protocol = 'rtmp://'.$streaming_server_ip."/".$streaming_app_name."/".$streaming_format_mp4.":".$videos->video_file;
                                                      }
                                              }
                                      	
                                      	?>
                                      <script type="text/javascript">
                                             jwplayer("myElement_{{$videos->id}}").setup({
                                               primary: "flash",
                                                 file: "{{$protocol}}",
                                                  image: "/assets/thumbnails/{{$videos->thumbnail}}",
						skin: { name: "bekle" },
                                                
                                                 autoplay : true,
                                                      width: "100%",
						    logo: { hide: 'true' },
                                                aspectratio: "12:5",
                                             });
                                       </script>
                          
                      	</div>
							
						
					    
					</td>
                    <td>
                      <a href="/adminapprove_video/{{$videos->id}}" class ='btn btn-info'>Approve</a>
                   
                      <a href="/deletevideo/{{$videos->id}}" class ='btn btn-info'>Delete</a>
                    </td>

				</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<div style="">
 {{$video->links(); }}
</div>
<style>
.play_ad {
position: absolute;
background: url('assets/images/new_img/Play1Pressed.png') center center no-repeat;
height: 250px;
width: 316px
}

</style>
@stop
