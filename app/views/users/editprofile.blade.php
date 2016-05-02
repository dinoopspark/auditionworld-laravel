@extends('layouts.new_temp')
@section('title')
About Audition World
@stop
@section('active_about')
@stop
<!--<link rel="stylesheet" href="{{asset('assets/new_theme/css/bootstrap.fd.css')}}">
<script src="{{asset('assets/new_theme/js/bootstrap.fd.js')}}"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="/jwp/jwplayer/jwplayer.js">
</script>
<script>jwplayer.key="9va04HUO4z+9XAZ89ReCYGNtMmGS3EAqgJncFA==";</script>
<style>
.browsimage{

background-color: #e74c3c;
    border-radius: 2px;
    color: #fff;
    overflow: hidden;
    padding: 6px 15px;
    position: relative;


}



</style>


@section('metadata')
<meta content="Vision and Mission of Audition world" name=description />

<meta content="Auditions for Actor, Auditions for Actress, Malayalam tv channel auditions, Film Auditions, Film Auditions kerala, Malayalam Channel auditioins" name=keywords />
@stop


@section('main')
<section class="edit-profile">
  <div class="container">
    <div class="row" >
      <div class="col-md-12">
        <div class="row">


<!-- profile pic modal-->


<div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="uploadvideo">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left">Update Profile Picture</h4>
      </div>
      <div class="modal-body">
          <div id="userpro_img" class="media" style="margin-bottom:20px;">
		<div class="media-center media-middle"> 
			<figure><a href="#">
			   <img src="{{asset('/assets/profile/normal_'.$user->profile_pic)}}" alt="" style="height:150px;width:150px;">
				</a></figure>    
						
  		  </div>
					
	  </div>
	<form action="pro_pic_up" enctype="multipart/form-data" method="post" class="imgupdate">

       
<div class="form-group">

<div id="fileselect">

<a style="text-decoration:none; cursor:pointer;" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><span style="cursor:pointer;" class="btn-file">
              <input type="file" id="files"  name="profile_pic" accept="image/*" style="cursor:pointer;" >+Upload Photo
              </span>  </a>
</div>
<div id="img_prev">

</div>
<div id="img_load"></div>



</div>
        
        

        <div class="clearfix"></div>
      </div>
    <div class="modal-footer">
           <button type="button" class="btn btn-primary pull-right"  id="ppbtn" onclick="imgfrm();"><i class="fa fa-pencil-square-o"></i> Update</button>
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        </div>

	</form>
    </div>
  </div>
</div>





<!-- profile video modal -->

<div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="uploadpro_video">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left">Update Profile Video</h4>
      </div>
      <div class="modal-body">
          <div class="media" id="userimg_video" style="margin-bottom:20px;">
		 <div class="media-center media-middle"> 
			<figure><a href="#">
			  <img src="{{asset('/assets/profile/normal_'.$user->profile_pic)}}" alt="" style="height:150px;width:150px;"></a></figure>    
							       
					   </div>
					
			      </div>
	<form action="pro_video_up" enctype="multipart/form-data" method="post" class="vidupdate">

       
<div class="form-group">

<div id="fileselectvideo">

<a style="text-decoration:none;" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><span class="btn-file">
              <input type="file" id="video"  name="profile_video" accept="video/*" data-validation="size" data-validation-max-size="3M" >+Upload Video
              </span>  </a>
</div>
<div id="video_prev">

</div>

<div id="video_load"></div>



</div>
        
        <div class="clearfix"></div>
      </div>
     <div class="modal-footer">
           <button type="button" class="btn btn-primary pull-right"  id="pvbtn" onclick="videofrm();"><i class="fa fa-pencil-square-o"></i> Update</button>
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        </div>

	</form>
    </div>
  </div>
</div>









     <!-- <div class="col-md-6 profile-pic">
        <div class="media">
          <div class="media-left media-middle" style="float:left"> <a href="#">
            <figure><a href="{{asset('/assets/profile/normal_'.$user->profile_pic)}}">
                      @if(!empty($user->profile_pic))

                      <img src="{{asset('/assets/profile/normal_'.$user->profile_pic)}}" alt="">
                      @else

                       <img src="images/top-two.jpg" alt="">
                      @endif
                      </a>
            </figure>
          </div>
          <div class="media-body media-middle" style="float:left;width: auto;">
                    <h1>{{$user->name}}</h1>
                    <h2>Actor / Director</h2>
                  
          </div>

        </div>
      </div>-->







<section style="padding-top:30px;">
  <div class="container">
	    <div class="row">
		      <div class="col-md-6 profile-pic " style=" display: flex;justify-content: center;">
                <div class="col-md-12">  
				<div class="media">
					    <div  class="media-center media-middle"> 
								<figure><a href="#">
								    @if(!empty($user->profile_pic))
								      <img src="{{asset('/assets/profile/normal_'.$user->profile_pic)}}" alt="" style="height:225px;width:225px;">
								    @else
								    Add Profile picture
								    @endif
								</a></figure>    
							 <a href="#" class="btn-file" data-toggle="modal" data-target="#uploadvideo"><i style="margin-top:20px;margin-bottom:15px;" class="fa fa-upload" ></i> Change Picture</a>       
					   </div>
					
			      </div> 
                  </div>
		    </div>


<div class="col-md-6">
    
    <div class="col-md-12">
	@if(!empty($user->profile_video))
      
      <div class="" id="myElement1" style="border: 10px solid #CCC;border-radius:10px;">
                  </div>
      <a href="#" class="btn-file" data-toggle="modal" data-target="#uploadpro_video"><i style="margin-top:20px;margin-bottom:15px;" class="fa fa-upload" ></i> Change Video</a> 
                     <script type="text/javascript">
                           jwplayer("myElement1").setup({
                                   primary: "flash",
                                   file: "/assets/event_video/{{$user->profile_video}}",
                                   image: "/assets/profile/normal_{{$user->profile_pic}}",
                                   skin: { name: "bekle" },
                                 autoplay : true,
                                      width: "100%",
				    //logo: { hide: "true"},
                                aspectratio: "12:5",
                           });
                    </script>

	@else
 <div id="provideo" data-toggle="modal" data-target="#uploadpro_video"> Add Profile Video</div>        
	@endif
    
    </div> 

</div>


	  </div>
  </div>
</section>






	
         







          <!--<div class="col-md-12">
 <ul class="upbtns">
	     <a title="" id="opbtn"><li><span class="btn-file" style="padding: 6px 0px 6px 2px;margin-left: 25px;"><div class="icon-1" style="color: #262626;">Upload Video</div>  </span></li>
           		
            </a>
 	</ul>


 <form action="update_profile" method="POST" enctype="multipart/form-data">

	       <a href="#" class="btn-file"style="padding: 6px 0px 6px 2px;"><i class="fa fa-upload"></i> Upload Photo
           		 <input type="file" name="profile_pic" id="inputFile">
               </a>



 




	 </div>-->

 <form action="update_profile" method="POST" enctype="multipart/form-data">

          <div class="col-md-6">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group" style="position:relative">
              <label>DOB</label>
              <input id="datetimepicker" type="text" name="dob" class="form-control" value="{{$user->dob}}" placeholder="DOB"/>
              <span class="add-on"><i class="fa fa-calendar"></i></span> </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <label>Gender</label>
                <div class="form-inline">
                  <div class="row">
                    <div class="radio">
                      <input name="gender" value="Male" <?php if($user->gender == "Male") echo "checked"; ?> type="radio">
                      <label for="male"> Male </label>
                    </div>
                    <div class="radio">
                      <input name="gender" id="female" value="Female"  <?php if($user->gender == "Female") echo "checked"; ?>  type="radio">
                      <label for="female"> Female </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label>Weight</label>
                <div class="form-group">
                  <input name="weight" value="{{$user->weight}}" type="text" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Height</label>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" name="height_feet" value="{{$user->height_feet}}" class="form-control" placeholder="Feet">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="inches" name="height_inch" value="{{$user->height_inch}}">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" value="{{$user->email}}" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Phone</label>
              <input type="text" class="form-control" value="{{$user->phone}}" name="phone">
            </div>
          </div>
          <div class="col-md-6">
            <label>Languages Known</label>
            <div class="form-group">
              <input type="text" class="form-control" value="{{$user->language}}" name="language">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Eye Color</label>
              <select class="form-control" name="eye">
		 @if(!empty($user->eye))
               <option> {{$user->eye}}</option>
               @else
               <option> ---Select---</option>
               @endif
              <option> Black </option>
              <option>   Brown</option>
              <option>Blue   </option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Hair Style</label>
		
              <select name="hair" class="form-control">
		 @if(!empty($user->hair))
               <option> {{$user->hair}}</option>
		@else
               <option> ---Select---</option>
               @endif
              <option> Straight</option>  <option> Curly</option>  <option> Wavy </option>

              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Complexion</label>
              <select class="form-control" name="color">
		@if(!empty($user->color))
               <option> {{$user->color}}</option>
               @else
               <option> ---Select---</option>
               @endif
              <option> Fair</option>  <option>  Wheatish</option>  <option> Very Fair </option>
              <option> Dark, Brown </option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Say Something About You</label>
              <textarea class="form-control" rows="5" name="about_me">{{$user->about_me}}</textarea>
            </div>
          </div>
          <div class="col-md-6 add-more-box">
            <div class="form-group">
              <label>Experience &amp; Acheivements,School Level</label>
              <textarea class="form-control" rows="5" name="school_level">{{$user->school_level}}</textarea>
            </div>
          </div>
	  <div class="col-md-6 add-more-box">
            <div class="form-group">
              <label>College Level</label>
              <textarea class="form-control" name="college_level" rows="5">{{$user->college_level}}</textarea>
            </div>
          </div>
	<div class="col-md-6 add-more-box">
            <div class="form-group">
              <label>Work Level</label>
              <textarea class="form-control" name="work_level" rows="5">{{$user->work_level}}</textarea>
            </div>
          </div>
          <div class="clearfix"></div>
          	<!--<p><a href="#" class="add-more">Add More Experience &amp; Acheivements</a></p>-->
          <button class="bten" type="submit">Update Profile</button>
	</form>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
.btn-file {
	position: relative;
	overflow: hidden;
	background-color: #E74C3C;
	padding: 6px 15px 6px 15px;
	border-radius: 2px;
	color: #fff;
}
.btn-file:hover {
	color: #fff;
	text-decoration: none;
}
.btn-file input[type=file] {
	position: absolute;
	top: 4px;
	width: 100%;
	height: auto;
	left: -2px;
	right: 0;
	text-align: right;
	filter: alpha(opacity=0);
	opacity: 0;
	outline: none;
	background: white;
	cursor: inherit;
	display: block;
}
.add-on {
	position: absolute;
	right: 12px;
	top: 29px;
	color: #E74C3C;
}
</style>
<script src="{{asset('assets/new_theme/js/jquery.min.1.11.1.js')}}"></script> 
<script src="{{asset('assets/new_theme/js/bootstrap.min.js')}}"></script> 

<script src="{{asset('assets/new_theme/js/moment.js')}}"></script> 
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $('#datetimepicker').datepicker({dateFormat: 'yy-mm-dd', numberOfMonths:2});      
    </script> 
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
<script type="text/javascript">
   
    
    $(function(){
    var NewContent='<div class="col-md-6"><div class="form-group"><label>Experience &amp; Acheivements</label><textarea class="form-control" rows="5"></textarea></div></div>'
    $(".add-more").click(function(){
        $(".add-more-box").after(NewContent);
    });
});
</script> 
<script>
 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });      
</script>

<script>

function placechange(){


$('#status_text').attr('placeholder', ' ');

}


function changeplaceorg(){

$('#status_text').attr('placeholder', 'Enter your thoughts about the video you are about to upload  :)');

}

</script>



<script>
function imgfrm(){


$("#img_prev" ).html("<img src='assets/new_theme/images/ajax_loader2.gif' height='100px' width='150px'>");

 $(".imgupdate").submit();

}

function videofrm(){


$("#video_prev" ).html("<img src='assets/new_theme/images/ajax_loader2.gif' height='100px' width='150px'>");

$(".vidupdate").submit();


}


function test1fg(){


$(".mydiv" ).html("<img src='assets/new_theme/images/ajax_loader2.gif' height='100px' width='150px'>");

 $(".custom").submit();

}
</script>

  <script>
    function handleFileSelect(evt) {
    var files = evt.target.files;

    for (var i = 0, f; f = files[i]; i++) {
     

	      if (!f.type.match('image.*')) {
		continue;
	      }

   	   var reader = new FileReader();
	   $("#fileselect").hide();
		$("#userpro_img").hide();
$( "#img_load" ).html("<div class='col-xs-7 col-sm-4 bfd-info'> <span id='removeimg' class='fa fa-times-circle bfd-remove'></span>  "+ f.name +" </div><div class='col-xs-5 col-sm-8 bfd-progress'>  <div class='progress'> <div id='n' class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='" + f.size + "'> <span class='sr-only'>0%</span> </div></div></div>");

$( "#img_load" ).show();

$("#removeimg").click(function(){

	 $("#fileselect").show();
$("#userpro_img").show();
	 $( "#img_prev" ).hide();
         $( "#img_load" ).hide();

});

 	   reader.onprogress = function(f) {
                    var o = Math.round(100 * f.loaded / f.total) + "%";
                   $("#n").attr("aria-valuenow", f.loaded), $("#n").css("width", o);
                };

   	   reader.onload = (function(theFile) {
		return function(e) {
		
			  $( "#img_prev" ).html( "<img src='"+e.target.result+"' height='250px' width='350px'>" );	
			  $( "#img_prev" ).show();			    
		};


      })(f);

      reader.readAsDataURL(f);

    }

  }

 document.getElementById('files').addEventListener('change', handleFileSelect, false);

  </script>


<script>
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
	$("#userimg_video").hide();
	
$( "#video_load" ).html("<div class='col-xs-7 col-sm-4 bfd-info'> <span id='removevideo' class='fa fa-times-circle bfd-remove'></span>  "+ f.name +" </div><div class='col-xs-5 col-sm-8 bfd-progress'>  <div class='progress'> <div id='m' class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='" + f.size + "'> <span class='sr-only'>0%</span> </div></div></div>");

$( "#video_load" ).show();

$("#removevideo").click(function(){

       $("#fileselectvideo").show();
	$("#userimg_video").show();
	$( "#video_prev" ).hide();
	$( "#video_load" ).hide();
       

});


 reader.onprogress = function(f) {
                    var o = Math.round(100 * f.loaded / f.total) + "%";
                   $("#m").attr("aria-valuenow", f.loaded), $("#m").css("width", o);
                };

         reader.onload = (function(theFile) {

        return function(e) {
		  $( "#video_prev" ).html("<video src='"+e.target.result+"' height='250px' width='350px'></video>"  );	
 $( "#video_prev" ).show();	            
        };
       
      })(f);

      reader.readAsDataURL(f);

    }

  }

 document.getElementById('video').addEventListener('change', handleVideoSelect, false);


</script>
<script> $.validate(); </script>


@stop
