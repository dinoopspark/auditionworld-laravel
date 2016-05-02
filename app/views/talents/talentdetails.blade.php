<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Audition World</title>

<!-- Bootstrap -->
<link href="{{asset('assets/new_theme/css/style.css')}}" rel="stylesheet">

<script src="{{asset('assets/new_theme/js/my-script.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/new_theme/js/jquery.min.1.11.1.js')}}"></script> 
<script src="{{asset('assets/new_theme/js/bootstrap.min.js')}}"></script> 

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
.postcomment_btn {
float:right;
border-radius: 4px;
 background-color: #008CBA;
    border: none;
    color: white;
    padding: 8px 13px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    margin: 2px 1px;
    cursor: pointer;


}

</style>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=1765186820368327";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<nav class="navbar navbar-default navigation" role="navigation"> 
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-top"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>


    <figure><a href="../"><img src="{{asset('assets/new_theme/images/logo.png')}}" alt=""></a></figure>
  </div>
  
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="navbar-top">
    <ul class="nav navbar-nav navbar-right">
     <li><a href="../">Home</a></li>
      <li><a href="../audition">Auditions</a></li>

          @if(Auth::check())
    <li><a href="{{ URL::asset('myprofile') }}" class="@yield('active_pr')">My Account</a></li>
  @endif

  
      <li><a href="../talents">Talent</a></li>
      <li><a href="../about_us">About Us</a></li>
      <li><a href="../faq">Faq</a></li>
      <li><a href="../contact">Contact Us</a></li>
      <li>
        <form>
@if(Auth::check())
          <button type="button" class="bten" data-toggle="modal" onClick="document.location.href='{{URL::to('logout')}}'"><i class="fa fa-sign-in"></i> Logout</button>
	@else
		<button type="button" class="bten" data-toggle="modal" data-target="#signin" style="border:0px; outline:none;"><i class="fa fa-sign-in"></i> Sign in</button>
	@endif
        </form>
      </li>
    </ul>
  </div>
</nav>


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
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-- report spam modal-->
<div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="report_spam">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">What kind of abuse are you reporting?</h4>
      </div>
      <div class="modal-body">
        <div id="invalid"></div>
       
        <div class="form-group">
	  <input type="hidden" value="" name="spam_itemid" id="spam_itemid">
	  <input type="hidden" value="" name="spam_type" id="spam_itemtype">
        <p>  <input type="radio" name="group1" value="A picture of me I don't like" checked>A picture of me I don't like</p>
        <p>  <input type="radio" name="group1" value="Unwanted commercial content or spam"> Unwanted commercial content or spam</p>
	  <p><input type="radio" name="group1" value="Pronography or sexually explicit material"> Pronography or sexually explicit material</p>
          <p><input type="radio" name="group1" value="It's annoying or not interesting"> It's annoying or not interesting</p>

         </div>
        <div class="clearfix"></div>
      </div>
<div class="modal-footer"> <button  class="postcomment_btn"  type="button" onclick="ReportSpam()">Continue</button></div>
    </div>
  </div>
</div>

  @if(Auth::check())
   <?php $userid= Auth::user()->id; ?>
  @endif
@foreach($video as $l=>$v)
 <?php  $commentcount=getComment($v->def_id,'image'); 
                                       $CommentNum=CountComment($v->def_id,'image');
                                        if(!empty($CommentNum))
                                             $comment_number=$CommentNum ; 
                                        else
                                           $comment_number=0;
          $likeNumber=GetLike($v->def_id,'image');
          $viewNumber=GetViews($v->def_id,'image');
	 $posted_string=Findate($v->created_at); 
                                 ?>
<section class="post-detail">
  <div class="container">
    <div class="row" >
      <div class="col-md-8">
        <div class="col-md-12"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="{{asset('assets/profile/'.$v->profile_pic)}}" alt=""></a>
          <h1><a href="#">{{ $v->name }}</a></h1>
          <p><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
          </span>
     <div class="btn-group pull-right">   
	<button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
				  <ul class="dropdown-menu">
						@if(!empty($userid) && $userid==$v->videouser)
							<li><a href="#">Delete</a></li>
						 @else
							 <li><a href="#" title="Report Abuse" data-toggle="modal" onclick="addSpamid({{ $v->def_id }},'image')" data-target="#report_spam" >Report Post</a></li>
						@endif
				   </ul>
</div>
          <div class="clearfix"></div>
          <p>{{ $v->text }}</p>
          <div class="embed-responsive embed-responsive-16by9">
          @if(!empty($v->image_file))
              <span>
                  <img src="{{asset('assets/protofolio/slider_'.$v->image_file)}}" onclick="viewItem({{$v->id}})">
            </span>
        @else
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/z3w7tW10hl8" frameborder="0" allowfullscreen onclick="viewItem({{$v->id}})"></iframe>
       @endif
          </div>
          <ul class="grid-menu pull-left">
                    @if(!empty($userid))
                                <li ><a href="#"><i class="fa fa-heart-o " onclick="likecount({{ $v->id }},{{ $userid }},'image')"></i><span class="likebtn{{ $v->id }}image"> {{ $likeNumber }}</span></a></li>                                
                                @else
                                   <li ><a href="#"><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </a></li>                                
                                @endif
            <li><a data-toggle="collapse" data-parent="#accordion" href="#collapse"><i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="http://auditionworldtv.com/talentdetails_images/{{$v->def_id}}"></span> </a></li>


            <li><a href="#"><i class="fa fa-eye"></i> <span class="viewnum{{ $v->id }}"> {{  $viewNumber }}</span></a></li>
          </ul>
          <div class="clearfix"></div>

          <section class="comment-list panel-collapse collapse in" id="collapse">

<div class="fb-comments" data-href="http://auditionworldtv.com/talentdetails_images/{{ $v->def_id }}" data-width="600px" data-numposts="5"></div>
            <!--  <form name="testform" >
                                            <input type="hidden" value="{{ $v->id }}" name="itemid" id="itemid">
                                              <div class="form-group">
                                                <textarea class="form-control" rows="2" placeholder="Write a comment" name="comment" id="textarea{{ $l }}"></textarea>
                                                 @if(!empty($userid))
                                                   
                                                    <input type="hidden" name="userid" value="{{ $userid }}" id="userid" >
                                                    
                                                    <input type="button" class="postcomment_btn" name="btn" value="Post Comment" onclick="testfun({{ $l }},{{ $v->id }},{{ $userid }},this.form.comment.value,'image')">
                                                  @else
                                                      <button type="button" class="postcomment_btn" data-toggle="modal" data-target="#signin">Post Comment</button>
                                                  @endif
                                              </div>       
                              </form>
                                

                             @if(!empty($commentcount)) 
                                   @foreach($commentcount as $k => $comment_count)            
                                    <div class="media">
                                    <div class="media-left"> <a href="#"><img class="media-object" alt="" src="{{asset('assets/profile/'.$comment_count->profile_pic)}}" data-holder-rendered="true"></a> </div>                                  
                                    <div class="media-body">
                                      <h4 class="media-heading"><a href="#">{{$comment_count->name}}</a></h4>
                                      <p>{{ $comment_count->comment }}</p>  @if(!empty($userid)&&$comment_count->userid == $userid) Delete @endif
                                      <a href="#" data-toggle="modal" data-target="#reply{{$k}}"><i class="fa fa-reply"></i> Reply</a>
                                         <div class="divider"></div>
                                          <?php   $getReplycomment=getReplycomment($comment_count->id); ?>
                                              @if(!empty($getReplycomment))
                                                @foreach($getReplycomment as $p=>$Rcomment)                                 
                                              <div class="media">
                                              <div class="media-left"> <a href="#"><img class="media-object" alt="" src="{{asset('assets/profile/'.$Rcomment->profile_pic)}}" data-holder-rendered="true"></a> </div>
                                              <div class="media-body">
                                              <h4 class="media-heading"><a href="#">{{ $Rcomment->name }}</a></h4>
                                              <p>{{ $Rcomment->comment }}</p>
                                              <a href="#" data-toggle="modal" data-target="#reply{{ $k }}"><i class="fa fa-reply"></i> Reply</a>
                                              <div class="divider"></div>
                                              </div>
                                              </div>
                                                @endforeach
                                              @endif
                                             <form action="../replycomment">
                                              <input type="hidden" value="{{ $comment_count->id }}" name="commentid">
                                              <input type="hidden" value="{{ $v->id }}" name="videoid">
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
                                        <div class="divider"></div>                   
                                      </div>
                                  </div>
                                  @endforeach
                              @endif-->
          </section>
        </div>
      </div>
      <div class="col-md-4">
        <div class="col-md-12">


@foreach($video_right as $vr)
 <?php  $commentcount=getComment($vr->def_id,'image'); 
                                       $CommentNum=CountComment($vr->def_id,'image');
                                        if(!empty($CommentNum))
                                             $comment_number=$CommentNum ; 
                                        else
                                           $comment_number=0;
          $likeNumber=GetLike($vr->def_id,'image');
          $viewNumber=GetViews($vr->def_id,'image');
	  $posted_string=Findate($vr->created_at); 

                                 ?>
<div class="side-talent-box "> 
  <span class="pull-left col-xs-11 row "> <a href="talentdetails/{{ $vr->id }}"><img src="{{asset('assets/profile/'.$vr->profile_pic)}}" alt=""></a>
            <h1><a href="#">{{ $vr->name }}</a></h1>
            <p><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
            </span>
            <div class="btn-group pull-right">   
	<button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
				  <ul class="dropdown-menu">
						@if(!empty($userid) && $userid==$vr->video_userid)
							<li><a href="#">Delete</a></li>
						 @else
							 <li><a href="#" title="Report Abuse" data-toggle="modal" onclick="addSpamid({{ $vr->def_id }},'image')" data-target="#report_spam" >Report Post</a></li>
						@endif
				   </ul>
</div>

            <div class="clearfix"></div>
            <p class="detail">{{ $vr->text }}</p>
            <div class="clearfix"></div>
            <figure><a class="fancybox" rel="1" href="{{ $vr->id }}" data-fancybox-group="gallery"><span><img src="{{asset('assets/protofolio/slider_'.$vr->image_file)}}"></span></a></figure>
            <ul class="grid-menu pull-left">
              <li><a href="#"><i class="fa fa-heart-o"></i> {{ $likeNumber }}</a></li>
              <li><a href="#"><i class="fa fa-comment-o"></i> {{ $comment_number}}</a></li>
              <li><a href="#"><i class="fa fa-eye"></i>{{  $viewNumber }}</a></li>
            </ul>
            <div class="clearfix"></div>
          </div>  
        @endforeach
          <p style="text-align:center"><a href="/view_user_profile/{{$v->videouser }}?tab=photos">View more...</a></p>
        </div>
      </div>
    </div>
  </div>
</section>


@endforeach
<!--start apply modal-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="apply">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Apply for this audition</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" value="Audition for actor">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Phone">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <textarea class="form-control" rows="6" placeholder="Description"></textarea>
            </div>
          </div>
        </div>
        <button type="submit" class="bten">Submit</button>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!--end apply modal-->

<div class="clearfix"></div>
<footer class="footer">
  <div class="container">
    <div class="row">
      <ul>
        <li><a href="#">Terms and Condition</a></li>
        <li><a href="#">Privacy policy</a></li>
        <li><a href="#">About Us</a></li>
      </ul>
      <p>Powered by <a href="#">Spark support Pvt Ltd</a></p>
    </div>
  </div>
</footer>

<script>
        
(function($) {
 "use strict"
 
 // Accordion Toggle Items
   var iconOpen = 'fa fa-minus',
        iconClose = 'fa fa-plus';

    $(document).on('show.bs.collapse hide.bs.collapse', '.accordion', function (e) {
        var $target = $(e.target)
          $target.siblings('.accordion-heading')
          .find('em').toggleClass(iconOpen + ' ' + iconClose);
          if(e.type == 'show')
              $target.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
          if(e.type == 'hide')
              $(this).find('.accordion-toggle').not($target).removeClass('active');
    });
    
})(jQuery);
      </script>

      <script>
function testfun(k,a,b,c,d){

              var item=a;
              var user=b;
              var data=c;
                $.ajax({
                     url: '../postcomment',  
                     data: {itemid : item ,userid : user ,datavalue : data,type: d },
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
function likecount(a,b){

            $.ajax({
                      url : "../liketalent",
                      type: "POST",
                      data:{itemid:a,userid:b},
                      success: function(data)
                      {
                         $(".likebtn"+a).html(data);
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
 
</script>


</body>
</html>
