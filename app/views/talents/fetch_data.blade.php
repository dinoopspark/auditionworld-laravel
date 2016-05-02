

<?php 
        $stream="";
        $url="";
     $streaming_server_ip=  Config::get('app.streaming_server_ip');
     $streaming_app_name = Config::get('app.streaming_app_name');
    $streaming_format_flv = Config::get('app.streaming_format_flv');
    $streaming_format_mp4 = Config::get('app.streaming_format_mp4');
	?>
 @if(Auth::check())
<?php $userid = Auth::user()->id;?>
@endif
<?php $load=$_REQUEST['page']; ?>
@foreach($new as $l => $vid_img)
     @if(!empty($vid_img->image_file ))
        <?php  $commentcount=getComment($vid_img->def_id,'image'); 
               $CommentNum=CountComment($vid_img->def_id,'image');
               $likeNumber=GetLike($vid_img->def_id,'image');
               $viewNumber=GetViews($vid_img->def_id,'image');
                if(!empty($CommentNum))
                     $comment_number=$CommentNum ; 
                else
                   $comment_number=0;
		 $posted_string=Findate($vid_img->up_date);
         ?>
       <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="{{asset('assets/profile/small_'.$vid_img->profile_pic)}}" alt=""></a>
        <h1><a href="view_user_profile/{{$vid_img->itemuserid }}">{{$vid_img->name}}</a></h1>
        <p><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
        </span>
       <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
              <ul class="dropdown-menu">
		 @if(Auth::check() && $vid_img->itemuserid ==  $userid)
		<li><a href="#" onclick="deleteImages({{$vid_img->def_id}})">Delete</a></li>
		@else
		 <li><a href="#" title="Report Abuse" data-toggle="modal" data-target="#report_spam" onclick="addSpamid({{ $vid_img->def_id }},'image')">Report Abuse</a></li>
		@endif
              </ul>
       </div>
    <div class="clearfix"></div>
    <p class="detail">{{$vid_img->text}}</p>
    <div class="clearfix"></div>
    <div class="embed-responsive embed-responsive-16by9">
        <figure><a class="fancybox " onclick="viewItem({{$vid_img->def_id}},'image')" rel="1" href="{{asset('assets/protofolio/slider_'.$vid_img->image_file)}}" data-fancybox-group="gallery"><span><img src="{{asset('assets/protofolio/slider_'.$vid_img->image_file)}}"></span></a></figure>
    </div>
     <ul class="grid-menu pull-left">
        @if(!empty($userid))
                <li ><i class="fa fa-heart-o " onclick="likecount({{ $vid_img->def_id }},{{ $userid }},'image')"></i>
		<span class="likebtn{{ $vid_img->def_id }}image"> {{ $likeNumber }}</span></li>                                
        @else
                <li ><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </li>
        @endif
        <li><a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$load}}_{{ $l }}"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="http://auditionworldtv.com/talents/{{$vid_img->def_id}}"></span></a></li>
	<li><a href="#"><i class="fa fa-eye"></i> <span class="viewnum{{ $vid_img->def_id }}"> {{  $viewNumber }}</span></a></li>
     </ul>
      <div class="clearfix"></div>
         <section class="comment-list panel-collapse collapse" id="collapse_{{$load}}_{{ $l }}">

<div class="fb-comments" data-href="http://auditionworldtv.com/talents/{{$vid_img->def_id}}" data-width="500px" data-numposts="5"></div>
             <!--<form name="testform" >
                <input type="hidden" value="{{ $vid_img->def_id }}" name="itemid" id="itemid">
                <div class="form-group">
                 <textarea class="form-control" rows="2" placeholder="Write your comments !" name="comment" id="textarea{{ $l }}"></textarea>
                 @if(!empty($userid))                                                  
                    <input type="hidden" name="userid" value="{{ $userid }}" id="userid" >                                                    
                    <input type="button"  class="postcomment_btn"  name="btn" value="Post Comment" onclick="testfun({{ $l }},{{ $vid_img->def_id }},{{ $userid }},this.form.comment.value,'image')">
                  @else
                      <button type="button" class="postcomment_btn"  data-toggle="modal" data-target="#signin">Post Comment</button>
                  @endif
               </div>
            </form>
           @if(!empty($commentcount))
             @foreach($commentcount as $k => $comment_count)    
               @if($k<=1)  
                  <div class="media">
                     <div class="media-left">
                         <a href="#"><img class="media-object" alt="" src="{{asset('assets/profile/'.$comment_count->profile_pic)}}" data-holder-rendered="true"></a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">{{$comment_count->name}}</a></h4>
                        <p>{{ $comment_count->comment }}</p>  @if(!empty($userid)&&$comment_count->userid == $userid) Delete @endif
                        <a href="#" data-toggle="modal" data-target="#reply{{$k}}"><i class="fa fa-reply"></i> Reply</a>
                           <?php   $getReplycomment=getReplycomment($comment_count->id); ?>
                        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="reply">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title">Write a reply</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group">
                                            <input class="form-control" type="text">
                                            <span class="input-group-addon"> <a href="#"><i class="fa fa-edit"></i></a> </span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <div class="divider"></div>
                                   @if(!empty($getReplycomment))
                                                @foreach($getReplycomment as $p=>$Rcomment)    
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object" alt="" src="{{asset('assets/profile/'.$Rcomment->profile_pic)}}" data-holder-rendered="true">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#">{{ $Rcomment->name }}</a></h4>
                                        <p>{{ $Rcomment->comment }}</p>
                                        <a href="#" data-toggle="modal" data-target="#reply{{ $k }}"><i class="fa fa-reply"></i> Reply</a>
                                        <div class="divider"></div>
                                    </div>
                                </div>
                                  @endforeach
                                @endif
                                <form action="replycomment">
                                              <input type="hidden" value="{{ $comment_count->id }}" name="commentid">
                                              <input type="hidden" value="{{ $vid_img->def_id }}" name="videoid">
                                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="reply{{ $k }}">
                                            <div class="modal-dialog modal-md">
                                              <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Write a reply</h4>
                                              </div>
                                              <div class="modal-body">
                                              <div style="position: relative;" class="form-group">
                                              <input class="form-control" name="replytext" value="" type="text">
                                              @if(!empty($userid))
                                             
                                              <input type="hidden" name="replyuserid" value="{{ $userid }}" >
                                               <button style="position: absolute; top: 0px; right: 0px;" type="submit" class="bten"><i class="fa fa-edit"> </i></button> </div>
                                             @else
                                                 <button style="position: absolute; top: 0px; right: 0px;" type="button" data-toggle="modal" data-target="#signin" class="bten"><i class="fa fa-edit"> </i></button> </div>
                                              @endif                                                                                                            
                                              </div>
                                              </div>
                                           </div>                                              
                                            </form> 
                            </div>
                        </div>
                          @endif
                         @endforeach
                          <div id="nextdiv{{$l}}"></div>
                        <p class="load-more"><a href="talentdetails_images/{{$vid_img->def_id }}">Load more...</a>
                        </p>
                 
                     @endif-->
   </section>
   </article>
	@elseif(!empty($vid_img->video_file))
	 <?php  $commentcount=getComment($vid_img->def_id,'video');                   
              $CommentNum=CountComment($vid_img->def_id,'video');
                      if(!empty($CommentNum))
                         $comment_number=$CommentNum ; 
                      else
                         $comment_number=0;
                $likeNumber=GetLike($vid_img->def_id,'video');
                $viewNumber=GetViews($vid_img->def_id,'video');
		$posted_string=Findate($vid_img->up_date);
         ?>
       <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="{{asset('assets/profile/small_'.$vid_img->profile_pic)}}" alt=""></a>
     <h1><a href="view_user_profile/{{$vid_img->itemuserid }}">{{$vid_img->name}} </a></h1>
        <p><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
        </span>
        <div class="btn-group pull-right">
           <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
            <ul class="dropdown-menu">
 		@if(Auth::check() && $vid_img->itemuserid ==  $userid)
		<li><a href="#" onclick="deleteVideos({{$vid_img->def_id}})">Delete</a></li>
		@else
		 <li><a href="#" title="Report Abuse" data-toggle="modal" data-target="#report_spam" onclick="addSpamid({{ $vid_img->def_id }},'video')">Report Abuse</a></li>
		@endif                      
            </ul>
            </div>
           <div class="clearfix"></div>
          <p class="detail">{{$vid_img->text}}</p>
         <div class="clearfix"></div>
      @if(($vid_img->uploaded_to_you_tube ==0) || ($you_tube->you_tube ==0) )
            <div class="" id="myElement_{{$vid_img->id}}" style="border: 10px solid #CCC;border-radius:10px;"></div>
      <?php
      $info = pathinfo($vid_img->video_file);
         if($vid_img->converted == 1){
               $vid_img->video_file = 'converted_'.$vid_img->video_file;
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
                      $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$vid_img->video_file."/playlist.m3u8";
              } else{
                      $protocol = 'http://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$vid_img->video_file."/playlist.m3u8";
              }
      }else if($Android){
        preg_match('/Android ?([0-9]+\.[0-9]+)/',$str,$ar1);
              //$ar1 = preg_match('/Android ?([0-9]+\.[0-9]+)/');
              if((float)$ar1[1]>4.0){
                      if($info["extension"] == "flv"){
                              $protocol = "rtmp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$vid_img->video_file;

                      } else{
                              $protocol = 'rtmp://'.$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$vid_img->video_file;
                      }
              } else {
                      if($info["extension"] == "flv"){
                              $protocol = "rtsp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_flv.":".$vid_img->video_file;
                      } else{
                              $protocol = "rtsp://".$streaming_server_ip.":1935/".$streaming_app_name."/".$streaming_format_mp4.":".$vid_img->video_file;
                      }
              }
      }else{
               if($info["extension"] == "flv"){
                      $protocol = 'rtmp://'.$streaming_server_ip."/".$streaming_app_name."/".$streaming_format_flv.":".$vid_img->video_file;
               } else{
                      $protocol = 'rtmp://'.$streaming_server_ip."/".$streaming_app_name."/".$streaming_format_mp4.":".$vid_img->video_file;
              }
      }

?>
      
              <script type="text/javascript">
                     jwplayer("myElement_{{$vid_img->id}}").setup({
                       primary: "flash",
                         file: "{{$protocol}}",
                          image: "/assets/thumbnails/{{$vid_img->thumbnail}}",
			skin: { name: "bekle" },
                        
                         autoplay : true,
                              width: "100%",
			    logo: { hide: 'true' },
                        aspectratio: "12:5",
                     });
               </script>
     @else
<div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" onclick="viewItem({{$vid_img->def_id}},'video')"  src="https://www.youtube.com/embed/{{$vid_img->youtube_id}}?modestbranding=1&controls=0&rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>

@endif
                    <ul class="grid-menu pull-left">
                        @if(!empty($userid))
                                <li ><i class="fa fa-heart-o " onclick="likecount({{ $vid_img->def_id }},{{ $userid }},'video')"></i><span class="likebtn{{ $vid_img->def_id }}video"> {{ $likeNumber }}</span></li>                                
                                @else
                                   <li ><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </li>
                         @endif
                        <li><a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{ $load  }}_{{ $l }}"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="http://auditionworldtv.com/talents/{{$vid_img->def_id}}"></span></a></li>
                         <li><a href="#"><i class="fa fa-eye"></i> <span class="viewnum{{ $vid_img->def_id }}"> {{  $viewNumber }}</span></a></li>		       
                    </ul>
                    <div class="clearfix"></div>
                    <section class="comment-list panel-collapse collapse" id="collapse_{{ $load }}_{{ $l }}">
<div class="fb-comments" data-href="http://auditionworldtv.com/talents/{{$vid_img->def_id}}" data-width="500px" data-numposts="5"></div>



                         <!--<form name="testform" >
                         <input type="hidden" value="{{ $vid_img->def_id }}" name="itemid" id="itemid">
                        <div class="form-group">
                                 <textarea class="form-control" rows="2" placeholder="Write your comments !" name="comment" id="textarea{{ $l }}"></textarea>
                                                 @if(!empty($userid))
                                                   
                                                    <input type="hidden" name="userid" value="{{ $userid }}" id="userid" >
                                                    
                                                    <input type="button" name="btn" class="postcomment_btn"  value="Post Comment" onclick="testfun({{ $l }},{{ $vid_img->def_id }},{{ $userid }},this.form.comment.value,'video')">
                                                  @else
                                                      <button type="button"  class="postcomment_btn"  data-toggle="modal" data-target="#signin">Post Comment</button>
                                                  @endif
                        </div>
                            </form>

                                    @if(!empty($commentcount)) 
                                   @foreach($commentcount as $k => $comment_count)    
                                   @if($k<=1)  

                        <div class="media">
                            <div class="media-left">
                                <a href="#"><img class="media-object" alt="" src="{{asset('assets/profile/'.$comment_count->profile_pic)}}" data-holder-rendered="true">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{$comment_count->name}}</a></h4>
                                <p>{{ $comment_count->comment }}</p>  @if(!empty($userid)&&$comment_count->userid == $userid) Delete @endif
                                <a href="#" data-toggle="modal" data-target="#reply{{$k}}"><i class="fa fa-reply"></i> Reply</a>
                                   <?php   $getReplycomment=getReplycomment($comment_count->id); ?>
                                <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="reply">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title">Write a reply</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group">
                                                    <input class="form-control" type="text">
                                                    <span class="input-group-addon"> <a href="#"><i class="fa fa-edit"></i></a> </span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                   @if(!empty($getReplycomment))
                                                @foreach($getReplycomment as $p=>$Rcomment)    
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object" alt="" src="{{asset('assets/profile/'.$Rcomment->profile_pic)}}" data-holder-rendered="true">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#">{{ $Rcomment->name }}</a></h4>
                                        <p>{{ $Rcomment->comment }}</p>
                                        <a href="#" data-toggle="modal" data-target="#reply{{ $k }}"><i class="fa fa-reply"></i> Reply</a>
                                        <div class="divider"></div>
                                    </div>
                                </div>
                                  @endforeach
                                @endif
                                <form action="replycomment">
                                              <input type="hidden" value="{{ $comment_count->id }}" name="commentid">
                                              <input type="hidden" value="{{ $vid_img->def_id }}" name="videoid">
                                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="reply{{ $k }}">
                                            <div class="modal-dialog modal-md">
                                              <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Write a reply</h4>
                                              </div>
                                              <div class="modal-body">
                                              <div style="position: relative;" class="form-group">
                                              <input class="form-control" name="replytext" value="" type="text">
                                              @if(!empty($userid))
                                             
                                              <input type="hidden" name="replyuserid" value="{{ $userid }}" >
                                               <button style="position: absolute; top: 0px; right: 0px;" type="submit" class="bten"><i class="fa fa-edit"> </i></button> </div>
                                             @else
                                                 <button style="position: absolute; top: 0px; right: 0px;" type="button" data-toggle="modal" data-target="#signin" class="bten"><i class="fa fa-edit"> </i></button> </div>
                                              @endif                                                                                                            
                                              </div>
                                              </div>
                                           </div>                                              
                                            </form> 
                            </div>
                        </div>
                          @endif
                         @endforeach
                          <div id="nextdiv{{$l}}"></div>
                   
 <p class="load-more"><a href="talentdetails/{{$vid_img->def_id }}">Load more...</a>               
</p>
 @endif-->
                    </section>
                    
                </article>
@else
 <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="{{asset('assets/profile/small_'.$vid_img->profile_pic)}}" alt=""></a>
        <h1><a href="view_user_profile/{{$vid_img->itemuserid }}">{{$vid_img->name}}</a></h1>
          <?php  $posted_string=Findate($vid_img->up_date);      ?>
        <p><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
        </span>
 @if(Auth::check() && $vid_img->itemuserid ==  $userid)
                    <div class="btn-group pull-right">
                        <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="deleteStatus({{$vid_img->def_id}})" >Delete</a>
                            </li>
                        </ul>
                    </div>
@endif
                    <div class="clearfix"></div>
                    <p class="detail" ><?php echo ucfirst($vid_img->status) ?></p>
                    <div class="clearfix"></div>                    
                    <ul class="grid-menu pull-left">
                    </ul>
                    <div class="clearfix"></div>
                </article>

@endif
              
@endforeach
<!--<script>
function testfun(k,a,b,c,d){

              var item=a;
              var user=b;
              var data=c;
              
                $.ajax({
                     url: 'postcomment',  
                     data: {itemid : item ,userid : user ,datavalue : data,type:d },
                     success: function (result) {
                      //$("#textarea"+k).val("");
                    //  $("#nextdiv"+k).html(data);
                     //    parentDiv.after(result);
                     // $("#reloaddiv").load("talents");
           location = location.href;
                        return true;
                     }
                });

             return true;
}

     
 
</script>


<script>





function viewItem(a,b){
             $.ajax({
                      url : "viewitem",
                      type: "POST",
                      data:{itemid:a, type:b},
                      success: function(data)
                      {
                        $(".viewnum"+a).html(data);
                      }
                  });

}


</script>-->
