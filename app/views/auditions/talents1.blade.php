@extends('layouts.main')

@section('loginform')
  <!-- TOP PANEL -->

  
<!-- END OF TOP PANEL -->

<a href="#x" class="overlay" id="login_form"></a>
<div class="box">

  <h1>Sign in</h1>
    <div class="clear"></div>
    @if (Session::has('message'))
        <div class="flash alert">
          <p>{{ Session::get('message') }}</p>
        </div>
      @endif
   
        <form  action="authenticate" method="post" id="login-form">

<!--    Start "join with facebook" and "twitter", you can delete if you don't like it -->
  
<!-- end of "join with facebook" and "twitter"  -->
       <input type="text" class="text-field" placeholder="Email" name="email" />
        <input type="password" class="text-field" placeholder="Password" name="password" />
        <div id="buttons">  
            <input type="submit" value="Login" class="pink"/>

  </div>
        <div class="clear"></div>
    <p><input type="checkbox" > <label>Remember me</label></p>

        <p><a id="forg" href="#">Forgot Your Password?</a></p></br>

      <a class="close" href="#close"></a>
<!-- error state it is not visible because: visibility:hidden -->
   <div class="error">
   <div class="errortext">Incorrect login or password</div>

   </div>
<!--end of error state -->
</form>

</div>
<!----- END OF POPUP #1 -->  
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


              <div id="playerdiv" >
    
            </div>

<!-- Category Filter -->
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
          <p>{{ Session::get('message') }}</p>
        </div>
      @endif
      
<!-- Portfolio 
Items -->
<ul class="portfolio group" >
<?php $p=0;?>  
@foreach ($video as $videos) 
<?php $p++;?> 
<li class="item" data-id="id-1" data-type="{{$videos->category}}"> 
 
 <div class="videos">
<a  href="#" class="topopup" id="{{$p}}"> 
<img src="assets/thumbnails/{{$videos->thumbnail}}" id="{{$videos->vid}}" height="183" width="326" alt="Despicable Me"/> 
</a>
</div>
<div class="video-details">
    <div class="pic"> 
        <a href="my-profile"><img src="/assets/images/profile-img-talent.png" alt=""/></a>
</div>
    <div class="details">
        <a href="#" class="name">{{$videos->name}}</a>
        <br />
        <span class="abt">Participated in {{$videos->event}}.</span>
        <br />
        <a href="{{URL::asset('contactme'); }}/{{$videos->id}}  " class="btn">Contact me</a>
</div>
</div>

 <div id="toPopup{{$p}}" class="toPopups"> 
      
        <div class="close" divid="{{$p}}"></div>
        <span class="ecs_tooltip">
          Press Esc to close 
          <span class="arrow">
          </span>
        </span>
    
    <div class="popup_content"> 
    
    
    <div style="float:left; width:400px; height:300px; padding:10px;"> 
    
    
<div class="my-video" >  
     <video width="400" height="270" controls ="controls"  id="videoContainer">
  <source src="assets/event_video/{{$videos->video_file}}" type="video/mp4">
  <object data="assets/event_video/{{$videos->video_file}}" width="400" height="">
  </object>
</video> 
</div>  
    
    
    </div>
    
    
    <div class="cmnt-out">
    <h3 class="cmmnt-h3"> COMMENTS</h3>
    <input name="" type="text"  class="cmmnt" id="coment" placeholder="Post your comment"/>
    <div class="other-cmnts">   
    </div> 
    </div>
    
        
        <div style="float:left;">
    <div class="scrollpanel"> 
        
        <div class="cmnt-outer">
    
          <div class="cmnt-left">  <img src="/assets/images/coment-thumb.jpg" /></div>
          <div class="cmnt-rgt"> <span> John </span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </div>
    
        </div>
        
        </div>
  </div>
        
                  </div>


    </div>
    
   <div id="loader<?php echo $p;?>" class="loader"></div>
  <div id="backgroundPopup<?php echo $p;?>" class="backgroundPopup"></div> 

           
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