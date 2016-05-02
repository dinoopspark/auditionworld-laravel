<!--<script src="http://code.jquery.com/jquery-1.7.js"></script>-->
<link href="<?php echo URL::asset('assets/css/jquery.alerts.css')?>" rel="stylesheet" type="text/css" media="screen" />
<script src="<?php echo URL::asset('assets/js/jquery.alerts.js')?>" type="text/javascript"></script>
<script>
$(document).ready(function(){
        $(".contactme").click(function(){
        var video =  $(this).attr('vid');
           $(".ajaxloader"+video).html('<img style="width:30px;" src="/assets/images/ajax-loader.gif">');
         // $.ajax({
         //       url : "/contactme",
         //       type: "POST",
         //       data:{vid:video},
         //       success: function(data, textStatus, jqXHR)
         //       {
         //       if($.trim(data) == 'contact') {
                    $(".ajaxloader"+video).html('');
                jAlert("You don't have privilege to contact any other users");
        //         }
	//	else if($.trim(data) == 'same_user'){
	//		$(".ajaxloader"+video).html('');

	//		jAlert("Trying to contact your self");
	//	}
         //        else{
        //                $(".ajaxloader"+video).html('');
        //                jAlert("Please login to contact");
         //        }
       //         }
        //     });
         });
	
         var video_count="<?php echo count($video);?>";
	if(video_count < 16) {
		$("#load_more_button").hide();
	}else{
		$("#load_more_button").show();
	}
	
   });             
  </script>             
                  <div class="talent-out">
                    <?php 
                    $val = count($video);
                    if($val == "0"){?>
                     <div class="" id ="no_result" style="padding-top:30px;" align="center">
                       No results found 
                    </div>
                    <?php }else if($val == 1){
                        $type = 1;
                    }
                    ?>

                 @foreach ($video as $videos)
                    @if(isset($type))
                         <!--<div class="talent-main" id="change_view" type="{{$videos->category}}">-->
			<div class="smple-video21" id="change_view" type="{{$videos->category}}">
                    @else
                        <!--<div class="talent-main">-->
			<div class="smple-video21">
                    @endif
			<div class="smple-vid-in21">


				<?php if(isset($videos->vid_id)){?>
				<a href="videoplayer/{{$videos->vid_id}}" class="here">
				<?php } else { ?>
				<a href="protfolio_image/{{$videos->def_id}}" class="here">
				<?php } ?>
					<!--<div class="play"></div>-->
              				<img class="img" src="/assets/protofolio/slider_{{$videos->image_file}}" height="154" width="100%">
				</a>
               
		            <!--   <video width="100%" height="" controls  class="marg-video">
					  <source src="" type="video/ogg">
					  <source src="video/big_buck_bunny.mp4" type="video/mp4">
					  <object data="video/big_buck_bunny.mp4" width="100%" height="">
						  <embed width="345px" height="" src="video/big_buck_bunny.swf"> </embed>
					  </object>	
				</video>-->
			</div>

			<div class="talent-main-botm"> 
		                 <div class="talent-main-botm-lft"> <img src="assets/profile/small_{{$videos->profile_pic}}"> </div>
		                 <div class="talent-main-botm-rgt">  <h1>{{$videos->name}} </h1>
		                 	<div class="tlnt-cnt contactme" vid="{{$videos->id}}" > Contact Me</div>
						<div class="ajaxloader{{$videos->id}}" style="margin-left:100px;position:absolute;margin-top:25px">
                                                 </div>

		                 </div>
                 
	                 </div>
                         </div>
                 @endforeach
         </div>
