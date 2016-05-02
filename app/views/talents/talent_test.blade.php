<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Audition World Talents</title>

<!-- Bootstrap -->
<link href="{{asset('assets/new_theme/css/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/new_theme/css/jquery.fancybox.css')}}" rel="stylesheet">
<script type="text/javascript" src="/assets/js/jwplayer/jwplayer.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.btn-file {
	position: relative;
	overflow: hidden;
}
.btn-file input[type=file] {
	position: absolute;
	top: -4px;
	width: 28px;
	height: 28px;
	left: -7px;
	right: 0;
	text-align: right;
	filter: alpha(opacity=0);
	opacity: 0;
	outline: none;
	background: white;
	cursor: inherit;
	display: block;
}
</style>
</head>
<body>

<div id="reloaddiv">
<nav class="navbar navbar-default navigation" role="navigation"> 
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-top"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <figure><a href="/"><img src="{{asset('assets/new_theme/images/logo.png')}}" alt=""></a></figure>
  </div>
  
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="navbar-top">
    <ul class="nav navbar-nav navbar-right">
<li><a href="{{ URL::asset('/') }}" class="@yield('active_home')">Home</a></li>
	@if(Auth::check())
		<li><a href="{{ URL::asset('myprofile') }}" class="@yield('active_pr')">My Account</a></li>
	@endif
      <li><a href="{{ URL::asset('/audition') }}" class="@yield('active_aud')">Auditions</a></li>
		
      <li><a href="{{ URL::asset('/talents') }}" class="active">Talent</a></li>
      <li><a href="{{ URL::asset('/aboutus') }}" class="@yield('active_about')">About Us</a></li>
      <li><a href="{{ URL::asset('/faq')}}" class="@yield('active_faq')">Faq</a></li>
      <li><a href="{{ URL::asset('/contact')}}" class="@yield('active_con')">Contact Us</a></li>

      <li>

        <form>
        @if(Auth::check())
          <button type="button" class="bten" data-toggle="modal" onClick="document.location.href='{{URL::to('logout')}}'"><i class="fa fa-sign-in"></i> Logout</button>
        @else
                <button type="button" class="bten" data-toggle="modal" data-target="#signin"><i class="fa fa-sign-in"></i> Sign in</button>
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



<!--start forgot password-->
<div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="forgot_password">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Forgot your password</h4>
      </div>
      <div class="modal-body">
        <form action="password" method="post">
        <div class="form-group">
          <input type="email" name="email" id="email_for" class="form-control" placeholder="Email">
          <span><i class="fa fa-envelope-o"></i></span> </div>
        <a href="#" class="bten" onclick="submit_forgot()">Submit</a>
        <p id="resultforgot" class="text-center"></p>
        <p class="text-center"><a href="#signin" data-toggle="modal" data-dismiss="modal">Back to login</a></p>
<!--        <p class="pull-right"><a href="#">Create Account</a></p>-->
        <div class="clearfix"></div>
         </form>
      </div>
       
    </div>
  </div>
</div>
<!--end forgot password-->




<section class="posting">
  <div class="container">
    <div class="col-md-12 widget-area">
      <div class="status-upload">
	@if(Auth::check())
        <form action="upload_data" enctype="multipart/form-data" method="post">
          <textarea placeholder="Type your message" name="text"></textarea>
          <ul>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><span class="btn-file"><i class="fa fa-video-camera"></i>
              <input type="file" name="video">
              </span></a></li>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><span class="btn-file"><i class="fa fa-picture-o"></i>
              <input type="file" name="images">
              </span></a></li>
          </ul>
          <button type="submit" class="bten"><i class="fa fa-pencil-square-o"></i> Post</button>
        </form>
	@endif
      </div>
      <!-- Status Upload  --> 
    </div>
    <!-- Widget Area --> 
    
  </div>
</section>


<section class="talent-page">
  <div class="container">
    <div class="talent-grid" id="image_talent">
                        	<?php 
                        		    $stream="";
                                $url="";
                                $streaming_server_ip=  Config::get('app.streaming_server_ip');
                                $streaming_app_name = Config::get('app.streaming_app_name');
                                $streaming_format_flv = Config::get('app.streaming_format_flv');
                                $streaming_format_mp4 = Config::get('app.streaming_format_mp4');
                        	?>
	@foreach($video as $l => $vid_img)
        @if(!empty($vid_img->image_file ))
                                <?php  $commentcount=getComment($vid_img->def_id); 
                                       $CommentNum=CountComment($vid_img->def_id);
                                        if(!empty($CommentNum))
                                             $comment_number=$CommentNum ; 
                                        else
                                           $comment_number=0;
                                 ?>
                              <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="{{asset('assets/profile/small_'.$vid_img->profile_pic)}}" alt=""></a>
                              <h1><a href="#">{{$vid_img->name}}</a></h1>



                                          <?php 
                                $posted_at=$vid_img->created_at;
                                $pieces = explode(" ", $posted_at);

                                $posted_date=$pieces[0];
                                $today_date=date('Y-m-d');

                                $posted_time=$pieces[1];  
                                $posted_hours= explode(':',$posted_time);

                                $current_time=date("H:i:s");
                                $current_hours=explode(':',$current_time);

                              if ($posted_date != $today_date){ 
                                        $posted_year=explode('-',$posted_date);
                                        $current_year=explode('-',$today_date);
                                        $monthNum = $posted_year[1];
                                        $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                                        if($posted_hours[0]>=12){
                                                        $m='pm';
                                                      }
                                                  else{
                                                    $m='am';
                                                  }

                                          if($posted_year[0]==$current_year[0]){                                                                                             
                                                      
                                           $posted_string="posted on ".$monthName." ".$posted_year[2].' at '.$posted_hours[0] .' '.$m;
                                          }

                                          else{
                                                  $posted_string="posted on ".$posted_year[0].'   '.$monthName." ".$posted_year[2].' at '.$posted_hours[0] .' '.$m;
                                          }

                                  }else{

                                           $hr_diff=$current_hours[0]-$posted_hours[0];
                                             $min_diff=$current_hours[1]-$posted_hours[1];

                                          if($hr_diff!=0 ) {
                                            //$posted_string=$hr_diff.'hours ago';  

                                               $hourdiff = round(abs((strtotime($posted_at) - strtotime(date("Y-m-d H:i:s")))/3600));

                                            $posted_string= $hourdiff.' hours ago';  
                                          }
                                          else{
                                           // $hr_diff=$current_hours[1]-$posted_hours[1];
                                          //  $posted_string=$hr_diff.'minitues ago'; 

                                            $from_time=strtotime($posted_at);
                                            $to_time=strtotime(date("Y-m-d H:i:s"));
                                            $posted_string=round(abs($to_time - $from_time) / 60)." minute ago"; 
                                        }
                              }

                ?>


                              <p><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
                              </span>

                              <div class="btn-group pull-right">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
                                <ul class="dropdown-menu">
                                  <li><a href="#">Delete</a></li>
                                  <li><a href="#">Edit</a></li>
                                </ul>
                              </div>

                              <div class="clearfix"></div>
                             
                              <div class="clearfix"></div>
                              <div class="embed-responsive embed-responsive-16by9">
                                <p class="detail"> {{$vid_img->text}}</p>
                              <figure><a class="fancybox" rel="1" href="/assets/protofolio/{{$vid_img->image_file}}" data-fancybox-group="gallery"><span><img src="{{asset('assets/protofolio/slider_'.$vid_img->image_file)}}"></span></a></figure>
                              </div>
                              <ul class="grid-menu pull-left">
                                <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
                                <li><a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $l }}"><i class="fa fa-comment-o"></i>{{ $comment_number }}</a></li>
                                <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
                              </ul>
                 

                              <div class="clearfix"></div>
                              <section class="comment-list panel-collapse collapse" id="collapse{{ $l }}">
                              <form name="testform" >
                                            <input type="hidden" value="{{ $vid_img->def_id }}" name="itemid" id="itemid">
                                              <div class="form-group">
                                                <textarea class="form-control" rows="2" placeholder="Write a comment" name="comment" id="textarea{{ $l }}"></textarea>
                                                 @if(Auth::check())
                                                    <?php $userid= Auth::user()->id; ?>
                                                    <input type="hidden" name="userid" value="{{ $userid }}" id="userid" >
                                                    
                                                    <input type="button" name="btn" value="Post Comment" onclick="testfun({{ $l }},{{ $vid_img->def_id }},{{ $userid }},this.form.comment.value)">
                                                  @else
                                                      <button type="button" data-toggle="modal" data-target="#signin">Post Comment</button>
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
                                             <form action="replycomment">
                                              <input type="hidden" value="{{ $comment_count->id }}" name="commentid">
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
                                              @if(Auth::check())
                                              <?php $userid= Auth::user()->id; ?>
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
                                  <div id="nextdiv{{$l}}"></div>
                                <p class="load-more"><a href="talentdetails_images/{{$vid_img->def_id }}">Load more...</a></p>
                                </section>
                                </article>
                            @endif

@endif
  	
	@endforeach

    </div>
  </div>
  <div class="clearfix"></div>
</section>
</div>
<!--
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
--> 

<script src="{{asset('assets/new_theme/js/jquery.min.1.11.1.js')}}"></script> 
<script src="{{asset('assets/new_theme/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('assets/js/custom.js')}}"></script>

<script>
function testfun(k,a,b,c){

              var item=a;
              var user=b;
              var data=c;
              
                $.ajax({
                     url: 'postcomment',  
                     data: {itemid : item ,userid : user ,datavalue : data },
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
function submit_forgot(){
var email = document.getElementById('email_for').value;
  $.ajax({
         url : "/password",
          type: "POST",
          data:{email:email},
          success: function(data, textStatus, jqXHR)
          {
             $("#resultforgot").html(data);
          }
      });

}
        $(document).ready(function() {
$('.talent-grid').pinterest_grid({
no_columns: 2,
padding_x: 30,
padding_y: 30,
margin_bottom: 230,
single_column_breakpoint: 700
});
});

(function ($, window, document, undefined) {
    var pluginName = 'pinterest_grid',
        defaults = {
            padding_x: 30,
            padding_y: 30,
            no_columns: 2,
            margin_bottom: 50,
            single_column_breakpoint: 700
        },
        columns,
        $article,
        article_width;

    function Plugin(element, options) {
        this.element = element;
        this.options = $.extend({}, defaults, options) ;
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    Plugin.prototype.init = function () {
        var self = this,
            resize_finish;

        $(window).resize(function() {
            clearTimeout(resize_finish);
            resize_finish = setTimeout( function () {
                self.make_layout_change(self);
            }, 11);
        });

        self.make_layout_change(self);

        setTimeout(function() {
            $(window).resize();
        }, 500);
    };

    Plugin.prototype.calculate = function (single_column_mode) {
        var self = this,
            tallest = 0,
            row = 0,
            $container = $(this.element),
            container_width = $container.width();
            $article = $(this.element).children();

        if(single_column_mode === true) {
            article_width = $container.width() - self.options.padding_x;
        } else {
            article_width = ($container.width() - self.options.padding_x * self.options.no_columns) / self.options.no_columns;
        }

        $article.each(function() {
            $(this).css('width', article_width);
        });

        columns = self.options.no_columns;

        $article.each(function(index) {
            var current_column,
                left_out = 0,
                top = 0,
                $this = $(this),
                prevAll = $this.prevAll(),
                tallest = 0;

            if(single_column_mode === false) {
                current_column = (index % columns);
            } else {
                current_column = 0;
            }

            for(var t = 0; t < columns; t++) {
                $this.removeClass('c'+t);
            }

            if(index % columns === 0) {
                row++;
            }

            $this.addClass('c' + current_column);
            $this.addClass('r' + row);

            prevAll.each(function(index) {
                if($(this).hasClass('c' + current_column)) {
                    top += $(this).outerHeight() + self.options.padding_y;
                }
            });

            if(single_column_mode === true) {
                left_out = 0;
            } else {
                left_out = (index % columns) * (article_width + self.options.padding_x);
            }

            $this.css({
                'left': left_out,
                'top' : top
            });
        });

        this.tallest($container);
        $(window).resize();
    };

    Plugin.prototype.tallest = function (_container) {
        var column_heights = [],
            largest = 0;

        for(var z = 0; z < columns; z++) {
            var temp_height = 0;
            _container.find('.c'+z).each(function() {
                temp_height += $(this).outerHeight();
            });
            column_heights[z] = temp_height;
        }

        largest = Math.max.apply(Math, column_heights);
        _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
    };

    Plugin.prototype.make_layout_change = function (_self) {
        if($(window).width() < _self.options.single_column_breakpoint) {
            _self.calculate(true);
        } else {
            _self.calculate(false);
        }
    };

    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName,
                new Plugin(this, options));
            }
        });
    }

})(jQuery, window, document);
    </script> 
<script>
  $(document).ready(function(){ 
    $("[data-toggle=tooltip]").tooltip();


	function getresult(url) {
		$.ajax({
			url: url,
			type: "GET",
			data:  {rowcount:$("#rowcount").val()},
			beforeSend: function(){
			$('#loader-icon').show();
			},
			complete: function(){
			$('#loader-icon').hide();
			},
			success: function(data){
			$("#faq-result").append(data);
			},
			error: function(){} 	        
	   });
	}
	pagenum=0;
	$(window).scroll(function(){
		if ($(window).scrollTop() == $(document).height() - $(window).height()){
				//var pagenum = parseInt($(".pagenum:last").val()) + 1;
				pagenum++;
				 $.get('fetch_data?page='+pagenum, function(data, status){
					if($.trim(data) != 'No More Data To Load.'){
						$(".talent-grid").append(data);	 	       
					}
				    });
				//getresult('load_more_data?page='+pagenum);
		}
	}); 


});    
</script>



<style>
#invalid{
	color:red;
}
</style> 
<script src="{{asset('assets/new_theme/js/jquery.fancybox.pack.js')}}"></script>
</body>
</html>

