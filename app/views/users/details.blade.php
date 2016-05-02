@extends('layouts.admin')

<script type="text/javascript" src="/jwp/jwplayer/jwplayer.js">
</script>
<script>jwplayer.key="9va04HUO4z+9XAZ89ReCYGNtMmGS3EAqgJncFA==";</script>

<style>

.tableclas table {

border:1px solid yellowgreen;
width:100%;

}

.tableclas td{

border:1px solid yellowgreen;
 padding: 10px;
width:40%;

}

.img-container {
    position: relative;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;

    text-align:center; /* Align center inline elements */
    font: 0/0 a;
}

</style>
@section('main')

<!--left-->

<?php 
                        		    $stream="";
                                $url="";
                                $streaming_server_ip=  Config::get('app.streaming_server_ip');
                                $streaming_app_name = Config::get('app.streaming_app_name');
                                $streaming_format_flv = Config::get('app.streaming_format_flv');
                                $streaming_format_mp4 = Config::get('app.streaming_format_mp4');
                        	?>

<div class="left-aud">
            <div class="left-container-audition-des">  
        
		    <div class="head-title "> </div>
	 	    <div class="space-gen1">     </div>
		      <div class="profile-cnt">
				      <div class="profile-cnt-lft" style="text-align:center;" > 
							<h1 class="head-title-profile">Profile </h1>
							<div class="profile-cnt-lft1 tableclas img-container" style="width:50%; position:relative;left:25%;"> 
				      				<img src="/assets/profile/{{$users->profile_pic}}" style="height:208px;width:208px; ">
						        </div>
			      			       <div class="profile-cnt-lft-shadow"> </div>
						       <div class="profile-cnt-lft1 tableclas" style="width:50%;position:relative;left:25%;"> 
									<h4>  {{$users->name}} </h4>
									<table class="profile-tble">
									     <tr>  											             <td>No.of Videos </td> 
												<td>{{ $default_count }} </td>
									    </tr>   
									    <tr>
											       <td>No.of Events</td>
												<td>{{ $event_count }} </td>
									     </tr>              
									     <tr> 
											      <td><p>Gender :  </p> </td>
												<td>{{$users->gender}} </td>
									    </tr>
									    <tr>
											     <td> <p>DOB :  </p> </td>
												<td>{{$users->dob}} </td>
									     </tr>
									     <tr>
											     <td> <p> Mobile : </p> </td>
												<td>{{$users->phone}} </td>
									      </tr>
									      <tr>
											     <td> <p> Email: </p> </td>
												<td>{{$users->email}}</td>
									       </tr>
									</table>
						     </div>
			              </div>              
              			      <div class="profil-border"> </div>
				      <div class="profile-cnt-ctr tableclas" style="width:50%;position:relative;left:25%;"> 
						    <table class="profile-tble">
						      			<h5 class="profile-tble-h5"> Profile Details: </h5>
										<tr>
											<td>Languages Known</td>
											<td>{{$users->language}} </td>
										</tr>
						      </table>
						      <table class="profile-tble" >
						      				<h5 class="profile-tble-h5"> Physical Details:  </h5>
										<tr >
											<td>Complexion:</td>
											<td >{{$users->color}}</td>
										</tr>
										<tr>
											<td>Eye Color: </td>
											<td>{{$users->eye}}</td>
										</tr>
										<tr>
											<td>Height: </td>
											<td>{{$users->height_feet}}.{{$users->height_inch}}</td>
										</tr>
										<tr>
											<td>Weight:  </td>
											<td>{{$users->weight}}</td>
										</tr>
										<tr>
											<td>Hair Type:  </td>
											<td>{{$users->hair}}</td>
										</tr>

							</table>
				       </div>
			   
				     <!-- <div class="profile-cnt-rgt">
				     	   <div class="samp-video"> 

							<form action="default_video" method="post"  id="userdefault" enctype="multipart/form-data">-->
						     <?php
							if(!empty($default)){
								 $count = count($default); }else{
								  $count = 0;
							 }
							 ?>


				<div class="tableclas" style="margin-top:10px;" >
					<h5 class="profile-tble-h5" style="text-align:center;"> Videos </h5>
	
<?php $k=2;?>				







					  <table class="profile-tble" >
					     	  <tr>
							  @foreach ($default as  $defaults)	
						     @if($k%2==0)	
								 <tr>
						               <td align="center">
								 	
									 <!-- <div class="samp-video-in-out">
										 <div class="samp-video-in">
										 	 <img src="/assets/thumbnails/{{$defaults->thumbnail}}"> 
										  </div>

										    @if(!empty($defaults->video_type) && $defaults->video_type == "1")
										   	 <div class="samp-video-in-butn but-active default"> DefaulT Video</div>
										    @endif
									 </div> -->

										  <div class="" id="myElement_{{$defaults->id}}" style="border: 10px solid #CCC;border-radius:10px;"></div>
								            	<?php
								            	$info = pathinfo($defaults->video_file);
								              	 if($defaults->converted == 1){
								      	               $defaults->video_file = 'converted_'.$defaults->video_file;
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
								                              $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$defaults->video_file."/playlist.m3u8";
								                      } else{
								                              $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$defaults->video_file."/playlist.m3u8";
								                      }
								              }else if($Android){
								                preg_match('/Android ?([0-9]+\.[0-9]+)/',$str,$ar1);
								                      //$ar1 = preg_match('/Android ?([0-9]+\.[0-9]+)/');
								                      if((float)$ar1[1]>4.0){
								                              if($info["extension"] == "flv"){
								                                      $protocol = "rtmp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$defaults->video_file;

								                              } else{
								                                      $protocol = 'rtmp://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$defaults->video_file;
								                              }
								                      } else {
								                              if($info["extension"] == "flv"){
								                                      $protocol = "rtsp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$defaults->video_file;
								                              } else{
								                                      $protocol = "rtsp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$defaults->video_file;
								                              }
								                      }
								              }else{
								                       if($info["extension"] == "flv"){
								                              $protocol = 'rtmp://'.$streaming_server_ip."/".$streaming_app_name."/".$streaming_format_flv.":".$defaults->video_file;
								                       } else{
								                              $protocol = 'rtmp://'.$streaming_server_ip."/".$streaming_app_name."/".$streaming_format_mp4.":".$defaults->video_file;
								                      }
								              }
								      	
								      	?>
								      <script type="text/javascript">
								             jwplayer("myElement_{{$defaults->id}}").setup({
								               primary: "flash",
								                 file: "{{$protocol}}",
								                  image: "/assets/thumbnails/{{$defaults->thumbnail}}",
										skin: { name: "bekle" },
								                
								                 autoplay : true,
								                      width: "100%",
										    logo: { hide: 'true' },
								                aspectratio: "12:5",
								             });
								       </script>

									</td>	


@else



  <td align="center">
								 	
									 <!-- <div class="samp-video-in-out">
										 <div class="samp-video-in">
										 	 <img src="/assets/thumbnails/{{$defaults->thumbnail}}"> 
										  </div>

										    @if(!empty($defaults->video_type) && $defaults->video_type == "1")
										   	 <div class="samp-video-in-butn but-active default"> DefaulT Video</div>
										    @endif
									 </div> -->

										  <div class="" id="myElement_{{$defaults->id}}" style="border: 10px solid #CCC;border-radius:10px;"></div>
								            	<?php
								            	$info = pathinfo($defaults->video_file);
								              	 if($defaults->converted == 1){
								      	               $defaults->video_file = 'converted_'.$defaults->video_file;
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
								                              $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$defaults->video_file."/playlist.m3u8";
								                      } else{
								                              $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$defaults->video_file."/playlist.m3u8";
								                      }
								              }else if($Android){
								                preg_match('/Android ?([0-9]+\.[0-9]+)/',$str,$ar1);
								                      //$ar1 = preg_match('/Android ?([0-9]+\.[0-9]+)/');
								                      if((float)$ar1[1]>4.0){
								                              if($info["extension"] == "flv"){
								                                      $protocol = "rtmp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$defaults->video_file;

								                              } else{
								                                      $protocol = 'rtmp://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$defaults->video_file;
								                              }
								                      } else {
								                              if($info["extension"] == "flv"){
								                                      $protocol = "rtsp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$defaults->video_file;
								                              } else{
								                                      $protocol = "rtsp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$defaults->video_file;
								                              }
								                      }
								              }else{
								                       if($info["extension"] == "flv"){
								                              $protocol = 'rtmp://'.$streaming_server_ip."/".$streaming_app_name."/".$streaming_format_flv.":".$defaults->video_file;
								                       } else{
								                              $protocol = 'rtmp://'.$streaming_server_ip."/".$streaming_app_name."/".$streaming_format_mp4.":".$defaults->video_file;
								                      }
								              }
								      	
								      	?>
								      <script type="text/javascript">
								             jwplayer("myElement_{{$defaults->id}}").setup({
								               primary: "flash",
								                 file: "{{$protocol}}",
								                  image: "/assets/thumbnails/{{$defaults->thumbnail}}",
										skin: { name: "bekle" },
								                
								                 autoplay : true,
								                      width: "100%",
										    logo: { hide: 'true' },
								                aspectratio: "12:5",
								             });
								       </script>

									</td>	</tr>

@endif

<?php $k++ ?>	
										
							   @endforeach
					
					 </table>       
					      
				</div>
						       <!--</form>
             
          				  </div>
              
              			    </div>-->
              
              		</div> 
  
           	 </div>
            	 <div class="space-gen2"> </div>
       </div>
          
@stop


@section('video')
<div class="head-title "> <h2 class="head-title-profile-1">Audition Videos </h2></div>
 <div class="space-gen1"> </div>

<!--video-->
@foreach ($video as $videos)
<div class="part-video">
   <a  href="myvideo/{{$videos->id}}"> 
      <img src="assets/thumbnails/{{$videos->thumbnail}}" id="{{$videos->id}}" height="146" width="264" alt="Despicable Me"/> 
   </a>
</div>
@endforeach
@stop
