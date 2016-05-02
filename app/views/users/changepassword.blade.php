@extends('layouts.new_temp')
@section('main')
	<div class="container-fluid">
    <div class="container">
        <div class="row">
            <h1 style="text-transform: uppercase; font-size: 25px; font-family: 'robotobold'; margin-top:40px; margin-bottom:10px;"><span style="color:#E74C3C;">Password</span> Reset</h1>
            <div class="row">
		<form  action="updatepswrd" method="post" id="login-form" onsubmit="return validateForm()">
		 <input type="hidden" value="{{$email}}" name="key" />
                <div class="form-group col-sm-4">
                   <input type="password" class="form-control" placeholder="Password" id="password" name="password">   
                </div>
                <div class="form-group col-sm-4">
                   <input type="password" class="form-control" placeholder="Confirm password" name="confirm" id="confirm">   
                </div>
                <div class="form-group col-sm-4">
                   <button type="submit" class="bten">Reset</button>   
                </div>
		</form>
            </div>
        </div>
    </div>    
</div>
  @if (Session::has('message'))
                    <div class="flash alert ms">
                       <p style="color:red;margin-left: 28px;" id="error">{{ Session::get('message') }}</p>
                    </div>
  @else
                    <div class="flash alert">
                       <p style="color:red;margin-left: 28px;" id="error"></p>
                    </div>


  @endif

<script>
	 $(".ms").fadeOut(5000);
	 function validateForm(){
		$(".alert").show();	
		var passw=  /^(?=.*\d)(?=.*[a-z])[a-z\d]{2,}$/i; 

		if($("#password").val() != $("#confirm").val()){
			 $("#password").val("");
                           $("#confirm").val("");
			$("#error").html("Password not matching");
			 $(".alert").fadeOut(8000);
			return false;
		} else {
			pass = $("#password").val();
		  if(!passw.test(pass)){
			   $("#password").val("");
			   $("#confirm").val("");
				
			   $("#error").html("Please enter alphanumeric password");
				$(".alert").fadeOut(8000);
			   return false;
		   }
	       	}
	}
</script>
@stop
