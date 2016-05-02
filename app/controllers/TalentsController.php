<?php

class TalentsController extends BaseController {

    public function talents() {
        $you_tube = DB::table('source')->first();
        $video = DB::table('default_videos')
                ->Join('users', 'default_videos.user_id', '=', 'users.id')
                ->select('default_videos.*', 'users.profile_pic', 'users.name', 'users.id as itemuserid', 'default_videos.id as def_id', 'default_videos.created_at as up_date')
                ->where('default_videos.approve', '=', "1")
                ->where('default_videos.page', '!=', "profile")
                ->orderBy('default_videos.id', 'desc')
//			   ->where('default_videos.video_type','=',"1")
                ->take(4)
                ->skip(0)
                ->get();
        $count = count($video);
        $images = DB::table('model_images')
                ->Join('users', 'model_images.user_id', '=', 'users.id')
                ->select('model_images.*', 'users.*', 'users.id as itemuserid', 'model_images.id as def_id', 'model_images.created_at as up_date')
                // ->where('model_images.sequence','=',"1")
                ->where('model_images.page', '!=', "profile")
                ->orderBy('model_images.id', 'desc')
                ->where('model_images.approve', '=', '1')
                ->take(4)
                ->skip(0)
                ->get();

        $status = DB::table('user_status')
                ->join('users', 'users.id', '=', 'user_status.user_id')
                ->select('users.name', 'users.profile_pic', 'user_status.status', 'users.id as itemuserid', 'user_status.created_at as up_date', 'user_status.id as def_id')
                ->get();

        $new = array();
        $new = array_merge($images, $video, $status);

        shuffle($new);

        //print_r($new);die();
        // die("fhgd");
        /* $actor = DB::table('default_videos')
          ->Join('users', 'default_videos.user_id', '=', 'users.id')
          ->select('default_videos.*','users.profile_pic','users.name')
          ->where('users.category','=',"Actor")
          ->where('default_videos.approve','=',"1")
          ->get();

          $model = DB::table('default_videos')
          ->Join('users', 'default_videos.user_id', '=', 'users.id')
          ->select('default_videos.*','users.profile_pic','users.name')
          ->where('default_videos.approve','=',"1")
          ->where('users.category','=','Model')
          ->get(); */



        return View::make('talents.alltalent', compact('video', 'count', 'new', 'you_tube'));
    }

    function talents_bkp() {

        return View::make('talents.talentsbkp', compact('video', 'count', 'new', 'you_tube'));
    }

    public function talent_details($id) {

        $video = DB::table('default_videos')
                ->Join('users', 'default_videos.user_id', '=', 'users.id')
                ->select('default_videos.*', 'users.profile_pic', 'users.name', 'default_videos.id as def_id', 'users.id as videouser')
                ->where('default_videos.id', '=', $id)
                ->get();



        $comments = DB::table('comments')
                ->join('users', 'users.id', '=', 'comments.user_id')
                ->select('comments.*', 'users.*')
                ->where('video_id', '=', $id)
                ->get();

        foreach ($video as $v) {
            $vrids[] = $v->id;
            $user_right = $v->user_id;
        }


        $video_right = DB::table('default_videos')
                ->Join('users', 'default_videos.user_id', '=', 'users.id')
                ->select('default_videos.*', 'users.profile_pic', 'users.name', 'default_videos.id as def_id', 'users.id as video_userid')
                ->where('users.id', '=', $user_right)
                ->whereNotIn('default_videos.id', $vrids)
                ->orderBy(DB::raw('RAND()'))
                ->take(2)
                ->get();


        return View::make('talents.talentdetails_video', compact('video', 'comments', 'video_right'));
    }

    public function talent_details_images($id) {

        /* $video =  DB::table('model_images')
          ->Join('users', 'model_images.user_id', '=', 'users.id')
          ->select('model_images.*','users.profile_pic','users.name')
          ->where('model_images.id','=',$id)
          ->get(); */


        $video = DB::table('model_images')
                ->Join('users', 'model_images.user_id', '=', 'users.id')
                ->select('model_images.*', 'users.*', 'model_images.id as def_id', 'users.id as videouser')
                ->where('model_images.id', '=', $id)
                ->get();


        $comments = DB::table('comments')
                ->join('users', 'users.id', '=', 'comments.user_id')
                ->select('comments.*', 'users.name')
                ->where('comments.video_id', '=', $id)
                ->where('comments.parent_id', '=', 0)
                ->get();


        foreach ($video as $v) {
            $vrids[] = $v->def_id;
            $user_right = $v->videouser;
        }


        $video_right = DB::table('model_images')
                ->Join('users', 'model_images.user_id', '=', 'users.id')
                ->select('model_images.*', 'users.*', 'model_images.id as def_id', 'users.id as video_userid')
                ->where('users.id', '=', $user_right)
                ->whereNotIn('model_images.id', $vrids)
                ->where('model_images.approve', '=', '1')
                ->orderBy(DB::raw('RAND()'))
                ->take(2)
                ->get();

        return View::make('talents.talentdetails', compact('video', 'comments', 'video_right'));
    }

    public function postcomment() {


        $data = Input::all();
        $comment = new Comment;
        $comment->comment = $data['datavalue'];
        $comment->user_id = $data['userid'];
        $comment->video_id = $data['itemid'];
        $comment->status = 0;
        $comment->approved = 1;
        $comment->type = $data['type'];
        $comment->save();

        $imag = DB::table('users')->where('id', '=', $data['userid'])->lists('profile_pic');
        return $data['datavalue'];
    }

    public function replycomment() {

        $data = Input::all();
        $comment = new Comment;
        $comment->comment = $data['replytext'];
        $comment->user_id = $data['replyuserid'];
        $comment->video_id = $data['videoid'];
        $comment->status = 0;
        $comment->approved = 1;
        $comment->type = 'default';
        $comment->parent_id = $data['commentid'];
        $comment->save();
        return Redirect::back()->withInput();
    }

    public function liketalent() {



        $getlike = DB::table('likes')
                ->where('video_id', '=', $_POST['itemid'])
                ->where('user', '=', $_POST['userid'])
                ->where('type', '=', $_POST['type'])
                ->lists('status');

        if (empty($getlike)) {
            $like = new Like;
            $like->video_id = $_POST['itemid'];
            $like->user = $_POST['userid'];
            $like->type = $_POST['type'];
            $like->status = 1;
            $like->save();
        }

        if (!empty($getlike) && $getlike[0] == 1) {

            DB::table('likes')
                    ->where('video_id', '=', $_POST['itemid'])
                    ->where('user', '=', $_POST['userid'])
                    ->where('type', '=', $_POST['type'])
                    ->update(array('status' => 0));
        }


        if (!empty($getlike) && $getlike[0] == 0) {

            DB::table('likes')
                    ->where('video_id', '=', $_POST['itemid'])
                    ->where('user', '=', $_POST['userid'])
                    ->where('type', '=', $_POST['type'])
                    ->update(array('status' => 1));
        }


        $countlike = DB::table('likes')
                ->where('video_id', '=', $_POST['itemid'])
                ->where('type', '=', $_POST['type'])
                ->where('status', '=', 1)
                ->count();
        return $countlike;
    }

    public function deletetalent($id) {




        DB::table('likes')->where('video_id', '=', $id)->delete();

        DB::table('comments')->where('video_id', '=', $id)->delete();
        DB::table('model_images')->where('id', '=', $id)->delete();
        return Redirect::back()->withInput();
    }

    public function viewitem() {

        $itemid = $_POST['itemid'];


        $count = DB::table('views')->where('video_id', '=', $itemid)
                ->where('type', '=', $_POST['type'])
                ->lists('view_count');

        if (empty($count[0])) {
            $views = new Views;
            $views->video_id = $itemid;
            $views->view_count = 1;
            $views->type = $_POST['type'];
            $views->save();
        } else {

            DB::table('views')->where('video_id', '=', $itemid)->where('type', '=', $_POST['type'])->increment('view_count', 1);
        }

        $countview = DB::table('views')->where('video_id', '=', $itemid)->where('type', '=', $_POST['type'])->lists('view_count');


        return $countview[0];
    }

    public function content() {
        $item_per_page = 16;
        if (!empty($_POST["tab_type"])) {
            $tabtype = $_POST["tab_type"];

            if ($tabtype == "All") {

                $tabtype = "all";
            }
        } else {
            $tabtype = "all";
        }


        $page_number = filter_var($_POST["page"]);
        $position = ($page_number * $item_per_page);
        if ($tabtype != 'Image') {
            $videos = DB::table('default_videos')
                            ->Join('users', 'default_videos.user_id', '=', 'users.id')
                            ->select('default_videos.*', 'users.*', 'default_videos.id as def_id')
//			   ->where('default_videos.video_type','=',"1")
                            ->where('users.category', '!=', $tabtype)
                            ->where('default_videos.approve', '=', '1')
                            ->skip($position)->take($item_per_page);
            if (!empty($_POST["name"])) {
                if ($_POST["name"] != "") {
                    $videos->where('users.name', '=', $_POST["name"]);
                }
            }
            if (!empty($_POST["hair"])) {
                if ($_POST["hair"] != "---Select---") {
                    $videos->where('users.hair', '=', $_POST["hair"]);
                }
            }
            if (!empty($_POST["look"])) {
                if ($_POST["look"] != "---Select---") {
                    $videos->where('users.category', '=', $_POST["look"]);
                }
            }
            if (!empty($_POST["eye"])) {
                if ($_POST["eye"] != "---Select---") {
                    $videos->where('users.eye', '=', $_POST["eye"]);
                }
            }
            if (!empty($_POST["gender"])) {
                if ($_POST["gender"] != "---Select---") {
                    $videos->where('users.gender', '=', $_POST["gender"]);
                }
            }
            if (!empty($_POST["comp"])) {
                if ($_POST["comp"] != "---Select---") {
                    $videos->where('users.color', '=', $_POST["comp"]);
                }
            }
            $video = $videos->get();

            return View::make('talents.content', compact('video'));
        } else {


            $videos = DB::table('model_images')
                            ->Join('users', 'model_images.user_id', '=', 'users.id')
                            ->select('model_images.*', 'users.*', 'model_images.id as def_id')
                            ->where('model_images.sequence', '=', "1")
                            ->where('model_images.approve', '=', '1')
                            ->skip($position)->take($item_per_page);
            if (!empty($_POST["name"])) {
                if ($_POST["name"] != "") {
                    $videos->where('users.name', '=', $_POST["name"]);
                }
            }
            if (!empty($_POST["hair"])) {
                if ($_POST["hair"] != "---Select---") {
                    $videos->where('users.hair', '=', $_POST["hair"]);
                }
            }
            if (!empty($_POST["look"])) {
                if ($_POST["look"] != "---Select---") {
                    $videos->where('users.category', '=', $_POST["look"]);
                }
            }
            if (!empty($_POST["eye"])) {
                if ($_POST["eye"] != "---Select---") {
                    $videos->where('users.eye', '=', $_POST["eye"]);
                }
            }
            if (!empty($_POST["gender"])) {
                if ($_POST["gender"] != "---Select---") {
                    $videos->where('users.gender', '=', $_POST["gender"]);
                }
            }
            if (!empty($_POST["comp"])) {
                if ($_POST["comp"] != "---Select---") {
                    $videos->where('users.color', '=', $_POST["comp"]);
                }
            }
            $video = $videos->get();
            return View::make('talents.content_img', compact('video'));
        }
    }

    public function fetch_protfoli_img() {
        $item_per_page = 16;
        $page_number = filter_var($_POST["page"]);
        $position = ($page_number * $item_per_page);
        $videos = DB::table('default_videos')
                        ->Join('users', 'default_videos.user_id', '=', 'users.id')
                        ->select('default_videos.*', 'users.*', 'default_videos.id as def_id')
                        ->where('default_videos.video_type', '=', "1")
                        ->where('default_videos.approve', '=', '1')
                        ->skip($position)->take($item_per_page);
        $video = $videos->get();
    }

    public function fetch_data() {


        $you_tube = DB::table('source')->first();
        $page_num = $_GET['page'];
        $pos = $page_num * 4;
        $video = DB::table('default_videos')
                ->Join('users', 'default_videos.user_id', '=', 'users.id')
                ->select('default_videos.*', 'users.profile_pic', 'users.name', 'users.id as itemuserid', 'default_videos.created_at as up_date', 'default_videos.id as def_id')
                ->where('default_videos.approve', '=', "1")
                ->orderBy('default_videos.id', 'desc')
//                         ->where('default_videos.video_type','=',"1")
                ->take(4)
                ->skip($pos)
                ->get();

        $count = count($video);
        $images = DB::table('model_images')
                ->Join('users', 'model_images.user_id', '=', 'users.id')
                ->select('model_images.*', 'users.*', 'model_images.id as def_id', 'users.id as itemuserid', 'model_images.created_at as up_date')
                // ->where('model_images.sequence','=',"1")
                ->where('model_images.approve', '=', '1')
                ->take(4)
                ->skip($pos)
                ->orderBy('model_images.id', 'desc')
                ->get();


        $status = DB::table('user_status')
                ->join('users', 'users.id', '=', 'user_status.user_id')
                ->select('users.name', 'users.profile_pic', 'user_status.status', 'users.id as itemuserid', 'user_status.created_at as up_date', 'user_status.id as def_id')
                ->skip($pos)->take(4)
                ->get();



        $new = array();
        $new = array_merge($images, $video, $status);

        shuffle($new);
        $count = count($new);
        if ($count > 0) {
            return View::make('talents.fetch_data', compact('new', 'you_tube'));
        } else {
            echo "No More Data To Load.";
        }
    }

    public function report_item() {

        $spam = new Spamitems;
        $spam->itemid = $_REQUEST['itemid'];
        $spam->reson = $_REQUEST['reson'];
        $spam->type = $_REQUEST['type'];
        $spam->save();
        return $spam->id;
    }

    public function spam_videos() {

        $video = DB::table('spam_items')
                ->Join('default_videos', 'default_videos.id', '=', 'spam_items.itemid')
                ->join('users', 'default_videos.user_id', '=', 'users.id')
                ->select('default_videos.*', 'spam_items.*', 'users.name as username')
                ->where('spam_items.type', '=', 'video')
                ->orderBy('spam_items.id', 'desc')
                ->paginate(5);


        return View::make('manages.spamvideos', compact('video'));
    }

    public function spam_images() {

        $image = DB::table('spam_items')
                ->Join('model_images', 'model_images.id', '=', 'spam_items.itemid')
                ->join('users', 'model_images.user_id', '=', 'users.id')
                ->select('model_images.*', 'spam_items.*', 'users.name as username')
                ->where('spam_items.type', '=', 'image')
                ->orderBy('spam_items.id', 'desc')
                ->paginate(5);

        return View::make('manages.spamimages', compact('image'));
    }

    public function shareitem($id) {

        $share = new SharedPost;
        $share->user_id = Auth::id();
        $share->audition_id = $id;
        $share->save();
        return "sucess";
    }

    public function addUserstatus() {
        $data = Input::all();

        $stat = new UserStatus;
        $stat->user_id = Auth::id();
        $stat->status = $data['ustatus'];
        $stat->save();
        return Redirect::back();
    }

    public function ajax_addUserstatus() {
        $data = Input::all();

        $stat = new UserStatus;
        $stat->user_id = Auth::id();
        $stat->status = $data['ustatus'];
        $stat->save();

        $result = array(
            'user_id' => $stat->user_id,
            'status_id' => $stat->id,
            'status' => $stat->status,
            'name' => Auth::user()->name,
            'profile_pic' => Auth::user()->profile_pic,
        );

        echo json_encode($result);

        die();
    }

}
