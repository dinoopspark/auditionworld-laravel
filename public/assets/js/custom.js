var video        = "";
var authenticate = false;
var item_per_page = 8;
var tab_type = "All";
var track_click = 0;
var look = "---Select---";
var gender = "---Select---";
var eye = "---Select---";
var hair = "---Select---";
var com = "---Select---";
var name= "";
var comment_id =0;


function clear_data_for_name(){
  video        = "";
 authenticate = false;
 item_per_page = 8;
 tab_type = "All";
 track_click = 0;
 look = "---Select---";
 gender = "---Select---";
 eye = "---Select---";
 hair = "---Select---";
 com = "---Select---";
 name= "";


}

function hasParentClass( e, classname ) {
    if(e === document) return false;
    if( classie.has( e, classname ) ) {
      return true;
    }
    return e.parentNode && hasParentClass( e.parentNode, classname );
  }
$(document).keyup(function(e) {

  if (e.keyCode == 27) {
	$("#invalid").html("");
      overlay = document.querySelector( 'div.overlay' );
      classie.remove( overlay, 'open' );
      classie.add( overlay, 'close' );
      var onEndTransitionFn = function( ev ) {
        classie.remove( overlay, 'close' );
        $(".reg_clear").val("");
        $("#error_already").hide();
        $("#created_success").hide();
      };
      
      path.animate( { 'path' : pathConfig.from }, 400, mina.linear, onEndTransitionFn );
      
      var container = document.getElementById( 'st-container' );  
      resetMenu = function() {
        $(".reg_clear").val("");
        classie.remove( container, 'st-menu-open' );
      }
      
        if(!hasParentClass(e.target,'st-menu')) {
          resetMenu();
           
        }
     
  }   
});
$(document).ready(function(){
	$("#trigger_nav_1").click(function(){
		$("#trigger-overlay2").click();
	});

	$("#flip").click(function(){

		new Messi('<li class="font_size"> In your profile video you should showcase your emotions, should be a solo performance. You can have your own script.</li><li class="font_size">Video format<ul><li>Duration: 3 min</li><li>Size: 20 MB</li><li>Quality: 360p or 240p</li></ul></li>', {title: 'For your information', titleClass: 'anim warning', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	});

	$(".st-pusher").click(function(){
		$("#invalid").html("");
	});


$(".watchlist").click(function(){
  element = $(this);
  var user = $(this).attr('id');
  var evnt = $(this).attr('event');
  var v_id = $(this).attr('video_id');
  $.ajax({
          url : "/watchlist",
          type: "POST",
          data:{eid:evnt,uid:user,v_id:v_id},
          success: function(data, textStatus, jqXHR)
          {
            if($.trim(data)=="sucess"){
             jAlert("It has been added to watchlist");
		element.remove();
             }else{
              jAlert("Already added");
             }
          }
      }); 
 
})

$("#show").click(function(){
  $(".adv-srch").toggle();
  $("select").val("---select---");
  $(".token-input-list").hide();
});
$("#lookin").change(function(){
   look = document.getElementById('lookin').value;
  $("#srch_res").val(look);
});

$("#eventreport").change(function() {
 var event = document.getElementById('eventreport').value;
  $.ajax({
         url : "/eventreport",
          type: "POST",
          data:{eid:event},
          success: function(data, textStatus, jqXHR)
          {
             $("#resultevent").html(data);
          }
      });                                                                                                      
})



$(".proto").click(function(){
  $('#protofolio').submit();
})

$(".default").click(function(){
  $('#userdefault').submit();
})

$("#Audapply").click(function(){
  $('#applynow-form').submit();
})
if($("#form_wrap form").is(":visible")){
  $("#form_wrap form").mouseenter(function(){
      $(this).css({
        'top':'0px','height':'504px',
        '-moz-transition': 'all 1s ease-in-out .3s',
          '-webkit-transition': 'all 1s ease-in-out .3s',
      
      '-o-transition':'all 1s ease-in-out .3s',
      'transition': 'all 1s ease-in-out .3s',
        })
    });
    $("#form_wrap form").mouseleave(function(){
      $(this).css({
        'top':'130px','height':'504px',
         '-moz-transition': 'all 1s ease-in-out .3s',
          '-webkit-transition': 'all 1s ease-in-out .3s',
      
      '-o-transition':'all 1s ease-in-out .3s',
      'transition': 'all 1s ease-in-out .3s',
        })
    });
}
$("#filter_search").click(function(){
  look = document.getElementById('lookin').value;
  gender = document.getElementById('gender').value;
  eye = document.getElementById('eye').value;
  hair = document.getElementById('hair').value;
  com = document.getElementById('complexion').value;
  name = document.getElementById('tag').value;
  loadImages(tab_type,track_click);
});   
 
 $("#namesearch").click(function(){
  clear_data_for_name();
   name = document.getElementById('tag').value;

   loadImages(tab_type,track_click);
   setTimeout(function(){
      var nb = $('#change_view').length;
      if(nb ==1){
          if($("#change_view").attr("type") == "Actor"){
                  $( "#all" ).removeClass( "talent-menu-but-active" );
                  $( "#model" ).removeClass( "talent-menu-but-active" );
                  $("#actor").addClass( "talent-menu-but-active" );
          }else if($("#change_view").attr("type") == "Model"){
                  $( "#all" ).removeClass( "talent-menu-but-active" );
                  $( "#actor" ).removeClass( "talent-menu-but-active" );
                  $("#model").addClass( "talent-menu-but-active" );

          }
      }
  }, 100);
   

})


$("#actor").click(function(){
  $( "#all" ).removeClass( "talent-menu-but-active" );
  $( "#model" ).removeClass( "talent-menu-but-active" );
   $( "#protfolio_img" ).removeClass( "talent-menu-but-active" );
  $(this).addClass( "talent-menu-but-active" );
  tab_type = "Model";
  track_click = 0;
  loadImages(tab_type,track_click);
});
$("#protfolio_img").click(function(){
  $( "#all" ).removeClass( "talent-menu-but-active" );
  $( "#model" ).removeClass( "talent-menu-but-active" );
  $(this).addClass( "talent-menu-but-active" );
  tab_type = "Image";
  track_click = 0;
  loadImages(tab_type,track_click);
});

$("#model").click(function(){
  $( "#all" ).removeClass( "talent-menu-but-active" );
  $( "#actor" ).removeClass( "talent-menu-but-active" );
  $(this).addClass( "talent-menu-but-active" );
  tab_type = "Actor";
  track_click = 0;
  loadImages(tab_type,track_click);
});

$("#all").click(function(){
  $( "#model" ).removeClass( "talent-menu-but-active" );
  $( "#actor" ).removeClass( "talent-menu-but-active" );
$( "#protfolio_img" ).removeClass( "talent-menu-but-active" );
  $(this).addClass( "talent-menu-but-active" );

  tab_type = "All";
  track_click = 0;
  loadImages(tab_type,track_click);
});

loadImages(tab_type);
$(".load_more").click(function (e) {
    var total   = document.getElementById('total_rows').value;
    var total_pages = Math.ceil(total/item_per_page);
    
    $(this).hide(); //hide load more button on click
    $('.animation_image').show(); //show loading image
    if(track_click <= total_pages) //make sure user clicks are still less than total pages
    {
       track_click++;
      //post page number iand load returned data into result element
      $.post('fetch_pages',{'page': track_click,'tab_type':tab_type,'look':look,'hair':hair,'eye':eye,'gender':gender,'comp':com,'name':name}, function(data) {
        if($('#no_result').length ==0){
         //   $(".load_more").show(); //bring back load more button
            
            $("#results").append(data); //append data received from server
            
            //scroll page to button element
            $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
            
            //hide loading image
            $('.animation_image').hide(); //hide loading image once data is received
        } else{
	   $(".load_more").hide();
            $(".load_more").show(); 
            $('.animation_image').hide();
        }
  
        //user click increment on load button
          
      }).fail(function(xhr, ajaxOptions, thrownError) { 
        alert(thrownError); //alert any HTTP error
        $(".load_more").show(); //bring back load more button
        $('.animation_image').hide(); //hide loading image once data is received
      });
      
      
      if(track_click >= total_pages-1)
      {
        $(".load_more").attr("disabled", "disabled");
      }
     } else{
            $(".load_more").show(); 
            $('.animation_image').hide();
     }
      
    });



 



  $("#verifyemail").click(function(){
    var user = $( this ).attr( "user" );
    // alert(user);
    $.ajax({
         url : '/verify/'+user,
          type: "GET",
          success: function(data, textStatus, jqXHR)
          {

                   $("#message").show();
                   $("#message").fadeOut(9000);
               
          }
      });
    
  });

  $(".like-bg").click(function(){
    var video =  $(this).attr('id');
    var user  =  $(this).attr('userid');

    $.ajax({
         url : auditionurl,
          type: "POST",
          data:{vid:video,uid:user},
          success: function(data, textStatus, jqXHR)
          {
            if($.trim(data) == 'liked')
              {
              $(".like-bg").html("<img src='/assets/images/dummy/video/like.png'>");
                return false;
               }
          }
      });
  });
          

  $(".checkapply").click(function(e){
    if(authenticate == "true"){
      e.preventDefault();
      var eventid = $(this).attr('id');
      $.ajax({
        url  : checkuser,
        type : "POST",
        data : {eventid:eventid},
        success : function(data, textStatus, jqXHR)
        {
          if($.trim(data) == 'applied') {
            $(".checkapply").hide();
            $("#already").css("display", "block");
                return false;
          }
        }
      });
    }
  });


$("#comments").focus(function(){
  $(".close_post").show();
  $(".myButton").fadeIn("slow"); 
  
});

$(".close_post").click(function(){
  $(".myButton").fadeOut("slow");
  $(".close_post").hide(); 
  $("#comments").val(""); 
  // $(".myButton").css("visibility","hidden");
});

$(".myButton").click(function(){

  var comnt = $("#comments").val();
      if(comnt !=''){
        video = $("#comments").attr('video');
        videoType = $("#comments").attr('videoType');
      
         $.ajax({
             url : comment,
             type: "POST",
             data:{comment:comnt,video:video,type:videoType },
            success: function(dataout, textStatus, jqXHR)
            {
              data = $.trim(dataout); 
              if(data.indexOf("user") > -1){
		   pic = $("#profile_pic_user").val();
		   name= $("#name_user").val();
		   split = data.split(',');
		   id = split[1];
			console.log(pic+' '+id); 
                   //$(".flash").html("Comment has been submitted for approval");
                   text = $("#comments").val();
		  $('<div class="cmnt-row" id="comment_'+ id +'"> <div class="cmnt-lft"> <img src="/assets/profile/'+pic+'" style="height:56px;width:56px;"> </div>       <a title="delete" href="javascript:;" class="comment_close" commentid="'+id+'" onclick="deleteComment('+id+')"><img  src="/assets/images/close-button.png"></a>              <div class="cmnt-rgt"> <h6>  '+name+' <span> Today</span> </h6>  <p>'+text+'</p> </div></div>').insertAfter( "#comment_count" );
			$("#comments").val("");
			var count = $("#comment_count").attr( 'count' );
	                count++;
	                $("#comment_count").text(count+" Comments");
	                $("#comment_count").attr("count",count);
	

                }
              if(data.indexOf("guest") > -1){
                   split = data.split(',');
                   comment_id = split[1];
		  $("#model_comment").show();
                }
                
            }
          });
       }
});



  $("#comments").keydown(function(e){
    var key = (window.event) ? e.keyCode : e.which;
    if(key  == 13) {
        }  
    });

$("#all").click();
}); /* End of Document ready */

function test(obj,i){
 document.getElementById("uploadFile"+i).value = obj.value;
}


function formsubmit(){

var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
var passw=  /^(?=.*\d)(?=.*[a-z])[a-z\d]{2,}$/i; 
var regname   = document.getElementById('regname').value;
var address   = document.getElementById('address').value;
var email     = document.getElementById('email').value;
var phone     = document.getElementById('phone').value;
var dob       = document.getElementById('dob').value;
var pass      = document.getElementById('password').value;
var language  = document.getElementById('language').value;
var category  = document.getElementById('category').value;
var pic       = document.getElementById('uploadBtn').value;
var error_exist =0;
$("#error_already").html("");
 if(dob == '')
 {
     document.getElementById('dob').value = "1970-01-01";
 }
if(regname==''){
   document.getElementsByName('name')[0].placeholder='Please enter name';
   $("#regname").addClass("holder_color");
   error_exist =1;
  }
if(address==''){
   document.getElementsByName('address')[0].placeholder='Please enter Address';
   $("#address").addClass("holder_color");
   error_exist =1;
  }
 if(email==''){
   document.getElementsByName('email')[1].placeholder='Please enter email';
   $("#email").addClass("holder_color");
   error_exist =1;
  }
 if(pic==''){
   document.getElementsByName('uploadFile')[0].placeholder='Please upload a profile picture';
   $("#uploadFile").addClass("holder_color");
   error_exist =1;
  }
 if(language=='MotherTongue'){
   $("#language").addClass("holder_color");
   error_exist =1;
  }
 if(category=='Category'){
   $("#category").addClass("holder_color");
   error_exist =1;
  }
  if(pass==''){
   document.getElementsByName('password')[1].placeholder='Please enter password';
   $("#password").addClass("holder_color");
   error_exist =1;
  }
  else if(!passw.test(pass)){
   $("#password").val("");
   document.getElementsByName('password')[1].placeholder='Please enter alphanumeric password';
   $("#password").addClass("holder_color");
   error_exist =1;
  }
  if(phone==''){
   document.getElementsByName('phone')[0].placeholder='Please enter Contact number';
   $("#phone").addClass("holder_color");
   error_exist =1;
  }
  if(!email.match(mailformat)){
     $("#email").val("");
    document.getElementsByName('email')[1].placeholder='Please enter a valid email';
    $("#email").addClass("holder_color");
   error_exist =1;
  }
if ($("#accept_terms").prop('checked') == true) {
 }
else {
	$("#error_already").show();
	$("#error_already").html("Please accept the terms and condition");
	   error_exist =1;
 }
	if(error_exist == 1){
		return false;

	} 
  
  var formData = new FormData($("form#regist_form")[0]);
  
    $("#error_already").hide(); 
    $("#created_success").html("Please wait, the image is being uploaded....");
   // $("#created_success").html("Please wait....");
    $("#created_success").css("display","block");
  
setTimeout(function(){
    $.ajax({
        url: "/register",
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            $("#created_success").hide();
            $("#error_already").hide();

              data = $.trim(data);
              // alert(data);
              if(data == "created"){
                  $("#created_success").html("you are registered with success, an email sent to your mail id, please follow the link");
                   $("#created_success").show();
              }else if(data == "error email"){
                  
                  $("#error_already").html("user already exist");
                  $("#error_already").show();
              }else{
                  $("#error_already").html("phone number already taken");
                  $("#error_already").show();
              }
        },
        cache: false,
        contentType: false,
        processData: false
     });
    }, 10);



  return false;
}

function keyTrigger(oby,e){
  var key = window.event ? e.keyCode : e.which;
  var items=String.fromCharCode(key);
  var match_char= /[\d\b\t]/;
//  if(!match_char.test(items))
    if ((key >= 48 && key <= 57) || (key >= 96 && key <= 105) ||(key == 8)){

    } else{
    	return false;
    }
}



function checklog(){

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
          url : "authenticate",
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
                   window.location.reload();
                }

          }
          
  });
}


function apply(obj){
  var id = $(obj).attr('id');
  var name = $(obj).attr('title');
  //alert(name);
  document.getElementById("Audname").innerHTML = name;
  document.getElementById("Audid").value = id;  
}


function sendmail(){

 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 

  var email     = $("#email").val();
  var name1      = $("#name").val();
  var phone     = $("#phone").val();
  var message1   = $("#message").val();

  if(name1==""){
    document.getElementsByName('con_name')[0].placeholder='Please enter name';
   $("#name").addClass("holder_color");
   return false;
  }
  if(email==''){
   document.getElementsByName('con_email')[0].placeholder='Please enter email';
    $("#email").addClass("holder_color");
   return false;
  }
   if(!email.match(mailformat)){
     $("#email").val("");
    document.getElementsByName('con_email')[0].placeholder='Please enter a valid email';
    $("#email").addClass("holder_color");
   return false;
  }
  
  if(phone==""){
    document.getElementsByName('con_phone')[0].placeholder='Please enter phone number';
    $("#phone").addClass("holder_color");
   return false;
  }
  if(message1==""){
    document.getElementsByName('con_message')[0].placeholder='Please enter message';
    $("#message").addClass("holder_color");
   return false;
  }
   $(".ajaxloader").html('<img src="/assets/images/ajax-loader.gif">');
   $.ajax({
         url : "sendmail",
          type: "POST",
          data:{email:email,name:name1,phone:phone,message_text:message1},
          success: function(dataout, textStatus, jqXHR)
          {
            if($.trim(dataout) == "contact"){

             $("#ack").html("<i class='fa fa-check' aria-hidden='true'></i> Will contact you soon");
             $(".ajaxloader").html('');
             $('#name').val("");
             $('#email').val("");
             $('#phone').val("");
             $('#message').val("");
           }
          }
    });
  // $("#sendform").css({
  //       'top':'40px','height':'504px',
  //        '-moz-transition': 'all 1s ease-in-out .3s',
  //         '-webkit-transition': 'all 1s ease-in-out .3s',
      
  //     '-o-transition':'all 1s ease-in-out .3s',
  //     'transition': 'all 1s ease-in-out .3s',
  //       })
  //       return false;

}
function getFile(){
   document.getElementById("upfile").click();
 }

 function advance(obj){
  var sid = $(obj).attr('id');
  var sval = $(obj).attr('value');
  $("#demo-input-plugin-methods").tokenInput("");
  $("#demo-input-plugin-methods").tokenInput("add", {id: sid, name: sval});
 }

 function sub(obj){
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
    document.myForm.submit();
    event.preventDefault();
  }

 function setTime()
  {

    if( (document.getElementById('hour').value!='') && (document.getElementById('minute').value!='') && (document.getElementById('second').value!='') )
    {
      var hour  = document.getElementById('hour').value;
      var minute = document.getElementById('minute').value;
      var second   = document.getElementById('second').value;
      var time = hour+":"+minute+":"+second;
      document.getElementById('time').value = time;
    }
  }

  function setDob(){
     if( (document.getElementById('day').value!='') && (document.getElementById('month').value!='') && (document.getElementById('year').value!='') )
    {
      var day  = document.getElementById('day').value;
      var month = document.getElementById('month').value;
      var year   = document.getElementById('year').value;
      var date = year+"-"+month+"-"+day;
      document.getElementById('dob').value = date;
    }
  }


function authenticatesignature(){
  //var box    = $(".messi").css('display','none')
 // $("#model_comment").hide();
 $("#error_msg").html(""); 
  var email  = $("#guest_email").val();
  var name= $("#guest_name").val();
  if(name =='' || email == ''){
	$("#error_msg").html("Please fill all fields.");
  } else {
	$('#loading').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');
        $(".flash").html('');
         $(".flash").show();
  $.ajax({
         url : "/guestauth",
          type: "POST",
          data:{email:email,video:video,name:name,comment_id:comment_id},
          success: function(dataout, textStatus, jqXHR)
          {
            if($.trim(dataout)=="comment"){
                $('#loading').html('');
                $(".flash").html("Please check your mail and follow the link.");
                $("#comments").val("");
                $(".flash").fadeOut(5000);
		
              }                                                 
          }
        });
    $("#model_comment").hide();
    }
  
}
function loadImages(obj,track_click)
{
  if(track_click===undefined)
      return false;
  $('#results').load("fetch_pages", {'page':track_click,'tab_type':obj,'look':look,'hair':hair,'eye':eye,'gender':gender,'comp':com,'name':name}, function() {track_click++;});
 	$(".load_more").show();
}


function apply_for_audition(id){
  
  var ext = $('#uploadBtn'+id).val().split('.').pop().toLowerCase();
  if($.inArray(ext, ['mp4','flv']) == -1) {
      $("#error_upload_audition"+id).fadeIn("slow");
      $("#error_upload_audition"+id).fadeOut(4000);
      return false;
    }
  
  
}
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}


function changeProfilePic() {
    
    $("input[id='my_file']").click();

    $('#my_file').change(function(){
               var name = $('#my_file').attr('name');
               var formData1 = new FormData($("form#form_change_pic")[0]);
            

            var Extension = $('#my_file').val().substring($('#my_file').val().lastIndexOf('.') + 1).toLowerCase();

            if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
               
            }
            else {
                alert("please upload image");
               return false;
            }
        
  

    $.ajax({
        url: "/update_pic",
        type: 'POST',
        data: formData1,
        async: false,
        success: function (data) {
         location.reload();
        },
        cache: false,
        contentType: false,
        processData: false
     });
           return false;
    });
    return false;
}


function deleteComment(id){

    

    $.ajax({
         url : "/comment_delete",
          type: "POST",
          data:{id:id},
          success: function(dataout, textStatus, jqXHR)
          {
              if($.trim(dataout)=="success"){
                $("#comment_"+id).hide();
                var count = $("#comment_count").attr( 'count' );
                count--;
                $("#comment_count").text(count+" Comments");
                $("#comment_count").attr("count",count);
                
              }
                                                            
          }
        });

    
}
function deleteVideo(id){
  
  $.ajax({
         url : "/delete_video",
          type: "POST",
          data:{id:id},
          success: function(dataout, textStatus, jqXHR)
          {
              if($.trim(dataout)=="success"){
               location.reload();
                
              }
                                                            
          }
        });

}
function deleteImage(id){

    $.ajax({
         url : "/delete_image",
          type: "POST",
          data:{id:id},
          success: function(dataout, textStatus, jqXHR)
          {
              if($.trim(dataout)=="success"){
               location.reload();
                
              }
                                                            
          }
        });
    
}

function formsubmit_new(){

var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
var passw=  /^(?=.*\d)(?=.*[a-z])[a-z\d]{2,}$/i; 
var regname   = document.getElementById('regname').value;
var email     = document.getElementById('email').value;
var phone     = document.getElementById('phone').value;
var pass      = document.getElementById('password').value;
var pass_c      = document.getElementById('password_confirm').value;
var error_exist =0;
$("#error_already").html("");
if(regname==''){
   document.getElementsByName('name')[0].placeholder='Please enter name';
   $("#regname").addClass("holder_color");
   error_exist =1;
  }
 if(email==''){
   document.getElementsByName('email')[1].placeholder='Please enter email';
   $("#email").addClass("holder_color");
   error_exist =1;
  }
  if(pass==''){
   document.getElementsByName('password')[1].placeholder='Please enter password';
   $("#password").addClass("holder_color");
   error_exist =1;
  }
  else if(!passw.test(pass)){
   $("#password").val("");
   document.getElementsByName('password')[1].placeholder='Please enter alphanumeric password';
   $("#password").addClass("holder_color");
   error_exist =1;
  }
if(pass_c==''){
   $('#password_confirm').attr('placeholder','Please enter password');
   $("#password_confirm").addClass("holder_color");
   error_exist =1;
  }
if(pass_c != pass){
	$("#password_confirm").addClass("holder_color");
	$("#password").addClass("holder_color");
	 $('#password_confirm').attr('placeholder','Passwords are not same');
	document.getElementsByName('password')[1].placeholder='Passwords are not same';

}
  if(phone==''){
   document.getElementsByName('phone')[0].placeholder='Please enter Contact number';
   $("#phone").addClass("holder_color");
   error_exist =1;
  }
  if(!email.match(mailformat)){
     $("#email").val("");
    document.getElementsByName('email')[1].placeholder='Please enter a valid email';
    $("#email").addClass("holder_color");
   error_exist =1;
  }
if ($("#agree").prop('checked') == true) {
 }
else {
	$("#error_already").show();
	$("#error_already").html("Please accept the terms and condition");
	   error_exist =1;
 }
	if(error_exist == 1){
		return false;

	} 
  
  var formData = new FormData($("form#regist_form")[0]);
  
    $("#error_already").hide(); 
    $("#created_success").html("Please wait ....");
   // $("#created_success").html("Please wait....");
    $("#created_success").css("display","block");
  
setTimeout(function(){
    $.ajax({
        url: "/register",
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            $("#created_success").hide();
            $("#error_already").hide();

              data = $.trim(data);
              // alert(data);
              if(data == "created"){
                  $("#created_success").html("You are registered with success, an email sent to your mail id, please follow the link");
                   $("#created_success").show();
              }else if(data == "error email"){
                  
                  $("#error_already").html("User already exist");
                  $("#error_already").show();
              }else{
                  $("#error_already").html("Phone number already taken");
                  $("#error_already").show();
              }
        },
        cache: false,
        contentType: false,
        processData: false
     });
    }, 10);



  return false;
}



























$(document).ready(function(){
	var pressed= 0;
	$(".upload_anchor").click(function(event){
		seq_num = $(this).attr('seq_num');
		//$( ".upload_anchor" ).removeClass("upload_anchor" );
		id="upfile_"+ seq_num;
		console.log(id);
		new Messi('<ul class="faq-ul"> <li>It should be limited to 3 minutes. </li><li>You can make use of your own scripts (please avoid mimicing the famous filmy scenes. Apply some creativity, you can take the help of your friends) </li><li>You can shoot with your normal camera provided the video has the right clarity with minimum 240p  and maximum 360p.  </li><li>Max size of video shouldn\'t be above 15MB. </li><li>You can edit the scenes, indoor or outdoor not a criteria. </li><li>Voice should be clear and it would be better if you use a color mic. </li><li>Dubbing is not preferred. </li><li>You shouldn\'t explicitly mention your contact details on the video. </li><li>No language, gender or age limit </li><li>Supported video formats are mp4 and flv. </li></ul>', {title: 'For Your Information', buttons: [{id: 0, label: 'Yes, I understand', val: 'Y'} ], callback: function(val) {


		
			 }});
			event.preventDefault();
			$(".btn").unbind("click").bind("click", function () {
				$("#"+id).unbind("click").bind("click", function () {
					seq_num = $(this).attr('seq_num');
					
				});
				   $("#"+id).click();
			});
		//$( ".upload_anchor" ).removeAttr("disabled");
	});

});




