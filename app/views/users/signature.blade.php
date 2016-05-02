@extends('layouts.ajax')
@section('main')
  <div class="form-group">
    <!-- <input type="text"  name="username" id="guest_email" class="form-control" placeholder="Enter Email Address">
	<input name="" type="submit"  onclick="authenticatesignature()" class="log-but" value="Enter"/> -->
  <input name="username" type="text" id="guest_email" class="guest-coment-field-email reg-martop" placeholder="Email ID">
 <input name="" class="cmnt-button1" type="submit" onclick="authenticatesignature()" value="Send">

  </div>
@stop