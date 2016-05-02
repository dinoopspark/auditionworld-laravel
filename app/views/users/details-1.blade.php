@extends('layouts.admin')
<style>

.tableclas table {

border:1px solid yellowgreen;
width:100%;

}

.tableclas td{

border:1px solid yellowgreen;
 padding: 15px;
width:40%;

}

.img-container {
    position: relative;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;

    text-align:center; /* Align center inline elements */
    font: 0/0 a;
}

</style>
@section('main')

<!--left-->

<div class="left-aud" style=" text-align:center;">
            <div class="left-container-audition-des">  
        
		    <div class="head-title "> </div>
	 	    <div class="space-gen1">     </div>
		      <div class="profile-cnt">
				      <div class="profile-cnt-lft" style=" text-align:center;"> 
				<h1 class="head-title-profile">Profile </h1>
								     <div class="profile-cnt-lft1 tableclas img-container" style="width:50%; position:relative;left:25%;"> 

						      <img src="/assets/profile/{{$users->profile_pic}}" style="height:208px;width:208px; ">
				
						     </div>


			      			      <div class="profile-cnt-lft-shadow"> </div>
			      
						      <div class="profile-cnt-lft1 tableclas" style="width:50%;position:relative;left:25%;"> 

									<h4>  {{$users->name}} </h4>
									<table class="profile-tble">

						    			     
									     <tr>  
											       <td>No.of Videos </td> 
												<td>58 </td>
									   </tr>   
									  <tr>
											       <td>No.of Events</td>
												<td>58 </td>
									     </tr>              
									     <tr> 
											      <td><p>Gender :  </p> </td>
												<td>{{$users->gender}} </td>
									   </tr>
										<tr>
											     <td> <p>DOB :  </p> </td>
												<td>{{$users->dob}} </td>
										</tr>
										<tr>
											     <td> <p> Mobile : </p> </td>
												<td>{{$users->phone}} </td>
										</tr>
										<tr>
											     <td> <p> Email: </p> </td>
												<td>{{$users->email}}</td>
									     </tr>




									</table>



						      </div>
			              </div>
              
              			      <div class="profil-border"> </div>

				      <div class="profile-cnt-ctr tableclas" style="width:50%;position:relative;left:25%;"> 
						 
						     <table class="profile-tble">
						      				 <h5 class="profile-tble-h5"> Profile Details: </h5>
										<tr>
											<td>Languages Known</td>
										
											<td>{{$users->language}} </td>
										</tr>

						      </table>

						     <table class="profile-tble" >
						      				<h5 class="profile-tble-h5"> Physical Details:  </h5>
										<tr >
											<td>Complexion:</td>
											
											<td >{{$users->color}}</td>
										</tr>

										<tr>
											<td>Eye Color: </td>
										
											<td>
											  {{$users->eye}}
											</td>
										</tr>


										<tr>
											<td>Height: </td>
											
											<td>{{$users->height_feet}}.{{$users->height_inch}}</td>
										</tr>

										<tr>
											<td>Weight:  </td>
										
											<td>{{$users->weight}}</td>
										</tr>

										<tr>
											<td>Hair Type:  </td>
										
											<td>{{$users->hair}}</td>
										</tr>

							</table>


				       </div>
			   
				     <div class="profile-cnt-rgt">
				     			 <div class="samp-video"> 

							 <form action="default_video" method="post"  id="userdefault" enctype="multipart/form-data">
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
							    @endif
							 </div>
						      @endforeach
						       
					      
						       </form>
             
          					       </div>
              
              			      </div>
              
              		</div> 
  
           	 </div>
            	 <div class="space-gen2"> </div>
       </div>
          
@stop


@section('video')
<div class="head-title "> <h2 class="head-title-profile-1">Audition Videos </h2></div>
 <div class="space-gen1"> </div>

<!--video-->
@foreach ($video as $videos)
<div class="part-video">
   <a  href="myvideo/{{$videos->id}}"> 
      <img src="assets/thumbnails/{{$videos->thumbnail}}" id="{{$videos->id}}" height="146" width="264" alt="Despicable Me"/> 
   </a>
</div>
@endforeach
@stop
