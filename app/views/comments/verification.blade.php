@extends('layouts.nofooter')
@section('main')

<!--left-->
<div class="left-aud">
            <div class="left-container-audition-des">
            
            <div class="head-title "> <h1 class="head-title-profile">Comment </h1></div>
 <div class="space-gen1"> </div>
              
              <div class="profile-cnt">
              <div class="profile-cnt-lft"> <img src="/assets/profile/default.jpg" style="height:208px;width:208px;">
              <div class="profile-cnt-lft-shadow"> </div>
             <!--  <a href="" class="profile-edit"> Edit Profile Details  </a> -->
              </div>
              
              <div class="profil-border"> </div>
              <form action="do_verification" method="POST">
              <div class="pro-edit-out"> 
              
              <div class="pro-edit-row">               
              <div class="pro-edit-row-left">Your comment is approved</div>
              <div class="pro-edit-row-right">
              </div>              
              </div>
              
             
              
              </div>
              
              </div>
              
              </form>
              
              
               
              
              </div> 
                
                
            </div>
            
            <div class="space-gen2"> </div>
            
            
        </div>
        
        
        
        
        <!--right-->
        
   
@stop
@section('video')
<div class="head-title "> <h2 class="head-title-profile-1">Audition Videos </h2></div>
 <div class="space-gen1"> </div>

<!--video-->
<div class="part-video">
<img src="images/latest-video.jpg">
</div>

@stop
