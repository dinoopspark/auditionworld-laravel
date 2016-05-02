<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title></title>
	<meta name="generator" content="LibreOffice 4.2.3.3 (Linux)">
	<meta name="created" content="0;0">
	<meta name="changedby" content="Soni Joy">
	<meta name="changed" content="20160329;94826895808783">
	<style type="text/css">
	<!--
		h6.cjk { font-family: "Droid Sans Fallback" }
		h6.ctl { font-family: "FreeSans" }
	-->
	</style>
</head>
<body lang="en-IN" dir="ltr" style="background: transparent">
<p style="margin-bottom: 0cm">var video = &quot;&quot;; var
authenticate = false; var item_per_page = 8; var tab_type = &quot;All&quot;;
var track_click = 0; var look = &quot;---Select---&quot;; var gender
= &quot;---Select---&quot;; var eye = &quot;---Select---&quot;; var
hair = &quot;---Select---&quot;; var com = &quot;---Select---&quot;;
var name= &quot;&quot;; var comment_id =0; function
clear_data_for_name(){ video = &quot;&quot;; authenticate = false;
item_per_page = 8; tab_type = &quot;All&quot;; track_click = 0; look
= &quot;---Select---&quot;; gender = &quot;---Select---&quot;; eye =
&quot;---Select---&quot;; hair = &quot;---Select---&quot;; com =
&quot;---Select---&quot;; name= &quot;&quot;; } function
hasParentClass( e, classname ) { if(e === document) return false; if(
classie.has( e, classname ) ) { return true; } return e.parentNode &amp;&amp;
hasParentClass( e.parentNode, classname ); }
$(document).keyup(function(e) { if (e.keyCode == 27) {
$(&quot;#invalid&quot;).html(&quot;&quot;); overlay =
document.querySelector( 'div.overlay' ); classie.remove( overlay,
'open' ); classie.add( overlay, 'close' ); var onEndTransitionFn =
function( ev ) { classie.remove( overlay, 'close' );
$(&quot;.reg_clear&quot;).val(&quot;&quot;);
$(&quot;#error_already&quot;).hide(); $(&quot;#created_success&quot;).hide();
}; path.animate( { 'path' : pathConfig.from }, 400, mina.linear,
onEndTransitionFn ); var container = document.getElementById(
'st-container' ); resetMenu = function() { $(&quot;.reg_clear&quot;).val(&quot;&quot;);
classie.remove( container, 'st-menu-open' ); }
if(!hasParentClass(e.target,'st-menu')) { resetMenu(); } } });
$(document).ready(function(){ $(&quot;#trigger_nav_1&quot;).click(function(){
$(&quot;#trigger-overlay2&quot;).click(); });
$(&quot;#flip&quot;).click(function(){ new Messi('</p>
<ul>
	<li><p style="margin-bottom: 0cm">In your profile video you should
	showcase your emotions, should be a solo performance. You can have
	your own script.</p>
</ul>
<ul>
	<li><p>Video format</p>
</ul>
<ul>
	<li><p style="margin-bottom: 0cm">Duration: 3 min</p>
	<li><p style="margin-bottom: 0cm">Size: 20 MB</p>
	<li><p>Quality: 360p or 240p</p>
</ul>
<p>', {title: 'For your information', titleClass: 'anim warning',
buttons: [{id: 0, label: 'Close', val: 'X'}]}); });
$(&quot;.st-pusher&quot;).click(function(){ $(&quot;#invalid&quot;).html(&quot;&quot;);
}); $(&quot;.watchlist&quot;).click(function(){ element = $(this);
var user = $(this).attr('id'); var evnt = $(this).attr('event'); var
v_id = $(this).attr('video_id'); $.ajax({ url : &quot;/watchlist&quot;,
type: &quot;POST&quot;, data:{eid:evnt,uid:user,v_id:v_id}, success:
function(data, textStatus, jqXHR) { if($.trim(data)==&quot;sucess&quot;){
jAlert(&quot;It has been added to watchlist&quot;); element.remove();
}else{ jAlert(&quot;Already added&quot;); } } }); })
$(&quot;#show&quot;).click(function(){ $(&quot;.adv-srch&quot;).toggle();
$(&quot;select&quot;).val(&quot;---select---&quot;);
$(&quot;.token-input-list&quot;).hide(); });
$(&quot;#lookin&quot;).change(function(){ look =
document.getElementById('lookin').value; $(&quot;#srch_res&quot;).val(look);
}); $(&quot;#eventreport&quot;).change(function() { var event =
document.getElementById('eventreport').value; $.ajax({ url :
&quot;/eventreport&quot;, type: &quot;POST&quot;, data:{eid:event},
success: function(data, textStatus, jqXHR) {
$(&quot;#resultevent&quot;).html(data); } }); })
$(&quot;.proto&quot;).click(function(){ $('#protofolio').submit(); })
$(&quot;.default&quot;).click(function(){ $('#userdefault').submit();
}) $(&quot;#Audapply&quot;).click(function(){
$('#applynow-form').submit(); }) if($(&quot;#form_wrap
form&quot;).is(&quot;:visible&quot;)){ $(&quot;#form_wrap
form&quot;).mouseenter(function(){ $(this).css({
'top':'0px','height':'504px', '-moz-transition': 'all 1s ease-in-out
.3s', '-webkit-transition': 'all 1s ease-in-out .3s',
'-o-transition':'all 1s ease-in-out .3s', 'transition': 'all 1s
ease-in-out .3s', }) }); $(&quot;#form_wrap
form&quot;).mouseleave(function(){ $(this).css({
'top':'130px','height':'504px', '-moz-transition': 'all 1s
ease-in-out .3s', '-webkit-transition': 'all 1s ease-in-out .3s',
'-o-transition':'all 1s ease-in-out .3s', 'transition': 'all 1s
ease-in-out .3s', }) }); } $(&quot;#filter_search&quot;).click(function(){
look = document.getElementById('lookin').value; gender =
document.getElementById('gender').value; eye =
document.getElementById('eye').value; hair =
document.getElementById('hair').value; com =
document.getElementById('complexion').value; name =
document.getElementById('tag').value;
loadImages(tab_type,track_click); });
$(&quot;#namesearch&quot;).click(function(){ clear_data_for_name();
name = document.getElementById('tag').value;
loadImages(tab_type,track_click); setTimeout(function(){ var nb =
$('#change_view').length; if(nb ==1){
if($(&quot;#change_view&quot;).attr(&quot;type&quot;) == &quot;Actor&quot;){
$( &quot;#all&quot; ).removeClass( &quot;talent-menu-but-active&quot;
); $( &quot;#model&quot; ).removeClass( &quot;talent-menu-but-active&quot;
); $(&quot;#actor&quot;).addClass( &quot;talent-menu-but-active&quot;
); }else if($(&quot;#change_view&quot;).attr(&quot;type&quot;) ==
&quot;Model&quot;){ $( &quot;#all&quot; ).removeClass(
&quot;talent-menu-but-active&quot; ); $( &quot;#actor&quot;
).removeClass( &quot;talent-menu-but-active&quot; );
$(&quot;#model&quot;).addClass( &quot;talent-menu-but-active&quot; );
} } }, 100); }) $(&quot;#actor&quot;).click(function(){ $( &quot;#all&quot;
).removeClass( &quot;talent-menu-but-active&quot; ); $( &quot;#model&quot;
).removeClass( &quot;talent-menu-but-active&quot; ); $(
&quot;#protfolio_img&quot; ).removeClass( &quot;talent-menu-but-active&quot;
); $(this).addClass( &quot;talent-menu-but-active&quot; ); tab_type =
&quot;Model&quot;; track_click = 0; loadImages(tab_type,track_click);
}); $(&quot;#protfolio_img&quot;).click(function(){ $( &quot;#all&quot;
).removeClass( &quot;talent-menu-but-active&quot; ); $( &quot;#model&quot;
).removeClass( &quot;talent-menu-but-active&quot; );
$(this).addClass( &quot;talent-menu-but-active&quot; ); tab_type =
&quot;Image&quot;; track_click = 0; loadImages(tab_type,track_click);
}); $(&quot;#model&quot;).click(function(){ $( &quot;#all&quot;
).removeClass( &quot;talent-menu-but-active&quot; ); $( &quot;#actor&quot;
).removeClass( &quot;talent-menu-but-active&quot; );
$(this).addClass( &quot;talent-menu-but-active&quot; ); tab_type =
&quot;Actor&quot;; track_click = 0; loadImages(tab_type,track_click);
}); $(&quot;#all&quot;).click(function(){ $( &quot;#model&quot;
).removeClass( &quot;talent-menu-but-active&quot; ); $( &quot;#actor&quot;
).removeClass( &quot;talent-menu-but-active&quot; ); $(
&quot;#protfolio_img&quot; ).removeClass( &quot;talent-menu-but-active&quot;
); $(this).addClass( &quot;talent-menu-but-active&quot; ); tab_type =
&quot;All&quot;; track_click = 0; loadImages(tab_type,track_click);
}); loadImages(tab_type); $(&quot;.load_more&quot;).click(function
(e) { var total = document.getElementById('total_rows').value; var
total_pages = Math.ceil(total/item_per_page); $(this).hide(); //hide
load more button on click $('.animation_image').show(); //show
loading image if(track_click &lt;= total_pages) //make sure user
clicks are still less than total pages { track_click++; //post page
number iand load returned data into result element
$.post('fetch_pages',{'page':
track_click,'tab_type':tab_type,'look':look,'hair':hair,'eye':eye,'gender':gender,'comp':com,'name':name},
function(data) { if($('#no_result').length ==0){ //
$(&quot;.load_more&quot;).show(); //bring back load more button
$(&quot;#results&quot;).append(data); //append data received from
server //scroll page to button element $(&quot;html,
body&quot;).animate({scrollTop: $(&quot;#load_more_button&quot;).offset().top},
500); //hide loading image $('.animation_image').hide(); //hide
loading image once data is received } else{ $(&quot;.load_more&quot;).hide();
$(&quot;.load_more&quot;).show(); $('.animation_image').hide(); }
//user click increment on load button }).fail(function(xhr,
ajaxOptions, thrownError) { alert(thrownError); //alert any HTTP
error $(&quot;.load_more&quot;).show(); //bring back load more button
$('.animation_image').hide(); //hide loading image once data is
received }); if(track_click &gt;= total_pages-1) {
$(&quot;.load_more&quot;).attr(&quot;disabled&quot;, &quot;disabled&quot;);
} } else{ $(&quot;.load_more&quot;).show();
$('.animation_image').hide(); } });
$(&quot;#verifyemail&quot;).click(function(){ var user = $( this
).attr( &quot;user&quot; ); // alert(user); $.ajax({ url :
'/verify/'+user, type: &quot;GET&quot;, success: function(data,
textStatus, jqXHR) { $(&quot;#message&quot;).show();
$(&quot;#message&quot;).fadeOut(9000); } }); });
$(&quot;.like-bg&quot;).click(function(){ var video =
$(this).attr('id'); var user = $(this).attr('userid'); $.ajax({ url :
auditionurl, type: &quot;POST&quot;, data:{vid:video,uid:user},
success: function(data, textStatus, jqXHR) { if($.trim(data) ==
'liked') { $(&quot;.like-bg&quot;).html(&quot;<img src="data:" name="Image1" align="bottom" width="75" height="38" border="0">&quot;);
return false; } } }); }); $(&quot;.checkapply&quot;).click(function(e){
if(authenticate == &quot;true&quot;){ e.preventDefault(); var eventid
= $(this).attr('id'); $.ajax({ url : checkuser, type : &quot;POST&quot;,
data : {eventid:eventid}, success : function(data, textStatus, jqXHR)
{ if($.trim(data) == 'applied') { $(&quot;.checkapply&quot;).hide();
$(&quot;#already&quot;).css(&quot;display&quot;, &quot;block&quot;);
return false; } } }); } }); $(&quot;#comments&quot;).focus(function(){
$(&quot;.close_post&quot;).show(); $(&quot;.myButton&quot;).fadeIn(&quot;slow&quot;);
}); $(&quot;.close_post&quot;).click(function(){
$(&quot;.myButton&quot;).fadeOut(&quot;slow&quot;);
$(&quot;.close_post&quot;).hide(); $(&quot;#comments&quot;).val(&quot;&quot;);
// $(&quot;.myButton&quot;).css(&quot;visibility&quot;,&quot;hidden&quot;);
}); $(&quot;.myButton&quot;).click(function(){ var comnt =
$(&quot;#comments&quot;).val(); if(comnt !=''){ video =
$(&quot;#comments&quot;).attr('video'); videoType =
$(&quot;#comments&quot;).attr('videoType'); $.ajax({ url : comment,
type: &quot;POST&quot;,
data:{comment:comnt,video:video,type:videoType }, success:
function(dataout, textStatus, jqXHR) { data = $.trim(dataout);
if(data.indexOf(&quot;user&quot;) &gt; -1){ pic =
$(&quot;#profile_pic_user&quot;).val(); name= $(&quot;#name_user&quot;).val();
split = data.split(','); id = split[1]; console.log(pic+' '+id);
//$(&quot;.flash&quot;).html(&quot;Comment has been submitted for
approval&quot;); text = $(&quot;#comments&quot;).val(); $('</p>
<div id="comment_'+ id +'" dir="ltr">
	<p style="margin-bottom: 0cm"><img src="data:" name="Image2" align="bottom" width="56" height="56" border="0">
		</p>
	<p><a href="javascript:;" onclick="deleteComment('+id+')"><font color="#000080"><img src="data:" name="Image3" align="bottom" width="75" height="38" border="1"></font></a>
		</p>
	<h6 class="western">'+name+' Today 
	</h6>
	<p>'+text+'</p>
</div>
<p>').insertAfter( &quot;#comment_count&quot; );
$(&quot;#comments&quot;).val(&quot;&quot;); var count =
$(&quot;#comment_count&quot;).attr( 'count' ); count++;
$(&quot;#comment_count&quot;).text(count+&quot; Comments&quot;);
$(&quot;#comment_count&quot;).attr(&quot;count&quot;,count); }
if(data.indexOf(&quot;guest&quot;) &gt; -1){ split = data.split(',');
comment_id = split[1]; $(&quot;#model_comment&quot;).show(); } } });
} }); $(&quot;#comments&quot;).keydown(function(e){ var key =
(window.event) ? e.keyCode : e.which; if(key == 13) { } });
$(&quot;#all&quot;).click(); }); /* End of Document ready */ function
test(obj,i){ document.getElementById(&quot;uploadFile&quot;+i).value
= obj.value; } function formsubmit(){ var mailformat =
/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; var passw=
/^(?=.*\d)(?=.*[a-z])[a-z\d]{2,}$/i; var regname =
document.getElementById('regname').value; var address =
document.getElementById('address').value; var email =
document.getElementById('email').value; var phone =
document.getElementById('phone').value; var dob =
document.getElementById('dob').value; var pass =
document.getElementById('password').value; var language =
document.getElementById('language').value; var category =
document.getElementById('category').value; var pic =
document.getElementById('uploadBtn').value; var error_exist =0;
$(&quot;#error_already&quot;).html(&quot;&quot;); if(dob == '') {
document.getElementById('dob').value = &quot;1970-01-01&quot;; }
if(regname==''){
document.getElementsByName('name')[0].placeholder='Please enter
name'; $(&quot;#regname&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(address==''){
document.getElementsByName('address')[0].placeholder='Please enter
Address'; $(&quot;#address&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(email==''){
document.getElementsByName('email')[1].placeholder='Please enter
email'; $(&quot;#email&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(pic==''){
document.getElementsByName('uploadFile')[0].placeholder='Please
upload a profile picture'; $(&quot;#uploadFile&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(language=='MotherTongue'){
$(&quot;#language&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(category=='Category'){
$(&quot;#category&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(pass==''){
document.getElementsByName('password')[1].placeholder='Please enter
password'; $(&quot;#password&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } else if(!passw.test(pass)){ $(&quot;#password&quot;).val(&quot;&quot;);
document.getElementsByName('password')[1].placeholder='Please enter
alphanumeric password'; $(&quot;#password&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(phone==''){
document.getElementsByName('phone')[0].placeholder='Please enter
Contact number'; $(&quot;#phone&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(!email.match(mailformat)){ $(&quot;#email&quot;).val(&quot;&quot;);
document.getElementsByName('email')[1].placeholder='Please enter a
valid email'; $(&quot;#email&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if ($(&quot;#accept_terms&quot;).prop('checked') ==
true) { } else { $(&quot;#error_already&quot;).show();
$(&quot;#error_already&quot;).html(&quot;Please accept the terms and
condition&quot;); error_exist =1; } if(error_exist == 1){ return
false; } var formData = new FormData($(&quot;form#regist_form&quot;)[0]);
$(&quot;#error_already&quot;).hide();
$(&quot;#created_success&quot;).html(&quot;Please wait, the image is
being uploaded....&quot;); // $(&quot;#created_success&quot;).html(&quot;Please
wait....&quot;); $(&quot;#created_success&quot;).css(&quot;display&quot;,&quot;block&quot;);
setTimeout(function(){ $.ajax({ url: &quot;/register&quot;, type:
'POST', data: formData, async: false, success: function (data) {
$(&quot;#created_success&quot;).hide(); $(&quot;#error_already&quot;).hide();
data = $.trim(data); // alert(data); if(data == &quot;created&quot;){
$(&quot;#created_success&quot;).html(&quot;you are registered with
success, an email sent to your mail id, please follow the link&quot;);
$(&quot;#created_success&quot;).show(); }else if(data == &quot;error
email&quot;){ $(&quot;#error_already&quot;).html(&quot;user already
exist&quot;); $(&quot;#error_already&quot;).show(); }else{
$(&quot;#error_already&quot;).html(&quot;phone number already
taken&quot;); $(&quot;#error_already&quot;).show(); } }, cache:
false, contentType: false, processData: false }); }, 10); return
false; } function keyTrigger(oby,e){ var key = window.event ?
e.keyCode : e.which; var items=String.fromCharCode(key); var
match_char= /[\d\b\t]/; // if(!match_char.test(items)) if ((key &gt;=
48 &amp;&amp; key &lt;= 57) || (key &gt;= 96 &amp;&amp; key &lt;=
105) ||(key == 8)){ } else{ return false; } } function checklog(){
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; var
email = document.getElementById('logemail').value; var password =
document.getElementById('logpass').value; if(email==''){
document.getElementsByName('email')[0].placeholder='Please enter
email'; $(&quot;#logemail&quot;).addClass(&quot;holder_color&quot;);
return false; } if(password==''){
document.getElementsByName('password')[0].placeholder='Please enter
password'; $(&quot;#logpass&quot;).addClass(&quot;holder_color&quot;);
return false; } if(!email.match(mailformat)) {
$(&quot;#logemail&quot;).val(&quot;&quot;);
document.getElementsByName('email')[0].placeholder='Please enter a
valid email'; $(&quot;#logemail&quot;).addClass(&quot;holder_color&quot;);
return false; } $.ajax({ url : &quot;/authenticate&quot;, type:
&quot;POST&quot;, data:{email:email,password:password}, dataType:
&quot;json&quot;, success: function(data, textStatus, jqXHR) { // var
obj = jQuery.parseJSON(data); // alert(data); // console.log(obj);
console.log(data.id); if(data.status == &quot;invalid&quot;){
$(&quot;#invalid&quot;).html(&quot;Invalid username and Password or
<br>You may not verified your mail id&quot;); return false; }
if(data.user == &quot;admin&quot;){ window.location=&quot;/users&quot;;
return false; } if(data.user == 'Audition Manager'){
window.location=&quot;/myauditions&quot;; return false; }
if((data.log_count ==&quot;0&quot;)&amp;&amp;(data.user == &quot;user&quot;)){
window.location = &quot;/myprofile&quot;; return false; }else{
window.location = &quot;/&quot;; } } }); } function apply(obj){ var
id = $(obj).attr('id'); var name = $(obj).attr('title');
//alert(name); document.getElementById(&quot;Audname&quot;).innerHTML
= name; document.getElementById(&quot;Audid&quot;).value = id; }
function sendmail(){ var mailformat =
/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; var email =
$(&quot;#email&quot;).val(); var name = $(&quot;#name&quot;).val();
var phone = $(&quot;#phone&quot;).val(); var message =
$(&quot;#message&quot;).val(); if(name==&quot;&quot;){
document.getElementsByName('con_name')[0].placeholder='Please enter
name'; $(&quot;#name&quot;).addClass(&quot;holder_color&quot;);
return false; } if(email==''){
document.getElementsByName('con_email')[0].placeholder='Please enter
email'; $(&quot;#email&quot;).addClass(&quot;holder_color&quot;);
return false; } if(!email.match(mailformat)){ $(&quot;#email&quot;).val(&quot;&quot;);
document.getElementsByName('con_email')[0].placeholder='Please enter
a valid email'; $(&quot;#email&quot;).addClass(&quot;holder_color&quot;);
return false; } if(phone==&quot;&quot;){
document.getElementsByName('con_phone')[0].placeholder='Please enter
phone number'; $(&quot;#phone&quot;).addClass(&quot;holder_color&quot;);
return false; } if(message==&quot;&quot;){
document.getElementsByName('con_message')[0].placeholder='Please
enter message'; $(&quot;#message&quot;).addClass(&quot;holder_color&quot;);
return false; } $(&quot;.ajaxloader&quot;).html('<img src="data:" name="Image4" align="bottom" width="75" height="38" border="0">');
$.ajax({ url : &quot;sendmail&quot;, type: &quot;POST&quot;,
data:{email:email,name:name,phone:phone,message_text:message},
success: function(dataout, textStatus, jqXHR) { if($.trim(dataout) ==
&quot;contact&quot;){ $(&quot;#ack&quot;).html(&quot;Will contact you
soon&quot;); $(&quot;.ajaxloader&quot;).html(''); $('#name').val(&quot;&quot;);
$('#email').val(&quot;&quot;); $('#phone').val(&quot;&quot;);
$('#message').val(&quot;&quot;); } } }); // $(&quot;#sendform&quot;).css({
// 'top':'40px','height':'504px', // '-moz-transition': 'all 1s
ease-in-out .3s', // '-webkit-transition': 'all 1s ease-in-out .3s',
// '-o-transition':'all 1s ease-in-out .3s', // 'transition': 'all 1s
ease-in-out .3s', // }) // return false; } function getFile(){
document.getElementById(&quot;upfile&quot;).click(); } function
advance(obj){ var sid = $(obj).attr('id'); var sval =
$(obj).attr('value'); $(&quot;#demo-input-plugin-methods&quot;).tokenInput(&quot;&quot;);
$(&quot;#demo-input-plugin-methods&quot;).tokenInput(&quot;add&quot;,
{id: sid, name: sval}); } function sub(obj){ var file = obj.value;
var fileName = file.split(&quot;\\&quot;);
document.getElementById(&quot;yourBtn&quot;).innerHTML =
fileName[fileName.length-1]; document.myForm.submit();
event.preventDefault(); } function setTime() { if(
(document.getElementById('hour').value!='') &amp;&amp;
(document.getElementById('minute').value!='') &amp;&amp;
(document.getElementById('second').value!='') ) { var hour =
document.getElementById('hour').value; var minute =
document.getElementById('minute').value; var second =
document.getElementById('second').value; var time =
hour+&quot;:&quot;+minute+&quot;:&quot;+second;
document.getElementById('time').value = time; } } function setDob(){
if( (document.getElementById('day').value!='') &amp;&amp;
(document.getElementById('month').value!='') &amp;&amp;
(document.getElementById('year').value!='') ) { var day =
document.getElementById('day').value; var month =
document.getElementById('month').value; var year =
document.getElementById('year').value; var date =
year+&quot;-&quot;+month+&quot;-&quot;+day;
document.getElementById('dob').value = date; } } function
authenticatesignature(){ //var box =
$(&quot;.messi&quot;).css('display','none') //
$(&quot;#model_comment&quot;).hide(); $(&quot;#error_msg&quot;).html(&quot;&quot;);
var email = $(&quot;#guest_email&quot;).val(); var name=
$(&quot;#guest_name&quot;).val(); if(name =='' || email == ''){
$(&quot;#error_msg&quot;).html(&quot;Please fill all fields.&quot;);
} else { $('#loading').html('<img src="data:image/png;base64,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" name="Image5" align="bottom" width="64" height="64" border="0">
loading...'); $(&quot;.flash&quot;).html(''); $(&quot;.flash&quot;).show();
$.ajax({ url : &quot;/guestauth&quot;, type: &quot;POST&quot;,
data:{email:email,video:video,name:name,comment_id:comment_id},
success: function(dataout, textStatus, jqXHR) {
if($.trim(dataout)==&quot;comment&quot;){ $('#loading').html('');
$(&quot;.flash&quot;).html(&quot;Please check your mail and follow
the link.&quot;); $(&quot;#comments&quot;).val(&quot;&quot;);
$(&quot;.flash&quot;).fadeOut(5000); } } });
$(&quot;#model_comment&quot;).hide(); } } function
loadImages(obj,track_click) { if(track_click===undefined) return
false; $('#results').load(&quot;fetch_pages&quot;,
{'page':track_click,'tab_type':obj,'look':look,'hair':hair,'eye':eye,'gender':gender,'comp':com,'name':name},
function() {track_click++;}); $(&quot;.load_more&quot;).show(); }
function apply_for_audition(id){ var ext =
$('#uploadBtn'+id).val().split('.').pop().toLowerCase();
if($.inArray(ext, ['mp4','flv']) == -1) {
$(&quot;#error_upload_audition&quot;+id).fadeIn(&quot;slow&quot;);
$(&quot;#error_upload_audition&quot;+id).fadeOut(4000); return false;
} } function textCounter(field,field2,maxlimit) { var countfield =
document.getElementById(field2); if ( field.value.length &gt;
maxlimit ) { field.value = field.value.substring( 0, maxlimit );
return false; } else { countfield.value = maxlimit -
field.value.length; } } function changeProfilePic() {
$(&quot;input[id='my_file']&quot;).click();
$('#my_file').change(function(){ var name =
$('#my_file').attr('name'); var formData1 = new
FormData($(&quot;form#form_change_pic&quot;)[0]); var Extension =
$('#my_file').val().substring($('#my_file').val().lastIndexOf('.') +
1).toLowerCase(); if (Extension == &quot;gif&quot; || Extension ==
&quot;png&quot; || Extension == &quot;bmp&quot; || Extension ==
&quot;jpeg&quot; || Extension == &quot;jpg&quot;) { } else {
alert(&quot;please upload image&quot;); return false; } $.ajax({ url:
&quot;/update_pic&quot;, type: 'POST', data: formData1, async: false,
success: function (data) { location.reload(); }, cache: false,
contentType: false, processData: false }); return false; }); return
false; } function deleteComment(id){ $.ajax({ url :
&quot;/comment_delete&quot;, type: &quot;POST&quot;, data:{id:id},
success: function(dataout, textStatus, jqXHR) {
if($.trim(dataout)==&quot;success&quot;){ $(&quot;#comment_&quot;+id).hide();
var count = $(&quot;#comment_count&quot;).attr( 'count' ); count--;
$(&quot;#comment_count&quot;).text(count+&quot; Comments&quot;);
$(&quot;#comment_count&quot;).attr(&quot;count&quot;,count); } } });
} function deleteVideo(id){ $.ajax({ url : &quot;/delete_video&quot;,
type: &quot;POST&quot;, data:{id:id}, success: function(dataout,
textStatus, jqXHR) { if($.trim(dataout)==&quot;success&quot;){
location.reload(); } } }); } function deleteImage(id){ $.ajax({ url :
&quot;/delete_image&quot;, type: &quot;POST&quot;, data:{id:id},
success: function(dataout, textStatus, jqXHR) {
if($.trim(dataout)==&quot;success&quot;){ location.reload(); } } });
} function formsubmit_new(){ var mailformat =
/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; var passw=
/^(?=.*\d)(?=.*[a-z])[a-z\d]{2,}$/i; var regname =
document.getElementById('regname').value; var email =
document.getElementById('email').value; var phone =
document.getElementById('phone').value; var pass =
document.getElementById('password').value; var pass_c =
document.getElementById('password_confirm').value; var error_exist
=0; $(&quot;#error_already&quot;).html(&quot;&quot;);
if(regname==''){
document.getElementsByName('name')[0].placeholder='Please enter
name'; $(&quot;#regname&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(email==''){
document.getElementsByName('email')[1].placeholder='Please enter
email'; $(&quot;#email&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(pass==''){
document.getElementsByName('password')[1].placeholder='Please enter
password'; $(&quot;#password&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } else if(!passw.test(pass)){ $(&quot;#password&quot;).val(&quot;&quot;);
document.getElementsByName('password')[1].placeholder='Please enter
alphanumeric password'; $(&quot;#password&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(pass_c==''){
$('#password_confirm').attr('placeholder','Please enter password');
$(&quot;#password_confirm&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(pass_c != pass){
$(&quot;#password_confirm&quot;).addClass(&quot;holder_color&quot;);
$(&quot;#password&quot;).addClass(&quot;holder_color&quot;);
$('#password_confirm').attr('placeholder','Passwords are not same');
document.getElementsByName('password')[1].placeholder='Passwords are
not same'; } if(phone==''){
document.getElementsByName('phone')[0].placeholder='Please enter
Contact number'; $(&quot;#phone&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if(!email.match(mailformat)){ $(&quot;#email&quot;).val(&quot;&quot;);
document.getElementsByName('email')[1].placeholder='Please enter a
valid email'; $(&quot;#email&quot;).addClass(&quot;holder_color&quot;);
error_exist =1; } if ($(&quot;#agree&quot;).prop('checked') == true)
{ } else { $(&quot;#error_already&quot;).show();
$(&quot;#error_already&quot;).html(&quot;Please accept the terms and
condition&quot;); error_exist =1; } if(error_exist == 1){ return
false; } var formData = new FormData($(&quot;form#regist_form&quot;)[0]);
$(&quot;#error_already&quot;).hide();
$(&quot;#created_success&quot;).html(&quot;Please wait ....&quot;);
// $(&quot;#created_success&quot;).html(&quot;Please wait....&quot;);
$(&quot;#created_success&quot;).css(&quot;display&quot;,&quot;block&quot;);
setTimeout(function(){ $.ajax({ url: &quot;/register&quot;, type:
'POST', data: formData, async: false, success: function (data) {
$(&quot;#created_success&quot;).hide(); $(&quot;#error_already&quot;).hide();
data = $.trim(data); // alert(data); if(data == &quot;created&quot;){
$(&quot;#created_success&quot;).html(&quot;You are registered with
success, an email sent to your mail id, please follow the link&quot;);
$(&quot;#created_success&quot;).show(); }else if(data == &quot;error
email&quot;){ $(&quot;#error_already&quot;).html(&quot;User already
exist&quot;); $(&quot;#error_already&quot;).show(); }else{
$(&quot;#error_already&quot;).html(&quot;Phone number already
taken&quot;); $(&quot;#error_already&quot;).show(); } }, cache:
false, contentType: false, processData: false }); }, 10); return
false; } $(document).ready(function(){ var pressed= 0;
$(&quot;.upload_anchor&quot;).click(function(event){ seq_num =
$(this).attr('seq_num'); //$( &quot;.upload_anchor&quot;
).removeClass(&quot;upload_anchor&quot; ); id=&quot;upfile_&quot;+
seq_num; console.log(id); new Messi('</p>
<ul>
	<li><p style="margin-bottom: 0cm">It should be limited to 3 minutes.
		</p>
	<li><p style="margin-bottom: 0cm">You can make use of your own
	scripts (please avoid mimicing the famous filmy scenes. Apply some
	creativity, you can take the help of your friends) 
	</p>
	<li><p style="margin-bottom: 0cm">You can shoot with your normal
	camera provided the video has the right clarity with minimum 240p
	and maximum 360p. 
	</p>
	<li><p style="margin-bottom: 0cm">Max size of video shouldn\'t be
	above 15MB. 
	</p>
	<li><p style="margin-bottom: 0cm">You can edit the scenes, indoor or
	outdoor not a criteria. 
	</p>
	<li><p style="margin-bottom: 0cm">Voice should be clear and it would
	be better if you use a color mic. 
	</p>
	<li><p style="margin-bottom: 0cm">Dubbing is not preferred. 
	</p>
	<li><p style="margin-bottom: 0cm">You shouldn\'t explicitly mention
	your contact details on the video. 
	</p>
	<li><p style="margin-bottom: 0cm">No language, gender or age limit 
	</p>
	<li><p>Supported video formats are mp4 and flv. 
	</p>
</ul>
<p>', {title: 'For Your Information', buttons: [{id: 0, label: 'Yes,
I understand', val: 'Y'} ], callback: function(val) { }});
event.preventDefault(); $(&quot;.btn&quot;).unbind(&quot;click&quot;).bind(&quot;click&quot;,
function () { $(&quot;#&quot;+id).unbind(&quot;click&quot;).bind(&quot;click&quot;,
function () { seq_num = $(this).attr('seq_num'); });
$(&quot;#&quot;+id).click(); }); //$( &quot;.upload_anchor&quot;
).removeAttr(&quot;disabled&quot;); }); }); 
</p>
</body>
</html>