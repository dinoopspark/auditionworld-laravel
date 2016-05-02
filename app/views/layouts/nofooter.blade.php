<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Auditions Page</title>
<script src="<?php echo URL::asset('assets/js/new_download/jquery-1.7.js')?>"></script>
<link href="<?php echo URL::asset('assets/css/jquery.alerts.css')?>" rel="stylesheet" type="text/css" media="screen" />
<script src="<?php echo URL::asset('assets/js/jquery.alerts.js')?>" type="text/javascript"></script>



<link href="<?php echo URL::asset('assets/css/main-style.css') ?>" rel="stylesheet" type="text/css" />   
<!--<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>-->
<!--<script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
 <script src="<?php echo URL::asset('assets/js/custom.js')?>"></script> 
 <script src="<?php echo URL::asset('assets/scripts/sidebartransitions/js/modernizr.custom.js') ?>"></script>  
<script>
// 	window.onload=function() {
//     document.getElementById('loading-mask').style.display='none';
// 	}
</script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo URL::asset('assets/css/prettyPhoto.css')?>" />
<script type="text/javascript" src="<?php echo URL::asset('assets/js/jquery.prettyPhoto.js')?>"></script>
<script type="text/javascript" src="<?php echo URL::asset('assets/js/script.js')?>"></script>


	<script type="text/javascript" src="<?php echo URL::asset('assets/scripts/progress-bar/goalProgress.js')?>"></script>
	<script type="text/javascript">
	$(document).ready(function(){
			$('#sample_goal').goalProgress({
				goalAmount: 100,
				currentAmount: 80,
								textAfter: '%'
			});

			  $("#hide").click(function(){
			    $(".adv-srch").hide();
			  });

			  $("#show").click(function(){
			    $(".adv-srch").show();
			  });
  			  $( "#datepicker" ).datepicker({ 
				    dateFormat: 'yy-mm-dd',
				    changeMonth: true,
				    changeYear: true ,
				    yearRange: '1970:2030'
				  });
		});
	
	
</script>

</head>

<body class="inner-body">


<div id="wrapper">

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
			    <a href="/"> <img src="<?php echo URL::asset('assets/images/logo.png') ?>" /> </a> 
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


<div class="head-inner-in">

<div class="iner-cnt">
         
        @yield('main')  
         

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

                        <span class="margin_adj">©Creative Efforts Kochi, Powered by Spark support Pvt Ltd </span> 
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
      </div>
          <div class="reg-col2">
              <input name="dob" id="dob" type="text" class="rg-text-small reg_clear" placeholder="Date Of Birth">
              <br>
              <select name="language" id="language" class="rg-text-small2 reg-martop reg_clear"> 
<option style="color:#999" default> Mother Tongue </option> 
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
         <select name="category" id="category" class="rg-text-small2 reg-martop reg_clear"> 
<option style="color:#999" default>Select Category </option> 
<option> Actor</option> 
<!--<option>Model</option> -->
      
      </select>
 

 </div>         
          
       </div>
           
           
           
           <div class="reg-row">
          
           <div class="reg-col1"> 
               <input name="email" id="email" type="text" class="rg-text reg_clear" placeholder="Email">
       </div>
           <div class="reg-col2">
               <input name="password" id="password" type="password" class="rg-text-small reg_clear" placeholder="Password"> 
           </div>         
          
       </div>
           
           <div class="reg-row">
          
          <div class="reg-col1"> 
             <input id="uploadFile" placeholder="Upload Profile Picture" class="rg-text reg_clear" disabled="disabled" />
             <div class="fileUpload ">
    
                 <input id="uploadBtn" name="profile_pic" type="file" class="upload" />
</div>

      </div>
          <div class="reg-col2">
              <input name="phone" id="phone" type="text" class="rg-text-small reg_clear" onkeydown="return keyTrigger(this,event)" placeholder="Mobile Number"> 
          </div>
          <div class="reg-col2">
                <br>
                <input type="checkbox" id="accept_terms" style="float:left"><div class="terms_new">accept the terms and conditions</div><br>
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






		<!-- <script src="<?php //echo URL::asset('assets/scripts/register/register-1/js/demo9.js')?>"></script> -->
    
    
   
     <script>
   		
		document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
  </script>
  
  
  
  
     <script type="text/javascript" src="<?php echo URL::asset('assets/scripts/browser-warning/jquery-1.2.6.min.js') ?>"></script> 
	   <script type="text/javascript" src="<?php echo URL::asset('assets/scripts/browser-warning/jquery.badBrowser.js') ?>"></script> 
     

      <script type='text/javascript' src='<?php echo URL::asset('assets/scripts/pop-up-1/js/jquery.modal.js')?>'></script>
    <script type='text/javascript' src='<?php echo URL::asset('assets/scripts/pop-up-1/js/site.js')?>'></script>
    

    <script src="<?php echo URL::asset('assets/scripts/content-tab/js/organictabs.jquery.js')?>"></script>
    <script>
        $(function() {
    
            $("#example-one").organicTabs();
            
           
    
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
    
