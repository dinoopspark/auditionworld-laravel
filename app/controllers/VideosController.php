<?php

class VideosController extends BaseController {

    public function index() {
        $videos = $this->video->all();

        return View::make('videos.index', compact('videos'));
    }

    public function create($id) {
        $events = DB::table('audition_events')
                ->select('name', 'id')
                ->where('id', $id)
                ->get();

        $allevents = DB::table('audition_events')
                ->get();

        return View::make('videos.create', compact('events', 'allevents'));
    }

    public function store() {
        $user = Auth::user()->id;
        $input = Input::all();
        if (isset($input['video_file'])) {
            $file = Input::file('video_file');
            $org_name = $file->getClientOriginalName();
            $org_name = preg_replace("/[^A-Za-z0-9\.]/", '', $org_name);
            $new_name = uniqid(time()) . $org_name;
            //$new_name = str_replace(" ", '_', $new_name);
            $path = $file->move('assets/event_video', $new_name);
            shell_exec("chmod 777 $path");
            $size = '264x146';
            $base_path = Config::get('app.base_path_project');
            //$thumbnail =shell_exec("ffmpeg -i $base_path/public/assets/event_video/$new_name -ss 00:00:05 -f image2 -vframes 1 $size $base_path/public/assets/thumbnails/$new_name.png");
            $thumbnail = shell_exec("ffmpeg  -itsoffset -4  -i $base_path/public/assets/event_video/$new_name -vcodec mjpeg -vframes 1 -an -f rawvideo -s $size $base_path/public/assets/thumbnails/$new_name.png -loglevel panic");





            shell_exec("chmod 755 $base_path/public/assets/thumbnails/$new_name.png");
            $input['video_file'] = $new_name;
            $input['thumbnail'] = $new_name . ".png";
            // Thumbnail resizing 
            $inFile = $base_path . "public/assets/thumbnails/" . $input['thumbnail'];



            $outFile = $inFile;
            $outFile_l = $base_path . "public/assets/thumbnails/player_" . $input['thumbnail'];
            $this->create_thumbnails(600, 500, $inFile, $outFile_l);
            $this->create_thumbnails(316, 250, $inFile, $inFile);
            // end of resizing
        }
        $input['user_id'] = $user;
        $input['date'] = date("Y-m-d");
        $validation = Validator::make($input, Video::$rules);
        //if ($validation->passes())
        //{

        $vid_ref = Video::create($input);
        $command_text = 'python ' . Config::get('app.celery_location') . 'main.py ' . $vid_ref->id . ' videos video_file';
        $command = escapeshellcmd($command_text);
        $output = shell_exec($command);

        return Redirect::to('audition');
        //}

        return Redirect::to($_SERVER['HTTP_REFERER'])
                        ->withInput()
                        ->withErrors($validation)
                        ->with('message', 'There were validation errors.');
    }

    public function show($id) {
        $video = $this->video->findOrFail($id);

        return View::make('videos.show', compact('video'));
    }

    public function edit($id) {
        $video = $this->video->find($id);

        if (is_null($video)) {
            return Redirect::route('videos.index');
        }

        return View::make('videos.edit', compact('video'));
    }

    public function update($id) {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Video::$rules);

        if ($validation->passes()) {
            $video = $this->video->find($id);
            $video->update($input);

            return Redirect::route('videos.show', $id);
        }

        return Redirect::route('videos.edit', $id)
                        ->withInput()
                        ->withErrors($validation)
                        ->with('message', 'There were validation errors.');
    }

    public function destroy($id) {
        $this->video->find($id)->delete();

        return Redirect::route('videos.index');
    }

    public function eventPlayer($id) {
        $video = DB::table('videos')
                ->Join('users', 'videos.user_id', '=', 'users.id')
                ->select('user_id', 'videos.video_file', 'videos.youtube_id', 'videos.uploaded_to_you_tube', 'videos.event_id', 'videos.converted', 'users.category', 'users.name', 'users.id', 'videos.id AS vid', 'videos.thumbnail', 'videos.id AS videoid', 'users.profile_pic')
                ->where('videos.id', '=', $id)
                ->orderBy('videos.created_at', 'desc')
                ->get();
        $sql = DB::table('default_videos')
                ->where('default_videos.sequence', '=', "2")
                ->where('default_videos.user_id', '=', $video[0]->user_id)
                ->get();
        $images = DB::table('model_images')
                ->select('model_images.*')
                ->where('user_id', $video[0]->user_id)
                ->where('model_images.approve', 1)
                ->orderBy('model_images.sequence', 'desc')
                ->get();
        $popular = DB::table('videos')
                ->Join('users', 'videos.user_id', '=', 'users.id')
                ->where('videos.event_id', $video[0]->event_id)
                ->where('videos.id', '<>', $id)
                ->select('videos.id AS vid', 'videos.*', 'users.name')
                ->get();
        $comment = DB::table('comments')
                ->leftJoin('users', 'comments.user_id', '=', 'users.id')
                ->select('users.name', 'users.profile_pic', 'comments.comment', 'comments.user_id', 'comments.id', 'comments.created_at', 'comments.guest_email', 'comments.guest_name')
                ->where('comments.video_id', '=', $id)
                ->where('comments.approved', '=', 1)
                ->where('comments.status', '=', '1')
                ->where('comments.type', '=', 'events')
                ->orderBy('comments.created_at', 'desc')
                ->get();

        $commentval = DB::table('comments')
                ->where('video_id', $id)
                ->where('approved', '=', 1)
                ->where('status', '=', 1)
                ->where('comments.type', '=', 'events')
                ->count();

        return View::make('videos.eventplayer', compact('video', 'sql', 'images', 'popular', 'comment', 'commentval'));
    }

    public function myvideo($id) {

        $video = DB::table('videos')
                ->Join('users', 'videos.user_id', '=', 'users.id')
                ->select('user_id', 'videos.video_file', 'videos.youtube_id', 'videos.uploaded_to_you_tube', 'videos.converted', 'users.category', 'users.name', 'users.id', 'videos.id AS vid', 'videos.thumbnail', 'videos.id AS videoid')
                ->where('videos.id', '=', $id)
                ->orderBy('videos.created_at', 'desc')
                ->get();
        //print_r($video[0]->user_id);die();
        $sql = DB::table('default_videos')
                ->where('default_videos.sequence', '=', "2")
                ->where('default_videos.user_id', '=', $video[0]->user_id)
                ->get();

        $images = DB::table('model_images')
                ->select('model_images.*')
                ->where('user_id', $video[0]->user_id)
                ->where('model_images.approve', 1)
                ->orderBy('model_images.sequence', 'desc')
                ->get();
        $popular = DB::table('videos')
                ->where('videos.user_id', $video[0]->user_id)
                ->where('videos.id', '<>', $id)
                ->select('videos.id AS vid', 'videos.*')
                ->get();
        $comment = DB::table('comments')
                ->leftJoin('users', 'comments.user_id', '=', 'users.id')
                ->select('users.name', 'users.profile_pic', 'comments.comment', 'comments.user_id', 'comments.id', 'comments.created_at')
                ->where('comments.video_id', '=', $id)
                ->where('comments.approved', '=', 1)
                ->where('comments.type', '=', 'events')
                ->orderBy('comments.created_at', 'desc')
                ->get();

        $commentval = DB::table('comments')
                ->where('video_id', $id)
                ->where('approved', '=', 1)
                ->where('comments.type', '=', 'events')
                ->count();

        return View::make('videos.myplayer', compact('video', 'sql', 'images', 'popular', 'comment', 'commentval'));
        die("here");
        $video = DB::table('videos')
                ->Join('users', 'videos.user_id', '=', 'users.id')
                ->Join('audition_events', 'videos.event_id', '=', 'audition_events.id')
                ->select('videos.video_file', 'users.category', 'users.name', 'users.id', 'audition_events.name AS event', 'videos.id AS vid')
                ->where('videos.id', '=', $id)
                ->orderBy('videos.created_at', 'desc')
                ->get();
        print_r($video);
        die();

        $popular = DB::table('videos')
                ->Join('users', 'videos.user_id', '=', 'users.id')
                ->Join('views', 'videos.id', '=', 'views.video_id')
                ->select('videos.thumbnail', 'videos.video_file', 'users.category', 'users.name', 'users.id', 'videos.id AS vid', 'views.view_count AS count')
                ->orderBy('views.view_count', 'desc')
                ->take(6)
                ->get();
        $view = DB::table('views')
                ->where('video_id', $id)
                ->pluck('view_count');

        if ($view == "") {
            $count = DB::table('views')
                    ->insert(
                    array('video_id' => $id, 'view_count' => 1)
            );
        } else {
            $view++;
            $count = DB::table('views')
                    ->where('video_id', $id)
                    ->update(
                    array('view_count' => $view));
        }

        $viewval = DB::table('views')
                ->where('video_id', $id)
                ->pluck('view_count');

        if (Auth::check()) {
            $visitor = Auth::user()->id;
        } else {
            $visitor = $_SERVER['REMOTE_ADDR'];
        }
        $likes = DB::table('likes')
                ->where('video_id', $id)
                ->where('user', $visitor)
                ->pluck('status');
        if ($likes == "") {
            $like = "Like";
        } else {
            $like = "Liked";
        }

        $comment = DB::table('comments')
                ->leftJoin('users', 'comments.user_id', '=', 'users.id')
                ->select('users.name', 'comments.comment')
                ->where('comments.video_id', '=', $id)
                ->where('comments.approved', '=', 1)
                ->get();
        die("here");

        return View::make('videos.myvideo', compact('video', 'viewval', 'like', 'comment', 'popular'));
    }

    public function popup() {
        $id = Input::get('id');

        $video = DB::table('videos')
                ->where('id', $id)
                ->pluck('video_file');

        return View::make('videos.popup', compact('video'));
    }

    public function like() {
        $video = Input::get('vid');
        $user = Input::get('uid');

        $check = DB::table('likes')
                ->where('video_id', $video)
                ->where('user', $user)
                ->pluck('id');
        if ($check == "") {
            $likes = DB::table('likes')
                    ->insert(
                    array('video_id' => $video, 'user' => $user, 'status' => 'liked')
            );
        }
        $like = DB::table('likes')
                ->where('video_id', $video)
                ->where('user', $user)
                ->pluck('status');
        echo $like;
    }

    public function comment() {
        $comment = Input::get('comment');
        $video = Input::get('video');
        $videoType = Input::get('type');
        $timestamp = date("Y-m-d H:i:s");
        if (Auth::check()) {
            $visitor = Auth::user()->id;
            $status = "1";
            $comment = DB::table('comments')
                    ->insertGetId(
                    array('comment' => $comment, 'user_id' => $visitor, 'video_id' => $video, 'status' => $status, 'type' => $videoType, 'created_at' => $timestamp, 'approved' => 1)
            );
            echo "user," . $comment;
        } else {
            $visitor = $_SERVER['REMOTE_ADDR'];
            $status = "0";
            $comment = DB::table('comments')
                    ->insertGetId(
                    array('comment' => $comment, 'user_id' => $visitor, 'video_id' => $video, 'status' => $status, 'type' => $videoType, 'created_at' => $timestamp, 'approved' => 1)
            );
            echo "guest," . $comment;
        }
    }

    public function videoplayer($id) {
        $video = DB::table('default_videos')
                ->Join('users', 'default_videos.user_id', '=', 'users.id')
                ->select('default_videos.video_file', 'default_videos.youtube_id', 'default_videos.uploaded_to_you_tube', 'default_videos.user_id AS vid', 'default_videos.id AS videoid', 'default_videos.thumbnail', 'default_videos.converted', 'users.*')
                ->where('default_videos.id', '=', $id)
                ->get();
        if (Auth::check()) {
            $visitor = Auth::user()->id;
        } else {
            $visitor = $_SERVER['REMOTE_ADDR'];
        }
        $likes = DB::table('likes')
                ->where('video_id', $id)
                ->where('user', $visitor)
                ->pluck('status');
        if ($likes == "") {
            $like = "Like";
        } else {
            $like = "Liked";
        }

        $likeval = DB::table('likes')
                ->where('video_id', $id)
                ->count();

        $comment = DB::table('comments')
                ->leftJoin('users', 'comments.user_id', '=', 'users.id')
                ->select('users.name', 'users.profile_pic', 'comments.comment', 'comments.user_id', 'comments.id', 'comments.guest_email', 'comments.guest_name', 'comments.created_at')
                ->where('comments.video_id', '=', $id)
                ->where('comments.approved', '=', 1)
                ->where('comments.type', '=', 'default')
                ->where('comments.status', '=', '1')
                ->orderBy('comments.created_at', 'desc')
                ->get();

        $commentval = DB::table('comments')
                ->where('video_id', $id)
                ->where('approved', '=', 1)
                ->where('status', '=', 1)
                ->where('comments.type', '=', 'default')
                ->count();

        $view = DB::table('views')
                ->where('video_id', $id)
                ->pluck('view_count');

        if ($view == "") {
            $count = DB::table('views')
                    ->insert(
                    array('video_id' => $id, 'view_count' => 1)
            );
        } else {
            $view++;
            $count = DB::table('views')
                    ->where('video_id', $id)
                    ->update(
                    array('view_count' => $view));
        }

        $popular = DB::table('default_videos')
                ->Join('users', 'default_videos.user_id', '=', 'users.id')
                ->Join('views', 'default_videos.id', '=', 'views.video_id')
//				->where('default_videos.sequence', '=','1')
                ->where('default_videos.approve', '=', '1')
                ->select('default_videos.thumbnail', 'default_videos.video_file', 'users.category', 'users.name', 'users.id', 'default_videos.id AS vid', 'views.view_count AS count')
                ->orderBy('views.view_count', 'desc')
                ->get();
        $images = DB::table('model_images')
                ->Join('default_videos', 'model_images.user_id', '=', 'default_videos.user_id')
                ->select('model_images.*')
                ->where('default_videos.id', $id)
                ->where('model_images.approve', 1)
                ->orderBy('model_images.sequence', 'desc')
                ->get();


        $user = DB::table('default_videos')
                ->where('default_videos.id', '=', $id)
                ->pluck('user_id');
        $sql = DB::table('default_videos')
                ->where('default_videos.sequence', '=', "2")
                ->where('default_videos.user_id', '=', $user)
                ->where('default_videos.approve', '=', "1")
                ->get();


        return View::make('videos.player', compact('video', 'like', 'likeval', 'comment', 'commentval', 'popular', 'images', 'sql'));
    }

    function protfolio_image($id) {

        $user = DB::table('model_images')
                ->where('model_images.id', '=', $id)
                ->pluck('user_id');
        $user_name = DB::table('users')
                ->where('users.id', '=', $user)
                ->pluck('name');
        $vid_id = DB::table('default_videos')
                ->where('default_videos.user_id', '=', $user)
                ->where('default_videos.video_type', '=', "1")
                ->where('default_videos.approve', '=', "1")
                ->pluck('id');


        $video = DB::table('default_videos')
                ->Join('users', 'default_videos.user_id', '=', 'users.id')
                ->select('default_videos.video_file', 'default_videos.youtube_id', 'default_videos.uploaded_to_you_tube', 'default_videos.user_id AS vid', 'default_videos.id AS videoid', 'default_videos.thumbnail', 'default_videos.converted', 'users.*')
                ->where('default_videos.user_id', '=', $user)
                ->where('default_videos.video_type', '=', "1")
                ->where('default_videos.approve', '=', "1")
                ->get();

        if (Auth::check()) {
            $visitor = Auth::user()->id;
        } else {
            $visitor = $_SERVER['REMOTE_ADDR'];
        }
        $likes = DB::table('likes')
                ->where('video_id', $vid_id)
                ->where('user', $visitor)
                ->pluck('status');
        if ($likes == "") {
            $like = "Like";
        } else {
            $like = "Liked";
        }

        $likeval = DB::table('likes')
                ->where('video_id', $vid_id)
                ->count();
        $comment = DB::table('comments')
                ->leftJoin('users', 'comments.user_id', '=', 'users.id')
                ->select('users.name', 'users.profile_pic', 'comments.comment', 'comments.user_id', 'comments.id', 'comments.guest_email', 'comments.guest_name', 'comments.created_at')
                ->where('comments.video_id', '=', $vid_id)
                ->where('comments.approved', '=', 1)
                ->where('comments.type', '=', 'default')
                ->where('comments.status', '=', '1')
                ->orderBy('comments.created_at', 'desc')
                ->get();

        $commentval = DB::table('comments')
                ->where('video_id', $vid_id)
                ->where('approved', '=', 1)
                ->where('status', '=', 1)
                ->where('comments.type', '=', 'default')
                ->count();
        $view = DB::table('views')
                ->where('video_id', $vid_id)
                ->pluck('view_count');
        if (isset($vid_id)) {
            if ($view == "") {
                $count = DB::table('views')
                        ->insert(
                        array('video_id' => $vid_id, 'view_count' => 1)
                );
            } else {
                $view++;
                $count = DB::table('views')
                        ->where('video_id', $vid_id)
                        ->update(
                        array('view_count' => $view));
            }
        }


        $popular = DB::table('default_videos')
                ->Join('users', 'default_videos.user_id', '=', 'users.id')
                ->Join('views', 'default_videos.id', '=', 'views.video_id')
//                              ->where('default_videos.sequence', '=','1')
                ->where('default_videos.approve', '=', '1')
                ->select('default_videos.thumbnail', 'default_videos.video_file', 'users.category', 'users.name', 'users.id', 'default_videos.id AS vid', 'views.view_count AS count')
                ->orderBy('views.view_count', 'desc')
                ->get();
        $images = DB::table('model_images')
                ->select('model_images.*')
                ->where('model_images.user_id', $user)
                ->where('model_images.approve', 1)
                ->orderBy('model_images.sequence', 'desc')
                ->distinct()
                ->get();


        $sql = DB::table('default_videos')
                ->where('default_videos.sequence', '=', "2")
                ->where('default_videos.user_id', '=', $user)
                ->where('default_videos.approve', '=', "1")
                ->get();
        //return View::make('videos.image_prot',compact('video','popular','images','sql'));
        return View::make('videos.image_prot', compact('user_name', 'video', 'like', 'likeval', 'comment', 'commentval', 'popular', 'images', 'sql', '$vid_id'));
    }

    public function fileupload($id) {
        $sequence = $id;
        if ($sequence == 1) {
            $type = "1";
        } else {
            $type = "0";
        }
        $input = Input::all();
        $file = Input::file('files');
        $org_name = $file[0]->getClientOriginalName();
        $org_name = preg_replace("/[^A-Za-z0-9\.]/", '', $org_name);
        $new_name = uniqid(time()) . $org_name;
        //$new_name = str_replace(" ", '_', $new_name);
        $path = $file[0]->move('assets/event_video', $new_name);
        shell_exec("chmod 644 $path");
        $size = '264x146';
        $base_path = Config::get('app.base_path_project');
        $thumbnail = shell_exec("ffmpeg -i $base_path/public/assets/event_video/$new_name -ss 00:00:05 -f image2 -vframes 1 $base_path/public/assets/thumbnails/$new_name.png");

        // Thumbnail resizing 
        $inFile = $base_path . "public/assets/thumbnails/" . $new_name . ".png";
        $outFile_l = $base_path . "public/assets/thumbnails/player_" . $new_name . ".png";
        $this->create_thumbnails(600, 500, $inFile, $outFile_l);
        $this->create_thumbnails(316, 250, $inFile, $inFile);

        // end of resizing
        //$sql = DB::table('default_videos')->insert(
        //		array('user_id'=>Auth::user()->id,'video_file' => $new_name, 'thumbnail' => $new_name.".png",'sequence' => $sequence,'video_type' => $type)
//					);
        $vid = new Defaultvideo;
        $vid->user_id = Auth::user()->id;
        $vid->video_file = $new_name;
        $vid->thumbnail = $new_name . ".png";
        $vid->sequence = $sequence;
        $vid->video_type = $type;
        $vid->converted = 0;
        $vid->approve = 0;
        $vid->status = 1;
        $vid->save();

        $command_text = 'python ' . Config::get('app.celery_location') . 'main.py ' . $vid->id . ' default_videos video_file';
        $command = escapeshellcmd($command_text);
        $output = shell_exec($command);


        echo "sucess";
    }

    public function imageupload($id) {
        $sequence = $id;
        $input = Input::all();
        $file = Input::file('images');
        $org_name = $file[0]->getClientOriginalName();
        $new_name = uniqid(time()) . $org_name;
        $new_name = str_replace(" ", '_', $new_name);
        $path = $file[0]->move('assets/protofolio', $new_name);
        $base_path = Config::get('app.base_path_project');
        $inFile = $base_path . "public/assets/protofolio/" . $new_name;
        $outFile_s = $base_path . "public/assets/protofolio/small_" . $new_name;
        $outFile_n = $base_path . "public/assets/protofolio/normal_" . $new_name;
        $outFile_sl = $base_path . "public/assets/protofolio/slider_" . $new_name;
        $outFile_real = $base_path . "public/assets/protofolio/real_" . $new_name;
        $image = new Imagick($inFile);

        $geo = $image->getImageGeometry();
        $fact = 650 / $geo['width'];
        $width_1 = 650;
        $height_1 = $geo['height'] * $fact;
        $this->create_thumbnails($width_1, $height_1, $inFile, $outFile_real);
        $this->create_thumbnails(332, 442, $inFile, $outFile_n);
        $this->create_thumbnails(178, 122, $inFile, $outFile_s);
        $this->create_thumbnails(650, 500, $inFile, $outFile_sl);

        shell_exec("chmod 644 $path");
        $sql = DB::table('model_images')->insert(
                array('user_id' => Auth::user()->id, 'image_file' => $new_name, 'sequence' => $sequence)
        );
    }

    public function upload_data() {

        $input = Input::all();

        if (Input::hasFile('up_data')) {
            $mime = Input::file('up_data')->getMimeType();
            $type_data = explode("/", $mime);
            if ($type_data[0] == 'image') {
                $file = Input::file('up_data');
                $org_name = $file->getClientOriginalName();
                $new_name = uniqid(time()) . $org_name;
                $new_name = str_replace(" ", '_', $new_name);
                $destinationPath = public_path() . '/assets/protofolio';
                $path = $file->move($destinationPath, $new_name);
                shell_exec("chmod 644 $path");
                $base_path = Config::get('app.base_path_project');
                $inFile = $base_path . "public/assets/protofolio/" . $new_name;
                $outFile_s = $base_path . "public/assets/protofolio/small_" . $new_name;
                $outFile_n = $base_path . "public/assets/protofolio/normal_" . $new_name;
                $outFile_sl = $base_path . "public/assets/protofolio/slider_" . $new_name;
                $outFile_real = $base_path . "public/assets/protofolio/real_" . $new_name;
                $image = new Imagick($inFile);
                $geo = $image->getImageGeometry();
                $fact = 650 / $geo['width'];
                $width_1 = 650;
                $height_1 = $geo['height'] * $fact;
                $this->create_thumbnails($width_1, $height_1, $inFile, $outFile_real);
                $this->create_thumbnails(332, 442, $inFile, $outFile_n);
                $this->create_thumbnails(178, 122, $inFile, $outFile_s);
                $this->create_thumbnails(650, 500, $inFile, $outFile_sl);
                $sql = DB::table('model_images')
                        ->insert(array('user_id' => Auth::user()->id, 'image_file' => $new_name, 'sequence' => 3, 'text' => $input['descri'], 'page' => $input['pagetype'], 'approve' => 1, 'created_at' => date("Y-m-d H:i:s")));
                return Redirect::back();
            }
        }





        if (Input::hasFile('up_data')) {
            $mime = Input::file('up_data')->getMimeType();
            $type_data = explode("/", $mime);
            if ($type_data[0] == 'video') {
                $sequence = 3;
                if ($sequence == 1) {
                    $type = "1";
                } else {
                    $type = "0";
                }
                $input = Input::all();
                $file = Input::file('up_data');
                $org_name = $file->getClientOriginalName();
                $org_name = preg_replace("/[^A-Za-z0-9\.]/", '', $org_name);
                $new_name = uniqid(time()) . $org_name;
                //$new_name = str_replace(" ", '_', $new_name);
                $path = $file->move('assets/event_video', $new_name);
                shell_exec("chmod 644 $path");
                $size = '264x146';
                $base_path = Config::get('app.base_path_project');
                $thumbnail = shell_exec("ffmpeg -i $base_path/public/assets/event_video/$new_name -ss 00:00:05 -f image2 -vframes 1 $base_path/public/assets/thumbnails/$new_name.png");

                // Thumbnail resizing 
                $inFile = $base_path . "public/assets/thumbnails/" . $new_name . ".png";
                $outFile_l = $base_path . "public/assets/thumbnails/player_" . $new_name . ".png";
                $this->create_thumbnails(600, 500, $inFile, $outFile_l);
                $this->create_thumbnails(316, 250, $inFile, $inFile);
                $vid = new Defaultvideo;
                $vid->user_id = Auth::user()->id;
                $vid->video_file = $new_name;
                $vid->thumbnail = $new_name . ".png";
                $vid->sequence = $sequence;
                $vid->video_type = $type;
                $vid->text = $input['descri'];
                $vid->page = $input['pagetype'];
                $vid->converted = 0;
                $vid->approve = 1;
                $vid->status = 1;
                $vid->save();
                $celery_check = 'cd /var/www/audition_cron;screen -ls | grep youtube_upload &> /dev/null; echo $?';
                $output_celery_check = shell_exec($celery_check);
                if ($output_celery_check == 0) {
                    $command_text = 'python ' . Config::get('app.celery_location') . 'main.py ' . $vid->id . ' default_videos video_file';
                    $command = escapeshellcmd($command_text);
                    $output = shell_exec($command);
                } else {

                    echo "celery not working";
                    // $command_text  = 'python '.Config::get('app.celery_location').'main.py '.$vid->id.' default_videos video_file';
                }


                echo "sucess";
            }
        }

        return Redirect::back();
    }

    public function set_post_images($uploaded_file, $file_ext) {


        $new_name = $uploaded_file . '.' . $file_ext;
        $created_file_path = "../public/uploads/" . $uploaded_file;
        $new_file_path = "../public/assets/protofolio/" . $new_name;
        rename($created_file_path, $new_file_path);
        shell_exec("chmod 644 $new_file_path");

        $inFile = "../public/assets/protofolio/" . $new_name;
        $outFile_s = "../public/assets/protofolio/small_" . $new_name;
        $outFile_n = "../public/assets/protofolio/normal_" . $new_name;
        $outFile_sl = "../public/assets/protofolio/slider_" . $new_name;
        $outFile_real = "../public/assets/protofolio/real_" . $new_name;
        $image = new Imagick($inFile);
        $geo = $image->getImageGeometry();
        $fact = 650 / $geo['width'];
        $width_1 = 650;
        $height_1 = $geo['height'] * $fact;
        $this->create_thumbnails($width_1, $height_1, $inFile, $outFile_real);
        $this->create_thumbnails(332, 442, $inFile, $outFile_n);
        $this->create_thumbnails(178, 122, $inFile, $outFile_s);
        $this->create_thumbnails(650, 500, $inFile, $outFile_sl);

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $name = Auth::user()->name;
            $profile_pic = Auth::user()->profile_pic;
        } else {
            // for test
            $user_id = '291';
            $name = 'testuser10';
            $profile_pic = '';
        }



        $result = array(
            'user_id' => $user_id,
            'name' => $name,
            'profile_pic' => $profile_pic,
            'profile_url' => url('view_user_profile') . '/' . $user_id,
            'image_url_slider' => url('assets/protofolio') . '/slider_' . $new_name,
            'post_preview' => url('assets/protofolio') . '/small_' . $new_name,
            "post_type" => 'image',
            "file" => $new_name
        );

        return $result;
    }

    public function set_post_video($uploaded_file, $file_ext) {


        $new_name = $uploaded_file . '.' . $file_ext;
        $created_file_path = "../public/uploads/" . $uploaded_file;
        $new_file_path = "../public/assets/event_video/" . $new_name;
        $new_file_thumb_path = "../public/assets/thumbnails/" . $uploaded_file . ".png";
        rename($created_file_path, $new_file_path);
        shell_exec("chmod 644 $new_file_path");

        $size = '264x146';
        $base_path = Config::get('app.base_path_project');
        $thumbnail = shell_exec("ffmpeg -i $new_file_path -ss 00:00:05 -f image2 -vframes 1 $new_file_thumb_path");


        // Thumbnail resizing 
        $inFile = $new_file_thumb_path;
        $outFile_l = "../public/assets/thumbnails/player_" . $uploaded_file . ".png";
        $this->create_thumbnails(600, 500, $inFile, $outFile_l);
        $this->create_thumbnails(316, 250, $inFile, $inFile);
        

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $name = Auth::user()->name;
            $profile_pic = Auth::user()->profile_pic;
        } else {
            // for local test
            $user_id = '291';
            $name = 'testuser10';
            $profile_pic = '';
        }

        $result = array(
            'user_id' => $user_id,
            'name' => $name,
            'profile_pic' => $profile_pic,
            'profile_url' => url('view_user_profile') . '/' . $user_id,
            'post_preview' => url('assets/thumbnails') . '/' . $uploaded_file . '.png',
            'post_video_url' => url('assets/event_video') . '/' . $new_name,
            "post_type" => 'video',
            "file" => $new_name
        );



        return $result;
    }

    public function ajax_insert_post() {



        $input = Input::all();

        // @todo remove 291
        $user_id = (Auth::check()) ? Auth::user()->id : 291;

        if ($input['post_type'] == 'image') {
            $post_id = DB::table('model_images')->insertGetId(
                    array(
                        'user_id' => $user_id,
                        'image_file' => $input['file'],
                        'sequence' => 3,
                        'text' => $input['post_content'],
                        'page' => 'feed',
                        'approve' => 1,
                        'created_at' => date("Y-m-d H:i:s")
                    )
            );
        }

        if ($input['post_type'] == 'video') {

            $vid = new Defaultvideo;
            $vid->user_id = $user_id;
            $vid->video_file = $input['file'];
            $vid->thumbnail = basename($input['post_preview']);
            $vid->sequence = 3;
            $vid->video_type = 0;
            $vid->text = $input['post_content'];
            $vid->page = 'feed';
            $vid->converted = 0;
            $vid->approve = 1;
            $vid->status = 1;
            $vid->save();

            $post_id = $vid->id;

            $celery_check = 'cd /var/www/audition_cron;screen -ls | grep youtube_upload &> /dev/null; echo $?';
            $output_celery_check = shell_exec($celery_check);
            if ($output_celery_check == 0) {
                $command_text = 'python ' . Config::get('app.celery_location') . 'main.py ' . $vid->id . ' default_videos video_file';
                $command = escapeshellcmd($command_text);
                $output = shell_exec($command);
            } else {
                $result = array('status' => 'invalid', "message" => "celery not working");
                echo json_encode($result);
                die();
                // $command_text  = 'python '.Config::get('app.celery_location').'main.py '.$vid->id.' default_videos video_file';
            }
        }


        $result = array(
            'status' => 'valid',
            'post_id' => $post_id,
            'data_href' => url('talents') . '/' . $post_id,
        );

        echo json_encode($result);
        die();
    }

    public function real_img() {
        $images = DB::table('model_images')
                ->select('model_images.*')
                ->get();
        $base_path = Config::get('app.base_path_project');
        foreach ($images as $value) {
            $inFile = $base_path . "public/assets/protofolio/" . $value->image_file;

            shell_exec("chmod 777 $inFile");

            $outFile_real = $base_path . "public/assets/protofolio/real_" . $value->image_file;
            $image = new Imagick($inFile);

            $geo = $image->getImageGeometry();
            $fact = 650 / $geo['width'];
            $width_1 = 650;
            $height_1 = $geo['height'] * $fact;
            $this->create_thumbnails($width_1, $height_1, $inFile, $outFile_real);
        }
        echo "finished";
    }

    public function create_thumbnails($width, $height, $inFile, $outFile) {
        $half_width = $width / 2;
        $half_height = $height / 2;
        $image = new Imagick($inFile);

        $geo = $image->getImageGeometry();
        $width_1 = $geo['width'];
        $height_1 = $geo['height'];
        $image->scaleImage(0, $height);
        $geo11 = $image->getImageGeometry();
        if ($geo11['width'] >= $width) {


            $x = $geo11['width'] / 2 - $half_width;
            $image->cropImage($width, $height, $x, 0);
            $image->writeImage($outFile);
        } else {
            $image->scaleImage($width, 0);
            $geo1 = $image->getImageGeometry();
            $y = $geo1['height'] / 2 - $half_height;
            $image->cropImage($width, $height, 0, $y);
            $image->writeImage($outFile);
        }
        //chmod($outFile, 755);
        shell_exec("chmod 755 $outFile");
    }

    public function delete_video($id) {


        $video_file = DB::table('default_videos')->where('id', $id)->pluck('video_file');
        $thumbnail = DB::table('default_videos')->where('id', $id)->pluck('thumbnail');

        $path = Config::get('app.base_path_project') . "/public/assets/event_video/$video_file";
        $path_thumb = Config::get('app.base_path_project') . "/public/assets/thumbnails/$thumbnail";
        $path_thumb_p = Config::get('app.base_path_project') . "/public/assets/thumbnails/player_$thumbnail";
        //File::delete($path);
        File::delete($path_thumb);
        File::delete($path_thumb_p);
        DB::table('default_videos')->where('id', '=', $id)->delete();
        //echo "success";die();

        return Redirect::back();
    }

    public function delete_myvideo($id) {


        $video_file = DB::table('default_videos')->where('id', $id)->pluck('video_file');
        $thumbnail = DB::table('default_videos')->where('id', $id)->pluck('thumbnail');

        $path = Config::get('app.base_path_project') . "/public/assets/event_video/$video_file";
        $path_thumb = Config::get('app.base_path_project') . "/public/assets/thumbnails/$thumbnail";
        $path_thumb_p = Config::get('app.base_path_project') . "/public/assets/thumbnails/player_$thumbnail";
        //File::delete($path);
        File::delete($path_thumb);
        File::delete($path_thumb_p);
        DB::table('default_videos')->where('id', '=', $id)->delete();
        //echo "success";die();

        return Redirect::back();
    }

    public function ajax_delete_myvideo($id) {


        $video_file = DB::table('default_videos')->where('id', $id)->pluck('video_file');
        $thumbnail = DB::table('default_videos')->where('id', $id)->pluck('thumbnail');

        $path = Config::get('app.base_path_project') . "/public/assets/event_video/$video_file";
        $path_thumb = Config::get('app.base_path_project') . "/public/assets/thumbnails/$thumbnail";
        $path_thumb_p = Config::get('app.base_path_project') . "/public/assets/thumbnails/player_$thumbnail";
        //File::delete($path);
        File::delete($path_thumb);
        File::delete($path_thumb_p);
        DB::table('default_videos')->where('id', '=', $id)->delete();

        $response = array(
            'status' => "valid",
        );
        echo json_encode($response);
        die();
    }

    public function delete_image() {
        $input = Input::all();
        $thumbnail = DB::table('model_images')->where('id', $input['id'])->pluck('image_file');
        $path = Config::get('app.base_path_project') . "/public/assets/protofolio/$thumbnail";
        $path_small = Config::get('app.base_path_project') . "/public/assets/protofolio/small_$thumbnail";
        $path_slider = Config::get('app.base_path_project') . "/public/assets/protofolio/slider_$thumbnail";
        $path_real = Config::get('app.base_path_project') . "/public/assets/protofolio/real_$thumbnail";
        $path_normal = Config::get('app.base_path_project') . "/public/assets/protofolio/normal_$thumbnail";
        File::delete($path);
        File::delete($path_small);
        File::delete($path_slider);
        File::delete($path_real);
        File::delete($path_normal);
        DB::table('model_images')->where('id', '=', $input['id'])->delete();
        echo "success";
        die();
    }

    public function delete_myimage($id) {

        $thumbnail = DB::table('model_images')->where('id', $id)->pluck('image_file');
        $path = Config::get('app.base_path_project') . "/public/assets/protofolio/$thumbnail";
        $path_small = Config::get('app.base_path_project') . "/public/assets/protofolio/small_$thumbnail";
        $path_slider = Config::get('app.base_path_project') . "/public/assets/protofolio/slider_$thumbnail";
        $path_real = Config::get('app.base_path_project') . "/public/assets/protofolio/real_$thumbnail";
        $path_normal = Config::get('app.base_path_project') . "/public/assets/protofolio/normal_$thumbnail";
        File::delete($path);
        File::delete($path_small);
        File::delete($path_slider);
        File::delete($path_real);
        File::delete($path_normal);
        DB::table('model_images')->where('id', '=', $id)->delete();
        return 'sucess';
    }

    public function ajax_delete_myimage($id) {
        $thumbnail = DB::table('model_images')->where('id', $id)->pluck('image_file');
        $path = Config::get('app.base_path_project') . "/public/assets/protofolio/$thumbnail";
        $path_small = Config::get('app.base_path_project') . "/public/assets/protofolio/small_$thumbnail";
        $path_slider = Config::get('app.base_path_project') . "/public/assets/protofolio/slider_$thumbnail";
        $path_real = Config::get('app.base_path_project') . "/public/assets/protofolio/real_$thumbnail";
        $path_normal = Config::get('app.base_path_project') . "/public/assets/protofolio/normal_$thumbnail";
        File::delete($path);
        File::delete($path_small);
        File::delete($path_slider);
        File::delete($path_real);
        File::delete($path_normal);
        DB::table('model_images')->where('id', '=', $id)->delete();


        $response = array('status' => "valid");
        echo json_encode($response);
        die();
    }

    public function delete_mystatu($id) {

        DB::table('user_status')->where('id', $id)->delete();

        return 'sucess';
    }

    public function ajax_delete_mystatus($id) {
        DB::table('user_status')->where('id', $id)->delete();
        $response = array(
            'status' => "valid",
        );
        echo json_encode($response);
        die();
    }

    public function remove_watchlist($id) {
        $video_file = DB::table('watchlist')->where('id', $id)->delete();
        return Redirect::to('viewlist');
    }

}
