<?php

class Videocomment extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'location' => 'required'
	);
}
