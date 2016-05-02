<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Audition Profile Page</title>
<link href="<?php echo URL::asset('assets/css/main-style.css') ?>" rel="stylesheet" type="text/css" />    
<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="<?php echo URL::asset('assets/scripts/sidebartransitions/js/modernizr.custom.js')?>"></script>    
<script src="<?php echo URL::asset('assets/js/custom.js')?>"></script>    

<script>
  window.onload=function() {
      document.getElementById('loading-mask').style.display='none';
  }
</script>
  <script type="text/javascript" src="<?php echo URL::asset('assets/scripts/progress-bar/goalProgress.js')?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#sample_goal').goalProgress({
        goalAmount: 100,
        currentAmount: 90,
                textAfter: '%'
      });
    });
  </script>

</head>
<body class="inner-body" >

 
        
        
        
        

<div id="wrapper" >

        <div id="st-container" class="st-container">
      
        <div class="st-pusher">
      

        <nav class="st-menu st-effect-7" id="menu-7">
           <form class="log-in" action="" method="POST">
            <div id="invalid"></div>
            <input name="email" id="logemail" type="text" placeholder="Email" class="log-txt log-martop">
            <input name="password" id="logpass" type="password" placeholder="Password" class="log-txt">
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
        <a href="" class="iner-logo"> <img src="<?php echo URL::asset('assets/images/inner-logo.png')?>"> </a> 
</div>


</div>

<div class="header-right"> 







<div class="log-but"> 
@if(Auth::check())
  <a href="{{ URL::asset('/myprofile') }}" class="reg-bg">
                                                    Profile
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
            @if(Auth::user()->user_type == "manager")
              <a href="{{ URL::asset('/myauditions') }}" style="margin-left: -145px;color:#FFF">My Auditions</a>
                  @endif
                @endif
<a href="{{ URL::asset('/') }}" class="iner-nav-txt">HOME</a>
<a href="{{ URL::asset('/audition') }}" class="iner-nav-txt">AUDITION</a>
<a href="{{ URL::asset('/talents') }}" class="iner-nav-txt">TALENTS</a>
<a href="{{ URL::asset('/aboutus') }}" class="iner-nav-txt">ABOUT US</a>
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
    <img src="<?php echo URL::asset('assets/images/dummy/ad.jpg')?>"> 
</div>
<div class="ad-right"> 
    <img src="<?php echo URL::asset('assets/images/dummy/ad.jpg')?>"> 
</div>

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
                                <p style="margin-top:10px">
By Registering in AuditionWorld Portal, you are one stepper closer to your dream of showcasing your talent to the whole world. Register here and take a small effort to create a 3 minute video (indoor or outdoor) with your own script that shows your talent to fullest. Gender, age is not a barrier for the talents. Currently the audition portal is inviting acting talents and it will be expanded to other talents in future. Remember every marathon starts with a single step and let this be your first step.
                                </p>

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
              <input name="phone" maxlength="10" id="phone" type="text" class="rg-text-small" placeholder="Mobile Number"> 
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
 <div class="reg-3">  
   
    <p> <em>"When a great moment knocks on the door of your life, it is often no louder than the beating of your heart, and it is very easy to miss it. ”<br>
<strong>Boris Pasternak</strong></em> </p>  

<p style="margin-top:20px">
<em> “A pessimist sees the difficulty in every opportunity; an optimist sees the opportunity in every difficulty.”<br>

<strong>Winston S. Churchill</strong></em> </p>

<p style="margin-top:20px">
<em>“When you do what you fear most, then you can do anything.”<br>
<strong>Stephen Richards </strong> </em>  </p>

</div>

      </nav>
    
      
      
    </div>
        <button id="trigger-overlay2"  class="reg-button" type="button" style=" display:none">
    Register now
</button>

 
   
  
    </div>
    
    </div>
<!-- /st-pusher -->
      
      
      
      
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
              <input name="phone" maxlength="10" id="phone" type="text" class="rg-text-small" placeholder="Mobile Number"> 
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


</body>
</html>
