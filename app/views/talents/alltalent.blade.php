<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-signin-client_id" content="270859900155-p51tnf4q0erh19hamqgpf39rv6mu3ltc.apps.googleusercontent.com">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Audition World Talents</title>

        <!-- Bootstrap -->
        <link href="{{asset('assets/new_theme/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/new_theme/css/jquery.fancybox.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/new_theme/css/bootstrap.fd.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('assets/css/post-scripts.css')}}" type="text/css">



<!--<script type="text/javascript" src="/assets/js/jwplayer/jwplayer.js"></script>-->
        <script type="text/javascript" src="/jwp/jwplayer/jwplayer.js">
        </script>
        <script>jwplayer.key = "9va04HUO4z+9XAZ89ReCYGNtMmGS3EAqgJncFA==";</script>

        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="{{asset('assets/new_theme/js/my-script.js')}}"></script>
        <script src="{{asset('assets/new_theme/js/jquery.min.1.11.1.js')}}"></script> 
        <script src="{{asset('assets/new_theme/js/bootstrap.fd.js')}}"></script>  
        <script src="{{asset('assests/js/jquery.infinitescroll.min.js')}}"></script>
        <script src="{{asset('assets/new_theme/js/bootstrap.min.js')}}"></script> 
        <script src="{{asset('assets/js/custom.js')}}"></script>
        <script src="{{asset('assets/new_theme/js/jquery.fancybox.pack.js')}}"></script>
        
        
        <script src="{{asset('assets/js/app-const.js')}}"></script>
        <link href="{{asset('assets/css/post-custom-styles.css')}}" rel="stylesheet">
        <script src="{{asset('assets/js/jsUpload.js')}}"></script>
        <script src="{{asset('assets/js/post-scripts.js')}}"></script>
        
        


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
            .postcomment_btn {
                float:right;
                border-radius: 4px;
                background-color: #008CBA;
                border: none;
                color: white;
                padding: 8px 13px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 13px;
                margin: 2px 1px;
                cursor: pointer;


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


        <script>/*(function (d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id))
         return;
         js = d.createElement(s);
         js.id = id;
         js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
         fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
         
         window.fbAsyncInit = function () {
         FB.init({
         appId: '1765186820368327',
         xfbml: true,
         version: 'v2.5'
         });
         };*/



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

            FB.api('/me', {fields: 'email'}, function(response) {
            var email = response.email;
            $.ajax({
            url : "/fbauthenticate",
                    type: "POST",
                    data:{fbemail:email},
                    success: function(data)
                    {
                    if (data != 0){
                    $("#signin").modal('toggle');
                    $("#sign_div").html(' <button type="button" class="bten" data-toggle="modal" onClick="logoutfn()"><i class="fa fa-sign-in"></i> Logout</button>');
                    window.location.reload();
                    } else	{
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












            /*(function (d, s, id) {
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {
             return;
             }
             js = d.createElement(s);
             js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
             }(document, 'script', 'facebook-jssdk'));*/
        </script>

        <script>

            /*  function statusChangeCallback(response) {
             console.log('statusChangeCallback');
             console.log(response);
             
             if (response.status === 'connected' ) {
             
             testAPI();
             
             } else if (response.status === 'not_authorized') {
             
             document.getElementById('status').innerHTML = 'Please log ' +
             'into this app.';
             } else {
             document.getElementById('status').innerHTML = 'Please log ' +
             'into Facebook.';
             }
             }
             
             
             
             function checkLoginState() {
             FB.getLoginStatus(function (response) {
             statusChangeCallback(response);
             });
             }
             
             window.fbAsyncInit = function () {
             FB.init({
             appId: '1765186820368327',
             cookie: true,
             xfbml: true,
             version: 'v2.5',
             status: true, // check login status
             oauth: true
             });
             
             
             FB.getLoginStatus(function (response) {
             statusChangeCallback(response);
             },true);
             
             };
             
             
             (function (d, s, id) {
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id))
             return;
             js = d.createElement(s);
             js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
             }(document, 'script', 'facebook-jssdk'));
             
             function testAPI() {
             
             FB.api('/me', {fields: 'email'}, function (response) {
             var email = response.email;
             $.ajax({
             url: "/fbauthenticate",
             type: "POST",
             data: {fbemail: email},
             success: function (data)
             {
             
             if (data != 0) {
             
             $("#sign_div").html(' <button type="button" class="bten" data-toggle="modal" onClick="logoutfn()"><i class="fa fa-sign-in"></i> Logout</button>');
             // window.location.reload();
             
             } else {
             alert('user Not Exists');
             }
             }
             });
             });
             } */
        </script> 

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








            /*  function onSignIn(googleUser) {
             var profile = googleUser.getBasicProfile();
             var email = profile.getEmail();
             $.ajax({
             url: "/fbauthenticate",
             type: "POST",
             data: {fbemail: email},
             success: function (data)
             {
             if (data != 0) {
             var auth2 = gapi.auth2.getAuthInstance();
             auth2.signOut().then(function () {
             window.location.reload();
             });
             } else {
             alert('user Not Exists');
             }
             }
             });
             }*/

        </script>
        <Script>
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
                    }
            });
            }
        </script>

        <div id="reloaddiv">
            <nav class="navbar navbar-default navigation" role="navigation"> 
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-top"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <figure><a href="/"><img src="{{asset('assets/new_theme/images/logo.png')}}" alt=""><span class="beta-icon">Beta</span></a></figure>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-top">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ URL::asset('/') }}" class="@yield('active_home')">Home</a></li>

                        <li><a href="{{ URL::asset('/audition') }}" class="@yield('active_aud')">Auditions</a></li>
                        <li><a href="{{ URL::asset('/livechannels') }}" class="@yield('active_live')">Live Channels</a></li>
                        @if(Auth::check())
                        <li><a href="{{ URL::asset('myprofile') }}" class="@yield('active_pr')">My Account</a></li>
                        @endif
                        <li><a href="{{ URL::asset('/talents') }}" class="active">Talent</a></li>
                        <li><a href="{{ URL::asset('/aboutus') }}" class="@yield('active_about')">About Us</a></li>
                        <li><a href="{{ URL::asset('/faq')}}" class="@yield('active_faq')">Faq</a></li>
                        <li><a href="{{ URL::asset('/contact')}}" class="@yield('active_con')">Contact Us</a></li>
                        <li>
                            <form>
                                @if(Auth::check())
                                <button type="button" class="bten" data-toggle="modal" onClick="logoutfn()"><i class="fa fa-sign-in"></i> Logout</button>
                                @else
                                <div id="sign_div"> <button type="button" class="bten" data-toggle="modal" data-target="#signin"><i class="fa fa-sign-in"></i> Sign in</button></div>
                                @endif
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- sign in modal -->

            <div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="signin">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Login to your Account</h4>
                        </div>
                        <div class="modal-body">
                            <div id="invalid"></div>
                            <div class="col-sm-12 fb"><a href="#" onclick="fb_login();"><i class="fa fa-facebook"></i>&nbsp; Sign up with Facebook</a></div>


                            <div id="gSignInWrapper">
                                <div class="col-sm-12 g-plus"  class="customGPlusSignIn" id="customBtn" ><i class="fa fa-google-plus"></i>&nbsp; Sign up with Google+</div></div>
                            <div id="name"></div>
                            <script>startApp();</script>


                            <div class="clearfix"></div>
                            <div class="divider"><span class="or"><span>OR</span></span></div>
                            <div class="form-group">
                                <input type="email" id="logemail" name="email" class="form-control" placeholder="Email">
                                <span><i class="fa fa-envelope-o"></i></span> </div>
                            <div class="form-group">
                                <input type="password" id="logpass" name="password" class="form-control" placeholder="Password">
                                <span><i class="fa fa-key"></i></span> </div>
                            <a href="#" onclick="checklog()" class="bten">Login</a>

                            <!-- <fb:login-button data-scope="email" onlogin="checkLoginState();" data-size="large"></fb:login-button>-->
                            <div id="status" style="display:none;">
                            </div>
                            <!--  <div class="g-signin2" data-onsuccess="onSignIn"></div>-->

                            <p class="text-center"><a href="#forgot_password" data-toggle="modal" data-dismiss="modal">Forgot your Password?</a></p>
                            <p class="text-center"><a href="#registration" data-toggle="modal" data-dismiss="modal">Register Here?</a></p>
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


            <!-- Add Video modal-->

            <div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="uploadpro_video">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form action="server/post.php" enctype="multipart/form-data" method="post" class="vidupdate" id="post-image">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-left">Add Media</h4>
                            </div>
                            <div class="modal-body">         

                                <textarea name="post_content" class='form-control' style='min-height:78px;border-color:#CCD1D9;padding-top:10px;margin-bottom:15px;' placeholder="Enter your thoughts about the video you are about to upload  :)"></textarea>
                                <input type='hidden' name='pagetype' id='eventid' value='feed'>

                                <input type="file" id="post-file"  name="up_data" class="upload" >

                                <div class="upload_new">    
                                    <p>Upload File</p>
                                </div>

                                <div id="post-file-preview"></div>

                                <div class="post-progress">
                                    <div class="progress">
                                        <div class="bar"></div >
                                    </div>
                                    <div class="percent">0%</div >
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary pull-right post-share" data-dismiss="modal" disabled="disabled"><i class="fa fa-pencil-square-o"></i> Share</button>
                                <button type="button" class="btn btn-default pull-left" id="cancelbtn" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>






            <!-- report spam modal-->

            <div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="report_spam">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">What kind of abuse are you reporting?</h4>
                        </div>
                        <div class="modal-body">
                            <div id="invalid"></div>
                            <div class="form-group">
                                <input type="hidden" value="" name="spam_itemid" id="spam_itemid">
                                <input type="hidden" value="" name="spam_type" id="spam_itemtype">
                                <p><input type="radio" name="group1" value="A picture of me I don't like" checked>A picture of me I don't like</p>
                                <p><input type="radio" name="group1" value="Unwanted commercial content or spam"> Unwanted commercial content or spam</p>
                                <p><input type="radio" name="group1" value="Pronography or sexually explicit material"> Pronography or sexually explicit material</p>
                                <p><input type="radio" name="group1" value="It's annoying or not interesting"> It's annoying or not interesting</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="modal-footer"> <button  class="postcomment_btn"  type="button" onclick="ReportSpam()">Continue</button></div>
                    </div>
                </div>
            </div>


            <?php
            $stream = "";
            $url = "";
            $streaming_server_ip = Config::get('app.streaming_server_ip');
            $streaming_app_name = Config::get('app.streaming_app_name');
            $streaming_format_flv = Config::get('app.streaming_format_flv');
            $streaming_format_mp4 = Config::get('app.streaming_format_mp4');
            ?>
            <section class="talent-page">
                <div class="container">
                    <div class="clearfix"></div>
                    <div class="talent-grid">              
                        @if(Auth::check())
                        <article class="white-panel up-status">
                            <ul>
                                <li><a href="#"><i class="fa fa-pencil-square-o"></i>Update Status</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#uploadpro_video" ><i class="fa fa-picture-o"></i> Add Photo/Video</a></li>
                            </ul>
                            <form action="addstatus" class='statusform' >
                                <div class="img-rou">
                                    <textarea class="form-control sts-area" placeholder="Type your message..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type your message...'" class="form-control" name="ustatus" id="status_data"></textarea>
                                    <img src="{{ PostController::profile_pic() }}"/>
                                </div>
                                <ul class="icons pull-left">
                                    <li><a href="#"  data-toggle="modal" data-target="#uploadpro_video"><i class="fa fa-camera"></i></a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#uploadpro_video"><i class="fa fa-video-camera"></i></a></li>
                                </ul>
                                <button type="button" class="post-status bten pull-right">Post</button>
                            </form>             
                        </article>
                        @else
                        <article class="white-panel up-status">
                            <ul>
                                <li><a href="#"><i class="fa fa-pencil-square-o"></i>Update Status</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#signin"><i class="fa fa-picture-o"></i> Add Photo/Video</a></li>
                            </ul>
                            <div class="img-rou">
                                <textarea class="form-control sts-area" placeholder="Type your message..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type your message...'" class="form-control"></textarea>
                                <img src="{{ URL::asset('assets/profile/user.jpg') }}" />
                            </div>
                            <ul class="icons pull-left">
                                <li><a href="#" data-toggle="modal" data-target="#signin"><i class="fa fa-camera"></i></a></li>
                                <li><a href="#" data-toggle="modal" data-target="#signin"><i class="fa fa-video-camera"></i></a></li>
                            </ul>
                            <button type="button" class="bten pull-right" data-toggle="modal" data-target="#signin">Post</button>                
                        </article>
                        @endif

                        @if(Auth::check())
                        <?php $userid = Auth::user()->id; ?>
                        @endif

                        @foreach($new as $l => $vid_img)
                        @if(!empty($vid_img->image_file ))
                        <?php
                        $commentcount = getComment($vid_img->def_id, 'image');
                        $CommentNum = CountComment($vid_img->def_id, 'image');
                        $likeNumber = GetLike($vid_img->def_id, 'image');
                        $viewNumber = GetViews($vid_img->def_id, 'image');
                        $posted_string = Findate($vid_img->created_at);
                        if (!empty($CommentNum))
                            $comment_number = $CommentNum;
                        else
                            $comment_number = 0;

                        $vido_ids[] = $vid_img->def_id;
                        ?>

                        <article class="white-panel"> 
                            <span class="pull-left col-xs-11 row"> 
                                <a href="#"><img src="{{asset('assets/profile/small_'.$vid_img->profile_pic)}}" alt=""></a>
                                <h1><a href="view_user_profile/{{$vid_img->itemuserid }}">{{$vid_img->name}} </a></h1>
                                <p><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
                            </span>
                            <div class="btn-group pull-right">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
                                <ul class="dropdown-menu">
                                    @if(Auth::check() && $vid_img->itemuserid ==  $userid)
                                    <li><a href="#" class="post-delete-image" data-status_id="{{$vid_img->def_id}}">Delete</a></li>
                                    @else
                                    <li><a href="#" title="Report Abuse" data-toggle="modal" data-target="#report_spam" onclick="addSpamid({{ $vid_img->def_id }}, 'image')">Report Abuse</a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <p class="detail"><?php echo ucfirst($vid_img->text) ?></p>
                            <div class="clearfix"></div>
                            <div class="embed-responsive embed-responsive-16by9">
                                <figure>
                                    <a class="fancybox " onclick="viewItem({{$vid_img->def_id}}, 'image')" rel="1" href="{{asset('assets/protofolio/slider_'.$vid_img->image_file)}}" data-fancybox-group="gallery">
                                        <span><img src="{{asset('assets/protofolio/slider_'.$vid_img->image_file)}}"></span>
                                    </a>
                                </figure>
                            </div>
                            <ul class="grid-menu pull-left">
                                @if(!empty($userid))
                                <li ><i class="fa fa-heart-o " onclick="likecount({{ $vid_img->def_id }},{{ $userid }}, 'image')"></i>
                                    <span class="likebtn{{ $vid_img->def_id }}image"> {{ $likeNumber }}</span>
                                </li>                                
                                @else
                                <li ><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i> {{ $likeNumber }}</li>
                                @endif

                                <!--<div class="fb-like" data-href="http://auditionworldtv.com/talentdetails_images/{{$vid_img->def_id}}" data-width="500px" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>-->
                                <li><a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $l }}"><i class="fa fa-comment-o"></i>    <span class="fb-comments-count" data-href="http://auditionworldtv.com/talents/{{$vid_img->def_id}}"></span></a></li>



                                <li><a href="#"><i class="fa fa-eye"></i> <span class="viewnum{{ $vid_img->def_id }}"> {{  $viewNumber }}</span></a></li>
                            </ul>      
                            <div class="clearfix"></div>
                            <section class="comment-list panel-collapse collapse" id="collapse{{ $l }}">
                                <div class="fb-comments" data-href="http://auditionworldtv.com/talents/{{$vid_img->def_id}}" data-width="500px" data-numposts="5"></div>

                                <!--  <form name="testform" >
                                      <input type="hidden" value="{{ $vid_img->def_id }}" name="itemid" id="itemid">
                                       <div class="form-group">
                                         <textarea class="form-control" rows="2" placeholder="Write your comments !" name="comment" id="textarea{{ $l }}"></textarea>
                                         @if(!empty($userid))                                                  
                                             <input type="hidden" name="userid" value="{{ $userid }}" id="userid" >
                                             <input class="postcomment_btn" type="button" name="btn" value="Post Comment" onclick="testfun({{ $l }},{{ $vid_img->def_id }},{{ $userid }},this.form.comment.value,'image')">
                                        @else
                                            <button  class="postcomment_btn"  type="button" data-toggle="modal" data-target="#signin">Post Comment</button>
                                        @endif
                                     </div>
                         
                                </form>
                         
                         
                                @if(!empty($commentcount)) 
                                   @foreach($commentcount as $k => $comment_count)    
                                     @if($k<=1)  
                                        <div class="media">
                                           <div class="media-left">
                                             <a href="#"><img class="media-object" alt="" src="{{asset('assets/profile/'.$comment_count->profile_pic)}}" data-holder-rendered="true"></a>
                                           </div>
                                           <div class="media-body">
                                           <h4 class="media-heading"><a href="#">{{$comment_count->name}}</a></h4>
                                           <p>{{ $comment_count->comment }}</p>  @if(!empty($userid)&&$comment_count->userid == $userid) Delete @endif
                                            <a href="#" data-toggle="modal" data-target="#reply{{$k}}"><i class="fa fa-reply"></i> Reply</a>
                                <?php $getReplycomment = getReplycomment($comment_count->id); ?>
                                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="reply">
                                                <div class="modal-dialog modal-md">
                                                   <div class="modal-content">
                         
                                                      <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title">Write a reply</h4>
                                                      </div>
                         
                                                      <div class="modal-body">
                                                         <div class="input-group">
                                                             <input class="form-control" type="text">
                                                             <span class="input-group-addon"> <a href="#"><i class="fa fa-edit"></i></a> </span> </div>
                                                          </div>
                                                     </div>
                         
                                                   </div>
                                                </div>
                                                <div class="divider"></div>
                                                 @if(!empty($getReplycomment))
                                                  @foreach($getReplycomment as $p=>$Rcomment)    
                                                     <div class="media">
                                                             <div class="media-left">
                                                                   <a href="#"><img class="media-object" alt="" src="{{asset('assets/profile/'.$Rcomment->profile_pic)}}" data-holder-rendered="true"></a>
                                                             </div>
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
                                                      <input type="hidden" value="{{ $vid_img->def_id }}" name="videoid">
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
                                                                 @if(!empty($userid))
                                                                    <input type="hidden" name="replyuserid" value="{{ $userid }}" >
                                                                    <button style="position: absolute; top: 0px; right: 0px;" type="submit" class="bten"><i class="fa fa-edit"> </i></button> 
                                                                 @else
                                                                    <button style="position: absolute; top: 0px; right: 0px;" type="button" data-toggle="modal" data-target="#signin" class="bten"><i class="fa fa-edit"> </i></button> 
                                                                 @endif  
                                                                 </div>                                                           
                                                              </div>
                         
                                                            </div>
                                                          </div>                                              
                                                        </form> 
                                                     </div>
                                                 </div>
                                                   @endif
                                                  @endforeach
                                                  <div id="nextdiv{{$l}}"></div>
                                                 <p class="load-more"><a href="talentdetails_images/{{$vid_img->def_id }}">Load more...</a>
                                                 </p>
                                              
                                              @endif-->
                            </section>
                        </article>

                        @elseif(!empty($vid_img->video_file))
                        <?php
                        $commentcount = getComment($vid_img->def_id, 'video');
                        $CommentNum = CountComment($vid_img->def_id, 'video');
                        if (!empty($CommentNum))
                            $comment_number = $CommentNum;
                        else
                            $comment_number = 0;
                        $posted_string = Findate($vid_img->created_at);
                        $likeNumber = GetLike($vid_img->def_id, 'video');
                        $viewNumber = GetViews($vid_img->def_id, 'video');
                        ?>
                        <article class="white-panel"> 
                            <span class="pull-left col-xs-11 row">
                                <a href="#"><img src="{{asset('assets/profile/small_'.$vid_img->profile_pic)}}" alt=""></a>
                                <h1><a href="view_user_profile/{{$vid_img->itemuserid }}">{{$vid_img->name}}</a></h1>
                                <p><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
                            </span> 

                            <div class="btn-group pull-right">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
                                <ul class="dropdown-menu">
                                    @if(Auth::check() && $vid_img->itemuserid ==  $userid)

                                    <li><a href="#" class="post-delete-video" data-status_id="{{$vid_img->def_id}}">Delete</a></li>
                                    @else
                                    <li><a href="#" title="Report Abuse" data-toggle="modal" data-target="#report_spam" onclick="addSpamid({{ $vid_img->def_id }}, 'video')">Report Abuse</a></li>
                                    @endif
                                </ul>
                            </div>

                            <div class="clearfix"></div>
                            <p class="detail"><?php echo ucfirst($vid_img->text) ?></p>
                            <div class="clearfix"></div>
                            @if(($vid_img->uploaded_to_you_tube ==0) || ($you_tube->you_tube ==0) )
                            <div class="" id="myElement_{{$vid_img->id}}" style="border: 10px solid #CCC;border-radius:10px;" onclick="viewItem({{$vid_img->def_id}}, 'video')"></div>
                            <?php
                            $info = pathinfo($vid_img->video_file);
                            if ($vid_img->converted == 1) {
                                $vid_img->video_file = 'converted_' . $vid_img->video_file;
                            }
                            $str = $_SERVER['HTTP_USER_AGENT'];
                            $iPod = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
                            $iPhone = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
                            $iPad = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
                            $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
                            $webOS = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");
                            $protocol = "";
                            if ($iPod || $iPhone) {
                                if ($info["extension"] == "flv") {
                                    $protocol = 'http://' . $streaming_server_ip . ":1935/" . $streaming_app_name . "/" . $streaming_format_flv . ":" . $vid_img->video_file . "/playlist.m3u8";
                                } else {
                                    $protocol = 'http://' . $streaming_server_ip . ":1935/" . $streaming_app_name . "/" . $streaming_format_mp4 . ":" . $vid_img->video_file . "/playlist.m3u8";
                                }
                            } else if ($Android) {
                                preg_match('/Android ?([0-9]+\.[0-9]+)/', $str, $ar1);
                                //$ar1 = preg_match('/Android ?([0-9]+\.[0-9]+)/');
                                if ((float) $ar1[1] > 4.0) {
                                    if ($info["extension"] == "flv") {
                                        $protocol = "rtmp://" . $streaming_server_ip . ":1935/" . $streaming_app_name . "/" . $streaming_format_flv . ":" . $vid_img->video_file;
                                    } else {
                                        $protocol = 'rtmp://' . $streaming_server_ip . ":1935/" . $streaming_app_name . "/" . $streaming_format_mp4 . ":" . $vid_img->video_file;
                                    }
                                } else {
                                    if ($info["extension"] == "flv") {
                                        $protocol = "rtsp://" . $streaming_server_ip . ":1935/" . $streaming_app_name . "/" . $streaming_format_flv . ":" . $vid_img->video_file;
                                    } else {
                                        $protocol = "rtsp://" . $streaming_server_ip . ":1935/" . $streaming_app_name . "/" . $streaming_format_mp4 . ":" . $vid_img->video_file;
                                    }
                                }
                            } else {
                                if ($info["extension"] == "flv") {
                                    $protocol = 'rtmp://' . $streaming_server_ip . "/" . $streaming_app_name . "/" . $streaming_format_flv . ":" . $vid_img->video_file;
                                } else {
                                    $protocol = 'rtmp://' . $streaming_server_ip . "/" . $streaming_app_name . "/" . $streaming_format_mp4 . ":" . $vid_img->video_file;
                                }
                            }
                            ?>

                            <script type="text/javascript">
                                jwplayer("myElement_{{$vid_img->id}}").setup({
                                primary: "flash",
                                        file: "{{$protocol}}",
                                        image: "/assets/thumbnails/{{$vid_img->thumbnail}}",
                                        skin: {name: "bekle"},
                                        autoplay: true,
                                        width: "100%",
                                        logo: {hide: 'true'},
                                        aspectratio: "12:5",
                                });
                            </script>
                            @else
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" onclick="viewItem({{$vid_img->def_id}}, 'video')"  src="https://www.youtube.com/embed/{{$vid_img->youtube_id}}?modestbranding=1&controls=0&rel=0&showinfo=0" frameborder="0" allowfullscreen ></iframe>



                            </div>
                            @endif                   
                            <ul class="grid-menu pull-left">
                                @if(!empty($userid))
                                <li ><i class="fa fa-heart-o " onclick="likecount({{ $vid_img->def_id }},{{ $userid }}, 'video')"></i>
                                    <span class="likebtn{{ $vid_img->def_id }}video"> {{ $likeNumber }}</span>
                                </li>                                
                                @else
                                <li ><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </li>
                                @endif
                                <li><a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $l }}"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="http://auditionworldtv.com/talents/{{$vid_img->def_id}}"></span></a></li>
                                <li><a href="#"><i class="fa fa-eye"></i> <span class="viewnum{{ $vid_img->def_id }}"> {{  $viewNumber }}</span></a></li>
                            </ul>
                            <div class="clearfix"></div>
                            <section class="comment-list panel-collapse collapse" id="collapse{{ $l }}">

                                <div class="fb-comments" data-href="http://auditionworldtv.com/talents/{{$vid_img->def_id}}" data-width="500px" data-numposts="5">



                                </div>
                                <!--  <form name="testform" >
                                     <input type="hidden" value="{{ $vid_img->def_id }}" name="itemid" id="itemid">
                                     <div class="form-group">
                                      <textarea class="form-control" rows="2" placeholder="Write your comments !" name="comment" id="textarea{{ $l }}"></textarea>
                                       @if(!empty($userid))
                                          <input type="hidden" name="userid" value="{{ $userid }}" id="userid" >
                                          <input type="button" class="postcomment_btn"  name="btn" value="Post Comment" onclick="testfun({{ $l }},{{ $vid_img->def_id }},{{ $userid }},this.form.comment.value,'video')">
                                       @else
                                            <button type="button" class="postcomment_btn"  data-toggle="modal" data-target="#signin">Post Comment</button>
                                       @endif
                                       </div>
                                  </form>
                          
                          
                                  @if(!empty($commentcount)) 
                                     @foreach($commentcount as $k => $comment_count)    
                                       @if($k<=1)  
                                          <div class="media">
                                             <div class="media-left">
                                                <a href="#"><img class="media-object" alt="" src="{{asset('assets/profile/'.$comment_count->profile_pic)}}" data-holder-rendered="true"></a>
                                              </div>
                          
                                              <div class="media-body">
                                                <h4 class="media-heading"><a href="#">{{$comment_count->name}}</a></h4>
                                                <p>{{ $comment_count->comment }}</p>  
                                                @if(!empty($userid)&&$comment_count->userid == $userid) 
                                                  Delete 
                                                @endif
                                                <a href="#" data-toggle="modal" data-target="#reply{{$k}}"><i class="fa fa-reply"></i> Reply</a>
                                <?php $getReplycomment = getReplycomment($comment_count->id); ?>
                                                  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="reply">
                                                     <div class="modal-dialog modal-md">
                                                         <div class="modal-content">
                          
                                                            <div class="modal-header">
                                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                               <h4 class="modal-title">Write a reply</h4>
                                                             </div>
                          
                                                             <div class="modal-body">
                                                                <div class="input-group">
                                                                   <input class="form-control" type="text">
                                                                    <span class="input-group-addon"> <a href="#"><i class="fa fa-edit"></i></a> </span> 
                                                                </div>
                                                             </div>
                          
                                                           </div>
                                                        </div>
                                                     </div>
                                                    <div class="divider"></div>
                                                    @if(!empty($getReplycomment))
                                                       @foreach($getReplycomment as $p=>$Rcomment)    
                                                          <div class="media">
                                                            <div class="media-left">
                                                              <a href="#"><img class="media-object" alt="" src="{{asset('assets/profile/'.$Rcomment->profile_pic)}}" data-holder-rendered="true">
                                                              </a>
                                                             </div>
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
                                                         <input type="hidden" value="{{ $vid_img->def_id }}" name="videoid">
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
                                                                       @if(!empty($userid))
                                                                        <input type="hidden" name="replyuserid" value="{{ $userid }}" >
                                                                        <button style="position: absolute; top: 0px; right: 0px;" type="submit" class="bten"><i class="fa fa-edit"> </i></button>
                                                                       @else
                                                                        <button style="position: absolute; top: 0px; right: 0px;" type="button" data-toggle="modal" data-target="#signin" class="bten"><i class="fa fa-edit"> </i></button> 
                                                                        @endif  
                                                                  </div>		                                                                                                          
                                                                  </div>
                                                                </div>
                                                               </div>  
                                                             </div>                                            
                                                         </form> 
                                                      </div>
                                                  </div>
                                                   @endif
                                                  @endforeach
                                                  <div id="nextdiv{{$l}}"></div>
                                                  <p class="load-more"><a href="talentdetails/{{$vid_img->def_id }}">Load more...</a></p>
                                            
                                               @endif-->
                            </section>
                        </article>
                        @else
                        <article class="white-panel"> 
                            <span class="pull-left col-xs-11 row"> <a href="#"><img src="{{asset('assets/profile/small_'.$vid_img->profile_pic)}}" alt=""></a>
                                <h1><a href="view_user_profile/{{$vid_img->itemuserid }}">{{$vid_img->name}}  </a></h1>
                                <?php $posted_string = Findate($vid_img->up_date); ?>        
                                <p><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
                            </span>
                            @if(Auth::check() && $vid_img->itemuserid ==  $userid)
                            <div class="btn-group pull-right">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
                                <ul class="dropdown-menu">

                                    <li><li><a href="#" class="post-delete" data-status_id="{{$vid_img->def_id}}">Delete</a></li></li>
                                </ul>
                            </div>
                            @endif
                            <div class="clearfix"></div>
                            <p class="detail" ><?php echo ucfirst($vid_img->status) ?></p>
                            <div class="clearfix"></div>                   
                            <ul class="grid-menu pull-left">                        
                            </ul>
                            <div class="clearfix"></div>
                        </article>

                        @endif

                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
            </section>
            <script>

                $(document).ready(function () {
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
                this.options = $.extend({}, defaults, options);
                this._defaults = defaults;
                this._name = pluginName;
                this.init();
                }

                Plugin.prototype.init = function () {
                var self = this,
                        resize_finish;
                $(window).resize(function () {
                clearTimeout(resize_finish);
                resize_finish = setTimeout(function () {
                self.make_layout_change(self);
                }, 11);
                });
                self.make_layout_change(self);
                setTimeout(function () {
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
                if (single_column_mode === true) {
                article_width = $container.width() - self.options.padding_x;
                } else {
                article_width = ($container.width() - self.options.padding_x * self.options.no_columns) / self.options.no_columns;
                }

                $article.each(function () {
                $(this).css('width', article_width);
                });
                columns = self.options.no_columns;
                $article.each(function (index) {
                var current_column,
                        left_out = 0,
                        top = 0,
                        $this = $(this),
                        prevAll = $this.prevAll(),
                        tallest = 0;
                if (single_column_mode === false) {
                current_column = (index % columns);
                } else {
                current_column = 0;
                }

                for (var t = 0; t < columns; t++) {
                $this.removeClass('c' + t);
                }

                if (index % columns === 0) {
                row++;
                }

                $this.addClass('c' + current_column);
                $this.addClass('r' + row);
                prevAll.each(function (index) {
                if ($(this).hasClass('c' + current_column)) {
                top += $(this).outerHeight() + self.options.padding_y;
                }
                });
                if (single_column_mode === true) {
                left_out = 0;
                } else {
                left_out = (index % columns) * (article_width + self.options.padding_x);
                }

                $this.css({
                'left': left_out,
                        'top': top
                });
                });
                this.tallest($container);
                $(window).resize();
                };
                Plugin.prototype.tallest = function (_container) {
                var column_heights = [],
                        largest = 0;
                for (var z = 0; z < columns; z++) {
                var temp_height = 0;
                _container.find('.c' + z).each(function () {
                temp_height += $(this).outerHeight();
                });
                column_heights[z] = temp_height;
                }

                largest = Math.max.apply(Math, column_heights);
                _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
                };
                Plugin.prototype.make_layout_change = function (_self) {
                if ($(window).width() < _self.options.single_column_breakpoint) {
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
                $(document).ready(function () {


                $("[data-toggle=tooltip]").tooltip();
                /* function getresult(url) {
                 
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
                 }*/
                pagenum = 0;
                $(window).scroll(function () {
                if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                //var pagenum = parseInt($(".pagenum:last").val()) + 1;
                pagenum++;
                $.get('fetch_data?page=' + pagenum, function (data, status) {
                if ($.trim(data) != 'No More Data To Load.') {
                $(".talent-grid").append(data);
                FB.XFBML.parse();
                }
                });
                //getresult('load_more_data?page='+pagenum);
                }
                });
                });
            </script>

            <script>

                function placechange() {
                $('#status_text').attr('placeholder', ' ');
                }


                function changeplaceorg() {
                $('#status_text').attr('placeholder', 'Enter your thoughts about the video you are about to upload  :)');
                }


                function videofrm() {
                $("#video_prev").hide();
                $("#video_onload_image").show();
                $("#removevideo").hide();
                $('#cancelbtn').prop("disabled", true);
                //$("#video_prev" ).html("<img src='assets/new_theme/images/ajax_loader2.gif' height='100px' width='150px'>");
                $(".vidupdate").submit();
                }


                function handleVideoSelect(evt) {
                var files = evt.target.files;
                for (var i = 0, f; f = files[i]; i++) {
                var kilobyte = 1024;
                var megabyte = kilobyte * 1024;
                var fsize = Math.round(f.size / megabyte);
                if (fsize <= 10) {
                } else {
                alert('Maximum filesize in 10MB');
                break;
                }

                var reader = new window.FileReader();
                $("#fileselectvideo").hide();
                $("#userimg_video").hide();
                $("#video_load").html("<div class='row' style='margin-top:15px;'><div class='col-xs-7 col-sm-4 bfd-info'> <span id='removevideo' class='fa fa-times-circle bfd-remove'></span>  " + f.name + " </div><div class='col-xs-5 col-sm-8 bfd-progress'>  <div class='progress'> <div id='m' class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='" + f.size + "'> <span class='sr-only'>0%</span> </div></div></div></div>");
                $("#video_load").show();
                $("#removevideo").click(function () {
                $("#fileselectvideo").show();
                $("#userimg_video").show();
                $("#video_prev").hide();
                $("#video_load").hide();
                });
                reader.onprogress = function (f) {


                var o = Math.round(100 * f.loaded / f.total) + "%";
                $("#m").attr("aria-valuenow", f.loaded), $("#m").css("width", o);
                };
                reader.onload = (function (theFile) {
                return function (e) {
                var re = e.target.result.split('/');
                var type = re[0].split(':');
                if (type[1] == 'image') {
                $("#video_prev").html("<img src='" + e.target.result + "' height='250px' width='350px' style='margin:0 auto; display:block;'>");
                }
                if (type[1] == 'video') {
                $("#video_prev").html("<video src='" + e.target.result + "' height='250px' width='350px' style='margin:0 auto; display:block;'></video>");
                }
                $("#video_prev").show();
                $("#m").attr("aria-valuenow", e.total), $("#m").css("width", e.total);
                $('#okbtn').prop("disabled", false);
                };
                })(f);
                reader.readAsDataURL(f);
                }
                }
                document.getElementById('video').addEventListener('change', handleVideoSelect, false);
            </script>
            
            <style>
                #invalid{
                    color:red;
                }
            </style> 
        </div>
    </body>
</html>


