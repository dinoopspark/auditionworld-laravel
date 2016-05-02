<?php

class Auditionevent extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'description' => 'required',
		'date' => 'required',
		'venue' => 'required',
		'type' => 'required',
		'promo' => 'required'
	);
}
