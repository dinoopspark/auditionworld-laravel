@extends('layouts.player')

@section('main')
<!--Player-left-->
 <div class="player-lft">
  @foreach($video as $videos)
   <?php $url = "/videoplayer/".$videos->vid; ?>
 <div class="vid-title">
 <div class="vid-title-lft"> <img style="width:61px;height:61px" src="/assets/profile/normal_{{ $videos->profile_pic}}">  </div>
 <div class="vid-title-rgt">
 <h1> {{$videos->name}}</h1>
 <!-- <p>From <span> Philip Boom</span> added <em> 2 Days ago</em> </p> -->
 
  </div>
 </div>
 <div class="video-play-out">

 <?php
        $stream="";
        $url="";
  $streaming_server_ip=  Config::get('app.streaming_server_ip');
  $streaming_app_name = Config::get('app.streaming_app_name');
  $info = pathinfo($videos->video_file);
    $streaming_format_flv = Config::get('app.streaming_format_flv');
    $streaming_format_mp4 = Config::get('app.streaming_format_mp4');
   if($videos->converted ==1){
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
				 $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$videos->video_file."/playlist.m3u8";
                              //  $protocol = "rtmp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$videos->video_file;

                        } else{
                                //$protocol = 'rtmp://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$videos->video_file;
				 $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$videos->video_file."/playlist.m3u8";
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
  <?php
        if(!($Android)){

  ?>
         <?php if($videos->uploaded_to_you_tube ==1){ ?>
                <iframe width="100%" height="380" src="//www.youtube.com/embed/<?php echo $videos->youtube_id ?>" frameborder="0" allowfullscreen></iframe>
         <?php }?>


        </div>
         <?php if($videos->uploaded_to_you_tube ==0){ ?>
      <script type="text/javascript" src="/assets/js/jwplayer/jwplayer.js"></script>
       <script type="text/javascript">
       jwplayer("myElement").setup({
           file: "{{$protocol}}",
           image: "/assets/thumbnails/player_{{$videos->thumbnail}}",
           skin: "/assets/js/jwplayer/roundster.xml",
           height: 360,
           width: 740,
           primary: "flash"
       });  
        
     </script>
        <?php }?>
<?php } else { ?>
    <div class="playerhome" id="myElement" style="width:100%;height:400px;border: 10px solid #CCC;border-radius:10px;">
        <?php if($videos->uploaded_to_you_tube ==1){ ?>
                <iframe width="100%" height="380" src="//www.youtube.com/embed/<?php echo $videos->youtube_id ?>" frameborder="0" allowfullscreen></iframe>
         <?php } else{?>
        <a href="<?php echo $protocol;?>">
                <img  src="/assets/thumbnails/{{$videos->thumbnail}}" height="380" width="100%"> 
                <img class="OverlayIcon_1" src="/assets/css/play-button.png" alt="" />
        </a>
        <?php }?>
    </div>

<?php } ?>

</div>

    @if (Auth::check())
         <?php $visitor = Auth::user()->id;?>
	<input type="hidden" value="normal_{{Auth::user()->profile_pic}}" id="profile_pic_user">
        <input type="hidden" value="{{Auth::user()->name}}" id="name_user">
    @else
        <?php $visitor = $_SERVER['REMOTE_ADDR']; ?>
    @endif
<div class="coment-titl"> Comments</div>
<div class="lik-n-share">

<div class="fb-like" data-href="{{$url}}" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>




</div> 
<div>
<textarea name="comments" cols="" videoType="events" video="{{$videos->videoid}}" id="comments" rows="" class="coment-field"></textarea>
<a href="javascript:;" class="close_post"><img src="/assets/images/close-button.png"></a>
</div>
<div class="posty-button myButton"> Post your comments</div>
@endforeach




<div class="comnt-outer">
  <div class="flash"> </div>
  <div id="loading"></div>
<h1 id="comment_count" count="{{$commentval}}"> {{$commentval}} Comments </h1>
 @foreach($comment as $comments)
<div class="cmnt-row" id="comment_{{$comments->id}}">
 <?php if(empty($comments->profile_pic)){ $comments->profile_pic = 'default.jpg';} ?>
<div class="cmnt-lft"> <img src="/assets/profile/{{$comments->profile_pic}}" style="height:56px;width:56px;"> </div>
 @if(Auth::check())
  @if(Auth::user()->id == $comments->user_id )
    <a title="delete" href="javascript:;" class="comment_close" commentId = "{{$comments->id}}" onclick="deleteComment({{$comments->id}})"><img src="/assets/images/close-button.png"></a>
  @endif
 @endif
  <?php
      $now = time();
      $your_date = strtotime($comments->created_at);

      $datediff = $now - $your_date;
      $days = floor($datediff/(60*60*24));
	if(!isset($comments->name)){$comments->name = $comments->guest_name;}
      if($days == 0){
 ?>
          <div class="cmnt-rgt"> <h6>  {{$comments->name}} <span> Today</span> </h6>
  <?php } else { ?>
          <div class="cmnt-rgt"> <h6>  {{$comments->name}} <span> {{$days}} Days ago</span> </h6>
  <?php } ?>
  <p>{{$comments->comment}}</p>
 </div></div>
 @endforeach
 
 


 </div>


  </div>
 
 
              
              
    <!--suggested play list-->   
     <div class="player-right"> 
     
     <div class="top-vd-1">
        @foreach($video as $videos)
          @if(!empty($sql))   
              <h1 class="othr-video-h1">Videos by  {{$videos->name}}</h1>
          @endif
          <h1 class="othr-video-h1 mar-lft1">Portfolio of {{$videos->name}}</h1>
      @endforeach
     </div>
     @if(!empty($sql))
     @foreach($sql as $other)
     <div class="lts-vido frst-vido-thumn"> 
       <a href="/videoplayer/{{$other->id}}">
            <img src="/assets/thumbnails/{{$other->thumbnail}}" >
        </a>  
     </div>
     @endforeach
     @endif
     
   
     
     <div class="lts-img"> 
    
     <?php 
    $count = count($images);
    $i = 0;
     ?>
      @foreach($images as $image)
        <?php $i++; ?>
        @if($count != $i)
          <img src="/assets/protofolio/small_{{$image->image_file}}" class="lts-img3"> 
        @else

          <a class="fancybox-thumbs" data-fancybox-group="thumb1" 
            href="/assets/protofolio/real_{{$image->image_file}}"> 
            <img src="/assets/protofolio/small_{{$image->image_file}}" class="lts-img4">
          </a>
        @endif
      @endforeach
      @foreach($images as $image)
      
        <div style="display:none">
    
          <a style="display:none" class="fancybox-thumbs hidden" data-fancybox-group="thumb1" href="/assets/protofolio/real_{{$image->image_file}}">
          <img src="/assets/protofolio/slider_{{$image->image_file}}" alt="" />
          </a>
        </div>
     @endforeach
     </div>
     
         <div class="space-gen2"> </div>
     
     <div class="split"> </div>
     
     <h1 class="othr-video-h1 no-flt">Other Latest Video </h1>
     <?php $div_number = 0; ?>
      @foreach($popular as $populars)
          <?php $div_number ++;
          if($div_number %2 ==0){ 
            echo '<div class="lts-vido even_thumb">'; 
          } else { 
            echo '<div class="lts-vido">'; 
          } ?>
          <a href="/eventplayer/{{$populars->vid}}">
                <img src="/assets/thumbnails/{{$populars->thumbnail}}">
            </a> 
     <p>{{$populars->name}} </p></div>
     @endforeach
     </div>
            
            



            
            <div class="space-gen2"> </div>
            
            
        </div>
        
        
        
  
        

         
         
         







 </div>
 
<!--comment popup-->
            <div class="overlay1"></div>


            <form action="" method="POST" id="applynow-form">

            <div id="model_comment" class="modal model_comment" style="display:none">

            <div id='confirm'>


              <div class="pop-row">
              <div class="pop-left">  Comment </div>
               <div class="pop-right" id="Audname">  </div>
               <input type="hidden" name="event_id" id="Audid" value="">
               </div>


              <div class="pop-row">
              <div class="pop-left">Enter mail id </div>
               <div class="pop-right">      <div class="apply-upld">
                <input name="username" type="text" id="guest_email" class="guest-coment-field-email reg-martop input_guest" placeholder="Email ID" />
                         </div>
               </div>
               </div>

              <div class="pop-row">
              <div class="pop-left">Enter name </div>
               <div class="pop-right">      <div class="apply-upld">
                <input name="name" type="text" id="guest_name" class="guest-coment-field-email reg-martop input_guest" placeholder="Name" />
                         </div>
               </div>
               </div>


               <div class="pop-row">
              <div class="pop-left"><p id="error_msg" style="color:red"> </p>    </div>
               <div class="pop-right">


                <input  class="pop-apply" value="Submit" type="button" onclick="authenticatesignature()">


                </div>
               </div>

              </form>
              <div class="aply-man">  </div>
            </div>


                <p class="closeBtn"> <img src="<?php echo URL::asset('assets/images/close.jpg')?>"></p>
            </div>
<!--comment popup-->
 
 
 
 
@stop
