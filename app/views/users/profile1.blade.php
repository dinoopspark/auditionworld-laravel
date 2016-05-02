@extends('layouts.description')
@section('main')
<!--left-->

<div class="left-aud">
            <div class="left-container-audition-des">
            
            <div class="head-title ">
             <h1 class="head-title-profile">Profile </h1></div>
 <div class="space-gen1"> </div>
              
              <div class="profile-cnt">
              
              
              <div class="pr-left">
              
              <div class="profile-cnt-lft"> 
                @if(!empty($users->profile_pic))
               <img src="/assets/profile/{{$users->profile_pic}}" style="height:208px;width:208px;">
              @else
               <img src="" style="height:208px;width:208px;">
              @endif
              <div class="profile-cnt-lft-shadow"> 
           
              </div>
              @if($users->verified == "1")
              <div class="verfied"> </div>
              @endif
              <div class="profile-cnt-lft1"> 
             <h4> {{$users->name}}<a rel="tooltip" 
              title="A paragraph typically consists of a unifying main point, thought, or idea accompanied by <b>supporting details</b>">
               <span> 
                <img src="/assets/images/warning.png"> 
             </span> </a> </h4>
             <div class="profile-view">  
              <p>58 <span> Videos</span></p>  
             <p>2488 <span> Views</span></p>
              </div>
              
              <div> 
              <p>Gender : {{$users->gender}} </p> 
              <p>DOB :  {{$users->dob}} </p> 
              <p> Mobile : {{$users->phone}}
                <span class="tick-verify">  </span>
              </p> 
              <p> Email: {{$users->email}} 
                <a rel="tooltip" 
                title="A paragraph typically consists of a unifying main point, thought, or idea accompanied by <b>supporting details</b>">
                 <span class="warning-verify">  
              </span> </a></p> 
             
             
                       <a href="{{ URL::asset('/edit_profile') }}" class="update-p"> Update your profile  </a>    
              
               <div class="exp-out">    
              
        <h5 class="profile-tble-h5-1"> About Me </h5>
        <div class="space-gen32"> </div>
        <p> Lorem Ipsum is simply dummy 
          text of the printing and typesetting 
          industry.Lorem IpsumLorem Ipsum is 
          simply dummy text of the printing 
          and typesetting industry.
          Lorem IpsumLorem Ipsum is simply 
          dummy text of the printing and 
          typesetting industry.Lorem IpsumLorem 
          psum is simply dummy text of the 
          printing and typesetting industry.
          Lorem Ipsum  </p>

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
             
                    <form action="default_video" method="post" style="float:left" id="userdefault" enctype="multipart/form-data">
             <?php
                if(!empty($default)){
                 $count = count($default); }else{
                  $count = 0;
                 }
                 ?>
             @foreach ($default as $defaults)
                 <div class="samp-video-in-out">
                 <div class="samp-video-in">
                  <img src="/assets/thumbnails/{{$defaults->thumbnail}}"> 
                    </div>
                    @if($defaults->approve == "0")
                     <div class="samp-video-in-overlay"> Waiting for Approval </div>
                    @endif
                    @if($defaults->video_type == "1")
                    <div class="samp-video-in-butn but-active default"> DefaulT Video</div>
                    @else
                      <div class="samp-video-in-butn but-nonactive-ad change" id="{{$defaults->id}}" > Change Video</div>
                    @endif
                 </div>
              @endforeach
                @if($count < 4)
                <?php $addrow = 4- $count;?>
                @while($addrow > 0)
           <div class="samp-video-in-out">
             <div class="samp-video-in"> 
        <input id="uploadFile"  class="vid-upload" disabled="disabled" />
             <div class="fileUpload ">
    
                 <input id="uploadBtn" name="provid{{$addrow}}" type="file" class="upload" /> </div> 
                
            
             </div>
             <div class="samp-video-in-butn but-nonactive-ad default" > Add Video</div>
             
             
             
             
             </div>
             <?php $addrow--; ?>
            @endwhile
            @endif
             
              
               </form>
             
             
              </div>
              
              
              
              <!--portfolio-->
              
              <div class="space-gen2"> </div>
              
              <h4 class="profile-tble-h5-1"> Portfolio Images</h4>
              <div class="samp-video"> 
             
          <form action="protofolio" method="post" style="float:left" id="protofolio" enctype="multipart/form-data">
             <?php
                if(!empty($image)){
                 $count1 = count($image); }else{
                  $count1 = 0;
                 }
                 ?>
             @foreach ($image as $images)
                 <div class="samp-video-in-out">
                 <div class="samp-video-in">
                  <img style="height:86px;width:105px" src="/assets/protofolio/{{$images->image_file}}"> 
                    </div>
                     @if($images->approve == "0")
                    <div class="samp-video-in-overlay"> Waiting for Approval </div>
                    @endif
                    @if($images->image_type == "1")
                    
                    <div class="samp-video-in-butn but-active proto"> Default Image</div>
                   @else
                   <div class="samp-video-in-butn but-nonactive-ad change" id="{{$images->id}}" > Change Image</div>
                    @endif
                 </div>
              @endforeach
                @if($count1 < 4)
                <?php $addrow1 = 4- $count1;?>
                @while($addrow1 > 0)
           <div class="samp-video-in-out">
             <div class="samp-video-in"> 
        <input id="uploadFile"  class="vid-upload" disabled="disabled" />
             <div class="fileUpload ">
    
                 <input id="uploadBtn" name="proimg{{$addrow1}}" type="file" class="upload" /> </div> 
                
            
             </div>
             <div class="samp-video-in-butn but-nonactive-ad proto" > Add Image</div>
             
             
             
             
             </div>
             <?php $addrow1--; ?>
            @endwhile
            @endif
             
              
               </form>
             





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
          <li><a href=""><img src="assets/protofolio/{{$images->image_file}}" style="width:332px;height:442px" title="Full Siting"></a> 
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
        

   
@stop
@section('video')
<div class="head-title "> <h2 class="head-title-profile-1">Audition Videos </h2></div>
 <div class="space-gen1"> </div>

<!--video-->
@foreach ($video as $videos)
<div class="part-video">
   <!--<a  href="/myvideo/{{$videos->id}}"> -->
      <img src="assets/thumbnails/{{$videos->thumbnail}}" id="{{$videos->id}}" height="146" width="264" alt="Despicable Me"/> 
   <!--</a>-->
</div>
@endforeach
@stop
