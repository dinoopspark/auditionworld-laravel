@extends('layouts.new_temp')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
@section('title')
Contact Audition World
@stop

@section('active_con')
active
@stop

@section('metadata')
<meta content="Any Queries related to creating profile or posting Auditions, post it here." name=description />

<meta content="Auditions for Actor, Auditions for Actress, Malayalam tv channel auditions, Film Auditions, Film Auditions kerala, Malayalam Channel auditioins" name=keywords />
@stop
@section('main')
              <!--<input name="" type="button" class="edit-but" value="Send" onclick="return sendmail();" id="submit_form" >             -->
<section class="contact-banner" style="background:  url({{ URL::asset('assets/new_theme/images/contact.jpg')}}) no-repeat center center; background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Get in touch</h1>
        <p>If you need any assistance in conducting auditions via Auditionworld or showcasing your talent, please drop us a mail and we will reach you asap!.</p>
      </div>
    </div>
  </div>
</section>
<section class="contact-us">
  <div class="container">
    <div class="row">
      <h1><span>Send</span> us an email</h1>
      <div class="border">
        <div class="br-left"></div>
        <div class="br-right"></div>
      </div>
      <h2>And we will reach out to you asap!</h2>
      <div class="col-md-12">
        <div id="ack" style="color:#619A23;padding: 10px; text-align:center; font-size:16px; margin-bottom:15px" > 
		@if (Session::has('result'))
			<?php $value = Session::get('result'); ?>
			{{ $value }}
			
		@endif
		<?php Session::forget('result'); ?>
</div>
		

      </div>
<form action="sendmail">
      <div class="col-sm-6">
        <div class="form-group">
          <input name="con_name" id="name" type="text" class="form-control"  placeholder="NAME" data-validation="required"  data-validation-error-msg="Your name is required">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="con_email" id="email" placeholder="EMAIL ADDRESS" data-validation="required email"  data-validation-error-msg="Email address required" >
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="con_phone" id="phone" maxlength="10" onkeydown="return keyTrigger(this,event)" placeholder="PHONE" data-validation="required length number" data-validation-length="10-10"  data-validation-error-msg="10 digits phone number required">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <textarea  name="con_message" id="message" class="form-control" placeholder="YOUR MESSAGE" style="height:113px;" data-validation="required"  data-validation-error-msg="Message required"></textarea>
        </div>
        <button type="submit" class="bten" >Send Your Message</button>
      </div>
<!--onclick="return sendmail();"-->
      <div class="clearfix" style="margin-bottom:50px;"></div>
      <div class="col-sm-4">
        <figure><img src="{{ URL::asset('assets/new_theme/images/location.svg')}}" alt="" width="80"></figure>
        <p>3rd Floor, Carnival Infopark , Phase II, Kochi-30, Kerala, India </p>
      </div>
      <div class="col-sm-4">
        <figure><img src="{{ URL::asset('assets/new_theme/images/mail.svg')}}" alt="" width="80"></figure>
        <p>info@auditionworldtv.com</p>
      </div>
      <div class="col-sm-4">
        <figure><img src="{{ URL::asset('assets/new_theme/images/share.svg')}}" alt="" width="80"></figure>
        <p>Site still in Beta, please mail us! </p>
      </div>
    </div>
  </div>
</form>
</section>
@stop
<script>

$.validate();

 $(document).ready( function() {
        $('#ack').delay(1000).fadeOut();
      });

</script>







