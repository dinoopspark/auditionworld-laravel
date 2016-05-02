<?php

class Product extends Eloquent {
    

    protected $table = 'products';
    protected $guarded = array('id');
    protected $fillable = array('title', 'description');
    public static $rules = array(
        'title' => 'required',
    );
    

}
