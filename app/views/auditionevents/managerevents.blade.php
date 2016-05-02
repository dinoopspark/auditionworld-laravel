@extends('layouts.audition_manager')
@section('main')

@if ($errors->any())
        <ul>
          {{ implode('', $errors->all('<li style="color:red" class="error">:message</li>')) }}
        </ul>
      @endif
<br/>
 <form action="event_manger" method="POST" enctype="multipart/form-data" id="eventform">
              <div class="pro-edit-out"> 
              
              <div class="pro-edit-row">               
              <div class="pro-edit-row-left">Name </div>
              <div class="pro-edit-row-right">
              {{ Form::text('name',NULL,array('class' => 'pro-edit-row-right-txt','id' =>'eventnameid')) }}              
              </div>              
              </div>
               
              
            
              
              
              <div class="pro-edit-row">               
              <div class="pro-edit-row-left">Description</div>
              <div class="pro-edit-row-right">            
              {{ Form::textarea('description',NULL,array('class' => 'pro-edit-row-right-txt')) }}
              </div>              
              </div>
              
              <div class="pro-edit-row">               
              <div class="pro-edit-row-left">Date</div>
              <div class="pro-edit-row-right">
              {{ Form::text('date',NULL,array('id'=>'eventdate','class' => 'pro-edit-row-right-txt','placeholder'=>'yyyy-mm-dd')) }}              
              </div>              
              </div>
              
              <div class="pro-edit-row">               
              <div class="pro-edit-row-left">Time </div>
              <div class="pro-edit-row-right">
              <input type="hidden" value="" name="time" id="time" />
                {{ Form::label('', 'Hour:') }}
                {{Form::selectRange('Hour', 0, 24,null, array('onchange'=>"setTime()",'id'=>'hour','class'=>'arrange','placeholder'=>'Hour'))}}
               {{ Form::label('', '-Minute:') }}
            	{{Form::selectRange('Minute',0,59,null, array('onchange'=>"setTime()",'id'=>'minute','class'=>'arrange','placeholder'=>'Minute'))}}
            	{{ Form::label('', '-Seconds:') }}
            	{{Form::selectRange('Second', 0, 59,null, array('onchange'=>"setTime()",'id'=>'second','class'=>'arrange','placeholder'=>'Second'))}}             
              </div>              
              </div>
             
             
           <div class="clearfix" ></div>  
             <div class="pro-edit-row">               
              <div class="pro-edit-row-left">Venue</div>
              <div class="pro-edit-row-right">
                           
             {{ Form::text('venue',NULL,array('class' => 'pro-edit-row-right-txt')) }}
              </div>              
              </div>
              
              <div class="pro-edit-row">               
              <div class="pro-edit-row-left">Type </div>
              <div class="pro-edit-row-right">
              <select name="type"  class="pro-edit-row-right-drop">  
              <option> Actor </option>
              <option> Model</option>
              </select>
                         
              </div>              
              </div>

             
            

              <div class="pro-edit-row">               
              <div class="pro-edit-row-left">Upload Promo Video</div>
              <div class="pro-edit-row-right">
               {{ Form::file('promo') }}              
              </div>              
              </div>

              <input  id="newevent"type="button" class="edit-but btn btn-primary" value="SUBMIT">
              
              </div>
              
              </div>
              
              </form>

<script>

$("#newevent").click(function(){

		var eventname= $("#eventnameid").val();
	
		if(eventname==""){
		alert('please Enter the Event name');
		}
else{
			$.ajax({
					 url : "checkeventname",
					  type: "POST",
					  data:{event:eventname},
					  success: function(data, textStatus, jqXHR)
					  {
						if(data==1){
								alert('Event name already exist');
							}
						else{
							$("#eventform").submit();
						}			    		
							
					  }
				      });

}


	

});


</script>




<style>
.pro-edit-row-left{
float: left;
margin-top: 10px;
margin-right: 22px;
width: 70px;
}
label{
	float:left;
}
.arrange{
width: 54px;
float: left;
}
</style>
@stop
