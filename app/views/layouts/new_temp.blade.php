<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-signin-client_id" content="270859900155-p51tnf4q0erh19hamqgpf39rv6mu3ltc.apps.googleusercontent.com">

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title> @yield('title')</title>
 @yield('metadata')
<!-- Bootstrap -->
<link href="{{ URL::asset('assets/new_theme/css/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/new_theme/css/bootstrap.fd.css')}}">
<script src="{{ URL::asset('assets/new_theme/js/jquery.min.1.11.1.js')}}"></script>
<script src="{{ URL::asset('assets/new_theme/js/bootstrap.min.js')}}"></script>
<script src="{{  URL::asset('assets/js/custom.js') }}"></script>
 <script src="{{ URL::asset('assets/new_theme/js/my-script.js')}}"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript" src="{{ URL::asset('assets/new_theme/js/bootstrap.fd.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
.help-block{

color:red !important;
}
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
    .choose-btn {
        background: none;
        color: #AAB2BD;
    }
    .choose-btn span {
         font-size: 30px;
    }
    .choose-btn:hover {
        color: #76797D;
        background: none;
    }
    .progress {
        height: 10px;
        box-shadow: none;
        margin-top: 5px;
    }
    .progress-bar {
        background-color: rgba(51, 158, 6, 0.98);
    }


</style>
<style>
        .beta-icon {border-radius: 4px;background-color: #e74c3c;color: #fff;padding:0px 4px 1px 4px;font-size:12px;margin-left: 3px;}
</style>
</head>
<body>
<div id="fb-root"></div>
<script>

(function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
}());


window.fbAsyncInit = function() {
    FB.init({
        appId   : '1765186820368327',
        oauth   : true,
        status  : true, // check login status
        cookie  : true, // enable cookies to allow the server to access the session
        xfbml   : true // parse XFBML
    });

  };

function fb_login(){
    FB.login(function(response) {

        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            //console.log(response); // dump complete info
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID

          FB.api('/me',{fields: 'email'}, function(response) {
          var email=response.email;
	 $.ajax({
         url : "/fbauthenticate",
          type: "POST",
          data:{fbemail:email},
          success: function(data)
          {
		if(data!=0){
		 
			window.location.reload();
			
		}else	{
		alert('user Not Exists');
			}
          }
      });          
    });

        } else {
        
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'email'
    });
}


</script>

<!--<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1765186820368327',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script>

  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
    
      testAPI();

    } else if (response.status === 'not_authorized') {
      
   console.log( 'Please log ' + 'into this app.');
    } else {   
         console.log( 'Please log ' + 'into this facebook.');
    }
  }

// end statusChangeCallback
 
  function checkLoginState() {

    FB.getLoginStatus(function(response) {

      statusChangeCallback(response);
    });
  }

//end checkingloginstate

  window.fbAsyncInit = function() {
	  FB.init({
	    appId      : '1765186820368327',
	    cookie     : true,                        
	    xfbml      : true,  
	    version    : 'v2.5',
	    status     : true, // check login status
	    oauth      : true
	  });

	  FB.getLoginStatus(function(response) {
	    statusChangeCallback(response);
	  });

  };

//end bAsyncInit 

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

//end script src



  function testAPI() {
   
    FB.api('/me',{fields: 'email'}, function(response) {
          var email=response.email;
	 $.ajax({
         url : "/fbauthenticate",
          type: "POST",
          data:{fbemail:email},
          success: function(data)
          {
		if(data!=0){
		  FB.logout(function(response) {
			window.location.reload();
			});
		}else	{
		alert('user Not Exists');
			}
          }
      });          
    });
  }

//end testApi
</script>-->

<script>


  var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '270859900155-p51tnf4q0erh19hamqgpf39rv6mu3ltc.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        scope: 'email'
      });
      attachSignin(document.getElementById('customBtn'));
    });
  };

  function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
    
		var email = googleUser.getBasicProfile().getEmail();
                $.ajax({
                    url: "/fbauthenticate",
                    type: "POST",
                    data: {fbemail: email},
                    success: function (data)
                    {
                        if (data != 0) {
                          //  var auth2 = gapi.auth2.getAuthInstance();
                                window.location.reload();
                        } else {
                            alert('user Not Exists');
                        }
                    }
                });
        }, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });
  }







/*function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var email=profile.getEmail();
 	$.ajax({
        	 url : "/fbauthenticate",
         	 type: "POST",
        	  data:{fbemail:email},
         	 success: function(data)
         	 {
			if(data!=0){		 
 				var auth2 = gapi.auth2.getAuthInstance();
   				 auth2.signOut().then(function () {
    				 window.location.reload();
   					 });
			}else {
				alert('user Not Exists');
			}
          }
      });
}*/

</script>
<nav class="navbar navbar-default navigation" role="navigation"> 
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-top"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <figure><a href="{{ URL::asset('/') }}"><img src="{{ URL::asset('assets/new_theme/images/logo.png')}}" alt=""><span class="beta-icon">Beta</span></a></figure>
  </div>
  
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="navbar-top">
    <ul class="nav navbar-nav navbar-right">



      <li><a href="{{ URL::asset('/') }}" class="@yield('active_home')">Home</a></li>
      <li><a href="{{ URL::asset('/audition') }}" class="@yield('active_aud')">Auditions</a></li>
     <li><a href="{{ URL::asset('/livechannels') }}" class="@yield('active_live')">Live Channels</a></li>

	@if(Auth::check())

	   <?php   $type = Auth::user()->user_type; ?>
            @if($type=='Audition Manager')
                <li><a href="{{ URL::asset('myauditions') }}" class="@yield('active_pr')">      My Account</a></li>
            @elseif($type=='admin')
		 <li><a href="{{ URL::asset('users') }}" class="@yield('active_pr')">      My Account</a></li>
	    @else
              <li><a href="{{ URL::asset('myprofile') }}" class="@yield('active_pr')">      My Account</a></li>
            @endif
        @endif

      <li><a href="{{ URL::asset('/talents') }}" class="@yield('active_tal')">Talent</a></li>
      <li><a href="{{ URL::asset('/aboutus') }}" class="@yield('active_about')">About Us</a></li>
      <li><a href="{{ URL::asset('/faq')}}" class="@yield('active_faq')">Faq</a></li>
      <li><a href="{{ URL::asset('/contact')}}" class="@yield('active_con')">Contact Us</a></li>
      <li>
	
        <form>
	@if(Auth::check())
          <button type="button" class="bten" data-toggle="modal" onClick="logoutfn()"><i class="fa fa-sign-in"></i> Logout</button>
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
          
    <div class="col-sm-12 fb"><a href="#" onclick="fb_login();"><i class="fa fa-facebook"></i>&nbsp; Sign in with Facebook</a></div>

<!--<fb:login-button size="large" onlogin="checkLoginState();">Login with Facebook</fb:login-button>-->

                          <div id="gSignInWrapper">
<div class="col-sm-12 g-plus"  class="customGPlusSignIn" id="customBtn" ><a href="#"><i class="fa fa-google-plus"></i>&nbsp; Sign up with Google+</a></div></div>
                            <div id="name"></div>
  <script>startApp();</script>




          <div class="clearfix"></div>
    <div class="divider" style="margin-top:15px;margin-bottom:15px;"><span class="or"><span>OR</span></span></div>
          
          
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


<!--
<fb:login-button data-scope="email" onlogin="checkLoginState();" data-size="large"></fb:login-button>
<div id="status" style="display:none;">
</div>
<div class="g-signin2" data-onsuccess="onSignIn"></div>
-->

	<p class="text-center"><a href="#forgot_password" data-toggle="modal" data-dismiss="modal">Forgot your Password?</a></p>

	<p class="text-center"><a href="#registration" data-toggle="modal" data-dismiss="modal">Register Here?</a></p>
    
    <div class="clearfix"></div>
          
      </div>
    </div>
  </div>
</div>
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



 function logoutfn() {

                $.ajax({
                    url: "/logout",
                    type: "POST",
                    success: function (data, textStatus, jqXHR)
                    {
 window.location.reload();

 var auth2 = gapi.auth2.getAuthInstance();
auth2.signOut().then(function () { 
});
FB.logout(function(response) {
                       
});

 window.location.reload();
                    }
                });
            }








</script>

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
      </div>
	</form>
    </div>
  </div>
</div>
<!--end forgot password-->

<!--start sign up-->
<div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="registration">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sign Up Here</h4>
      </div>
      <div class="modal-body">
	<form id="regist_form" method="POST" action="register">
        <div class="form-group">
           <input type="text"  class="form-control" placeholder="First Name" data-validation="required"  data-validation-error-msg="Please enter your name" >
	</div>
	 <div class="form-group">
          <input type="text" name="phone" class="form-control" placeholder="Phone" data-validation="required" data-validation-error-msg="Please enter your phone number" >
	</div>
 <div class="form-group">
     <input type="text" name="email" class="form-control" placeholder="Email Address" data-validation="email required" data-validation-error-msg="Please enter your email address" >
	</div>
 <div class="form-group">
         <input type="password"  class="form-control" placeholder="Password" name="password" data-validation="required" data-validation-error-msg="Please enter the password" >
	</div>
<div class="form-group">
         <input type="password"  class="form-control" placeholder="Confirm Password" data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="Please confirm the password" >
	</div>
<div class="checkbox" style="width: 100%;float:left">
                <input id="agree1" type="checkbox" data-validation="required" data-validation-error-msg="Please accept the terms and conditions">
                <label for="agree1" style="color:red;"> I agree with terms and conditions</label>
		<p id="error_already1" style="color:red"> </p>
              </div>
        <input class="bten" type="submit" value="Sign Up">
	<p id="resultforgot" class="text-center"></p>
        <div class="clearfix"></div>
        <p id="error_already1" style="color:red"> </p>
	<p id="created_success1" style="color:green"> </p>
      </div>
</form>
    </div>
  </div>
</div>
<!--end sign up-->
            @yield('main')
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
</body>
<script>
  $.validate({
 modules : 'security'
});
</script>
</html>
