<?php

class Post extends Eloquent {

    protected $table = 'posts';
    protected $guarded = array('id');
    protected $fillable = array('post_title', 'post_name', 'post_content', 'post_type', 'post_status');
    public static $rules = array(
        'post_title' => 'required',
    );
    private static $post_default = array(
        'post_title' => '',
        'post_name' => '',
        'post_content' => '',
        'post_type' => 'post',
        'post_status' => 'publish',
    );

    static function add() {

        $data = array(
            'post_title' => 'test 02',
            'post_content' => 'lorem ipsum',
            'post_type' => 'blog',
            'post_status' => 'publish',
            'location' => 'in',
            'sample' => 'another',
        );



        if (!isset($data['post_title'])) {
            return false;
        }

        $post_name = (isset($data['post_name'])) ? $data['post_name'] : $data['post_title'];
        $data['post_name'] = self::generate_post_name($post_name);


        $extra = array_diff_key($data, self::$post_default);
        $post_data = self::refine_post_data($data);

        $post = self::create($post_data);

        Postmeta::add($post->id, $extra);
    }

    static function refine_post_data($data) {

        $refined = array();

        foreach (self::$post_default as $key => $value) {

            if (isset($data[$key])) {
                $refined[$key] = $data[$key];
            } else {
                $refined[$key] = $value;
            }
        }

        return $refined;
    }

    /**
     * 
     * @param mixed $param canbe post_id, post_type
     * @return type
     */
    static function get($param) {

        if (is_numeric($param)) {
            // $param is post id
            return self::getpostbyid($param);
        }


        // $param is post_type
        $post_ids = self::getpostids_by('post_type', $param);

        $posts = array();
        foreach ($post_ids as $id) {
            $posts[] = self::getpostbyid($id);
        }


        return $posts;
    }

    /**
     * 
     * @param mixed $param post_id or array of post ids
     */
    static function remove($param) {
        if (is_array($param)) {
            foreach ($param as $post_id) {
                $post = self::find($post_id);
                if (isset($post->id)) {
                    $post->delete();
                    Postmeta::remove($post_id);
                }
            }
        } else {
            $post = self::find($param);
            if (isset($post->id)) {
                $post->delete();
                Postmeta::remove($param);
            }
        }
    }

    static function getpostids_by($key, $val) {
        return self::where($key, $val)->orderBy('id', 'desc')->lists('id');
    }

    /**
     * 
     * @param int $post_id
     * @return array
     */
    static function getpostbyid($post_id) {
        $post = self::find($post_id);
        $post->postmeta = Postmeta::get($post_id);
        return $post;
    }

    static function generate_post_name($post_title) {
        $post_title = strtolower($post_title);
        $post_title = str_replace(' ', '-', $post_title);
        $post_name = preg_replace('/([\[\]@!$&\'\(\)*+,;=]+)/', '', $post_title);

        $post = self::whereRaw("post_name LIKE '%{$post_name}%'")->orderBy('id', 'desc')->first();
        if (isset($post->id)) {
            $suffix = str_replace($post_name . '-', '', $post->post_name);
            $suffix = ($post_name == $suffix) ? 1 : ++$suffix;
            $post_name = $post_name . '-' . $suffix;
        }
        return $post_name;
    }
    
    

}
