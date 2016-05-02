@extends('layouts.description')
@section('main')
<!--left-->
  @foreach ($events as $event)
<div class="left-aud">
            <div class="left-container-audition-des">
                <h1>{{$event->name}}</h1>
                <div class="left">
                    <img src="/assets/images/img-audition.jpg" alt="" />
                </div>
                <div class="right201">
                    <p>{{$event->description}}</p>
                   
                   <br>
                    <p class="ful-width mar-bot">DATE : {{$event->date}}
                        <br />
                        Venue : {{$event->venue}}</p>
                        <?php if(($event->date) >= date("Y-m-d")){?>
                          <?php if(!empty($event->user_id)){?>
                            <button class="pop-apply">Already Applied </button>
                              <?php } else{ ?>
                    <a class="modalLink pop-apply" title="{{$event->name}}"  id="{{$event->id}}" href="#modal1" onclick="apply(this)">Apply for this Audition</a>
                    <?php }}else{ ?>
                      
                      <?php }?>
                </div>
            </div>
        </div>
        

@if(Auth::check())
        @if( (Auth::user()->verified == 1) && (Auth::user()->mobile_verified == 1))
            <div class="overlay1"></div>
            
            
            <form action="{{URL::asset('participate')}}" method="POST" id="applynow-form" enctype="multipart/form-data"> 

            <div id="modal1" class="modal">
            
            <div id='confirm'>
              
              
              <div class="pop-row"> 
              <div class="pop-left">      Audition Name  </div>
               <div class="pop-right" id="Audname">  </div>
               <input type="hidden" name="event_id" id="Audid" value="">
               </div>
              
              
              <div class="pop-row"> 
              <div class="pop-left">      Upload Video    </div>
               <div class="pop-right">      <div class="apply-upld">   
                <input id="uploadFile"  placeholder="Upload Video" class="file-ipload" disabled="disabled" />
                     <div class="fileUpload ">
            
                         <input id="uploadBtn" name="video_file" type="file" class="upload" /> </div> 
                         </div>
               </div>
               </div>
               
               <div class="pop-row"> 
              <div class="pop-left">     </div>
               <div class="pop-right">  
               
            
                <input name="Apply Now" id="Audapply"  class="pop-apply" value="APPLY NOW" type="button">
                
               
                </div>
               </div>
              
              </form>
              <div class="aply-man"> <img src="<?php echo URL::asset('assets/images/apply-man.png')?>"> </div>
            
            </div>
            
            
                <p class="closeBtn"> <img src="<?php echo URL::asset('assets/images/close.jpg')?>"></p>
            </div>
         @else
                <div class="overlay1"></div>

                  <div id="modal1" class="modal">
            
                    <div id='confirm'>
                     <p style="margin-left: 102px;font-size: 20px;margin-top: 75px;"> Please verify your mobile number to apply for the audition</p>
                    </div>
                     <p class="closeBtn"> <img src="<?php echo URL::asset('assets/images/close.jpg')?>"></p>
                  </div>
        @endif
    @else
        <div class="overlay1"></div>

          <div id="modal1" class="modal">
    
            <div id='confirm'>
             <p style="margin-left: 162px;font-size: 20px;margin-top: 75px;"> Please login to apply for the audition</p>
            </div>
             <p class="closeBtn"> <img src="<?php echo URL::asset('assets/images/close.jpg')?>"></p>
          </div>
    @endif



          <!--right-->
        <div class="right-aud">
        <div class="right-container-audition-des">
            <div class="right-container-aud">
        
            <video width="416" height="" controls class="marg-video">
              <source src="/assets/event_video/{{$event->promo}}" type="video/ogg">
              <source src="/assets/event_video/{{$event->promo}}" type="video/mp4">
              <object data="/assets/event_video/{{$event->promo}}" width="100%" height="">
              <embed width="416" height="" src="/assets/event_video/{{$event->promo}}">
              </object>
            </video>

            </div>
        </div>
    </div>
    @endforeach
@stop
@section('video')

<h1 class="ful-width mar-bot"> Latest Videos by Participants </h1>
 @foreach ($videos as $video)
<div class="part-video">
<a href="eventplayer/{{$video->id}}">
<img src="/assets/thumbnails/{{$video->thumbnail}}">
</a>
</div>
 @endforeach
@stop