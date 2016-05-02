@extends('layouts.profile')
@section('main')
<!--left-->
<style type="text/css">
#fileupload
{

}
</style>
<div class="left-aud">
            <div class="left-container-audition-des">
            
            <div class="head-title ">
             <h1 class="head-title-profile">Profile </h1></div>
 <div class="space-gen1"> </div>
              
              <div class="profile-cnt">
              
              
              <div class="pr-left">
              
              <div class="profile-cnt-lft"> 
                @if(!empty($users->profile_pic))
               <img src="/assets/profile/normal_{{$users->profile_pic}}" style="height:208px;width:208px;">
              @else
               <img src="" style="height:208px;width:208px;">
              @endif
              <div class="profile-cnt-lft-shadow"> 
              
              </div>
              @if(($users->verified == "1") && ($users->mobile_verified == "1"))
              <div class="verfied"> </div>
              @endif
              <div class="profile-cnt-lft1"> 
             <h4> {{$users->name}}<!-- <a rel="tooltip" 
              title="A paragraph typically consists of a unifying main point, thought, or idea accompanied by <b>supporting details</b>">
               <span> 
                <img src="/assets/images/warning.png"> 
             </span> </a> --> </h4>
             <!--<div class="profile-view">  
              <p>5 <span> Videos</span></p>  
             <p>2488 <span> Views</span></p>
              </div>-->
              
              <div> 
              <p>Gender : {{$users->gender}} </p> 
              <p>DOB :  {{$users->dob}} </p> 
              <p> Mobile : {{$users->phone}}
                <?php if($users->mobile_verified){ ?>
                  <span class="tick-verify">  </span>
                <?php } ?>
              </p> 
              <p> Email: {{$users->email}} 
                <?php if(!$users->mobile_verified){ ?> 
                <a rel="tooltip" 
                title="Please verify you mobile number">
                 <span class="warning-verify">  
                </span> </a>
                <?php } ?>
            </p> 
             
             
                       
               <div class="exp-out">    
              
        <h5 class="profile-tble-h5-1"> About Me </h5>
        <div class="space-gen32"> </div>
        <p> {{$users->about_me}} </p>

            </div>
              </div>
              
              
              
              
              </div>
              </div>
              
              <div class="profil-border"> </div>
              
              
              <div class="profile-cnt-ctr"> 
                         
              <table class="profile-tble">
              <h5 class="profile-tble-h5"> Profile Details: </h5>
<tr>
<td>Language Known</td>
<td>:</td>
<td>{{$users->language}} </td>
</tr>

<tr>
<td>Preferred Location:</td>
<td>:</td>
<td>Kerala </td>
</tr>


<tr>
<td>Experience:</td>
<td>:</td>
<td>Modeling & Acting</td>
</tr>


</table>



<table class="profile-tble">
              <h5 class="profile-tble-h5"> Physical Details:  </h5>
<tr>
<td>Complexion:</td>
<td>:</td>
<td>{{$users->color}}</td>
</tr>

<tr>
<td>Skin Quality: </td>
<td>:</td>
<td>Clear </td>
</tr>


<tr>
<td>Eye Color: </td>
<td>:</td>
<td>{{$users->eye}}
</td>
</tr>


<tr>
<td>Height: </td>
<td>:</td>
<td>{{$users->height_feet}} Foot {{$users->height_inch}} Inch</td>
</tr>

<tr>
<td>Weight:  </td>
<td>:</td>
<td>{{$users->weight}} Kgs</td>
</tr>

<tr>
<td>Physique:  </td>
<td>:</td>
<td>Heavy</td>
</tr>

<tr>
<td>Facial Hair:  </td>
<td>:</td>
<td>None </td>
</tr>

<tr>
<td>Hair Style:  </td>
<td>:</td>
<td>{{$users->hair}} </td>
</tr>

<tr>
<td>Hair Color:   </td>
<td>:</td>
<td>Black  </td>
</tr>

<tr>
<td>Hair Length:    </td>
<td>:</td>
<td>Medium   </td>
</tr>


</table>
            
              <div class="exp-out">
              
                <h5 class="profile-tble-h5-1"> Experience & Acheivements </h5>


              <h6> School Level </h6>
              <p> {{$users->school_level}} </p>

              <h6> College Level </h6>
              <p>{{$users->college_level}} </p>
              <h6> Work Level </h6>
              <p>{{$users->work_level}} </p>
                          </div>
            </div>  
               <div class="exp-out">

              <h4 class="profile-tble-h5-1"> Your Profile  Level</h4>
             <div id="sample_goal" style=" float:left">
             </div>

             <div class="space-gen2"> </div>
              <div class="profile-cnt-rgt">
                
       
            
  
               <h4 class="profile-tble-h5-1"> Videos</h4>
              <div class="samp-video">
                  
                 <div class="text_main_video" >Main Video</div>
    
      <!-- <form id="fileuploads" action="" method="" enctype="multipart/form-data"> -->
       {{ Form::open(array('id'=>'fileupload','files'=>true)) }}
        <?php
                if(!empty($default)){
                 $count = count($default); 
                    }else{
                  $count = 0;
                }

        ?>
        <noscript><input type="hidden" name="redirect" ></noscript>
     
        <div id="fileupload" class="row fileupload-buttonbar" style="height:80px;!important;">
        <?php

              for($i=1;$i<=4;$i++){
                $flag =0;
                $video_to_show="";
                foreach ($default as $defaults) {
                    if($defaults->sequence == $i){
                      $flag = 1;
                      $video_to_show =$defaults;
                    }
                }
                    if(($flag ==1) && ($i==1) ){
          ?>
                      <div class="samp-video-in-out main_video" style="margin-left:17px">
                        <div class="samp-video-in">
                          <img src="/assets/thumbnails/{{$video_to_show->thumbnail}}"> 
                        </div>
                          @if($video_to_show->approve == "0")
                              <div class="samp-video-in-overlay"> Waiting for Approval </div>
                          @endif
                          
                        </div>
          <?php
                    }else if($flag == 1){
          ?>

                      <div class="samp-video-in-out">
                        <div class="samp-video-in">
                          <img src="/assets/thumbnails/{{$video_to_show->thumbnail}}"> 
                        </div>
                          @if($video_to_show->approve == "0")
                              <div class="samp-video-in-overlay"> Waiting for Approval </div>
                          @endif
                          
                        </div>

          <?php
                    }else if(($flag ==0) && ($i==1)){
          ?>
                        <div class="samp-video-in-out main_video" style="margin-left:17px">
                        <div class="col-lg-7 main_video_uploader" >
                        </div>
                      </div>

          <?php
               
                    } else{
          ?>



          <?php
                    }
                  # code...
                
                  

              }
        ?>




            <div class="rela"></div>
            <div class="col-lg-5 fileupload-progress fade">
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <div class="progress-extended ">&nbsp;</div>
            </div>
        </div>
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    {{ Form::close() }}
             
              </div>
              
              
              
              <!--portfolio-->
               <p style="color:red;display:none" id="error_upload">Maximum size allowed is 20 MB</p>
              <div class="space-gen2"> </div>
              
              <h4 class="profile-tble-h5-1"> Portfolio Images</h4>
              <div class="samp-video">
                <div class="text_main_video" >Main Image</div>
             
          
  {{ Form::open(array('id'=>'protofolio','files'=>true)) }}
             <?php
                if(!empty($image)){
                 $count1 = count($image); }else{
                  $count1 = 0;
                 }
                 $first_image = true;
                 ?>



      <?php

              for($i=1;$i<=4;$i++){
                $flag =0;
                $image_to_show="";
                foreach ($image as $images) {
                    if($images->sequence == $i){
                      $flag = 1;
                      $image_to_show =$images;
                    }
                }

                 if(($flag ==1) && ($i==1) ){
        ?>
                    <div class="samp-video-in-out main_video">
                        <div class="samp-video-in">
                          <img style="height:86px;width:105px" src="/assets/protofolio/small_{{$image_to_show->image_file}}"> 
                        </div>
                         @if($image_to_show->approve == "0")
                            <div class="samp-video-in-overlay"> Waiting for Approval </div>
                         @endif
                        @if($image_to_show->image_type == "1")
                    
                          <div class="samp-video-in-butn but-active proto"> Default Image</div>
                        @else
                        
                        @endif
                  </div>
          <?php
                }else if($flag == 1){
          ?>
                  <div class="samp-video-in-out">
                      <div class="samp-video-in">
                          <img style="height:86px;width:105px" src="/assets/protofolio/small_{{$image_to_show->image_file}}"> 
                      </div>
                     @if($image_to_show->approve == "0")
                        <div class="samp-video-in-overlay"> Waiting for Approval </div>
                      @endif
                      @if($image_to_show->image_type == "1")
                    
                      <div class="samp-video-in-butn but-active proto"> Default Image</div>
                      @else
                        
                      @endif
                 </div>
          <?php
                    }else if(($flag ==0) && ($i==1)){
          ?>
                  <div class="col-lg-7 main_video_uploader">
                    
                  </div> 
         <?php
               
                    } else{
          ?>
                
             <?php
                    }
                  # code...
                
                  

              }
        ?>


        
             <div class="col-lg-5 fileupload-progress fade">
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;">
                    </div>
                </div>
                <div class="progress-extended">&nbsp;</div>
            </div>
        <table role="presentation" class="table table-striped">
            <tbody class="files">
            </tbody>
        </table>
              
             {{ Form::close() }}             





              </div>
             
              
              
              
              
               
              
               </div>
               
               </div>
               
               
              
              </div>
              
              
              
              <div class="prf-slider">
              
              
              
                <h5 class="profile-tble-h5-1"> Portfolio </h5>
               
                <div class="prf-slider-main">
              
                <div id="banner-slide">

        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
           @foreach ($image as $images)
          <li><a href="javascript:;"><img src="/assets/protofolio/normal_{{$images->image_file}}" style="width:332px;height:442px" title="Full Siting"></a> 
        </li>
            @endforeach
         
        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      
       </div>
       
       <div class="space-gen2"> </div>

       
       
             

              
              </div>
              
              
              
               
              
              
              
              
              
               
              
              </div> 
              
              
                
                
            </div>
            
            
            
            
        </div>
        
        
      <div class="space-gen2"> </div>   
        
        <!--right-->
        

</div>   <!-- div added to align footer -->
@stop
@section('video')
<div class="head-title "> <h2 class="head-title-profile-1">Audition Videos </h2></div>
 <div class="space-gen1"> </div>

<!--video-->
@foreach ($video as $videos)
<div class="part-video">
   <a  href="/myvideo/{{$videos->id}}"> 
      <img src="/assets/thumbnails/{{$videos->thumbnail}}" id="{{$videos->id}}" height="146" width="264" alt="Despicable Me"/> 
   </a>
</div>
@endforeach
@if (sizeof($video) == 0 )
  <div class="part-video">
   <div> 
      <h2>No Audition Video Uploaded</h2>
   </div>
</div>
@endif
@stop
