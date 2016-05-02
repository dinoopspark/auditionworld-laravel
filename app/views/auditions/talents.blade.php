@extends('layouts.main')

@section('loginform')

<a href="#x" class="overlay" id="login_form"></a>
<div class="box">
  <h1>Sign in</h1>
    <div class="clear"></div>
        @if (Session::has('message'))
            <div class="flash alert">
              <p style="color:red;margin-left: 28px;">{{ Session::get('message') }}</p>
            </div>
          @endif
   
  <form  action="authenticate" method="post" id="login-form">
        <input type="text" class="text-field" placeholder="Email" name="email" />
        <input type="password" class="text-field" placeholder="Password" name="password" />
            <div id="buttons">  
                <input type="submit" value="Login" class="pink"/>

            </div>
        <div class="clear"></div>
            <p><input type="checkbox" > <label>Remember me</label></p>

             <p><a id="forg" href="forgot">Forgot Your Password?</a></p></br>

                <a class="close" href="#close"></a>
  
           <div class="error">
           <div class="errortext">Incorrect login or password</div>

           </div>
  </form>
</div>
@stop

@section('main')
<div id="container-aply">
    <div class="wrapper">
        <div class="left">
        
           <div class="container-talent">
              <div class="search">
                  <form action="" method="get">
                           <input class="search-input" placeholder="Search.." type="text"/>
                            <input class="btn-search" type="submit" value=""/>
                  </form>
              </div>
                <h1>Talents </h1>
            <div id="wrap">
              <dl class="group">
                  <dd>
                      <ul class="filter group"> 
                          <li class="current all"><a href="#">All</a></li> 
                          <li class="1"><a href="#">Artists</a></li> 
                          <li class="2 "><a href="#">Models</a></li> 
                          
                      </ul> 
                  </dd>
              </dl>

                   @if (Session::has('message'))
                    <div class="flash alert">
                      <p style="color:red">{{ Session::get('message') }}</p>
                    </div>
                  @endif
      

      <ul class="portfolio group" >
        @foreach ($video as $videos)  
           <li class="item" data-id="id-1" data-type="{{$videos->category}}">     
                <div class="video-player">
                  <a  href="/myvideo/{{$videos->vid}}"> 
                    <img src="assets/thumbnails/{{$videos->thumbnail}}" height="183" width="326" alt="Despicable Me"/> 
                  </a>
                </div>
              <div class="video-details">
                <div class="pic"> 
                    <a href="my-profile"><img src="/assets/images/profile-img-talent.png" alt=""/></a>
                </div>
                <div class="details">
                  <a href="my-profile.html" class="name">{{$videos->name}}</a>
                  <br />
                  <span class="abt">Participated in {{$videos->event}}.</span>
                  <br />
                  <a href="#" vid="{{$videos->id}}" class="btn" id="contactme">Contact me</a>
           <!--  <a href="/contactme/{{$videos->id}}" class="btn" id="contactme">Contact me</a> -->
                </div>
            </div>
        </li>
      @endforeach
    </ul>
  </div>
      <div class="clear"></div>
        
                <div class="see-more">
                    ...........................................See More...........................................
              </div> 
   
     </div>
  </div>
</div>
@stop

@section('footer_add')
 <div class="left-ad">
          @foreach ($ads as $adv)
            <a href="#"><img src="/assets/ads/{{$adv}}" alt="" /></a> 
         @endforeach
  </div>
@stop