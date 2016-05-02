<?php

class Postmeta extends Eloquent {

    protected $table = 'postmeta';
    protected $guarded = array('id');
    protected $fillable = array('post_id', 'meta_key', 'meta_value');
    public $timestamps = false;
    

    static function add($post_id, $extra) {
        foreach ($extra as $key => $value) {
            $data = array(
                'post_id' => $post_id,
                'meta_key' => $key,
                'meta_value' => $value,
            );
            self::create($data);
            
        }
    }
    
    static function get($post_id) {
        
        $postmeta = self::where('post_id', $post_id)->get();
        
        $mit = new stdClass();
        
        foreach ($postmeta as $key => $value) {
            //$keys[] = $value['meta_key'];
            $mit->$value['meta_key'] = $value->meta_value;
        }
        return $mit;
    }
    
    static function remove($post_id) {
        self::where('post_id', $post_id)->delete();
    }
    

}
