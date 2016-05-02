@extends('layouts.new_temp')
@section('title')
About Audition World
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


@if(Auth::check())
   <?php $userid= Auth::user()->id; 
	 $user_type=Auth::user()->user_type;
   ?>
@endif

@if(!empty($_REQUEST['tab']) && $_REQUEST['tab']=='videos')
<?php $ac= $_REQUEST['tab']; ?>
@elseif(!empty($_REQUEST['tab']) && $_REQUEST['tab']=='photos')
<?php $ac= $_REQUEST['tab']; ?>
@else
<?php  $ac='nore';?>
@endif





<section class="profile-head">

<div id="fb-root"></div>
<script>

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>


  <div class="container">
    <div class="row">
      <div class="col-md-6 profile-pic">
        <div class="media">
          <div class="media-left media-middle">
               <figure><a href="{{asset('/assets/profile/normal_'.$users->profile_pic)}}">
                      @if(!empty($users->profile_pic))
                      <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="">
                      @else
                       <img src="images/top-two.jpg" alt="">
                      @endif
                      </a>
            </figure>
            </div>
            <div class="media-body media-middle">
                    <h1>{{$users->name}}</h1>
                    <h2>Actor / Director</h2>
                    <p>{{$users->about_me}}</p>
            </div>
        </div>
      </div>
<?php if(!empty(Auth::user()->id))
           {
                  $id = Auth::user()->id;
                  $UserType=getLoggedUserType($id); 
                  if($UserType=='Audition Manager'){
                     $flag=1;
                  }
                  else{
                    $flag=0;
                 }       
           }
          
          else{
            $flag=0;
          }
?>

@if($flag==1)
      <div class="col-md-6 profile-txt">
        <div class="row">
          <div class="col-md-6">
            <p>Gender :  {{$users->gender}}</p>
            <p>DOB : {{$users->dob}}</p>
          </div>
          <div class="col-md-6">
            <p>Mobile : {{$users->phone}} <span> <?php if($users->mobile_verified){ ?>
                            <i class="fa fa-check-circle"></i>
                          <?php } ?></i></span></p>
            <p>Email:{{$users->email}} </p>
          </div>
        </div>
        <h4>Profile Level</h4>
        <div class="progress progress-striped active">
          <div class="progress-bar" role="progressbar"> {{$percentage}}%</div>
        </div>
      </div>
@endif
      <div class="clearfix"></div>
      <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
           <li id="aboutmetab"class="active"><a href="#tab_default_4" id="aboutme" data-toggle="tab"><i class="fa fa-user"></i> About me</a></li>
             <li id="videostab"><a href="#tab_default_2" id="videostab" data-toggle="tab"><i class="fa fa-video-camera"></i> Videos</a></li>
            <li id="photostab"><a href="#tab_default_3" id="phototab" data-toggle="tab"><i class="fa fa-camera"></i> Photos</a></li>
           <li id="allposttab" ><a href="#tab_default_1" id="allpost" data-toggle="tab"><i class="fa fa-pencil-square-o"></i> All Posts</a></li>
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
<!-- .............................................tab default 1.   All posts............................-->
        <div class="tab-pane video-tab " id="tab_default_1">
          <div class="row">
          <div class="talent-grid">
              @foreach ($default_feed as $l => $defaults) 
                <?php      
			   $posted_string=Findate($defaults->created_at);
			   $commentcount=getComment($defaults->id,'video'); 
                           $CommentNum=CountComment($defaults->id,'video');
                           $likeNumber=GetLike($defaults->id,'video');
                            $viewNumber=GetViews($defaults->id,'video');
                                        if(!empty($CommentNum))
                                             $comment_number=$CommentNum ; 
                                        else
                                           $comment_number=0;
                     ?>
                    <article class="white-panel"> 
                          <span class="col-xs-11 row pull-left"> 
                              <a href="#">
                                  @if(!empty($users->profile_pic))
                                    <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="no image">
                                  @endif
                               </a>
                               <h1><a href="#">{{$users->name}}</a></h1>
                                 <p class="time"><i class="fa fa-clock-o"></i> {{ $posted_string }}</p>
                          </span>
<!--<div class="btn-group pull-right">   
	<button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
				  <ul class="dropdown-menu">
						@if(!empty($userid) && $userid==$users->id)
							<li><a href="#">Delete</a></li>
						 @else
							 <li><a href="#" title="Report Abuse" data-toggle="modal" data-target="#report_spam" >Report Post</a></li>
						@endif
				   </ul>
</div>--> 
                    <div class="clearfix"></div>
                     <p class="detail">{{$defaults->text}}</p>
                     <div class="clearfix"></div>
                         @if($defaults->uploaded_to_you_tube ==0 ||  ($you_tube->you_tube ==0))
			     <div id="demo" onclick="viewItem({{ $defaults->id }})">
                                      <div class=""  id="myElement_{{$defaults->id}}" style="border: 10px solid #CCC;border-radius:10px;">
                                      </div>
			    </div>
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
                                                   file: "{{   $protocol }}",
                                                    image: "/assets/thumbnails/{{$defaults->thumbnail}}",
                                                   skin: { name: "bekle" },
                                                   autoplay : true,
                                                   width: "100%",
						  logo: { hide: 'true' },
                                                  aspectratio: "12:5",
                                               });
                                            </script>                                 
                                @else
                                     <div onclick="viewItem({{ $defaults->id }},'video')" class="embed-responsive embed-responsive-16by9">
                                          <iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/{{$defaults->youtube_id}}?modestbranding=1&controls=0&rel=0" frameborder="0" allowfullscreen></iframe>
                                     </div>
                                @endif
                             
                          <ul class="grid-menu pull-left">
                            @if(!empty($userid))
                                <li ><a href="#"><i class="fa fa-heart-o " onclick="likecount({{ $defaults->id }},{{ $userid }},'video')"></i><span class="likebtn{{ $defaults->id }}video"> {{ $likeNumber }}</span></a></li>                                
                            @else
                                <li ><a href="#"><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </a></li>                               
                            @endif

                      <!--      <li><a href="/talentdetails/{{$defaults->id }}"> <i class="fa fa-comment-o"></i> {{ $comment_number }}</a></li>-->

           <li><a data-toggle="collapse" data-parent="#accordion" href="#demo{{ $l }}"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="http://auditionworldtv.com/talents/{{$defaults->id}}"></span></a></li>


                            <li><a href="#"><i class="fa fa-eye"></i> <span class="viewnum{{$defaults->id }}">{{  $viewNumber }}</span></a></li>
                          </ul>
                        <div class="clearfix"></div>
                         <section class="comment-list panel-collapse collapse" id="demo{{ $l }}">
                       <div class="fb-comments" data-href="http://auditionworldtv.com/talents/{{$defaults->id}}" data-width="500px" data-numposts="5"></div>
                         </section>
                </article>
            @endforeach

            @foreach ($image_feed as $p=>$images)
               <?php 
                           $posted_string=Findate($images->created_at);
			   $CommentNum=CountComment($images->id,'image');
                           $likeNumber=GetLike($images->id,'image');
                            $viewNumber=GetViews($images->id,'image');
                                        if(!empty($CommentNum))
                                             $comment_number=$CommentNum ; 
                                        else
                                           $comment_number=0;

                     ?>
                          <article class="white-panel"> 
                           <span class="col-xs-11 row pull-left"> <a href="#">
                                @if(!empty($users->profile_pic))
                                       <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="no image">
                               @endif
                              </a>
                             <h1><a href="#">{{$users->name}}</a></h1>
                            <p class="time"><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
                        </span>
                     <div class="clearfix"></div>
                      <p class="detail">{{$images->text}}</p>
                     <div class="clearfix"></div>
<a href="/talentdetails_images/{{$images->id}}"><figure > <span><img src="{{asset('/assets/protofolio/slider_'.$images->image_file)}}"></span> </figure></a>                   
<ul class="grid-menu pull-left">
                             @if(!empty($userid))
                                <li ><a href="#"><i class="fa fa-heart-o " onclick="likecount({{ $images->id }},{{ $userid }},'image')"></i><span class="likebtn{{ $images->id }}image"> {{ $likeNumber }}</span></a></li>                                
                            @else
                                <li ><a href="#"><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </a></li>                         
                            @endif
                          <!--  <li><a  href="/talentdetails_images/{{$images->id}}"><i class="fa fa-comment-o"></i> {{ $comment_number }}</a></li>-->
		         <li><a data-toggle="collapse" data-parent="#accordion" href="#demo_1{{ $p }}"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="http://auditionworldtv.com/talents/{{$images->id}}"></span></a></li>


                            <li><a href="#"><i class="fa fa-eye"></i>  <span class="viewnum{{ $images->id }}"> {{  $viewNumber }} </span> </a></li>
</ul>

  <div class="clearfix"></div>
                         <section class="comment-list panel-collapse collapse" id="demo_1{{ $p }}">
                       <div class="fb-comments" data-href="http://auditionworldtv.com/talents/{{$images->id}}" data-width="500px" data-numposts="5"></div>
                         </section>

         </article>
    @endforeach


@if(empty($image_feed) && empty($default_feed))



<div style="margin-left:15px; margin-right:15px; padding-top:15px; padding-bottom:15px; background-color:#fff; text-align:center; margin-top:40px;">  
     
There are no more posts.
 </div> 



@endif
          </div>
          </div>
       </div>
<!--..........................................tab default 1 closed...   Videoss...........................................-->

     <div class="tab-pane video-tab" id="tab_default_2">
        <div class="row">
          @if(!empty($user_type) && $user_type=='Audition Manager')	
          @foreach ($default as $defaults) 
            <?php 
			   $posted_string=Findate($defaults->created_at);
                           $CommentNum=CountComment($defaults->id,'video');
                           $likeNumber=GetLike($defaults->id,'video');
                           $viewNumber=GetViews($defaults->id,'video');
                                        if(!empty($CommentNum))
                                             $comment_number=$CommentNum ; 
                                        else
                                          $comment_number=0;
                     ?>
             <div class="col-md-6 col-sm-6">
               <div class="col-md-12"> 
                 <span class="col-xs-11 row pull-left"> 
			<a href="#">
		            @if(!empty($users->profile_pic))
		                  <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="">
		             @endif
		         </a>
               		 <h1><a href="#">{{$users->name}}</a></h1>
                <p><i class="fa fa-clock-o"></i>{{  $posted_string }}</p>
               </span> 
                <div class="clearfix"></div>
                      @if($defaults->uploaded_to_you_tube ==0 ||  ($you_tube->you_tube ==0))
					<div id="demo" onclick="viewItem({{ $defaults->id }},'video')">
				                   <div class=""  id="myElement_1_1_1_{{$defaults->id}}" style="border: 10px solid #CCC;border-radius:10px;">
				                  </div>
				      </div>
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
		                           jwplayer("myElement_1_1_1_{{$defaults->id}}").setup({
		                               primary: "flash",
		                               file: "{{ $protocol }}",
					       image: "/assets/thumbnails/{{$defaults->thumbnail}}",
		                               skin: { name: "bekle" },
		                               autoplay : true,
		                               width: "100%",
					       logo: { hide: 'true' },
	      				       aspectratio: "12:5",
		                           });
		                   </script>
                     @else                  
                               <div class="embed-responsive embed-responsive-16by9" onclick="viewItem({{ $defaults->id }},'video')" >
                                	  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$defaults->youtube_id}}?modestbranding=1&controls=0&rel=0" allowfullscreen="" frameborder="0"></iframe>
                                </div>
                    @endif
                     <ul class="grid-menu pull-left">
                            @if(!empty($userid))
                               	 <li ><a href="#"><i class="fa fa-heart-o " onclick="likecount({{ $defaults->id }},{{ $userid }},'video')"></i><span class="likebtn{{ $defaults->id }}video"> {{ $likeNumber }}</span></a></li>                                
                            @else
                                	<li ><a href="#"><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </a></li>                         @endif
                          	  <li><a  href="/talentdetails/{{ $defaults->id }}"><i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="http://auditionworldtv.com/talentdetails/{{ $defaults->id }}"></span></a></li>
                          	  <li><a href="#"><i class="fa fa-eye"></i> <span class="viewnum{{$defaults->id }}">{{  $viewNumber }}</span></a></li>
                     </ul>
                <div class="clearfix"></div>
              </div>
            </div>
    @endforeach

@else
 
<div style="margin-left:15px; margin-right:15px; padding-top:15px; padding-bottom:15px; background-color:#fff; text-align:center; margin-top:40px;">  
     
 {{$users->name}} hasn't shared anything with you.

People are more likely to share with you if you are  Audition Manager.
 </div>           

@endif
          </div>
        </div>

<!--.................................................tab default 2 closed.......... Imagesss..................................-->

        <div class="tab-pane photo-tab video-tab" id="tab_default_3">
          <div class="row">
           @if(!empty($user_type) && $user_type=='Audition Manager')
                @foreach ($image as $images) 
                  <?php 
			   $createddate=Findate($images->created_at);
                           $CommentNum=CountComment($images->id,'image');
                           $likeNumber=GetLike($images->id,'image');
                            $viewNumber=GetViews($images->id,'image');
                                        if(!empty($CommentNum))
                                             $comment_number=$CommentNum ; 
                                        else
                                           $comment_number=0;
                     ?>
		<div class="col-md-3 col-sm-6">
              <div class="col-md-12"> <span class="col-xs-11 row pull-left"> <a href="#"> <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="no image"></a>
                <h1><a href="#">{{$users->name}}</a></h1>
                <div class="clearfix"></div>
                </span> 
                <div class="clearfix"></div>
               <a href="/talentdetails_images/{{$images->id}}">  <div class="ovrflw-image">
                  <img src="{{asset('/assets/protofolio/slider_'.$images->image_file)}}">
                </div>
</a>
                <ul class="grid-menu pull-left">

				  @if(!empty($userid))
                               	 <li ><a href="#"><i class="fa fa-heart-o " onclick="likecount({{ $images->id }},{{ $userid }},'image')"></i><span class="likebtn{{ $images->id }}image"> {{ $likeNumber }}</span></a></li>                                
                            @else
                                	<li ><a href="#"><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </a></li>                         @endif
                
                 <!-- <li><a  href="/talentdetails_images/{{$images->id}}"><i class="fa fa-comment-o"></i>  {{ $comment_number }}</a></li>-->

		<li><a href="/talentdetails_images/{{$images->id}}"><i class="fa fa-comment-o"></i>    <span class="fb-comments-count" data-href="http://auditionworldtv.com/talentdetails_images/{{ $images->id }}"></span></a></li>


                  <li><a href="#"><i class="fa fa-eye"></i> {{  $viewNumber }}</a></li>
                </ul>
                <div class="clearfix"></div>
              </div>
            </div>
    @endforeach

@else
              
 <div style="margin-left:15px; margin-right:15px; padding-top:15px; padding-bottom:15px; background-color:#fff; text-align:center; margin-top:40px;">  
{{$users->name}} hasn't shared anything with you.

People are more likely to share with you if you are  Audition Manager.
              </div>

@endif
         
        </div>
        </div>
<!--.............................................tab default 3 closed....  About me...........................................-->

        <div class="tab-pane about-me active" id="tab_default_4">
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
                    <!--<tr>
                      <td>Preferred Location <span class="pull-right">:</span></td>
                      <td>Kerala</td>
                    </tr>
                    <tr>
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
                   <!-- <tr>
                      <td>Skin Quality <span class="pull-right">:</span></td>
                      <td>Clear</td>
                    </tr>-->
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
 @if(!empty($users->profile_video))
  <div style="margin-bottom:15px;" class="embed-responsive embed-responsive-16by9">

 <div class=""  id="profile_video_1" style="border: 10px solid #CCC;border-radius:10px;">
                                      </div>
                                         <script type="text/javascript">
                                               jwplayer("profile_video_1").setup({
                                                 primary: "flash",
                                                   file: "/assets/event_video/{{  $users->profile_video }}",
                                                    image: "/assets/profile/normal_{{$users->profile_pic}}",
                                                   skin: { name: "bekle" },
                                                   autoplay : true,
                                                   width: "100%",
						  logo: { hide: 'true' },
                                                  aspectratio: "12:5",
                                               });
                                            </script>   
               </div>
@endif
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
<!--.................................tab default 4 closed....................................-->
      </div>
    </div>
  </div>
</section>
<script src="{{asset('assets/new_theme/js/jquery.min.1.11.1.js')}}"></script> 
<script src="{{asset('assets/new_theme/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('assets/new_theme/js/pinterest_grid.js')}}"></script> 
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

<script type="text/javascript">
  
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



function viewItem(a){
             $.ajax({
                      url : "../viewitem",
                      type: "POST",
                      data:{itemid:a},
                      success: function(data)
                      {
                        $(".viewnum"+a).html(data);
                      }
                  });

}


function checklog1(){

  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
  var email   = document.getElementById('logemail').value;
  var password   = document.getElementById('logpass').value;
  if(email==''){

   document.getElementsByName('email')[0].placeholder='Please enter email';
   $("#logemail").addClass("holder_color");
   return false;
  }
  if(password==''){
   document.getElementsByName('password')[0].placeholder='Please enter password';
   $("#logpass").addClass("holder_color");
   return false;
  }
  if(!email.match(mailformat))  
  {   
    $("#logemail").val("");
    document.getElementsByName('email')[0].placeholder='Please enter a valid email';
     $("#logemail").addClass("holder_color");
    return false;
   } 
   $.ajax({
          url : "../authenticate",
          type: "POST",
          data:{email:email,password:password},
          dataType: "json",
          success: function(data, textStatus, jqXHR)
          {
            // var obj = jQuery.parseJSON(data);
            // alert(data);
            // console.log(obj);
             console.log(data.id);
               if(data.status == "invalid"){ 
                  $("#invalid").html("Invalid username and Password or <br>You may not verified your mail id");
                  return false;
                }
                if(data.user == "admin"){
                  window.location="/users";
                  return false;
                }
    if(data.user == 'Audition Manager'){
      window.location="myauditions";
      return false;
    }
                if((data.log_count =="0")&&(data.user == "user")){
                   window.location = "/myprofile";
                  return false;
                }else{
                   window.location = "/";
                }

          }
          
  });
}




</script>

<script>
 $(document).ready(function() {

var ta="<?php echo $ac ?>";

if(ta=='videos'){


$("#aboutmetab").removeClass( "active" );
$("#videostab" ).addClass("active" );
$("#tab_default_4").removeClass("active");
$("#tab_default_2").addClass("active");

}

if(ta=='photos'){

$("#aboutmetab").removeClass( "active" );
$("#tab_default_4").removeClass("active");
$("#photostab" ).addClass("active" );
$("#tab_default_3").addClass("active");


}

});


</script>
<script src="{{asset('assets/new_theme/js/jquery.fancybox.pack.js')}}"></script>
@stop



