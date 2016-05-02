@extends('layouts.new_temp')
@section('title')
AuditionWorld: An online platform for Auditions
@stop
@section('active_home')
active
@stop

@section('metadata')
<meta content="Auditionworld is an online platform to post Auditions by Talent hunters and for applying to these auditions by the Talents. All Auditions in India are currently being posted in this platform." name=description />

<meta content="Auditions for Actor, Auditions for Actress, Malayalam tv channel auditions, Film Auditions, Film Auditions kerala, Malayalam Channel auditioins" name=keywords />

@stop

@section('main')

<!--start banner-->
<div class="banner">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2"> 
        <!--<figure><img src="images/logo.svg" alt="audition world"></figure>-->

		<h4 style="color:red;"><?php echo Session::get('message');?></h4>

        <h1>WE WON'T LET YOU GO UNNOTICED IF YOU ARE A REAL TALENT!</h1>
        <p> Auditionworld brings together talents of the entire world </p>
        <div class="col-md-8 col-md-offset-2 form">
          <h1 style="margin-bottom: 20px;">Sign up</h1>
          <div class="row">
            <div class="col-xs-6 col-sm-6">
            <div class="col-sm-12 fb"><a href="#" onclick="fb_login();"><i class="fa fa-facebook"></i>&nbsp; Sign up with Facebook</a></div>

<!--<a href="#" onclick="fb_login();"><img src="images/fb_login_awesome.jpg" border="0" alt="">login</a>-->


<!--<div class="col-sm-12 "><fb:login-button size="large" onlogin="checkLoginState();"> Sign up  with Facebook</fb:login-button></div>-->

            </div>


            <div class="col-xs-6 col-sm-6">
              <div class="col-sm-12 g-plus"><a href="#"><i class="fa fa-google-plus"></i>&nbsp; Sign up with Google+</a></div>
            </div>
          </div>
          <div class="divider"><span class="or"><span>OR</span></span></div>
		
	<style>
.holder_color::-webkit-input-placeholder {
    color: #ff0000;
}
.holder_color::-moz-placeholder {
    color: #ff0000;
}
	</style>


          <!--<form id="regist_form" action="register">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" id="regname" class="form-control" placeholder="First Name"  data-validation="required"  data-validation-error-msg="Please enter your name" >
              </div>
              <div class="col-md-6 form-group">
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" data-validation="required" data-validation-error-msg="Please enter your phone number" >
              </div>
              <div class="col-md-12 form-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" data-validation="email required" data-validation-error-msg="Please enter your email address" >
              </div>
              <div class="col-md-6 form-group">
                <input type="password"  id="password" class="form-control" placeholder="Password" name="password" data-validation="required" data-validation-error-msg="Please enter the password" >
              </div>
              <div class="col-md-6 form-group">
                <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm Password"  data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="Please confirm the password" >
              </div>
              <div class="checkbox" style="width: 100%;float:left">
                <input id="agree" type="checkbox" data-validation="required" data-validation-error-msg="Please accept the terms and conditions">
                <label for="agree"  style="color:red;" > I agree with terms and conditions</label>
		<p id="error_already" style="color:red"> </p>
              </div>
		
                 <input type="submit" value="Sign Up" class="bten">
              <p>Already have an account? <a href="#" data-toggle="modal" data-target="#signin"><span>Log in here.</span></a></p>
		<p id="error_already" style="color:red"> </p>
		<p id="created_success" style="color:green"> </p>
            </div>
          </form>-->


  <form id="regist_form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" id="regname" class="form-control" placeholder="First Name" >
              </div>
              <div class="col-md-6 form-group">
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" >
              </div>
              <div class="col-md-12 form-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" >
              </div>
              <div class="col-md-6 form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
              </div>
              <div class="col-md-6 form-group">
                <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm Password" >
              </div>
              <div class="checkbox" style="width: 100%;float:left">
                <input id="agree" type="checkbox">
                <label for="agree"> I agree with terms and conditions</label>
		<p id="error_already" style="color:red"> </p>
              </div>
		
              <a href="javascript:;" onclick="return formsubmit_new()"class="bten">Sign Up</a>
              <p>Already have an account? <a href="#" data-toggle="modal" data-target="#signin"><span>Log in here.</span></a></p>
		<p id="error_already" style="color:red"> </p>
		<p id="created_success" style="color:green"> </p>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!--end banner--> 

<!--start talent-->
<section class="talent">
  <div class="container">
    <div class="row">
      <div id="carousel-example" class="carousel slide" data-ride="carousel">
        <div class="controls"> <a class="pull-left" href="#carousel-example" data-slide="prev"><i class="fa fa-angle-left"></i></a> <a class="pull-right" href="#carousel-example" data-slide="next"><i class="fa fa-angle-right"></i></a> </div>
        <div class="carousel-inner">
          <div class="item active">
            <div class="row">
              <div class="col-sm-3">
                <div class="box">
                  <div class="icon">
                    <div class="image"><img src="{{asset('/assets/new_theme/images/acting.svg')}}" width="50" height="50"></div>
                    <div class="info">
                      <h3 class="title">Acting</h3>
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box">
                  <div class="icon">
                    <div class="image"><img src="{{asset('/assets/new_theme/images/dance.svg')}}" width="38" height="38"></div>
                    <div class="info">
                      <h3 class="title">Dancing</h3>
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box">
                  <div class="icon">
                    <div class="image"><img src="{{asset('/assets/new_theme/images/musics.svg')}}" width="38" height="38"></div>
                    <div class="info">
                      <h3 class="title">musics</h3>
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box">
                  <div class="icon">
                    <div class="image"><img src="{{asset('/assets/new_theme/images/anchoring.svg')}}" width="38" height="38"></div>
                    <div class="info">
                      <h3 class="title">anchoring</h3>
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-sm-3">
                <div class="box">
                  <div class="icon">
                    <div class="image"><img src="{{asset('/assets/new_theme/images/acting.svg')}}" width="50" height="50"></div>
                    <div class="info">
                      <h3 class="title">Acting</h3>
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box">
                  <div class="icon">
                    <div class="image"><img src="{{asset('/assets/new_theme/images/dance.svg')}}" width="38" height="38"></div>
                    <div class="info">
                      <h3 class="title">Dancing</h3>
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box">
                  <div class="icon">
                    <div class="image"><img src="{{asset('/assets/new_theme/images/musics.svg')}}" width="38" height="38"></div>
                    <div class="info">
                      <h3 class="title">musics</h3>
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box">
                  <div class="icon">
                    <div class="image"><img src="{{asset('/assets/new_theme/images/anchoring.svg')}}" width="38" height="38"></div>
                    <div class="info">
                      <h3 class="title">anchoring</h3>
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--end talents--> 

<!--start top 10-->
<section class="top-ten">
  <div class="container">
    <div class="row">
      <h1>Top <span>10</span> contestants</h1>
      <div class="border">
        <div class="br-left"></div>
        <div class="br-right"></div>
      </div>
      <div id="carousel-example" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">


          <div class="item active">
            <div class="row">
		<?php $sliced_array = array_slice($actor, 0, 5)?>
		@foreach ($sliced_array as $actors)
              <div class="col-sm-2">
                <div class="top-ten-img"><a href="view_user_profile/{{ $actors->id }}"><span><i class="fa fa-external-link">
                  <h4>View Profile</h4>
                  </i></span><img src="{{asset('/assets/profile/normal_'.$actors->profile_pic)}}" alt=""></a></div>
                <p>{{ucfirst($actors->name)}}</p>
                <h2>{{$actors->count }}</h2>
                <h5>Vote</h5>
              </div>
		@endforeach
            </div>
          </div>


          <div class="item">
            <div class="row">
		<?php $sliced_array1 = array_slice($actor, 5, 10)?>
		 <?php $cout = 1 ?>
                @foreach ($sliced_array1 as $actors)
                @if($cout < 6 )
              <div class="col-sm-2">
                <div class="top-ten-img"><a href="view_user_profile/{{ $actors->id }}"><span><i class="fa fa-external-link">
                  <h4>View Profile</h4>

                  </i></span><img src="{{asset('/assets/profile/normal_'.$actors->profile_pic)}}" alt=""></a></div>
                <p>{{ucfirst($actors->name)}}</p>
                <h2>{{$actors->count }}</h2>
                <h5>Vote</h5>
              </div>
		<?php $cout++;?>
		@endif
                @endforeach
            </div>
          </div>




        </div>
      </div>
    </div>
  </div>
</section>
<!--end top 10-->

<section class="up-coming">
  <h1>up <span>COMING</span> AUDITIONS</h1>
  <div class="border">
    <div class="br-left"></div>
    <div class="br-right"></div>
  </div>

<?php $p=0;?>


@foreach ($events as  $event)
@if($p%2==0 || $p==0)

 <div class="col-sm-6 col-md-6 color-box" onclick="talentpage({{$event->id}})">
    <div class="row">

		      <div class="col-md-6 img-box" style=" background:  url({{asset('/assets/thumbnails/'.$event->thumbnail)}}) no-repeat center center; background-size: cover;">
			<div class="shape"></div>
		      </div>


		      <div class="col-md-6">
						<div class="content">
							  <h1 class="pull-left">{{ucfirst( $event->name)}}</h1>
							  <div class="btn-group pull-right">
							    <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
							    <ul class="dropdown-menu">
							      <li><a href="talents_hunt/{{ $event->id}}">Apply</a></li>
							    </ul>
							  </div>

							  <div class="clearfix"></div>
							  <div class="divider"></div>
							  <p>{{ucfirst($event->description)}}</p>
							  <h5 style="margin-top:30px;">End On:</h5>
							  <h5>{{$event->date}}</h5>
							  <h5>{{ $event->time}}</h5>
							  <h5 style="margin-top:30px;">Conducting By:</h5>
						  	  <h5><a href="view_user_profile/{{ $event->manager_id }}">{{ucfirst($event->username)}}</a></h5>
						</div>
				<?php  $submission=getSubmission($event->id);  ?>
				<span herf="#" class="views">{{ $event->eventviews }} Views</span> <span herf="#" class="submission">{{  $submission }} Submission</span> 
		   </div>


    </div>

  </div>
		@if($p==0)
		<?php $p=$p+2 ;?>
		@else
		<?php $p=$p+1 ;?>
		@endif


@else

 <div class="col-sm-6 col-md-6 color-box" onclick="talentpage({{$event->id}})">
    <div class="row">
      <div class="col-md-6">
        <div class="content">
          <h1 class="pull-left">{{ucfirst( $event->name)}}</h1>
          <div class="btn-group pull-right">
            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
            <ul class="dropdown-menu">
              <li><a href="#">Apply</a></li>
            </ul>
          </div>
          <div class="clearfix"></div>
          <div class="divider"></div>
          <p>{{ucfirst($event->description)}} </p>
          <h5 style="margin-top:30px;">End On:</h5>
          <h5>{{$event->date}}</h5>
          <h5>{{ $event->time}}</h5>
	  <h5 style="margin-top:30px;">Conducting By:</h5>
	  <h5><a href="view_user_profile/{{ $event->manager_id }}">{{ucfirst($event->username)}}</a></h5>
        </div>
        <?php  $submission=getSubmission($event->id);  ?>
        <span class="views">{{ $event->eventviews }} Views</span> <span class="submission">{{  $submission }} Submission</span> </div>
      <div class="col-md-6 img-box" style=" background:  url({{asset('/assets/thumbnails/'.$event->thumbnail)}}) no-repeat center center; background-size: cover;">
        <div class="shape2"></div>
      </div>
    </div>
  </div>


<?php $p=$p+2;?>
@endif

@endforeach


</section>







<div class="clearfix"></div>
<section class="recent-join">
  <div class="container">
    <div class="row">
      <h1><span>Recently</span> joined</h1>
      <div class="border">
        <div class="br-left"></div>
        <div class="br-right"></div>
      </div>
	



	<?php $count =0;?>
	@foreach ($actor_all as $actors)
	@if(($count < 18 ) && ($actors->profile_pic != ''))
      <div class="col-xs-4 col-sm-3 col-md-2">
        <div class="over-img"> <a href="view_user_profile/{{ $actors->id }}"><span><i class="fa fa-external-link">
          <h4>View Profile</h4>

          </i></span><img src="{{asset('/assets/profile/normal_'.$actors->profile_pic)}}" alt=""></a></div>
      </div>
	<?php $count++; ?>
	@endif

	@endforeach
    </div>
  </div>
</section>



@stop


<script>

function talentpage(a){

window.location='talents_hunt/'+a;
}

</script>
