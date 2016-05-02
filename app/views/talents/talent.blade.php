<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Audition World Talents</title>

<!-- Bootstrap -->

<link href="css/style.css" rel="stylesheet">
<link href="css/jquery.fancybox.css" rel="stylesheet">

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
</style>
</head>
<body>
<nav class="navbar navbar-default navigation" role="navigation"> 
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-top"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <figure><a href="index.html"><img src="images/logo.png" alt=""></a></figure>
  </div>
  
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="navbar-top">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.html">Home</a></li>
      <li><a href="audition.html">Auditions</a></li>
      <li><a href="talent.html" class="active">Talent</a></li>
      <li><a href="about_us.html">About Us</a></li>
      <li><a href="faq.html">Faq</a></li>
      <li><a href="contact_us.html">Contact Us</a></li>
      <li>
        <form>
          <button type="button" class="bten" data-toggle="modal" data-target="#signin"><i class="fa fa-sign-in"></i> Sign in</button>
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
        <div class="col-sm-12 fb"><a href="#"><i class="fa fa-facebook"></i>&nbsp; Sign up with Facebook</a></div>
        <div class="col-sm-12 g-plus"><a href="#"><i class="fa fa-google-plus"></i>&nbsp; Sign up with Google+</a></div>
        <div class="clearfix"></div>
        <div class="divider"><span class="or"><span>OR</span></span></div>
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <span><i class="fa fa-envelope-o"></i></span> </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span><i class="fa fa-key"></i></span> </div>
        <a href="#" class="bten">Login</a>
        <p class="pull-left"><a href="#">Forgot Password?</a></p>
        <p class="pull-right"><a href="#">Create Account</a></p>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<section class="posting">
  <div class="container">
    <div class="col-md-12 widget-area">
      <div class="status-upload">
        <form>
          <textarea placeholder="Lorem ipsum dolor sit amet consectetur." ></textarea>
          <ul>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><span class="btn-file"><i class="fa fa-video-camera"></i>
              <input type="file">
              </span></a></li>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><span class="btn-file"><i class="fa fa-picture-o"></i>
              <input type="file">
              </span></a></li>
          </ul>
          <button type="submit" class="bten"><i class="fa fa-pencil-square-o"></i> Post</button>
        </form>
      </div>
      <!-- Status Upload  --> 
    </div>
    <!-- Widget Area --> 
    
  </div>
  </div>
</section>
<section class="talent-page">
  <div class="container">
    <div class="talent-grid">

    
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-one.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non sollicitudin elit. Curabitur magna ligula, condimentum sed.</p>
        <div class="clearfix"></div>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/z3w7tW10hl8" frameborder="0" allowfullscreen></iframe>
        </div>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
        <div class="clearfix"></div>
        <section class="comment-list panel-collapse collapse" id="collapseTwo">
          <div class="form-group">
            <textarea class="form-control" rows="2" placeholder="Write a comment"></textarea>
          </div>
          <div class="media">
            <div class="media-left"> <a href="#"><img class="media-object" alt="" src="images/top-four.jpg" data-holder-rendered="true"></a> </div>
            <div class="media-body">
              <h4 class="media-heading"><a href="#">User Name</a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non sollicitudin elit. Curabitur magna ligula, condimentum sed. Lorem ipsum dolor sit amet.</p>
              <a href="#" data-toggle="modal" data-target="#reply"><i class="fa fa-reply"></i> Reply</a>
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
              <div class="media">
                <div class="media-left"> <a href="#"><img class="media-object" alt="" src="images/top-two.jpg" data-holder-rendered="true"></a> </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">User Name</a></h4>
                  <p>Reply comment here</p>
                  <a href="#" data-toggle="modal" data-target="#reply"><i class="fa fa-reply"></i> Reply</a>
                  <div class="divider"></div>
                </div>
              </div>
              <div class="media">
                <div class="media-left"> <a href="#"><img class="media-object" alt="" src="images/top-four.jpg" data-holder-rendered="true"></a> </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">User Name</a></h4>
                  <p><a href="#">@User Name</a> Reply to reply comment here</p>
                  <a href="#" data-toggle="modal" data-target="#reply"><i class="fa fa-reply"></i> Reply</a>
                  <div class="divider"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="media">
            <div class="media-left"> <a href="#"><img class="media-object" alt="" src="images/top-one.jpg" data-holder-rendered="true"></a> </div>
            <div class="media-body">
              <h4 class="media-heading"><a href="#">User Name</a></h4>
              <p>Lorem ipsum dolor sit amet, consectetu.</p>
              <a href="#" data-toggle="modal" data-target="#reply"><i class="fa fa-reply"></i> Reply</a>
              <div class="divider"></div>
            </div>
          </div>
          <p class="load-more"><a href="post-details.html">Load more...</a></p>
        </section>
      </article>





      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-two.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/up-coming-one.jpg" data-fancybox-group="gallery"><span><img src="images/up-coming-one.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-three.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non.</p>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/up-coming-two.jpg" data-fancybox-group="gallery"><span><img src="images/up-coming-two.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-four.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non sollicitudin elit. Curabitur magna ligula, condimentum sed.</p>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/video-tumb-one.jpg" data-fancybox-group="gallery"><span><img src="images/video-tumb-one.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-five.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/video-tumb-two.jpg" data-fancybox-group="gallery"><span><img src="images/video-tumb-two.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-one.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/up-coming-three.jpg" data-fancybox-group="gallery"><span><img src="images/up-coming-three.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-two.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="detail">Lorem ipsum dolor sit amet.</p>
        <div class="clearfix"></div>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/z3w7tW10hl8" frameborder="0" allowfullscreen></iframe>
        </div>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-three.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipisci.</p>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/up-coming-one.jpg" data-fancybox-group="gallery"><span><img src="images/up-coming-one.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-four.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non sollicitudin elit. Curabitur magna ligula, condimentum sed.</p>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/up-coming-two.jpg" data-fancybox-group="gallery"><span><img src="images/up-coming-two.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-five.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/video-tumb-two.jpg" data-fancybox-group="gallery"><span><img src="images/video-tumb-two.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-one.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/video-tumb-two.jpg" data-fancybox-group="gallery"><span><img src="images/video-tumb-two.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-two.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non sollicitudin elit. Curabitur magna ligula, condimentum sed.</p>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/up-coming-three.jpg" data-fancybox-group="gallery"><span><img src="images/up-coming-three.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-three.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non sollicitudin elit. Curabitur magna ligula, condimentum sed.</p>
        <div class="clearfix"></div>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/z3w7tW10hl8" frameborder="0" allowfullscreen></iframe>
        </div>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-four.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/up-coming-one.jpg" data-fancybox-group="gallery"><span><img src="images/up-coming-one.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-five.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non sollicitudin elit. Curabitur magna ligula, condimentum sed.</p>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/up-coming-two.jpg" data-fancybox-group="gallery"><span><img src="images/up-coming-two.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-one.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non sollicitudin elit. Curabitur magna ligula, condimentum sed.</p>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/video-tumb-one.jpg" data-fancybox-group="gallery"><span><img src="images/video-tumb-one.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-two.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/video-tumb-two.jpg" data-fancybox-group="gallery"><span><img src="images/video-tumb-two.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-three.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non sollicitudin elit. Curabitur magna ligula, condimentum sed.</p>
        <div class="clearfix"></div>
        <figure><a class="fancybox" rel="1" href="images/up-coming-three.jpg" data-fancybox-group="gallery"><span><img src="images/up-coming-three.jpg"></span></a></figure>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
      <article class="white-panel"> <span class="pull-left col-xs-11 row"> <a href="#"><img src="images/top-four.jpg" alt=""></a>
        <h1><a href="#">User Name</a></h1>
        <p><i class="fa fa-clock-o"></i> 10 Minutes ago</p>
        </span>
        <div class="btn-group pull-right">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
          <ul class="dropdown-menu">
            <li><a href="#">Delete</a></li>
            <li><a href="#">Edit</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/z3w7tW10hl8" frameborder="0" allowfullscreen></iframe>
        </div>
        <ul class="grid-menu pull-left">
          <li><a href="#"><i class="fa fa-heart-o"></i> 324</a></li>
          <li><a href="#"><i class="fa fa-comment-o"></i> 125</a></li>
          <li><a href="#"><i class="fa fa-eye"></i> 420</a></li>
        </ul>
      </article>
    </div>
  </div>
  <div class="clearfix"></div>
</section>

<!--
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
--> 

<script src="js/jquery.min.1.11.1.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script>
        $(document).ready(function() {
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
        this.options = $.extend({}, defaults, options) ;
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    Plugin.prototype.init = function () {
        var self = this,
            resize_finish;

        $(window).resize(function() {
            clearTimeout(resize_finish);
            resize_finish = setTimeout( function () {
                self.make_layout_change(self);
            }, 11);
        });

        self.make_layout_change(self);

        setTimeout(function() {
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

        if(single_column_mode === true) {
            article_width = $container.width() - self.options.padding_x;
        } else {
            article_width = ($container.width() - self.options.padding_x * self.options.no_columns) / self.options.no_columns;
        }

        $article.each(function() {
            $(this).css('width', article_width);
        });

        columns = self.options.no_columns;

        $article.each(function(index) {
            var current_column,
                left_out = 0,
                top = 0,
                $this = $(this),
                prevAll = $this.prevAll(),
                tallest = 0;

            if(single_column_mode === false) {
                current_column = (index % columns);
            } else {
                current_column = 0;
            }

            for(var t = 0; t < columns; t++) {
                $this.removeClass('c'+t);
            }

            if(index % columns === 0) {
                row++;
            }

            $this.addClass('c' + current_column);
            $this.addClass('r' + row);

            prevAll.each(function(index) {
                if($(this).hasClass('c' + current_column)) {
                    top += $(this).outerHeight() + self.options.padding_y;
                }
            });

            if(single_column_mode === true) {
                left_out = 0;
            } else {
                left_out = (index % columns) * (article_width + self.options.padding_x);
            }

            $this.css({
                'left': left_out,
                'top' : top
            });
        });

        this.tallest($container);
        $(window).resize();
    };

    Plugin.prototype.tallest = function (_container) {
        var column_heights = [],
            largest = 0;

        for(var z = 0; z < columns; z++) {
            var temp_height = 0;
            _container.find('.c'+z).each(function() {
                temp_height += $(this).outerHeight();
            });
            column_heights[z] = temp_height;
        }

        largest = Math.max.apply(Math, column_heights);
        _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
    };

    Plugin.prototype.make_layout_change = function (_self) {
        if($(window).width() < _self.options.single_column_breakpoint) {
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
  $(document).ready(function(){ 
    $("[data-toggle=tooltip]").tooltip();
});    
</script> 
<script src="js/jquery.fancybox.pack.js"></script>
</body>
</html>