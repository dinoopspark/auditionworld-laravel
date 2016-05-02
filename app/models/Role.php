<?php

class Role extends Eloquent {
	protected $guarded = array();

	protected $table = 'roles';

	public static $rules = array(
		'name' => 'required'
	);
}
