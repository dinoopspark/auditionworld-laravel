<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Audition Profile Page</title>
<link href="<?php echo URL::asset('assets/css/main-style.css') ?>" rel="stylesheet" type="text/css" />    
<!--<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>-->

 <link rel="stylesheet" href="<?php echo URL::asset('assets/css/bootsrap.css')?>"> 
<link rel="stylesheet" href="<?php echo URL::asset('assets/css/style.css')?>">
<link rel="stylesheet" href="<?php echo URL::asset('assets/css/jquery.fileupload.css')?>">
<link rel="stylesheet" href="<?php echo URL::asset('assets/css/jquery.fileupload-ui.css')?>">

<script src="<?php echo URL::asset('assets/js/jquery-1.10.0.min.js')?>"></script>   
<script src="<?php echo URL::asset('assets/js/custom.js')?>"></script>    


  <script type="text/javascript" src="<?php echo URL::asset('assets/scripts/progress-bar/goalProgress.js')?>"></script>
  <script type="text/javascript">
   var seq_num="";
    $(document).ready(function(){
      $('#sample_goal').goalProgress({
        goalAmount: 100,
        currentAmount: {{$percentage}},
                textAfter: '%'
      });

      $('a[rel=tooltip]').mouseover(function(e) {
        
        //Grab the title attribute's value and assign it to a variable
        var tip = $(this).attr('title');  
        
        //Remove the title attribute's to avoid the native tooltip from the browser
        $(this).attr('title','');
        
        //Append the tooltip template and its value
        $(this).append('<div id="tooltip"><div class="tipHeader"></div><div class="tipBody">' + tip + '</div><div class="tipFooter"></div></div>');   
            
        //Show the tooltip with faceIn effect
        $('#tooltip').fadeIn('500');
        $('#tooltip').fadeTo('10',0.9);
        
      }).mousemove(function(e) {
      
        //Keep changing the X and Y axis for the tooltip, thus, the tooltip move along with the mouse
        $('#tooltip').css('top', e.pageY + 10 );
        $('#tooltip').css('left', e.pageX + 20 );
        
      }).mouseout(function() {
      
        //Put back the title attribute's value
        $(this).attr('title',$('.tipBody').html());
      
        //Remove the appended tooltip template
        $(this).children('div#tooltip').remove();
        
      });
    });
function getSequence(seq_no,type)
{
  seq_num = seq_no;
}
</script>

<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <div style="width:100px;word-wrap: break-word;" class="name">{%=file.name%}</div>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <!--<p class="size">Processing...</p>-->
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Upload</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Delete</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
       {%  window.location.reload(true); %}
    </tr>
{% } %}
</script>

<script src="<?php echo URL::asset('assets/js/upload/vendor/jquery.ui.widget.js')?>"></script>  
 <script src="<?php echo URL::asset('assets/js/upload/tmpl.min.js')?>"></script>

<script src="<?php echo URL::asset('assets/js/upload/load-image.js')?>"></script>

<script src="<?php echo URL::asset('assets/js/upload/canvas-to-blob.min.js')?>"></script>
<script src="<?php echo URL::asset('assets/js/upload/jquery.blueimp-gallery.min.js')?>"></script> 

<script src="<?php echo URL::asset('assets/js/upload/jquery.fileupload.js')?>"></script>
 <script src="<?php echo URL::asset('assets/js/upload/jquery.fileupload-process.js')?>"></script>
<!--<script src="<?php echo URL::asset('assets/js/upload/jquery.fileupload-image.js')?>"></script>-->
<script src="<?php echo URL::asset('assets/js/upload/jquery.fileupload-video.js')?>"></script>
<script src="<?php echo URL::asset('assets/js/upload/jquery.fileupload-validate.js')?>"></script>
<script src="<?php echo URL::asset('assets/js/upload/jquery.fileupload-ui.js')?>"></script>
<script src="<?php echo URL::asset('assets/js/upload/main.js')?>"></script>
<script type="text/javascript" src="<?php echo URL::asset('assets/js/messi.min.js')?>"  /></script>
<link href="<?php echo URL::asset('assets/css/messi.min.css')?>" rel="stylesheet" type="text/css" />


</head>
<body class="inner-body" >

 
        
        
        
        

<div id="wrapper" >

        <div id="st-container" class="st-container">
      
        <div class="st-pusher">
      

        <nav class="st-menu st-effect-7" id="menu-7">
           <form class="log-in" action="" method="POST">
            <div id="invalid"></div>
            <input name="email" id="logemail" type="text" placeholder="Email" class="log-txt log-martop reg_clear">
            <input name="password" id="logpass" type="password" placeholder="Password" class="log-txt reg_clear">
                <a href="" class="log-spn">Forgot Password ?? </a>
            <input name="" type="button" value="Login" class="log-buton" onclick="checklog()">
        </form>
        
        </nav>

        

        

        <div class="st-content">
          <!-- this is the wrapper for the content -->
          <div class="st-content-inner">
            <!-- extra div for emulating position:fixed of the menu -->
            <!-- Top Navigation -->
            
            <div id="inner-wrap">
            
            <!--Header-->
                <div class="hed-in"> 


                    <div class="inner-headr"> 

<div class="header-left"> 
    <div class="logo"> 
        <a href="/" class="iner-logo"> <img src="<?php echo URL::asset('assets/images/inner-logo.png')?>"> </a> 
</div>


</div>

<div class="header-right"> 







<div class="log-but"> 
@if(Auth::check())
  <a href="{{ URL::asset('/myprofile') }}" class="reg-bg">
                                                  My Profile
                                                </a> 
@else
<button id="trigger-overlay" type="button" class="reg-bg">
                                            Register
                                        </button>
  @endif
<div id="st-trigger-effects" class="column"> 
    @if(Auth::check())
        <a href="{{ URL::asset('/logout') }}" class="log-bg">
                                                    Logout
                                                </a> 
        @else
        <button data-effect="st-effect-7" class="log-bg">
                                                    Login
                                                </button> 
        @endif
</div>
</div>

<nav class="cl-effect-1">
@if(Auth::check())
            @if(Auth::user()->user_type == "Audition Manager")
              <a href="{{ URL::asset('/myauditions') }}" style="margin-left: -145px;color:#FFF">My Auditions</a>
                  @endif
                @endif
<a href="{{ URL::asset('/') }}" class="iner-nav-txt">HOME</a>
<a href="{{ URL::asset('/audition') }}" class="iner-nav-txt">AUDITIONS</a>
<a href="{{ URL::asset('/talents') }}" class="iner-nav-txt">TALENTS</a>
<a href="{{ URL::asset('/aboutus') }}" class="iner-nav-txt">ABOUT US</a>
<a href="{{ URL::asset('/faq') }}" class="iner-nav-txt">FAQ</a>

<a href="{{ URL::asset('/contact') }}" class="iner-nav-txt">CONTACT US</a>

</nav>





</div>
</div>
</div>


<!--Content-->

<div class="head-inner-in">

<div class="iner-cnt">

             @yield('main')
             </div>
             
                    
 <div class="iner-cnt pad-left">

<!--video-->

  @yield('video')
</div>

         

<!--Ad-->
<div class="outer spac-gen"> 
    <div class="ad-outer">

<div class="ad-left">
   <a href="/contact"> 
    <img src="/assets/images/dummy/ad.jpg"> 
   </a>
</div>
<div class="ad-right"> 
  <a href="/contact"> 
    <img src="/assets/images/dummy/ad.jpg"> 
  </a>
</div>

</div>
 </div>

<div class="foter-main">

        <p>
                <a href="https://www.facebook.com/auditionworld.tv"><img src="/assets/images/new_img/facebook-a.png" ></a>
                <a href="https://twitter.com/auditionworldtv"><img src="/assets/images/new_img/twitt.png" ></a>
                <a href="https://plus.google.com/111088055846761421052"><img src="/assets/images/new_img/goo.png" ></a>

                        <span class="margin_adj">© Creative Efforts Kochi, Powered by Spark support Pvt Ltd </span> 
         </p>

        <div class="foter-main-in">
                <a href="/termsandcodition"> Terms and Condition</a>
                <a href="/copyrights"> Privacy policy</a>
                <a href="/aboutus"> About</a>
        </div>


</div>

    </div>

            







</div>
              
              
              
            </div>
        <!-- /main -->
          </div>
        <!-- /st-content-inner -->
        </div>
        <!-- /st-content -->
        </div>
      
        
      
    
    
    
    
     







    
    
   
     <script>
      
/*    document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};*/
  </script>
   <script src="<?php echo URL::asset('assets/scripts/basic-slider/js/bjqs-1.3.min.js')?>"></script>
        
    <script>
        jQuery(document).ready(function($) {
          
          $('#banner-slide').bjqs({
            animtype      : 'fade',
            height        : 474,
            width         : 356,
            responsive    : true,
            randomstart   : false
          });
          
        });
      </script>
  
  



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56820797-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
