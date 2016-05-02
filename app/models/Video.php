<?php

class Video extends Eloquent {
	protected $guarded = array();

	protected $table = "videos";

	public static $rules = array(
		'event_id' => 'required',
		'video_file' => 'required',
	    // 'user_id'	=> 'unique:videos,user_id'
	);
}
