<?php

class Ad extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'location' => 'required'
	);
}
