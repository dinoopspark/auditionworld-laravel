@extends('layouts.new_temp')
@section('title')
About Audition World
@stop
@section('active_about')
active
@stop

@section('metadata')
<meta content="Vision and Mission of Audition world" name=description />

<meta content="Auditions for Actor, Auditions for Actress, Malayalam tv channel auditions, Film Auditions, Film Auditions kerala, Malayalam Channel auditioins" name=keywords />
@stop

@section('main')

<section class="about-banner" style="background:  url({{ URL::asset('assets/new_theme/images/about.jpg')}}) no-repeat center center; background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Who we are</h1>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Lorem ipsum dolor sit amet adipiscing elit.</p>
      </div>
    </div>
  </div>
</section>
<section class="about-us">
  <div class="container">
    <div class="row">
      <h1><span>About</span> US</h1>
      <div class="border">
        <div class="br-left"></div>
        <div class="br-right"></div>
      </div>
      <p>Driven and Obsessed with Creative thoughts, we are a progressive thinking people who loves the art of acting, with a strong sense of IT knowledge. We stand here to nurture, guide, help and bring new Acting talents to the limelight. Availing the modern technologies like Social networking and Media Streaming, we unleash this AutionTool platform for those who has a spark of "Acting" in their eyes. Most of the actors in the industry comes from a humble beginning and through their tireless efforts and determination they achieved greater heights, so as a social commitment, we are using our skill-set to build a platform where anyone can showcase their talents . Our platform will act as a mediator for your passion and the need in the industry for right talents !! </p>
    </div>
  </div>
</section>

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
                    <div class="image"><img src="{{ URL::asset('assets/new_theme/images/acting.svg')}}" width="50" height="50"></div>
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
                    <div class="image"><img src="{{ URL::asset('assets/new_theme/images/dance.svg')}}" width="38" height="38"></div>
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
                    <div class="image"><img src="{{ URL::asset('assets/new_theme/images/musics.svg')}}" width="38" height="38"></div>
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
                    <div class="image"><img src="{{ URL::asset('assets/new_theme/images/anchoring.svg')}}" width="38" height="38"></div>
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
                    <div class="image"><img src="{{ URL::asset('assets/new_theme/images/acting.svg')}}" width="50" height="50"></div>
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
                    <div class="image"><img src="{{ URL::asset('assets/new_theme/images/dance.svg')}}" width="38" height="38"></div>
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
                    <div class="image"><img src="{{ URL::asset('assets/new_theme/images/musics.svg')}}" width="38" height="38"></div>
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
                    <div class="image"><img src="{{ URL::asset('assets/new_theme/images/anchoring.svg')}}" width="38" height="38"></div>
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


@stop
