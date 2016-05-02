@extends('layouts.new_temp')
@section('title')
My Account
@stop
@section('active_pr')
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
 <?php 
                                $stream="";
                                $url="";
                                $streaming_server_ip=  Config::get('app.streaming_server_ip');
                                $streaming_app_name = Config::get('app.streaming_app_name');
                                $streaming_format_flv = Config::get('app.streaming_format_flv');
                                $streaming_format_mp4 = Config::get('app.streaming_format_mp4');
    ?>


<section class="profile-head">
  <div class="container">
    <div class="row">
      <div class="col-md-6 profile-pic">
        <div class="media">
          <div class="media-left media-middle"> <a href="#">
            <figure><a href="#">
		@if(!empty($users->profile_pic))
		<img src="/assets/profile/normal_{{$users->profile_pic}}" alt="">
		@else
		 <img src="images/top-two.jpg" alt="">
		@endif
		</a></figure>
             </div>
          <div class="media-body media-middle" >
            <h1>{{$users->name}}</h1>
            <h2>Actor / Director</h2>
            <p>{{$users->about_me}}</p>
            <a href="{{ URL::asset('/edit_profile') }}" class="bten">Edit Profile</a> </div>
        </div>
      </div>
      <div class="col-md-6 profile-txt">
        <div class="row">
          <div class="col-md-6">
            <p>Gender : {{$users->gender}}</p>
            <p>DOB : {{$users->dob}}</p>
          </div>
          <div class="col-md-6">
            <p>Mobile : {{$users->phone}} <span>
		<?php if($users->mobile_verified){ ?>
			<i class="fa fa-check-circle"></i>
		<?php } ?>
		<?php if(!$users->mobile_verified){ ?>
                <a rel="tooltip"
                title="Please verify you mobile number">
                 <span class="warning-verify">
                </span> </a>
                <?php } ?>
		</span></p>
            <p>Email: {{$users->email}} </p>
          </div>
        </div>
        <h4>Your Profile Level</h4>
        <div class="progress progress-striped active" style="height:20px;">
          <div class="progress-bar" role="progressbar"> {{$percentage}}%</div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
             <li class="active"><a href="#tab_default_4" data-toggle="tab"><i class="fa fa-user"></i> About me</a></li>         
            <li><a href="#tab_default_2" data-toggle="tab"><i class="fa fa-video-camera"></i> Videos</a></li>
            <li id="photos"><a href="#tab_default_3" data-toggle="tab"><i class="fa fa-camera"></i> Photos</a></li>
            <li ><a href="#tab_default_1" data-toggle="tab"><i class="fa fa-pencil-square-o"></i> All Posts</a></li>           
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="panel-tab-content">
  <div class="container">
    <div class="row">
      <div class="tab-content">
   <?php $userid= Auth::user()->id; ?>

<!--.......................................All posts section.............................................-->
<!-- dialog box -->

<div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left">You Exceed The Limit Of Uploading</h4>
      </div>
      <div class="modal-body">         	
<h5>You can upload only 4 videos and 10 photos</h5>      
      </div>
     <div class="modal-footer">
           <button type="button" class="btn btn-primary pull-right" data-dismiss="modal" >OK</button>
     </div>
    </div>
  </div>
</div>

        <div class="tab-pane " id="tab_default_1">
          <div class="row">
            <div class="talent-grid">
	     @foreach ($default_feed as $p=>$defaults)	
		   <?php $likeNumber=GetLike($defaults->id,'video'); 
			 $CommentNum=CountComment($defaults->id,'video');
			 if(!empty($CommentNum))
				    $comment_number=$CommentNum ; 
			  else
				  $comment_number=0;
				 $viewNumber=GetViews($defaults->id,'video');
				 $posted_string=Findate($defaults->created_at);

		   ?>
              <article class="white-panel"> 
                <span class="col-xs-11 row pull-left"> 
                      <a href="#">
    	                     	@if(!empty($users->profile_pic))
                                       <img src="/assets/profile/normal_{{$users->profile_pic}}" alt="">
                            @endif
    	               	</a>
                  <h1><a href="#">{{$users->name}}</a></h1>
                     <p class="time"><i class="fa fa-clock-o"></i>{{ $posted_string }}</p>
                </span>
                <div class="btn-group pull-right">
                    <span><a href="#" onclick="deleteVideos({{$defaults->id}})"><i data-original-title="Delete" class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title=""></i></a></span>
                </div>
                <div class="clearfix"></div>
                <p class="detail">{{$defaults->text}}</p>
                <div class="clearfix"></div>
		@if($defaults->uploaded_to_you_tube ==0)
            	<div class="" id="myElement_{{$defaults->id}}" style="border: 10px solid #CCC;border-radius:10px;"> </div>

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
		@else
                	<div class="embed-responsive embed-responsive-16by9">
                	  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$defaults->youtube_id}}" frameborder="0" allowfullscreen></iframe>
                	</div>
		@endif
            <ul class="grid-menu pull-left">
              <li><a href="#"><i class="fa fa-heart-o" onclick="likecount({{ $defaults->id }},{{ $userid }},'video')" ></i>
		<span class="likebtn{{ $defaults->id }}video">{{ $likeNumber }}</span>
	     </a></li>
              <li><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo{{$p}}"><i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="http://auditionworldtv.com/talents/{{$defaults->id}}"></span></a></li>
              <li><a href="#"><i class="fa fa-eye"></i> {{  $viewNumber }} </a></li>
            </ul>
            <div class="clearfix"></div>         

			 <section class="comment-list panel-collapse collapse" id="collapseTwo{{ $p }}">
                       <div class="fb-comments" data-href="http://auditionworldtv.com/talents/{{$defaults->id}}" data-width="500px" data-numposts="5"></div>
                         </section>



     
              </article>
	@endforeach

	@foreach ($image_feed as $p=>$images)

     <?php    $likeNumber=GetLike($images->id,'image');
              $CommentNum=CountComment($images->id,'image');
                 if(!empty($CommentNum))
                            $comment_number=$CommentNum ; 
                  else
                          $comment_number=0;
               $viewNumber=GetViews($images->id,'image');
	      $posted_string=Findate($images->created_at);
      ?>
       <article class="white-panel"> 
	<span class="col-xs-11 row pull-left"> <a href="#">
	   @if(!empty($users->profile_pic))
                 <img src="/assets/profile/normal_{{$users->profile_pic}}" alt="">
            @endif
	    </a>
            <h1><a href="#">{{$users->name}}</a></h1>       
             <p class="time"><i class="fa fa-clock-o"></i> {{ $posted_string }}</p>
        </span>
        <div class="btn-group pull-right">
        <span><a href="#" onclick="deleteImages({{$images->id}})">
			<i data-original-title="Delete" class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title=""></i>
	</a></span>
        </div>
        <div class="clearfix"></div>
        <p class="detail">{{$images->text}}</p>
        <div class="clearfix"></div>
                <!--  /assets/protofolio/slider_{{$images->image_file}} -->
       <figure><a class="fancybox" rel="1" href="/assets/protofolio/{{$images->image_file}}" data-fancybox-group="gallery"><span><img src="{{'assets/protofolio/small_'.$images->image_file}}"></span></a></figure>
                <ul class="grid-menu pull-left">
                  <li><a href="#"><i class="fa fa-heart-o" onclick="likecount({{ $images->id }},{{ $userid }},'image')"></i><span class="likebtn{{ $images->id }}image"> {{ $likeNumber }}</span></a></li>
                  <li><a data-toggle="collapse" data-parent="#accordion" href="#demo_1{{ $p }}"><i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="http://auditionworldtv.com/talents/{{$images->id}}"></span></a></li>
                  <li><a href="#"><i class="fa fa-eye"></i> {{  $viewNumber }} </a></li>
                </ul>

<div class="clearfix"></div>
                         <section class="comment-list panel-collapse collapse" id="demo_1{{ $p }}">
                       <div class="fb-comments" data-href="http://auditionworldtv.com/talents/{{$images->id}}" data-width="500px" data-numposts="5"></div>
                         </section>


              </article>
		@endforeach
            </div>
          </div>
        </div>

<!-- .........................................Videos section.........................................-->
        
        <div class="tab-pane video-tab" id="tab_default_2">
          <div class="row">
<?php $result = count($default);?>
<?php $result_img = count($image);?>
            <div class="col-md-12">  
            <ul class="up-files">
		@if($result>=4)
 			<a title="Add Video" data-toggle="modal" data-target="#dialog"><li><div class="icon-1"><i class="fa fa-plus"></i> Add videos </div></li></a> 
		@else
              	  <a title="Add Video" data-toggle="modal" data-target="#addvideo"><li><div class="icon-1"><i class="fa fa-plus"></i> Add videos </div></li></a>     
		@endif          
            </ul>
            </div> 
@foreach ($default as $defaults) 
     <?php    $likeNumber=GetLike($defaults->id,'video');
              $CommentNum=CountComment($defaults->id,'video');
                 if(!empty($CommentNum))
                            $comment_number=$CommentNum ; 
                  else
                          $comment_number=0;
	    $viewNumber=GetViews($defaults->id,'video');
            $posted_string=Findate($defaults->created_at);

      ?>
            <div class="col-md-6 col-sm-6">
              <div class="col-md-12"> <span class="col-xs-11 row pull-left"> <a href="#">
			 @if(!empty($users->profile_pic))
	                     <img src="/assets/profile/normal_{{$users->profile_pic}}" alt="">
        	        @endif
			</a>
                <h1><a href="#">{{$users->name}}</a></h1>
                <p><i class="fa fa-clock-o"></i> {{ $posted_string }}</p>
		<p>{{ $defaults->text }} </p>
                </span> <span class="pull-right">
                <div class="btn-group pull-right">
                  <!--<button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>-->
		<span><a href="#" onclick="deleteVideos({{$defaults->id}})"><i data-original-title="Delete" class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title=""></i></a></span>
                </div>
                </span>
                <div class="clearfix"></div>
		@if($defaults->uploaded_to_you_tube ==0)
                   <div class="" id="myElement_1_{{$defaults->id}}" style="border: 10px solid #CCC;border-radius:10px;"></div>

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
       jwplayer("myElement_1_{{$defaults->id}}").setup({
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
        @else	
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$defaults->youtube_id}}" allowfullscreen="" frameborder="0"></iframe>
        </div>
	@endif
            <ul class="grid-menu pull-left">
              <li><a href="#"><i class="fa fa-heart-o" onclick="likecount({{ $defaults->id }},{{ $userid }},'video')" ></i><span class="likebtn{{ $defaults->id }}video">{{ $likeNumber }}</span> </a></li>
              <li><a href="/talentdetails/{{ $defaults->id }}"><i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="http://auditionworldtv.com/talentdetails/{{ $defaults->id }}"></span></a></li>
              <li><a href="#"><i class="fa fa-eye"></i> {{$viewNumber}}</a></li>
            </ul>
                <div class="clearfix"></div>
              </div>
            </div>
@endforeach
          </div>
        </div>

<!-- Add videos-->
        
          

<div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="addvideo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left">Add video to your profile</h4>
      </div>
      <div class="modal-body">         
	<form action="{{URL::to('upload_data')}}" enctype="multipart/form-data" method="post" class="vidupdate">   
<textarea onblur="changeplaceorg()" onfocus="placechange()" placeholder="Enter your thoughts about the video you are about to upload  :)" style="min-height:78px;border-color:#CCD1D9;padding-top:10px; margin-bottom:15px; " class="form-control" id="status_text" name="descri"></textarea>
	    <div class="form-group">
		      <input type="hidden" name="pagetype" id="eventid" value="profile">
<!--
		<div id="fileselectvideo">
		   <a style="text-decoration:none;" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video">
		      <span class="btn-file">
             		<input type="file" id="video"  name="up_data" accept="video/*"  >+Upload Video
                      </span>  
                  </a>
               </div>
-->
            <div class="browsw_div">
             <div id="fileselectvideo">
				<div class="bfd-dropfield">
		         <div class="bfd-dropfield-inner" style="height: 200px; padding-top: 56px;">  
                  <div class="col-md-12">
                   <div  id="fileselectvideo" class="fileUpload choose-btn">
                    <span><i class="fa fa-plus" aria-hidden="true"></i> Upload</span>
                    <input type="file" id="video" name="up_data" class="upload" accept="video/*">
                   </div>
                  </div>         
		         </div>
		        </div>
		     </div>      
            </div>
            
            
            
		<div id="onload_video" style="display:none;"><img src="assets/new_theme/images/ajax_loader2.gif" height='100px' width='150px'></div>
		<div id="video_prev"></div>
		<div id="video_load"></div>
	    </div>        
            <div class="clearfix"></div>
      </div>
     <div class="modal-footer">
           <button type="button" class="btn btn-primary pull-right"  id="video_ok_btn" onclick="videofrm();"><i class="fa fa-pencil-square-o"></i> Update</button>
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="cancelbtn_video">Cancel</button>
     </div>

	</form>
    </div>
  </div>
</div>




<!-- ...............................Images section ..........................................-->

  <div class="tab-pane photo-tab" id="tab_default_3">
   <div class="row">
 <div class="col-md-12">  
            <ul class="up-files">
@if($result_img>=10)
  <a title="" data-toggle="modal" data-target="#dialog"><li><div class="icon-2">Add Pictures </div></li></a> 
@else
                <a title="" data-toggle="modal" data-target="#addphoto"><li><div class="icon-2"><i class="fa fa-plus"></i> Add Pictures </div></li></a>  
@endif             
            </ul>
            </div>
    @foreach ($image as $images)

     <?php    $likeNumber=GetLike($images->id,'image');
              $CommentNum=CountComment($images->id,'image');
                 if(!empty($CommentNum))
                            $comment_number=$CommentNum ; 
                  else
                          $comment_number=0;
               $viewNumber=GetViews($images->id,'image');
		$posted_string=Findate($images->created_at);
      ?>

               <div class="col-md-3 col-sm-6">
              <div class="col-md-12"><span class="col-xs-11 row pull-left"> <a href="#">

                @if(!empty($users->profile_pic))
                        <img src="/assets/profile/normal_{{$users->profile_pic}}" alt="">
                @endif
    </a>
                <h1><a href="#">{{$users->name}}</a></h1>
                <!--<p class="time"><i class="fa fa-clock-o"></i> {{ $posted_string }}</p>-->

                </span>
                <div class="btn-group pull-right">
                 <span><a href="#" onclick="deleteImages({{$images->id}})"><i data-original-title="Delete" class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title=""></i></a></span>

                </div>
                <div class="clearfix"></div>
             <!--   <p class="detail">{{$images->text}}</p> -->
                <div class="clearfix"></div>

                <!--  /assets/protofolio/slider_{{$images->image_file}} -->
                <figure><a class="fancybox" rel="1" href="/talentdetails_images/{{$images->id}}" data-fancybox-group="gallery"><span><img src="{{'assets/protofolio/small_'.$images->image_file}}"></span></a></figure>
                <ul class="grid-menu pull-left">
                  <li><a href="#"><i class="fa fa-heart-o" onclick="likecount({{ $images->id }},{{ $userid }},'image')"></i><span class="likebtn{{ $images->id }}image"> {{ $likeNumber }}</span></a></li>
                  <li><a href="/talentdetails_images/{{$images->id}}"><i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="http://auditionworldtv.com/talentdetails_images/{{$images->id}}"></span></a></li>
                  <li><a href="#"><i class="fa fa-eye"></i> {{  $viewNumber }} </a></li>
                </ul>
             </div>
</div>
    @endforeach
         
        </div>
        </div>



<!-- Add photos -->


<div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="addphoto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left">Add photos to your profile</h4>
      </div>
      <div class="modal-body">         
	<form action="{{URL::to('upload_data')}}" enctype="multipart/form-data" method="post" class="imgupdate">   


<textarea onblur="changeplaceorg()" onfocus="placechange()" placeholder="Enter your thoughts about the image you are about to upload  :)" style="min-height:78px;border-color:#CCD1D9;padding-top:10px; margin-bottom:15px; " class="form-control" id="status_text_img" name="descri"></textarea>


	    <div class="form-group">
		      <input type="hidden" name="pagetype"  value="profile">
<!--
		<div id="fileselect">
		   <a style="text-decoration:none;" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video">
		      <span class="btn-file">
             		<input type="file" id="files"  name="up_data" accept="image/*"  >+Upload Photo
                      </span>  
                  </a>
               </div>
-->
		   <div class="browsw_div">
             <div id="fileselect">
				<div class="bfd-dropfield">
		         <div class="bfd-dropfield-inner" style="height: 200px; padding-top: 56px;">  
                  <div class="col-md-12">
                   <div class="fileUpload choose-btn">
                    <span><i class="fa fa-plus" aria-hidden="true"></i> Upload</span>
                    <input type="file" id="files" name="up_data" class="upload" accept="image/*">
                   </div>
                  </div>         
		         </div>
		        </div>
		     </div>      
            </div>

		<div id="img_prev"></div>
		<div id="onload_image" style="display:none;"><img src="assets/new_theme/images/ajax_loader2.gif" height='100px' width='150px'></div>
		<div id="img_load"></div>
	    </div>        
            <div class="clearfix"></div>
      </div>
     <div class="modal-footer">
           <button type="button" class="btn btn-primary pull-right"  disabled='true' id="pvbtn" onclick="imgfrm();"><i class="fa fa-pencil-square-o"></i> Update</button>
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="cancelbtn_image">Cancel</button>
     </div>

	</form>
    </div>
  </div>
</div>

<!-- ...................................... About me section.................................. -->


        <div class="tab-pane active about-me" id="tab_default_4">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <h1>Profile Details</h1>
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Language Known <span class="pull-right">:</span></td>
                      <td>{{$users->language}}</td>
                    </tr>
                   <!-- <tr>
                      <td>Preferred Location <span class="pull-right">:</span></td>
                      <td>Kerala</td>
                    </tr>-->
                  <!--  <tr>
                      <td>Experience <span class="pull-right">:</span></td>
                      <td>Modeling & Acting</td>
                    </tr> -->
                  </tbody>
                </table>
                <h1>Physical Details</h1>
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Complexion <span class="pull-right">:</span></td>
                      <td>{{$users->color}}</td>
                    </tr>
                    <!--<tr>
                      <td>Skin Quality <span class="pull-right">:</span></td>
                      <td>Clear</td>
                    </tr> -->
                    <tr>
                      <td>Eye Color <span class="pull-right">:</span></td>
                      <td>{{$users->eye}}</td>
                    </tr>
                    <tr>
                      <td>Height<span class="pull-right">:</span></td>
                      <td>{{$users->height_feet}} Foot {{$users->height_inch}} Inch</td>
                    </tr>
                    <tr>
                      <td>Weight<span class="pull-right">:</span></td>
                      <td>{{$users->weight}} Kgs</td>
                    </tr>
                   <!-- <tr>
                      <td>Facial Hair<span class="pull-right">:</span></td>
                      <td>None</td>
                    </tr>-->
                    <tr>
                      <td>Hair Style<span class="pull-right">:</span></td>
                      <td>{{$users->hair}}</td>
                    </tr>
                   <!-- <tr>
                      <td>Hair Color<span class="pull-right">:</span></td>
                      <td>Black</td>
                    </tr>
                    <tr>
                      <td>Hair Length<span class="pull-right">:</span></td>
                      <td>Medium</td>
                    </tr>-->
                  </tbody>
                </table>
              </div>
              <div class="col-md-6">
                <h1>Experience & Acheivements</h1>
                <ul class="timeline">
                  <li class="timeline-inverted">
                    <div class="timeline-badge"><i class="fa fa-trophy"></i></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4 class="timeline-title">School Level</h4>
                      </div>
                      <div class="timeline-body">
                        <p>{{$users->school_level}}</p>
                      </div>
                    </div>
                  </li>
                  <li class="timeline-inverted">
                    <div class="timeline-badge"><i class="fa fa-trophy"></i></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4 class="timeline-title">College Level</h4>
                      </div>
                      <div class="timeline-body">
                        <p>{{$users->college_level}}</p>
                      </div>
                    </div>
                  </li>
			<li class="timeline-inverted">
                    <div class="timeline-badge"><i class="fa fa-trophy"></i></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4 class="timeline-title">Work Level</h4>
                      </div>
                      <div class="timeline-body">
                        <p>{{$users->work_level}}</p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="{{asset('assets/new_theme/js/jquery.min.1.11.1.js')}}"></script> 
<script src="{{asset('assets/new_theme/js/bootstrap.min.js')}}"></script> 
<script src="assets/new_theme/js/pinterest_grid.js"></script> 
<script>
        $(document).ready(function() {

            $('.talent-grid').pinterest_grid({
                no_columns: 2,
                padding_x: 30,
                padding_y: 30,
                margin_bottom: 100,
                single_column_breakpoint: 700
            });
        });
    </script> 
<script>
   $(".progress-bar").animate({
    width: "{{$percentage}}%"
}, 2500 );   
    
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

</script> 






<script>

function likecount(a,b,c){

            $.ajax({
                      url : "liketalent",
                      type: "POST",
                      data:{itemid:a,userid:b,type:c},
                      success: function(data)
                      {
                         $(".likebtn"+a+c).html(data);
                      }
                  });


}

</script>

<script>

function placechange(){


$('#status_text').attr('placeholder', ' ');
$('#status_text_img').attr('placeholder','');

}


function changeplaceorg(){

$('#status_text').attr('placeholder', 'Enter your thoughts about the video you are about to upload  :)');
$('#status_text_img').attr('placeholder','Enter your thoughts about the video you are about to upload  :)');

}

</script>



<script>


function test1fg(){


$(".mydiv" ).html("<img src='assets/new_theme/images/ajax_loader2.gif' height='100px' width='150px'>");

 $(".custom").submit();

}
</script>

<script>

function deleteImages(a){

 	   $.ajax({
                      url : "delete_myimages/"+a,
                      type: "POST",
                      success: function(data)
                      {
                        window.location.reload();
                      }
                  });



}

function deleteVideos(a){


$.ajax({
                      url : "delete_myvideos/"+a,
                      type: "POST",
                      success: function(data)
                      {
                        window.location.reload();
                      }
                  });


}



</script>
<script>


function imgfrm(){

$("#img_prev" ).hide();
$("#onload_image").show();
$("#removeimg").hide();
$('#cancelbtn_image').prop("disabled", true);
$(".imgupdate").submit();

}


function videofrm(){

$("#video_prev" ).hide();
$("#onload_video").show();
#("#removevideo").hide();
$('#cancelbtn_video').prop("disabled", true);
$(".vidupdate").submit();

}



function handleFileSelect(evt) {
    var files = evt.target.files;
    for (var i = 0, f; f = files[i]; i++) {
	      if (!f.type.match('image.*')) {
		continue;
	      }
   	   var reader = new FileReader();
	   $("#fileselect").hide();
		
$( "#img_load" ).html("<div class='col-xs-7 col-sm-4 bfd-info'> <span id='removeimg' class='fa fa-times-circle bfd-remove'></span>  "+ f.name +" </div><div class='col-xs-5 col-sm-8 bfd-progress'>  <div class='progress'> <div id='n' class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='" + f.size + "'> <span class='sr-only'>0%</span> </div></div></div>");

$( "#img_load" ).show();
$("#removeimg").click(function(){
	 $("#fileselect").show();
	 $( "#img_prev" ).hide();
         $( "#img_load" ).hide();
         $('#pvbtn').prop("disabled", true); 
});

 	   reader.onprogress = function(f) {
                    var o = Math.round(100 * f.loaded / f.total) + "%";
                   $("#n").attr("aria-valuenow", f.loaded), $("#n").css("width", o);
                };
   	   reader.onload = (function(theFile) {
		return function(e) {
			  $( "#img_prev" ).html( "<img src='"+e.target.result+"' height='250px' width='350px'>" );	
			  $( "#img_prev" ).show();
			  $("#n").attr("aria-valuenow", e.total), $("#n").css("width", e.total);
 			  $('#pvbtn').prop("disabled", false); 			    
		};
      })(f);
      reader.readAsDataURL(f);
    }
  }

 document.getElementById('files').addEventListener('change', handleFileSelect, false);



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
	alert('Maximum filesize in 10MB');
	break;
	}
  	var reader = new window.FileReader();
	
$("#fileselectvideo").hide();	
$( "#video_load" ).html("<div class='col-xs-7 col-sm-4 bfd-info'> <span id='removevideo' class='fa fa-times-circle bfd-remove'></span>  "+ f.name +" </div><div class='col-xs-5 col-sm-8 bfd-progress'>  <div class='progress'> <div id='m' class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='" + f.size + "'> <span class='sr-only'>0%</span> </div></div></div>");

$( "#video_load" ).show();
$("#removevideo").click(function(){
       $("#fileselectvideo").show();
       $( "#video_prev" ).hide();
       $( "#video_load" ).hide();
	 $('#video_ok_btn').prop("disabled", true);       
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
		  $('#video_ok_btn').prop("disabled", false);             
        };       
      })(f);

      reader.readAsDataURL(f);

    }

  }

 document.getElementById('video').addEventListener('change', handleVideoSelect, false);


</script>
<script src="assets/new_theme/js/jquery.fancybox.pack.js"></script>
@stop



