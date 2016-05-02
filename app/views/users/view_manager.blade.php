@extends('layouts.new_temp')
@section('title')
About Audition World
@stop


@section('metadata')
<meta content="Vision and Mission of Audition world" name=description />

<meta content="Auditions for Actor, Auditions for Actress, Malayalam tv channel auditions, Film Auditions, Film Auditions kerala, Malayalam Channel auditioins" name=keywords />
@stop

@section('main')
<!-- <script type="text/javascript" src="/assets/js/jwplayer/jwplayer.js"></script> -->

<script type="text/javascript" src="/jwp/jwplayer/jwplayer.js">
</script>
<script>jwplayer.key="9va04HUO4z+9XAZ89ReCYGNtMmGS3EAqgJncFA==";</script>


@if(Auth::check())

   <?php $userid= Auth::user()->id; ?>


@endif



<section class="profile-head">
  <div class="container">
    <div class="row">

    <!-- .............................. Profile pic and name div.............................................-->
      <div class="col-md-6 profile-pic">
        <div class="media">
          <div class="media-left media-middle" style="float:left"> <a href="#">
            <figure><a href="{{asset('/assets/profile/normal_'.$users->profile_pic)}}">
                      @if(!empty($users->profile_pic))

                      <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="">
                      @else

                       <img src="images/top-two.jpg" alt="">
                      @endif
                      </a>
            </figure>
          </div>
          <div class="media-body media-middle">
                    <h1>{{$users->name}}</h1>
                    <h2>Actor / Director</h2>
                    <p>{{$users->about_me}}</p>
          </div>

        </div>
      </div>

 <!-- .............................. Profile pic and name div  Closed.............................................-->


<!--..................................Details div ...............................-->


<div class="col-md-6 profile-txt">
            <div class="row">
                  <div class="col-md-6">
                      <p>Gender : {{$users->gender}}</p>
                      <p>DOB : {{$users->dob}}</p>
                  </div>
                  <div class="col-md-6">
                    <p>Mobile : {{$users->phone}} 
                        <span>
                          <?php if($users->mobile_verified){ ?>
                            <i class="fa fa-check-circle"></i>
                          <?php } ?>
                        </span>
                    </p>
                    <p>Email: {{$users->email}} </p>
                  </div>
            </div>
            <h4>Profile Level</h4>
            <div class="progress progress-striped active">
                 <div class="progress-bar" role="progressbar"> {{$percentage}}%</div>
            </div>
      </div>
<!--..................................Details div closed ...............................-->

      <div class="clearfix"></div>
<!--........................................Tabs div...............................................-->
      <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">

    <li class="active"><a href="#tab_default_4" id="aboutme" data-toggle="tab"><i class="fa fa-user"></i> About me</a></li>
           
            <li><a href="#tab_default_2" id="videostab" data-toggle="tab"><i class="fa fa-video-camera"></i> Videos</a></li>
            <li><a href="#tab_default_3" id="phototab" data-toggle="tab"><i class="fa fa-camera"></i> Photos</a></li>
     
    <li ><a href="#tab_default_1" id="allpost" data-toggle="tab"><i class="fa fa-pencil-square-o"></i> All Posts</a></li>


          </ul>
        </div>
      </div>
<!--........................................Tabs div closed...............................................-->


    </div>
  </div>
</section>

<section class="panel-tab-content">
  <div class="container">
    <div class="row">
      <div class="tab-content">



<!-- .............................................tab default 1.............................-->
        <div class="tab-pane video-tab " id="tab_default_1">
          <div class="row">
           
              @foreach ($default as $l => $defaults) 
                <?php      $commentcount=getComment($defaults->id,'video'); 
                           $CommentNum=CountComment($defaults->id,'video');
                           $likeNumber=GetLike($defaults->id,'video');
                            $viewNumber=GetViews($defaults->id);
                                        if(!empty($CommentNum))
                                             $comment_number=$CommentNum ; 
                                        else
                                           $comment_number=0;
			   $posted_string=Findate($defaults->created_at);
                     ?>
                  <div class="col-md-6 col-sm-6">
                    <div class="col-md-12">
                          <span class="col-xs-11 row pull-left"> 
                              <a href="#">
                                  @if(!empty($users->profile_pic))
                                    <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="no image">
                                  @endif
                               </a>
                              <h1><a href="#">{{$users->name}}</a></h1>
                                 <p class="time"><i class="fa fa-clock-o"></i> {{ $posted_string }}</p>
                              </span>
                            <div class="btn-group pull-right">
                                    <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Delete</a></li>
                                      <li><a href="#">Edit</a></li>
                                    </ul>
                            </div>
                           <div class="clearfix"></div>
                            <p class="detail">{{$defaults->text}}</p>
                           <div class="clearfix"></div>

                               @if($defaults->uploaded_to_you_tube ==0 || ($you_tube->you_tube ==0) )

                                      <div class="" onclick="viewItem({{ $defaults->id }})" id="myElement_{{$defaults->id}}" style="border: 10px solid #CCC;border-radius:10px;">
                                      </div>
                                  
					 <script type="text/javascript">
                                            jwplayer("myElement_{{$defaults->id}}").setup({
                                               primary: "flash",
                                               file: "/assets/videos/{{$defaults->video_file}}",
                                                   image: "/assets/thumbnails/{{$defaults->thumbnail}}",
						skin: { name: "bekle" },
                                                
                                                 autoplay : true,
                                                      width: "100%",
						    logo: { hide: 'true' },
                                                aspectratio: "12:5",
                                             });
                                       </script>

                                @else
                                              <div onclick="viewItem({{ $defaults->id }})" class="embed-responsive embed-responsive-16by9">
                                                <iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/{{$defaults->youtube_id}}" frameborder="0" allowfullscreen></iframe>
                                              </div>
                                @endif
                             
                          <ul class="grid-menu pull-left">
                            @if(!empty($userid))
                                <li ><a href="#"><i class="fa fa-heart-o " onclick="likecount({{ $defaults->id }},{{ $userid }})"></i><span class="likebtn{{ $defaults->id }}"> {{ $likeNumber }}</span></a></li>                                
                            @else
                                <li ><a href="#"><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </a></li>                               
                            @endif
                            <li><a data-toggle="collapse" data-parent="#accordion" href="#demo"><i class="fa fa-comment-o"></i> {{ $comment_number }}</a></li>
                            <li><a href="#"><i class="fa fa-eye"></i> {{  $viewNumber }}</a></li>
                          </ul>
                        <div class="clearfix"></div>

                         <section class="panel-collapse collapse" id="demo">
                         djfhvjdfdskjf
                         </section>
              </div>
              </div>
            @endforeach






  <!--@foreach ($eventvideos as $l => $defaults) 
             
                  <div class="col-md-6 col-sm-6">
                    <div class="col-md-12">
                          <span class="col-xs-11 row pull-left"> 
                              <a href="#">
                                  @if(!empty($users->profile_pic))
                                    <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="no image">
                                  @endif
                               </a>
                              <h1><a href="#">{{$users->name}}</a></h1>
      

      <?php 
 $posted_string=Findate($defaults->created_at);          
?>
                                 <p class="time"><i class="fa fa-clock-o"></i> {{ $posted_string }}</p>
                              </span>
                            <div class="btn-group pull-right">
                                    <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Delete</a></li>
                                      <li><a href="#">Edit</a></li>
                                    </ul>
                            </div>
                           <div class="clearfix"></div>
                            <p class="detail">{{$defaults->description}}</p>
                           <div class="clearfix"></div>

                               @if($defaults->uploaded_to_you_tube ==0 || ($you_tube->you_tube ==0) )
					<div onclick="viewEvent({{ $defaults->id }})"> 
                                      <div class="" id="myElement_{{$defaults->id}}" style="border: 10px solid #CCC;border-radius:10px;">
                                      </div>
</div>
                                  
					 <script type="text/javascript">
                                            jwplayer("myElement_{{$defaults->id}}").setup({
                                               primary: "flash",
                                               file: "/assets/event_video/{{$defaults->promo}}",
                                                   image: "/assets/thumbnails/{{$defaults->thumbnail}}",
						skin: { name: "bekle" },
                                                
                                                 autoplay : true,
                                                      width: "100%",
						    logo: { hide: 'true' },
                                                aspectratio: "12:5",
                                             });
                                       </script>

                                @else
                                              <div onclick="viewEvent({{ $defaults->id }})" class="embed-responsive embed-responsive-16by9">
                                                <iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/{{$defaults->youtube_id}}" frameborder="0" allowfullscreen></iframe>
                                              </div>
                                @endif
                  
                        <div class="clearfix"></div>

                      
              </div>
              </div>
            @endforeach-->



            @foreach ($image as $images)
               <?php 
                           $CommentNum=CountComment($images->id,'image');
                           $likeNumber=GetLike($images->id,'image');
                            $viewNumber=GetViews($images->id);
                                        if(!empty($CommentNum))
                                             $comment_number=$CommentNum ; 
                                        else
                                           $comment_number=0;
			 $posted_string=Findate($images->created_at);  
                     ?>

                         <div class="col-md-6 col-sm-6">
                          <div class="col-md-12">
                           <span class="col-xs-11 row pull-left"> <a href="#">
                              @if(!empty($users->profile_pic))
                                       <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="no image">
                             @endif
                           </a>
                <h1><a href="#">{{$users->name}}</a></h1>
                        <p class="time"><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
                        </span>
                        <div class="btn-group pull-right">
                          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
                          <ul class="dropdown-menu">
                            <li><a href="#">Delete</a></li>
                            <li><a href="#">Edit</a></li>
                          </ul>
                        </div>
                      <div class="clearfix"></div>
                      <p class="detail">{{$images->text}}</p>
                    <div class="clearfix"></div>
                    <figure onclick="viewItem({{ $images->id }})"><a class="fancybox" rel="1" href="{{asset('/assets/protofolio/'.$images->image_file)}}" data-fancybox-group="gallery">
                            <span>
                            <img src="{{asset('/assets/protofolio/slider_'.$images->image_file)}}">
                            </span></a>
                    </figure>
                   <ul class="grid-menu pull-left">
                             @if(!empty($userid))
                                <li ><a href="#"><i class="fa fa-heart-o " onclick="likecount({{ $images->id }},{{ $userid }})"></i><span class="likebtn{{ $images->id }}"> {{ $likeNumber }}</span></a></li>                                
                            @else
                                <li ><a href="#"><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </a></li>                               
                            @endif
                            <li><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-comment-o"></i> {{ $comment_number }}</a></li>
                            <li><a href="#"><i class="fa fa-eye"></i> {{  $viewNumber }}</a></li>
                          </ul>
          </div>
          </div>
    @endforeach
       
          </div>
          </div>
       
<!--..........................................tab default 1 closed..............................................-->

        <div class="tab-pane video-tab" id="tab_default_2">
          <div class="row">
          @foreach ($default as $defaults) 

            <?php 
                           $CommentNum=CountComment($defaults->id,'video');
                           $likeNumber=GetLike($defaults->id,'video');
                            $viewNumber=GetViews($defaults->id);
                                        if(!empty($CommentNum))
                                             $comment_number=$CommentNum ; 
                                        else
                                           $comment_number=0;
$posted_string=Findate($defaults->created_at);  
                     ?>

             <div class="col-md-6 col-sm-6">
               <div class="col-md-12"> 
                 <span class="col-xs-11 row pull-left"> <a href="#">
                    @if(!empty($users->profile_pic))
                          <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="">
                     @endif
                 </a>
                <h1><a href="#">{{$users->name}}</a></h1>
                <p><i class="fa fa-clock-o"></i>{{  $posted_string }}</p>
                </span> 
                <span class="pull-right">
                <div class="btn-group pull-right">
                  <!--<button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>-->
                  <ul class="dropdown-menu">
                    <li><a href="#">Delete</a></li>
                    <li><a href="#">Edit</a></li>
                  </ul>
                </div>
                </span>
                <div class="clearfix"></div>
                      @if($defaults->uploaded_to_you_tube ==0)
<div onclick="viewItem({{ $defaults->id }})">
                             <div class=""  id="myElement_1_{{$defaults->id}}" style="border: 10px solid #CCC;border-radius:10px;">
                            </div>

</div>
                             <script type="text/javascript">
                                   jwplayer("myElement_1_{{$defaults->id}}").setup({
                                     primary: "flash",
                                       file: "/assets/videos/{{$defaults->video_file}}",
                                        image: "/assets/thumbnails/{{$defaults->thumbnail}}",
                                       skin: "/assets/js/jwplayer/roundster.xml",
                                       autoplay : true,
                                            width: "100%",
                                      aspectratio: "12:5",
                                   });
                           </script>
                     @else                  
                               <div class="embed-responsive embed-responsive-16by9" onclick="viewItem({{ $defaults->id }})">
                                  <iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/{{$defaults->youtube_id}}" allowfullscreen="" frameborder="0"></iframe>
                                </div>
                    @endif
                     <ul class="grid-menu pull-left">
                            @if(!empty($userid))
                                <li ><a href="#"><i class="fa fa-heart-o " onclick="likecount({{ $defaults->id }},{{ $userid }})"></i><span class="likebtn{{ $defaults->id }}"> {{ $likeNumber }}</span></a></li>                                
                            @else
                                <li ><a href="#"><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </a></li>                               
                            @endif
                            <li><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-comment-o"></i> {{ $comment_number }}</a></li>
                            <li><a href="#"><i class="fa fa-eye"></i> {{  $viewNumber }}</a></li>
                          </ul>
                <div class="clearfix"></div>
              </div>
            </div>
    @endforeach


		<!--  @foreach ($eventvideos as $eventvideo) 

           
             <div class="col-md-6 col-sm-6">
               <div class="col-md-12"> 
                 <span class="col-xs-11 row pull-left"> <a href="#">
                    @if(!empty($users->profile_pic))
                          <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="">
                     @endif
                 </a>
                <h1><a href="#">{{$users->name}}</a></h1>
 <?php 

$posted_string=Findate($defaults->created_at);          
?>
                <p><i class="fa fa-clock-o"></i>{{  $posted_string }}</p>
                </span> 
                <span class="pull-right">
                <div class="btn-group pull-right">
                  <!--<button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>-->
                 <!-- <ul class="dropdown-menu">
                    <li><a href="#">Delete</a></li>
                    <li><a href="#">Edit</a></li>
                  </ul>

                </div>
                </span>

 <div class="clearfix"></div>
                            <p class="detail">{{$eventvideo->description}}</p>
            
                <div class="clearfix"></div>
                      @if($eventvideo->uploaded_to_you_tube ==0 || $you_tube->you_tube==0)
			<div onclick="viewEvent({{ $eventvideo->id }})"> 
                             <div class=""  id="myElement_1_1_{{$eventvideo->id}}" style="border: 10px solid #CCC;border-radius:10px;">
                            </div>
			</div>
                              <script type="text/javascript">
                                            jwplayer("myElement_1_1_{{$eventvideo->id}}").setup({
                                               primary: "flash",
                                               file: "/assets/event_video/{{$eventvideo->promo}}",
                                                   image: "/assets/thumbnails/{{$eventvideo->thumbnail}}",
						skin: { name: "bekle" },
                                                 autoplay : true,
                                                      width: "100%",
						    logo: { hide: 'true' },
                                                aspectratio: "12:5",
                                             });
                                       </script>
                     @else     
             
                               <div onclick="viewEvent({{ $eventvideo->id }})" class="embed-responsive embed-responsive-16by9">
                                  <iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/{{$eventvideo->youtube_id}}" allowfullscreen="" frameborder="0"></iframe>
                                </div>
                    @endif
    
                <div class="clearfix"></div>
              </div>
            </div>
    @endforeach-->




















          </div>
        </div>
<!--.................................................tab default 2 closed............................................-->

        <div class="tab-pane photo-tab video-tab" id="tab_default_3">
          <div class="row">
               <div class="talent-grid">
                @foreach ($image as $images) 

                  <?php 
                           $CommentNum=CountComment($images->id,'image');
                           $likeNumber=GetLike($images->id,'image');
                            $viewNumber=GetViews($images->id);
                                        if(!empty($CommentNum))
                                             $comment_number=$CommentNum ; 
                                        else
                                           $comment_number=0;
$posted_string=Findate($images->created_at);  
                     ?>

                       <div class="col-md-6 col-sm-6">
                          <div class="col-md-12">
                           <span class="col-xs-11 row pull-left"> 
                           <a href="#">
                              @if(!empty($users->profile_pic))
                                   <img src="{{asset('/assets/profile/normal_'.$users->profile_pic)}}" alt="no image">
                              @endif
                          </a>
                <h1><a href="#">{{$users->name}}</a></h1>
                        <p class="time"><i class="fa fa-clock-o"></i> {{  $posted_string }}</p>
                        </span>
                        <div class="btn-group pull-right">
                          <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>
                          <ul class="dropdown-menu">
                            <li><a href="#">Delete</a></li>
                            <li><a href="#">Edit</a></li>
                          </ul>
                        </div>
                        <div class="clearfix"></div>
                        <p class="detail">{{$images->text}}</p>
                        <div class="clearfix"></div>

                        <figure onclick="viewItem({{ $images->id }})"><a class="fancybox" rel="1" href="{{asset('/assets/protofolio/'.$images->image_file)}}" data-fancybox-group="gallery">
                        <span>

                        <img src="{{asset('/assets/protofolio/slider_'.$images->image_file)}}">
                        </span></a>
                        </figure>
                       <ul class="grid-menu pull-left">
                             @if(!empty($userid))
                                <li ><a href="#"><i class="fa fa-heart-o " onclick="likecount({{ $images->id }},{{ $userid }})"></i><span class="likebtn{{ $images->id }}"> {{ $likeNumber }}</span></a></li>                                
                            @else
                                <li ><a href="#"><i class="fa fa-heart-o " data-toggle="modal" data-target="#signin"></i>  {{ $likeNumber }} </a></li>                               
                            @endif
                            <li><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-comment-o"></i> {{ $comment_number }}</a></li>
                            <li><a href="#"><i class="fa fa-eye"></i> {{  $viewNumber }}</a></li>
                          </ul>
                  </div>
                  </div>
    @endforeach
          </div>
        </div>
        </div>
<!--.............................................tab default 3 closed...............................................-->

        <div class="tab-pane about-me active" id="tab_default_4">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <h1>Profile Details</h1>
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Language Known <span class="pull-right">:</span></td>
                      <td>Bodo</td>
                    </tr>
                    <tr>
                      <td>Preferred Location <span class="pull-right">:</span></td>
                      <td>Kerala</td>
                    </tr>
                    <tr>
                      <td>Experience <span class="pull-right">:</span></td>
                      <td>Modeling & Acting</td>
                    </tr>
                  </tbody>
                </table>
                <h1>Physical Details</h1>
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Complexion <span class="pull-right">:</span></td>
                      <td>Wheatish</td>
                    </tr>
                    <tr>
                      <td>Skin Quality <span class="pull-right">:</span></td>
                      <td>Clear</td>
                    </tr>
                    <tr>
                      <td>Eye Color <span class="pull-right">:</span></td>
                      <td>Brown</td>
                    </tr>
                    <tr>
                      <td>Height<span class="pull-right">:</span></td>
                      <td>{{$users->height_feet}} Foot {{$users->height_inch}} Inch</td>
                    </tr>
                    <tr>
                      <td>Weight<span class="pull-right">:</span></td>
                      <td>{{$users->weight}} Kgs</td>
                    </tr>
                    <tr>
                      <td>Facial Hair<span class="pull-right">:</span></td>
                      <td>None</td>
                    </tr>
                    <tr>
                      <td>Hair Style<span class="pull-right">:</span></td>
                      <td>Straight</td>
                    </tr>
                    <tr>
                      <td>Hair Color<span class="pull-right">:</span></td>
                      <td>Black</td>
                    </tr>
                    <tr>
                      <td>Hair Length<span class="pull-right">:</span></td>
                      <td>Medium</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-6">
                <h1>Experience & Acheivements</h1>
                <ul class="timeline">
                  <li class="timeline-inverted">
                    <div class="timeline-badge"><i class="fa fa-trophy"></i></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4 class="timeline-title">School Level</h4>
                      </div>
                      <div class="timeline-body">
                        <p>{{$users->school_level}}</p>
                      </div>
                    </div>
                  </li>
                  <li class="timeline-inverted">
                    <div class="timeline-badge"><i class="fa fa-trophy"></i></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4 class="timeline-title">College Level</h4>
                      </div>
                      <div class="timeline-body">
                        <p>{{$users->college_level}}</p>
                      </div>
                    </div>
                  </li>
      <li class="timeline-inverted">
                    <div class="timeline-badge"><i class="fa fa-trophy"></i></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4 class="timeline-title">Work Level</h4>
                      </div>
                      <div class="timeline-body">
                        <p>{{$users->work_level}}</p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
<!--.................................tab default 4 closed....................................-->
      </div>
    </div>
  </div>
</section>
<script src="{{asset('assets/new_theme/js/jquery.min.1.11.1.js')}}"></script> 
<script src="{{asset('assets/new_theme/js/bootstrap.min.js')}}"></script> 
<script src="assets/new_theme/js/pinterest_grid.js"></script> 
<script>
        $(document).ready(function() {
            $('.talent-grid').pinterest_grid({
                no_columns: 2,
                padding_x: 30,
                padding_y: 30,
                margin_bottom: 100,
                single_column_breakpoint: 700
            });
        });
    </script> 
<script>
  
      $(".progress-bar").animate({
    width: "{{$percentage}}%"
}, 2500 );   




$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script> 

<script type="text/javascript">
  
function likecount(a,b){

          $.ajax({
                      url : "../liketalent",
                      type: "POST",
                      data:{itemid:a,userid:b},
                      success: function(data)
                      {
                         $(".likebtn"+a).html(data);
                      }
                  });


}



function viewItem(a){
             $.ajax({
                      url : "../viewitem",
                      type: "POST",
                      data:{itemid:a},
                      success: function(data)
                      {
                        $(".viewnum"+a).html(data);
                      }
                  });

}


function checklog1(){

  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
  var email   = document.getElementById('logemail').value;
  var password   = document.getElementById('logpass').value;
  if(email==''){

   document.getElementsByName('email')[0].placeholder='Please enter email';
   $("#logemail").addClass("holder_color");
   return false;
  }
  if(password==''){
   document.getElementsByName('password')[0].placeholder='Please enter password';
   $("#logpass").addClass("holder_color");
   return false;
  }
  if(!email.match(mailformat))  
  {   
    $("#logemail").val("");
    document.getElementsByName('email')[0].placeholder='Please enter a valid email';
     $("#logemail").addClass("holder_color");
    return false;
   } 
   $.ajax({
          url : "../authenticate",
          type: "POST",
          data:{email:email,password:password},
          dataType: "json",
          success: function(data, textStatus, jqXHR)
          {
            // var obj = jQuery.parseJSON(data);
            // alert(data);
            // console.log(obj);
             console.log(data.id);
               if(data.status == "invalid"){ 
                  $("#invalid").html("Invalid username and Password or <br>You may not verified your mail id");
                  return false;
                }
                if(data.user == "admin"){
                  window.location="/users";
                  return false;
                }
    if(data.user == 'Audition Manager'){
      window.location="myauditions";
      return false;
    }
                if((data.log_count =="0")&&(data.user == "user")){
                   window.location = "/myprofile";
                  return false;
                }else{
                   window.location = "/";
                }

          }
          
  });
}




</script>
<script>
function viewEvent(id)
{
		 $.ajax({
         url : "/viewevent",
          type: "POST",
          data:{eventid:id},
          success: function()
          {
            return true;
          }
      });
}
</script>
<script src="assets/new_theme/js/jquery.fancybox.pack.js"></script>
@stop



