<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Talents</title>
<link href="<?php echo URL::asset('assets/css/main-style.css') ?>" rel="stylesheet" type="text/css" />   
<!--<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>-->
<script src="<?php echo URL::asset('assets/js/new_download/jquery-1.10.0.min.js')?>"></script>  
<script src="<?php echo URL::asset('assets/scripts/sidebartransitions/js/modernizr.custom.js') ?>"></script>     
<script src="<?php echo URL::asset('assets/js/custom.js')?>"></script>    

<script type="text/javascript" src="{{ URL::asset('assets/js/messi.min.js')}}"  /></script>
<link href="{{ URL::asset('assets/css/messi.min.css')}}" rel="stylesheet" type="text/css" />

 <script type="text/javascript" src="/assets/js/jwplayer/jwplayer.js"></script>

<link href="{{ URL::asset('assets/scripts/thumbnail-pop-up/style1.css')}}" rel="stylesheet" type="text/css" />  
<link href="{{ URL::asset('assets/scripts/thumbnail-pop-up/style2.css')}}" rel="stylesheet" type="text/css" /> 

<link type='text/css' rel='stylesheet' href="/assets/scripts/nottification/jquery-notification-bar/style.css" />

<script src="{{ URL::asset('assets/scripts/thumbnail-pop-up/script1.js')}}"></script>
<script src="{{ URL::asset('assets/scripts/thumbnail-pop-up/script2.js')}}"></script>


  <script>
// window.onload=function() {
//     document.getElementById('loading-mask').style.display='none';
// }
</script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

  <script type="text/javascript" src="<?php echo URL::asset('assets/scripts/progress-bar/goalProgress.js')?>"></script>
  <script type="text/javascript">
    var auditionurl = "{{URL::asset('like')}}";
    var comment = "{{URL::asset('comment')}}";
    $(document).ready(function(){
      $('#sample_goal').goalProgress({
        goalAmount: 100,
        currentAmount: 80,
                textAfter: '%'
      });

});
</script>


</head>

<body class="inner-body">

<!-- notification -->
<!--<div class="jquery-bar" style="display:none">
    <span class="notification">
        <p class="font-style"><div class="notimain">
<div class="notimainleft"> <h1>2 days  film <span class="warphead"> acting workshop</span></h1>
<h2>Camp Director-KB Venu <span class="mainh"> (renowned Film Director and Critic)</span></h2>
<h3>Conducted by-Creative Efforts,Kochi.</h3>
</div>

<div class="notimaincenter">
<div class="notimaincenter-a">
<img src="/assets/images/new_img/noticen.png"></div>

<div class="notimaincenter-b">
<img src="/assets/images/new_img/noticen-1.png"></div>
<div class="notimaincenter-c">
<img src="/assets/images/new_img/noticen-2.png"></div>
</div>

<div class="notimainright">
<h1>Register now to book your seats
<span class="warprightbottom">Only 50 will be selected from the registered profiles 
with videos</span></h1>
<div class="mainbutton" id="trigger_nav_1"><span class="mainbutton-a">Register now </span></div>
</div>
<div class="notilastright">
<img src="/assets/images/new_img/entryimg.png"></div>
</div></p> <p class="jquery-arrow down">
       <span class="aaa "><img src="/assets/images/new_img/close-a.png"></span></p>
    </span>

   </div>


<div class="warpopen">
 <p class="jquery-arrow down-a jbar-down-toggle" >
 <img src="/assets/images/new_img/buttondown-b.png" class="jbar-down-arrowa"></p></div>
-->

<!-- note -->

 
     
     
     
         

        
        
        

<div id="wrapper">

        <div id="st-container" class="st-container">
      
        <div class="st-pusher">
      

        <nav class="st-menu st-effect-7" id="menu-7">
        <form class="log-in" action="" method="POST">
            <div id="invalid"></div>
            <input name="email" id="logemail" type="text" placeholder="Email" class="log-txt log-martop reg_clear">
            <input name="password" id="logpass" type="password" placeholder="Password" class="log-txt reg_clear">
                <a href="/forgot" class="log-spn">Forgot Password ?? </a>
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
              <a href="{{ URL::asset('/myauditions') }}" style="margin-left: -145px;color: #FFF">My Auditions</a>
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

<!--left-->
 
            @yield('main')
        
        
        
        
       
 
 
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
        <!-- /st-pusher -->
      
      
      
      <!--Apply now-->
    
        
      
    
    
    
    
     


        <!--Register-->
  <div class="overlay overlay-cornershape" data-path-to="m 0,0 1439.999975,0 0,805.99999 -1439.999975,0 z">
      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1440 806" preserveAspectRatio="none">
        <path class="overlay-path" d="m 0,0 1439.999975,0 0,805.99999 0,-805.99999 z"/>
      </svg>
      <button type="button" class="overlay-close">
            Close
      </button>
      
      <nav>

        <h1> Register Now </h1>
          {{ Form::open(array('url' => 'register', 'class'=> 'regist' ,'files'=> true,'id' => 'regist_form')) }}
           <div class="reg-row  reg-martop">
          
           <div class="reg-col1"> 
               <input id="regname" name="name" type="text" class="rg-text reg_clear" placeholder="Name">
              <i> *</i>
       </div>
           <div class="reg-col2"> 
<label class="lbl">Male </label> 
<input name="gender" type="radio" value="male" class="rad"> 
<label class="lbl">Female</label> 
<input name="gender" type="radio" value="female" class="rad"> 
</div>         
          
       </div>
           
           
           
           <div class="reg-row log-martop">
          
          <div class="reg-col1"> 
              <textarea name="address" id="address" class="reg-area reg_clear" placeholder="Address"></textarea>
            <i> *</i>
      </div>
          <div class="reg-col2">
             <input name="dob" id="dob" type="hidden" class="rg-text-small" placeholder="Date Of Birth" value=""> 
               {{Form::selectRange('day', 1, 31,null, array('onchange'=>"setDob()",'id'=>'day', 'class'=>"rg-text-small32",'placeholder'=>'Date'))}}

  {{ Form::selectMonth('month', 1,array('class' => 'rg-text-small32','id'=>'month','onchange'=>"setDob()")) }}

  {{ Form::selectYear('year', 1970, 2020,null,array('class' => 'rg-text-small32','id'=>'year','onchange'=>"setDob()")) }}
              <br>
              <select name="language" id="language" class="rg-text-small2 reg-martop"> 
<option style="color:#999" default value="">Select Mother Tongue </option> 
<option> Assamese</option> 
<option>Bengali</option> 
<option>Bodo</option> 
<option>Dogri</option> 
<option>English</option> 
<option>Gujarati</option> 
<option>Hindi</option> 
<option>Kannada</option> 
<option>Kashmiri</option> 
<option>Konkani</option> 
<option>Maithili</option> 
<option>Malayalam</option> 
<option>Manipuri</option> 
<option>Marathi</option> 
<option>Nepali</option> 
<option>Oriya</option> 
<option>Punjabi</option> 
<option>Sanskrit</option> 
<option>Santal</option> 
<option>Sindhi</option> 
<option>Tamil</option> 
<option>Telugu</option> 
<option>Urdu</option> 
          
          
      </select>
         <select name="category" id="category" class="rg-text-small2 reg-martop"> 
<option style="color:#999" default value="">Select Category </option> 
<option> Actor</option> 
<!--<option>Model</option> -->
      
      </select>
 

 </div>         
          
       </div>
           
           
           
           <div class="reg-row">
          
           <div class="reg-col1"> 
               <input name="email" id="email" type="text" class="rg-text reg_clear" placeholder="Email">
                <i> *</i>
       </div>
           <div class="reg-col2">
               <input name="password" id="password" type="password" class="rg-text-small reg_clear" placeholder="Password (min:8 letters)"> 
                <i> *</i>
			<p style="margin-top: 0px;width:110%">password should be alphanumeric,eg:abcd1234</p>
           </div>         
          
       </div>
           
           <div class="reg-row">
          
          <div class="reg-col1"> 
             <input id="uploadFile" name="uploadFile" placeholder="Upload Profile Picture" class="rg-text reg_clear" disabled="disabled" />
             <div class="fileUpload ">
    
                 <input id="uploadBtn" name="profile_pic" type="file" class="upload" />
</div>

      </div>
          <div class="reg-col2">
              <input name="phone" maxlength="10" id="phone" type="text" class="rg-text-small reg_clear" onkeydown="return keyTrigger(this,event)" placeholder="Mobile Number"> 
              <i> *</i>
          </div>
          <div class="reg-col2">
                <br>
                <input type="checkbox" id="accept_terms" style="float:left"><div class="terms_new">I accept the terms and conditions</div><br>
          </div>

       </div>
           <div class="reg-row">
                 <div style="color:red; display:none" id="error_already"></div>
                <div style="color:green; display:none" id="created_success">Please wait........</div>
           </div>

           <div class="reg-row">
          
          
               <div class="reg-col1">
                   <button id="Audreg" onclick="return formsubmit()" class="reg-button1" type="submit">
                        Register
                    </button> 
               </div>         
          
          
          



       </div>
        
        
{{ Form::close() }}
        <div class="reg-4">
                <p style="margin-top:10px">
                        By Registering in AuditionWorld Portal, you are one stepper closer to your dream of showcasing your talent to the whole world. Register here and take a small effort to create a 3 minute video (indoor or outdoor) with your own script that shows your talent to fullest. Gender, age is not a barrier for the talents. Currently the audition portal is inviting acting talents and it will be expanded to other talents in future. Remember every marathon starts with a single step and let this be your first step.

                </p>
        </div>
 <div class="reg-3">  
   
    <p> <em>"When a great moment knocks on the door of your life, it is often no louder than the beating of your heart, and it is very easy to miss it. ”<br>
<strong>Boris Pasternak</strong></em> </p>  

<p style="margin-top:20px">
<em> “A pessimist sees the difficulty in every opportunity; an optimist sees the opportunity in every difficulty.”<br>

<strong>Winston S. Churchill</strong></em> </p>


</div>

      </nav>
    
      
      
    </div>
        <button id="trigger-overlay2"  class="reg-button" type="button" style=" display:none">
    Register now
</button>

 
   
  
    </div>
    



      <div class="overlay overlay-cornershape" data-path-to="m 0,0 1439.999975,0 0,805.99999 -1439.999975,0 z">
      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1440 806" preserveAspectRatio="none">
        <path class="overlay-path" d="m 0,0 1439.999975,0 0,805.99999 0,-805.99999 z"/>
      </svg>
      <button type="button" class="overlay-close">
            Close
      </button>
      
      <nav>
        <h1> Register Now </h1>
        <p> Lorem Ipsum has been the industry's standard dummy text ever since the  1500s, when an unknown printer tookLorem Ipsnown printer tookLorem Ipsum has been the industry's standard dummy text ever since the  1500s, when an unknown printer took </p>
          {{ Form::open(array('url' => 'register', 'class'=> 'regist' ,'files'=> true,'id' => 'regist_form')) }}
           <div class="reg-row  reg-martop">
          
           <div class="reg-col1"> 
               <input id="regname" name="name" type="text" class="rg-text" placeholder="Name">
              <i> *</i>
       </div>
           <div class="reg-col2"> 
<label class="lbl">Male </label> 
<input name="gender" type="radio" value="male" class="rad"> 
<label class="lbl">Female</label> 
<input name="gender" type="radio" value="female" class="rad"> 
</div>         
          
       </div>
           
           
           
           <div class="reg-row log-martop">
          
          <div class="reg-col1"> 
              <textarea name="address" id="address" class="reg-area" placeholder="Address"></textarea>
            <i> *</i>
      </div>
          <div class="reg-col2">
             <input name="dob" id="dob" type="hidden" class="rg-text-small" placeholder="Date Of Birth" value=""> 
               {{Form::selectRange('day', 1, 31,null, array('onchange'=>"setDob()",'id'=>'day', 'class'=>"rg-text-small32",'placeholder'=>'Date'))}}

  {{ Form::selectMonth('month', 1,array('class' => 'rg-text-small32','id'=>'month','onchange'=>"setDob()")) }}

  {{ Form::selectYear('year', 1970, 2020,null,array('class' => 'rg-text-small32','id'=>'year','onchange'=>"setDob()")) }}
              <br>
              <select name="language" id="language" class="rg-text-small2 reg-martop"> 
<option style="color:#999" default value="">Select Mother Tongue </option> 
<option> Assamese</option> 
<option>Bengali</option> 
<option>Bodo</option> 
<option>Dogri</option> 
<option>English</option> 
<option>Gujarati</option> 
<option>Hindi</option> 
<option>Kannada</option> 
<option>Kashmiri</option> 
<option>Konkani</option> 
<option>Maithili</option> 
<option>Malayalam</option> 
<option>Manipuri</option> 
<option>Marathi</option> 
<option>Nepali</option> 
<option>Oriya</option> 
<option>Punjabi</option> 
<option>Sanskrit</option> 
<option>Santal</option> 
<option>Sindhi</option> 
<option>Tamil</option> 
<option>Telugu</option> 
<option>Urdu</option> 
          
          
      </select>
         <select name="category" id="category" class="rg-text-small2 reg-martop"> 
<option style="color:#999" default value="">Select Category </option> 
<option> Actor</option> 
<option>Model</option> 
      
      </select>
 

 </div>         
          
       </div>
           
           
           
           <div class="reg-row">
          
           <div class="reg-col1"> 
               <input name="email" id="email" type="text" class="rg-text" placeholder="Email">
                <i> *</i>
       </div>
           <div class="reg-col2">
               <input name="password" id="password" type="password" class="rg-text-small" placeholder="Password"> 
                <i> *</i>
           </div>         
          
       </div>
           
           <div class="reg-row">
          
          <div class="reg-col1"> 
             <input id="uploadFile" name="uploadFile" placeholder="Upload Profile Picture" class="rg-text" disabled="disabled" />
             <div class="fileUpload ">
    
                 <input id="uploadBtn" name="profile_pic" type="file" class="upload" />
</div>

      </div>
          <div class="reg-col2">
              <input name="phone" maxlength="10" id="phone" type="text" class="rg-text-small" onkeydown="return keyTrigger(this,event)" placeholder="Mobile Number"> 
              <i> *</i>
          </div>
                    
          
       </div>
           <div class="reg-row">
          
          
               <div class="reg-col1">
                   <button id="Audreg" onclick="return formsubmit()" class="reg-button1" type="submit">
                        Register
                    </button> 
               </div>         
          
          
          



       </div>
        
        
{{ Form::close() }}
      </nav>  
      
      
    </div>



         
<!--Modal-->
    <div class="overlay1"></div>  
    
    

    
        


    <script src="<?php echo URL::asset('assets/scripts/register/register-1/js/demo9.js')?>"></script>
    
    
   
     <script>
      
    document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
  </script>
  
  
     <script type="text/javascript" src="<?php echo URL::asset('assets/scripts/browser-warning/jquery.badBrowser.js')?>"></script> 
     
     
  
    <script type='text/javascript' src="<?php echo URL::asset('assets/scripts/pop-up-1/js/jquery.modal.js')?>"></script>
    <script type='text/javascript' src="<?php echo URL::asset('assets/scripts/pop-up-1/js/site.js')?>"></script>
    

    <script src="<?php echo URL::asset('assets/scripts/content-tab/js/organictabs.jquery.js')?>"></script>
    <script>
        $(function() {
    
            $("#example-one").organicTabs();
            
           
    
        });
    </script>
    <script>
 $('.fancybox-thumbs').fancybox({
                prevEffect : 'none',
                nextEffect : 'none',

                closeBtn  : true,
                arrows    : false,
                nextClick : true,                

                helpers : {
                    thumbs : {
                        width  : 70,
                        height : 70
                    }
                }
            });
</script>
<script src="/assets/scripts/nottification/jquery-notification-bar/js/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        // jBar Script by Todd Motto
        $('.downbar').delay(1000).fadeIn(400).addClass('up');
        $('.jquery-bar').hide().delay(2500).slideDown(400);
        $('.jquery-arrow').click(function(){
            $('.downbar').toggleClass('up', 400);          
            $('.jquery-bar').slideToggle();
                //slide down again
                //setTimeout(function(){$('.jquery-bar').slideDown(); }, 5000);

                        
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
