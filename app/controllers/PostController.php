<?php

class PostController extends BaseController {
    
    public static function profile_pic() {
        if(Auth::check() && Auth::user()->profile_pic != ""){
            return URL::asset('assets/profile/small_' . Auth::user()->profile_pic);
        }else{
            return URL::asset('assets/profile/user.jpg');
        }
        
        
    }
    
}