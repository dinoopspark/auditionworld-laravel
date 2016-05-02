<div class="left-aud">
            <div class="left-container-audition-des">
            
            <div class="head-title "> <h1 class="head-title-profile">Profile </h1></div>
 <div class="space-gen1"> </div>
              
              <div class="profile-cnt">
              <div class="profile-cnt-lft"> <img src="/assets/profile/{{$users->profile_pic}}" style="height:208px;width:208px;">
              <div class="profile-cnt-lft-shadow"> </div>
              
              <div class="profile-cnt-lft1"> 
             <h4>  {{$users->name}} </h4>
             <div class="profile-view">  
              <p>58 <span> Videos</span></p>  
             <p>24 <span> Events</span></p>
              </div>
              
              <div> 
              <p>Gender : {{$users->gender}} </p> 
              <p>DOB :  {{$users->dob}}</p> 
              <p> Mobile : {{$users->phone}}</p> 
              <p> Email: {{$users->email}}</p> 
             
             
              <a href="{{ URL::asset('/edit_profile') }}" class="profile-edit"> Edit Profile Details  </a> 
              
              
              </div>
              
              
              
              
              </div>
              </div>
              
              
              
              
              
              <div class="profil-border"> </div>
              
              
              <div class="profile-cnt-ctr"> 
                         
              <table class="profile-tble">
              <h5 class="profile-tble-h5"> Profile Details: </h5>
<tr>
<td>Languages Known</td>
<td>:</td>
<td>{{$users->language}} </td>
</tr>

<!-- <tr>
<td>Preferred Location:</td>
<td>:</td>
<td></td>
</tr> -->


<!-- <tr>
<td>Experience:</td>
<td>:</td>
<td></td>
</tr> -->


</table>



<table class="profile-tble">
              <h5 class="profile-tble-h5"> Physical Details:  </h5>
<tr>
<td>Complexion:</td>
<td>:</td>
<td>{{$users->color}}</td>
</tr>

<!-- <tr>
<td>Skin Quality: </td>
<td>:</td>
<td> </td>
</tr> -->


<tr>
<td>Eye Color: </td>
<td>:</td>
<td>
  {{$users->eye}}
</td>
</tr>


<tr>
<td>Height: </td>
<td>:</td>
<td>{{$users->height_feet}}.{{$users->height_inch}}</td>
</tr>

<tr>
<td>Weight:  </td>
<td>:</td>
<td>{{$users->weight}}</td>
</tr>

<!-- <tr>
<td>Physique:  </td>
<td>:</td>
<td></td>
</tr> -->

<!-- <tr>
<td>Facial Hair:  </td>
<td>:</td>
<td></td>
</tr> -->

<tr>
<td>Hair Type:  </td>
<td>:</td>
<td>{{$users->hair}}</td>
</tr>

<!-- <tr>
<td>Hair Color:   </td>
<td>:</td>
<td></td>
</tr> -->

<!-- <tr>
<td>Hair Length:    </td>
<td>:</td>
<td></td>
</tr> -->


</table>
              
              
              
              </div>
              
              
              
              <div class="profile-cnt-rgt">
              
              <h5 > Profile  Level</h5>
             <div id="sample_goal"></div>
              
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
              <?php if($users->verified == "0") {?>
               <a href="verify/{{$users->id}}" class="profile-verify">
               <p>  Profile is not verified</p>
               <h1> Verify your Profile</h1>
               
               
                 </a>
              <?php } ?>
               </div>
              
               
              
              
              
              
              
               
              
              </div> 
              
              
                
                
            </div>
            
            
            
             <div class="space-gen2"> </div>
        </div>
        
        
        
      
        
        
        
        <!--right-->
