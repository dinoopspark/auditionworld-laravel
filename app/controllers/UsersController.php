<?php

class UsersController extends BaseController {

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function adminsettings() {

        return View::make('users.adminsettings');
    }

    public function adminpasswordchange() {


        return View::make('users.adminpasswordchange');
    }

    public function updateadmin() {


        $input = Input::all();


        $validator = Validator::make(Input::all(), array(
                    'email' => 'required|email|unique:users'
                        )
        );


        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator)->withInput();
        } else {


            DB::table('users')
                    ->where('user_type', 'admin')
                    ->update(array('email' => $input['email']));
            return Redirect::back()->with('message', 'Email changed sucessfully');
        }
    }

    public function adminupdatepassword() {

        $type = Auth::user()->user_type;
        $id = Auth::id();

        $input = Input::all();


        $validator = Validator::make(Input::all(), array(
                    'password' => 'required'
                        )
        );


        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator)->withInput();
        } else {

            $hpassword = Hash::make($input['password']);

            DB::table('users')
                    ->where('user_type', 'admin')
                    ->update(array('password' => $hpassword));
            return Redirect::back()->with('message', 'Password changed sucessfully');
        }
    }

    public function index() {

        if (!empty($_REQUEST['type'])) {



            $id = $_REQUEST['type'];
            if ($id == 2) {

                $type = "Audition Manager";
            }
            if ($id == 3) {

                $type = "user";
            }

            $users = DB::table('users')
                    ->where('user_type', '=', $type)
                    ->paginate(10);
            return View::make('users.index', compact('users'));
        } else {

            $users = DB::table('users')
                    ->paginate(10);
            return View::make('users.index', compact('users'));
        }
    }

    public function create() {


        $roles = DB::table('roles')->lists('name', 'name');
        // print_r($roles);
        // die("sdf");
        return View::make('users.create', compact('roles'));
    }

    public function store() {


        $input = array_except(Input::all(), array('_token', 'confirm', 'day', 'month', 'year'));



        $password = Hash::make(Input::get('password'));
        $rules = array(
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
        );
        $validation = Validator::make($input, $rules);
        $input['password'] = $password;
        if (empty($input['user_type'])) {
            $input['user_type'] = "user";
        }
        if (!empty($input['password_confirm'])) {
            unset($input['password_confirm']);
        }
        if ($validation->passes()) {


            if (isset($input['profile_pic'])) {
                $file = Input::file('profile_pic');
                $org_name = $file->getClientOriginalName();
                $new_name = uniqid(time()) . $org_name;
                $new_name = str_replace(" ", '_', $new_name);
                $path = $file->move('assets/profile', $new_name);
                shell_exec("chmod 644 $path");
                $input['profile_pic'] = $new_name;
                $base_path = Config::get('app.base_path_project');
                $inFile = $base_path . "public/assets/profile/" . $new_name;
                $outFile_s = $base_path . "public/assets/profile/small_" . $new_name;
                $outFile_n = $base_path . "public/assets/profile/normal_" . $new_name;
                $this->create_thumbnails(38, 40, $inFile, $outFile_s);
                $this->create_thumbnails(208, 208, $inFile, $outFile_n);
            }



            $uid = $this->user->create($input);

            // Mail::send('emails.register', $input, function($message) {
            // 	$message->setSender(array('jismi.jose@sparksupport.com' => 'Jismi'));
            // 				 $message->to('jismi.jose@sparksupport.com', 'Jismi')
            //  			->subject('Register!');
            // });

            $this->verify($uid->id);
            if (Auth::check()) {
                if (Auth::user()->id == "1") {
                    return Redirect::to('/users');
                }
            } else {
                //die("created");
                // return Redirect::to($_SERVER['HTTP_REFERER']);
                return Redirect::to('/')->with('message', 'Please check your email to complete the registration !');

                //return Redirect::back();
            }
        } else {
            $messages = $validation->messages();


            if ($messages->first('email')) {
                $errmsg = "error email";
                return Redirect::to('/')->with('message', 'Email already exist !')->withInput();
            } else {
                $errmsg = "error phone";
                return Redirect::to('/')->with('message', 'Phone number already taken!')->withInput();
            }
        }
    }

    /** start Sign up for mobile app */
    public function storeForMob() {


        //die("sucessfully connected");

        $input = array_except(Input::all(), array('_token', 'confirm', 'day', 'month', 'year'));
        $password = Hash::make(Input::get('password'));

        $rules = array(
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
        );
        $validation = Validator::make($input, $rules);
        $input['password'] = $password;
        if (empty($input['user_type'])) {
            $input['user_type'] = "user";
        }
        if (!empty($input['password_confirm'])) {
            unset($input['password_confirm']);
        }

        if ($validation->passes()) {


            if (isset($input['profile_pic'])) {
                $file = Input::file('profile_pic');
                $org_name = $file->getClientOriginalName();
                $new_name = uniqid(time()) . $org_name;
                $new_name = str_replace(" ", '_', $new_name);
                $path = $file->move('assets/profile', $new_name);
                shell_exec("chmod 644 $path");
                $input['profile_pic'] = $new_name;
                $base_path = Config::get('app.base_path_project');
                $inFile = $base_path . "public/assets/profile/" . $new_name;
                $outFile_s = $base_path . "public/assets/profile/small_" . $new_name;
                $outFile_n = $base_path . "public/assets/profile/normal_" . $new_name;
                $this->create_thumbnails(38, 40, $inFile, $outFile_s);
                $this->create_thumbnails(208, 208, $inFile, $outFile_n);
            }


            $input['verified'] = 1;


            $uid = $this->user->create($input);

            // Mail::send('emails.register', $input, function($message) {
            // 	$message->setSender(array('jismi.jose@sparksupport.com' => 'Jismi'));
            // 				 $message->to('jismi.jose@sparksupport.com', 'Jismi')
            //  			->subject('Register!');
            // });
            // $this->verify($uid->id);
            // if(Auth::check()){
            // 	if(Auth::user()->id=="1"){
            // 					return Redirect::to('/users');
            // 	}
            // }else{
            // 			//die("created");
            // 			// return Redirect::to($_SERVER['HTTP_REFERER']);
            // 	return Redirect::to('/')->with('message','Please check your email to complete the registration !');
            // 	//return Redirect::back();
            // }
            $arr = array('status' => 'valid', 'id' => $uid->id);
            echo json_encode($arr);
            die();
        } else {
            $messages = $validation->messages();


            if ($messages->first('email')) {
                //$errmsg= "error email";
                //return Redirect::to('/')->with('message','Email already exist !')->withInput();
                $arr = array('status' => 'invalid', 'message' => 'Email already exist !');
                echo json_encode($arr);
                die();
            } else {
                //$errmsg="error phone";
                //return Redirect::to('/')->with('message','Phone number already taken!')->withInput();
                $arr = array('status' => 'invalid', 'message' => 'Phone number already taken!');
                echo json_encode($arr);
                die();
            }
        }
    }

    /* End sign up mobile app */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $user = $this->user->findOrFail($id);

        return View::make('users.show', compact('user'));
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

        shell_exec("chmod 755 $outFile");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $user = $this->user->find($id);

        if (is_null($user)) {
            return Redirect::route('user');
        }

        return View::make('users.edit', compact('user'));
    }

    public function communicate_user($id) {
        $user = $this->user->find($id);

        if (is_null($user)) {
            return Redirect::route('user');
        }

        return View::make('users.communicate_user', compact('user'));
    }

    public function send_mail_user() {

        $input = Input::all();
        $user = $this->user->find($input['id']);

        $input['email'] = $user->email;
        $input['text'] = $input['message'];
        Mail::send('emails.communicate_user', $input, function($message) use ($input) {
            $message->setSender(array('admin@auditionworld.tv' => 'Admin'));
            $message->to($input['email'], 'Info')
                    ->subject('FYI');
        });
        return Redirect::to('users');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $input = array_except(Input::all(), array('_method', '_token'));
        $validation = Validator::make($input, User::$updaterules);

        if ($validation->passes()) {
            $user = $this->user->find($id);
            $user->update($input);

            return Redirect::to('users');
        }

        return Redirect::route('users.edit', $id)
                        ->withInput()
                        ->withErrors($validation)
                        ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $this->user->find($id)->delete();

        return Redirect::route('users.index');
    }

    public function welcome() {
        $events = DB::table('audition_events')
                ->where('date', '>=', date('Y-m-d'))
                ->get();

        $video = DB::table('videos')
                ->Join('users', 'videos.user_id', '=', 'users.id')
                ->Join('views', 'videos.id', '=', 'views.video_id')
                ->select('videos.thumbnail', 'videos.video_file', 'users.category', 'users.name', 'users.id', 'videos.id AS vid')
                ->orderBy('views.view_count', 'desc')
                ->take(6)
                ->get();
        return View::make('users.welcome', compact('events', 'video'));
    }

    public function authenticate() {
        $input = Input::all();
        $rules = array('email' => 'required', 'password' => 'required');
        $validation = Validator::make($input, $rules);
        if ($validation->passes()) {
            $authentication = array('email' => $input['email'], 'password' => $input['password'], 'verified' => 1);
            if (Auth::attempt($authentication)) {
                $user = Auth::user()->id;
                $log = Auth::user()->log_count;
                $usrtype = Auth::user()->user_type;
                $arr = array("id" => $user, "log_count" => $log, "user" => $usrtype, "status" => 'valid');
                echo json_encode($arr);
            } else {
                $arr = array("status" => "invalid");
                echo json_encode($arr);
            }
        } else {
            echo "enter details";
        }
    }

//start-for mobile
    public function authenticatemob() {
        $input = Input::all();
        $rules = array('email' => 'required', 'password' => 'required');
        $validation = Validator::make($input, $rules);
        if ($validation->passes()) {
            $authentication = array('email' => $input['email'], 'password' => $input['password'], 'verified' => 1);
            if (Auth::attempt($authentication)) {
                $user = Auth::user()->id;
                $log = Auth::user()->log_count;
                $usrtype = Auth::user()->user_type;
                $arr = array("id" => $user, "log_count" => $log, "user" => $usrtype, "status" => 'valid');
                echo json_encode($arr);
            } else {
                $arr = array("status" => "invalid");
                echo json_encode($arr);
            }
        } else {
            echo "enter details";
        }
    }

//end-for mobile	




    public function fblogin() {

        $userid = DB::table('users')
                ->where('email', '=', $_POST['fbemail'])
                ->pluck('id');
        if (!empty($userid)) {
            Auth::loginUsingId($userid);
            return $userid;
        } else {

            return 0;
        }
    }

    public function Message() {
        //die("jissmi");
        return View::make('users.message');
    }

    public function logout() {
        Auth::logout();
        return Redirect::to('/');
    }

    public function profile() {
        $log_count = DB::table('users')
                ->where('users.id', '=', Auth::user()->id)
                ->update(array('log_count' => 1));

        if (Auth::user()->user_type == "user") {
            /* $users = DB::table('users')
              ->join('categories', function($join)
              {
              $join->on('users.category', '=', 'categories.name')
              ->where('users.id','=',Auth::user()->id);
              })
              ->select('users.*','categories.name AS cat')
              ->first(); */
            $users = DB::table('users')
                    ->where('users.id', '=', Auth::user()->id)
                    ->first();
        } else {
            $users = DB::table('users')
                    ->where('users.id', '=', Auth::user()->id)
                    ->first();
        }
        $sample_videos = "";
        if (Auth::user()->category == "Actor") {
            $sample_videos = DB::table('default_videos')
                    ->where('sequence', '=', 1)
                    ->whereIn('user_id', Config::get('app.ids_sample_actor'))
                    ->take(3)
                    ->get();
        } else if (Auth::user()->category == "Model") {
            $sample_videos = DB::table('default_videos')
                    ->where('sequence', '=', 1)
                    ->whereIn('user_id', Config::get('app.ids_sample_model'))
                    ->take(3)
                    ->get();
        }
        // print_r($sample_videos);die();
        //$video = DB::table('videos')
        //->where('user_id','=',Auth::user()->id)
        //->get();
        $default = DB::table('default_videos')
                ->where('user_id', '=', Auth::user()->id)
                ->where('page', '=', 'profile')
                ->orderBy('sequence', 'asc')
                ->get();

        $default_feed = DB::table('default_videos')
                ->where('user_id', '=', Auth::user()->id)
                ->where('page', '!=', 'profile')
                ->orderBy('sequence', 'asc')
                ->take(4)
                ->get();

        $image = DB::table('model_images')
                ->where('user_id', '=', Auth::user()->id)
                ->where('page', '=', 'profile')
                ->orderBy('sequence', 'asc')
                ->get();
        $image_feed = DB::table('model_images')
                ->where('user_id', '=', Auth::user()->id)
                ->where('page', '!=', 'profile')
                ->orderBy('sequence', 'asc')
                ->take(4)
                ->get();




        $percentage = 0;
        if ($users->verified == 1) {
            $percentage = $percentage + 10;
        }
        if ($users->mobile_verified == 1) {
            $percentage = $percentage + 10;
        }
        if (!empty($image)) {
            $percentage += 15;
        }
        if (!empty($default)) {
            $percentage += 15;
        }
        $percentage_array = $arrayName = array('name', 'address', 'phone', 'gender', 'dob', 'language', 'category', 'eye', 'height_feet', 'height_inch', 'weight', 'color', 'school_level', 'college_level', 'work_level', 'about_me');
        $done = 0;
        $total = 16;
        foreach ($percentage_array as $value) {
            if ($users->$value != '') {

                $done++;
            }
            if (is_numeric($users->$value) && ($users->$value == 0 )) {
                $done--;
            }
            if ($users->$value == '---Select---') {
                $done--;
            }
        }

        $to_add = $done / $total;
        $to_add = $to_add * 50;
        $percentage = $percentage + round($to_add);

        return View::make('users.profile', compact('users', 'video', 'default', 'image', 'percentage', 'sample_videos', 'image_feed', 'default_feed'));
    }

//start-web service for mobile
    public function profilemob() {

        $userid = $_GET['id'];
        $log_count = DB::table('users')
                ->where('users.id', '=', $userid)
                ->update(array('log_count' => 1));

        // if(Auth::user()->user_type=="user"){
        // 	$users = DB::table('users')
        //                                       ->where('users.id','=',$userid)
        //                                       ->first();
        // }else{
        $users = DB::table('users')
                ->where('users.id', '=', $userid)
                ->first();

        // }
        // $sample_videos="";
        // if(Auth::user()->category == "Actor"){
        // 	$sample_videos = DB::table('default_videos')
        // 			->where('sequence', '=', 1)
        //                   ->whereIn('user_id',Config::get('app.ids_sample_actor'))
        //                   ->take(3)
        //                   ->get();
        //        } else if(Auth::user()->category == "Model"){
        //        	$sample_videos = DB::table('default_videos')
        //        			->where('sequence', '=', 1)
        //                   ->whereIn('user_id',Config::get('app.ids_sample_model'))
        //                   ->take(3)
        //                   ->get();
        //        }
        // print_r($sample_videos);die();
        //$video = DB::table('videos')
        //->where('user_id','=',Auth::user()->id)
        //->get();
        // $default = DB::table('default_videos')
        // 		->where('user_id','=',Auth::user()->id)
        // 		->where('page','=','profile')
        // 		->orderBy('sequence', 'asc')
        // 		->get();
        // $default_feed = DB::table('default_videos')
        // 		->where('user_id','=',Auth::user()->id)
        // 		->where('page','!=','profile')
        // 		->orderBy('sequence', 'asc')
        // 		->get();
        // $image = DB::table('model_images')
        // 		->where('user_id','=',Auth::user()->id)
        // 		->where('page','=','profile')
        // 		->orderBy('sequence', 'asc')
        // 		->get();
        // $image_feed = DB::table('model_images')
        // 		->where('user_id','=',Auth::user()->id)
        // 		->where('page','!=','profile')
        // 		->orderBy('sequence', 'asc')
        // 		->get();
        // $percentage = 0;
        // if($users->verified == 1){
        // 	$percentage = $percentage+10;
        // }
        // if($users->mobile_verified == 1){
        // 	$percentage = $percentage+10;
        // }
        // if (!empty($image)){
        // 	$percentage += 15;
        // }
        // if (!empty($default)){
        // 	$percentage += 15;
        // }
        // $percentage_array = $arrayName = array('name','address','phone','gender','dob','language','category','eye','height_feet','height_inch','weight','color','school_level','college_level','work_level','about_me');
        // $done= 0;
        // $total= 16;
        // foreach ($percentage_array as $value) {
        // 	if(  $users->$value != ''  ){
        // 		$done++;
        // 	}
        // 	if( is_numeric($users->$value) && ($users->$value== 0 )){
        // 		$done--;
        // 	}
        // 	if( $users->$value == '---Select---' ){
        // 		$done--;
        // 	}
        // }
        // $to_add = $done/$total;
        // $to_add = $to_add*50;
        // $percentage= $percentage + round($to_add);
        if (!empty($users)) {
            $arr = array('status' => 'valid', 'user' => $users);
            echo json_encode($arr);
            die();
        } else {
            $arr = array('status' => 'invalid');
            echo json_encode($arr);
            die();
        }

        // return View::make('users.profile',compact('users','video','default','image','percentage','sample_videos','image_feed','default_feed'));
    }

//start-web service for mobile



    public function contact() {
        return View::make('users.contact');
    }

    public function about_us() {
        return View::make('users.about_us');
    }

    public function copyrights() {
        return View::make('users.copyrights');
    }

    public function termsandcodition() {
        return View::make('users.termsandcodition');
    }

    public function faq() {
        return View::make('users.faq');
    }

    public function login() {
        return Redirect::to('http://audition.com/#login_form');
    }

    public function defaultVideo() {
        $input = Input::all();

        if (isset($input['provid4'])) {
            $file = Input::file('provid4');
            $org_name = $file->getClientOriginalName();
            $new_name = uniqid(time()) . $org_name;
            $sequence = "1";
            $type = "1";
        }
        if (isset($input['provid2'])) {
            $file = Input::file('provid2');
            $org_name = $file->getClientOriginalName();
            $new_name = uniqid(time()) . $org_name;
            $sequence = "2";
            $type = "0";
        }
        if (isset($input['provid1'])) {
            $file = Input::file('provid1');
            $org_name = $file->getClientOriginalName();
            $new_name = uniqid(time()) . $org_name;
            $sequence = "3";
            $type = "0";
        }
        if (isset($input['provid3'])) {
            $file = Input::file('provid3');
            $org_name = $file->getClientOriginalName();
            $new_name = uniqid(time()) . $org_name;
            $sequence = "4";
            $type = "0";
        }
        $path = $file->move('assets/event_video', $new_name);
        $size = '105x86';
        $base_path = Config::get('app.base_path_project');
        $thumbnail = shell_exec("ffmpeg  -itsoffset -4  -i $base_path/public/assets/event_video/$new_name -vcodec mjpeg -vframes 1 -an -f rawvideo -s $size $base_path/public/assets/thumbnails/$new_name.png -loglevel panic");
        $sql = DB::table('default_videos')->insert(
                array('user_id' => Auth::user()->id, 'video_file' => $new_name, 'thumbnail' => $new_name . ".png", 'sequence' => $sequence, 'video_type' => $type)
        );
        return Redirect::to('myprofile');
    }

    public function sendmail() {
        $input = Input::all();
//info@auditionworld.tv



        Mail::send('emails.contact', ['name' => $input['con_name'],'email' => $input['con_email'],'phone' => $input['con_phone'],'message_text' => $input['con_message']], function($message)  {
            $message->setSender(array('admin@auditionworld.tv' => 'Admin'));
            $message->to('soni@sparksupport.com', 'Info')
                    ->subject('Enquiry!');
        });

Session::put('result', 'Will contact you soon');
 return Redirect::back();

    }

    public function admin() {
        return View::make('audition_events.create');
    }

    public function details($id) {
        $users = DB::table('users')
                ->join('categories', function($join) use($id) {
                    $join->on('users.category', '=', 'categories.name')
                    ->where('users.id', '=', $id);
                })
                ->select('users.*', 'categories.name AS cat')
                ->first();
        if (empty($users)) {
            $users = DB::table('users')
                    ->where('users.id', '=', $id)
                    ->first();
        }
        //print_r($users);die();
        // $queries = DB::getQueryLog();
        // $last_query = end($queries);
        // print_r($last_query);
        // die("dfgd");
        $video = DB::table('videos')
                ->where('user_id', '=', $id)
                ->get();
        $video_count = DB::table('videos')
                ->where('user_id', '=', $id)
                ->count();

        $default_videos = DB::table('default_videos')
                ->where('user_id', '=', $id)
                ->orderBy('sequence', 'asc')
                ->get();
        $default_count = DB::table('default_videos')
                ->where('user_id', '=', $id)
                ->count();

        $event_count = DB::table('videos')
                ->where('user_id', '=', $id)
                ->count();
        $default = array_merge($default_videos, $video);

        // $queries = DB::getQueryLog();
        // $last_query = end($queries);
        // print_r($default);
        // die("sfs");
        return View::make('users.details', compact('users', 'video', 'default', 'default_count', 'event_count', 'video_count'));
    }

    public function contactme() {

        $id = Input::get('vid');
        $user = DB::table('users')->where('id', '=', $id)->first();
        $input = (array) $user;
        if (Auth::check()) {
            if (Auth::user()->id != $id) {
                $sql = DB::table('contact_candidate')
                        ->insert(
                        array('user_id' => Auth::user()->id, 'candidate_id' => $id, 'created_at' => date('Y-m-d'))
                );
                $input['user_whosend'] = Auth::user()->name;
                Mail::send('emails.contest', $input, function($message) {
                    $message->setSender(array('admin@sparksupport.com' => 'Admin'));
                    $message->to('info@auditionworld.tv', "Info")
                            ->subject('Contact');
                });
                echo "contact";
            } else {
                echo "same_user";
            }
        } else {
            echo "guest";
        }
    }

    public function encryptForValidation($pure_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
        return $encrypted_string;
    }

    public function decryptForValidation($encrypted_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
        return $decrypted_string;
    }

    public function hex2bin($hex_string) {
        $pos = 0;
        $result = '';
        while ($pos < strlen($hex_string)) {
            if (strpos(" \t\n\r", $hex_string{$pos}) !== FALSE) {
                $pos++;
            } else {
                $code = hexdec(substr($hex_string, $pos, 2));
                $pos = $pos + 2;
                $result .= chr($code);
            }
        }
        return $result;
    }

    public function verify($id) {
        $user = DB::table('users')->where('id', '=', $id)->first();
        // $input =(array) $user;

        $encryption_key = Config::get('app.key');
        $date = date('Y-m-d');
        $pure_string = $date . "," . $id;
        $encrypted_code = $this->encryptForValidation($pure_string, $encryption_key);
        $encrypted_code = bin2hex($encrypted_code);
        $input = array('name' => $user->name, 'email' => $user->email, 'enc_key' => $encrypted_code);
        // print_r($input);
        // die("jlkj");
        Mail::send('emails.verify', $input, function($message) use ($input) {
            $message->setSender(array('jismi.jose@sparksupport.com' => 'Jismi'));
            $message->to($input['email'], $input['name'])
                    ->subject('Audition World Account Verification Email');
        });

        // return Redirect::to('/myprofile')->with('message', 'Request has been send, Inform you soon!');
    }

    public function checkverified($key) {

        $encryption_key = Config::get('app.key');

        $date_1 = date('Y-m-d');
        $datetime1 = date_create($date_1);
        $string = $this->hex2bin($key);

        $decrypted = $this->decryptForValidation($string, $encryption_key);
        $pieces = explode(",", $decrypted);
        $date_of_req = $pieces[0]; // piece1
        $user_id_req = $pieces[1]; // piece2
        $datetime2 = date_create($date_of_req);
        $interval = date_diff($datetime1, $datetime2);
        $days = $interval->format('%a');
        if ($days < 7) {
            DB::table('users')
                    ->where('id', $user_id_req)
                    ->update(array('verified' => 1));
            Auth::loginUsingId($user_id_req);
            return Redirect::to('/edit_profile');
            // return View::make('users.activate');
            // die("verified");
        } else {
            die("expire");
        }
    }

    public function objectToArray($d) {

        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
             * Return array converted to object
             * Using _FUNCTION_ (Magic constant)
             * for recursive call
             */
            return array_map($this, $d);
        } else {
            // Return array
            return $d;
        }
    }

    public function signature() {

        return View::make('users.signature');
    }

    public function guestauth() {

        $email = Input::get('email');
        $video = Input::get('video');
        $name = Input::get('name');
        $comment_id = Input::get('comment_id');
        $sql = DB::table('comments')
                ->where('video_id', '=', $video)
                ->where('user_id', '=', $_SERVER['REMOTE_ADDR'])
                ->where('id', '=', $comment_id)
                ->update(array('guest_email' => $email, 'guest_name' => $name));

        $url = URL::asset('verifycomments') . "?email=" . $email . "&video=" . $video;
        $data = array("url" => $url);

        Mail::send('emails.guest', $data, function($message) use($email) {
            $message->setSender(array($email => 'Guest'));
            $message->to($email, 'Guest')
                    ->subject('To activate your comment');
        });

        echo "comment";
    }

    public function forgot() {
        return View::make('users.forgot');
    }

    public function password() {
        $email = Input::get('email');
        $users = DB::table('users')
                ->where('email', '=', $email)
                ->pluck('id');
        $user_verified = DB::table('users')
                ->where('email', '=', $email)
                ->pluck('verified');
        if (isset($users)) {
            if ($user_verified == 1) {
                $encryption_key = Config::get('app.key');
                $date = date('Y-m-d');
                $pure_string = $date . "," . $users;
                $encrypted_code = $this->encryptForValidation($pure_string, $encryption_key);
                $encrypted_code = bin2hex($encrypted_code);

                $url = URL::asset('changepassword') . "?key=" . $encrypted_code;
                $data = array("url" => $url);

                Mail::send('emails.changepassword', $data, function($message) use($email) {
                    $message->setSender(array($email => 'User'));
                    $message->to($email, 'User')
                            ->subject('Reset your Password');
                });
                echo 'A mail has been send to this Email';
                //return Redirect::to('/forgot')->with('message', 'A mail has been send to this Email');
            } else {
                echo 'This email id is not verified';
                //return Redirect::to('/forgot')->with('message', 'This email id is not verified');
            }
        } else {
            echo 'Email Id seems to be wrong';
            //return Redirect::to('/forgot')->with('message', 'Email Id seems to be wrong');
        }
    }

    public function changepassword() {
        $email = Input::get('key');
        return View::make('users.changepassword', compact('email'));
    }

    public function updatepassword() {
        $email = Input::get('key');
        $password = Hash::make(Input::get('password'));
        $encryption_key = Config::get('app.key');

        $date_1 = date('Y-m-d');
        $datetime1 = date_create($date_1);
        $string = $this->hex2bin($email);

        $decrypted = $this->decryptForValidation($string, $encryption_key);
        $pieces = explode(",", $decrypted);
        $date_of_req = $pieces[0]; // piece1
        if (!empty($pieces[1])) {
            $user_id = $pieces[1]; // piece2
            $datetime2 = date_create($date_of_req);
            $interval = date_diff($datetime1, $datetime2);
            $days = $interval->format('%a');
            if ($days < 2) {
                $user_id = trim($user_id);
                $query = DB::table('users')
                        ->where('id', $user_id)
                        ->update(array('password' => $password));
                return Redirect::to("/")->with('message', 'Login using new password');
            } else {
                return Redirect::to("changepassword?email=$email")->with('message', 'Link expired');
            }
        } else {
            return Redirect::to("changepassword?email=$email")->with('message', 'Link expired');
        }
    }

    public function editprofile() {
        $id = Auth::user()->id;
        $user = $this->user->find($id);
        // print_r($user);
        return View::make('users.editprofile', compact('user'));

        // die("afa");
    }

    public function updateprofile() {
        $input = Input::all();


        if (!empty($input['profile_pic'])) {
            $file = Input::file('profile_pic');
            $org_name = $file->getClientOriginalName();
            $new_name = uniqid(time()) . $org_name;
            $new_name = str_replace(" ", '_', $new_name);
            $path = $file->move('assets/profile', $new_name);
            shell_exec("chmod 644 $path");
            $input['profile_pic'] = $new_name;
            $base_path = Config::get('app.base_path_project');
            $inFile = $base_path . "public/assets/profile/" . $new_name;
            $outFile_s = $base_path . "public/assets/profile/small_" . $new_name;
            $outFile_n = $base_path . "public/assets/profile/normal_" . $new_name;
            $this->create_thumbnails(38, 40, $inFile, $outFile_s);
            $this->create_thumbnails(208, 208, $inFile, $outFile_n);
        } else {
            unset($input['profile_pic']);
        }
        $id = Auth::user()->id;
        $user = $this->user->find($id);
        $user->update($input);
        return Redirect::to('/myprofile');
    }

// start-for mobile
    public function updateprofilemob() {
        $input = Input::all();


        if (!empty($input['profile_pic'])) {
            $file = Input::file('profile_pic');
            $org_name = $file->getClientOriginalName();
            $new_name = uniqid(time()) . $org_name;
            $new_name = str_replace(" ", '_', $new_name);
            $path = $file->move('assets/profile', $new_name);
            shell_exec("chmod 644 $path");
            $input['profile_pic'] = $new_name;
            $base_path = Config::get('app.base_path_project');
            $inFile = $base_path . "public/assets/profile/" . $new_name;
            $outFile_s = $base_path . "public/assets/profile/small_" . $new_name;
            $outFile_n = $base_path . "public/assets/profile/normal_" . $new_name;
            $this->create_thumbnails(38, 40, $inFile, $outFile_s);
            $this->create_thumbnails(208, 208, $inFile, $outFile_n);
        } else {
            unset($input['profile_pic']);
        }
        $id = $input['id'];
        $user = $this->user->find($id);
        $user->update($input);
        $arr = array('status' => 'valid');
        echo json_encode($arr);
        die();
    }

//end-for mobile	


    public function prop_pic_update() {

        $input = Input::all();



        if (!empty($input['profile_pic'])) {
            $file = Input::file('profile_pic');
            $org_name = $file->getClientOriginalName();
            $new_name = uniqid(time()) . $org_name;
            $new_name = str_replace(" ", '_', $new_name);
            $path = $file->move('assets/profile', $new_name);
            shell_exec("chmod 644 $path");
            $input['profile_pic'] = $new_name;
            $base_path = Config::get('app.base_path_project');
            $inFile = $base_path . "public/assets/profile/" . $new_name;
            $outFile_s = $base_path . "public/assets/profile/small_" . $new_name;
            $outFile_n = $base_path . "public/assets/profile/normal_" . $new_name;
            $this->create_thumbnails(38, 40, $inFile, $outFile_s);
            $this->create_thumbnails(208, 208, $inFile, $outFile_n);

            $id = Auth::user()->id;
            DB::table('users')
                    ->where('id', $id)
                    ->update(array('profile_pic' => $new_name));
            return Redirect::to('/myprofile');
        }
    }

    public function pro_video_up() {

        $input = Input::all();

        $file = Input::file('profile_video');
        $org_name = $file->getClientOriginalName();
        $new_name = uniqid(time()) . $org_name;
        $sequence = "4";
        $type = "0";
        $base_path = Config::get('app.base_path_project');

        $path = $file->move('assets/event_video', $new_name);
        $realpath = $base_path . '/public/assets/event_video/' . $new_name;
        shell_exec("chmod 777 $realpath");


        $size = '105x86';

        $thumbnail = shell_exec("ffmpeg  -itsoffset -4  -i $base_path/public/assets/event_video/$new_name -vcodec mjpeg -vframes 1 -an -f rawvideo -s $size $base_path/public/assets/thumbnails/$new_name.png -loglevel panic");


        $id = Auth::user()->id;
        DB::table('users')
                ->where('id', $id)
                ->update(array('profile_video' => $new_name));


        return Redirect::to('/myprofile');
    }

    public function verifymobile() {

        $id = Auth::user()->id;
        $user = $this->user->find($id);
        $code = rand(10000, 50000);
        $up = Verifymobile::where('user_id', '=', $id)->update(array('code' => $code));
        if (!$up) {
            Verifymobile::firstOrCreate(array('user_id' => $id, 'code' => $code));
        }

        Help::sms($user->phone, "your verification code is $code");
        return View::make('users.verifymobile', compact('user'));
    }

    Public function doverification() {
        $input = Input::all();
        $id = Auth::user()->id;
        $code = DB::table('verify_mobile')->where('user_id', $id)->pluck('code');
        if ($input['code'] == $code) {
            $user = $this->user->find($id);
            $user->update(array('mobile_verified' => 1));
        } else {
            
        }

        return Redirect::to('/myprofile');
    }

    public function approve_videos() {
        $video = DB::table('default_videos')
                ->Join('users', 'default_videos.user_id', '=', 'users.id')
                ->select('default_videos.*', 'users.profile_pic', 'users.name')
                ->where('approve', '=', '0')
                ->orderBy('default_videos.id', 'desc')
                ->paginate(5);
        return View::make('manages.allvideo', compact('video'));
    }

    public function adminapprove($id) {
        DB::table('default_videos')
                ->where('id', $id)
                ->update(array('approve' => 1));
        return Redirect::to($_SERVER['HTTP_REFERER']);
    }

    public function approve_images() {
        $image = DB::table('model_images')
                ->Join('users', 'model_images.user_id', '=', 'users.id')
                ->select('model_images.*', 'users.profile_pic', 'users.name')
                ->where('approve', '=', '0')
                ->orderBy('model_images.id', 'desc')
                ->paginate(5);
        return View::make('manages.allimage', compact('image'));
    }

    public function adminapproveimage($id) {
        DB::table('model_images')
                ->where('id', $id)
                ->update(array('approve' => 1));
        return Redirect::to($_SERVER['HTTP_REFERER']);
    }

    public function admindeleteimage($id) {

        DB::table('model_images')->where('id', '=', $id)->delete();

        return Redirect::back()->with('message', 'Deleted sucessfully');
    }

    public function autocomplete() {
        $q = $_GET['q'];
        //$my_data=mysql_real_escape_string($q);
        $my_data = $q;

        $users = User::select('name', 'id')
                ->where('name', 'LIKE', "%$my_data%")
                ->orderBy('name', 'desc')
                ->get();
        foreach ($users as $user) {
            echo $user->name . "\n";
        }
    }

    public function protofolio() {
        $input = Input::all();
        if (isset($input['proimg4'])) {
            $file = Input::file('proimg4');
            $org_name = $file->getClientOriginalName();
            $new_name = uniqid(time()) . $org_name;
            $sequence = "1";
            $type = "1";
        }
        if (isset($input['proimg2'])) {
            $file = Input::file('proimg2');
            $org_name = $file->getClientOriginalName();
            $new_name = uniqid(time()) . $org_name;
            $sequence = "2";
            $type = "0";
        }
        if (isset($input['proimg1'])) {
            $file = Input::file('proimg1');
            $org_name = $file->getClientOriginalName();
            $new_name = uniqid(time()) . $org_name;
            $sequence = "3";
            $type = "0";
        }
        if (isset($input['proimg3'])) {
            $file = Input::file('proimg3');
            $org_name = $file->getClientOriginalName();
            $new_name = uniqid(time()) . $org_name;
            $sequence = "4";
            $type = "0";
        }
        // echo $new_name;
        // die("sdfs");
        $path = $file->move('assets/protofolio', $new_name);
        $sql = DB::table('model_images')->insert(
                array('user_id' => Auth::user()->id, 'image_file' => $new_name, 'sequence' => $sequence)
        );
        return Redirect::to('myprofile');
    }

    public function admincontact() {
        $contact = DB::table('contact_candidate')
                ->Join('users as manager', 'contact_candidate.user_id', '=', 'manager.id')
                ->Join('users', 'contact_candidate.candidate_id', '=', 'users.id')
                ->select('users.*', 'manager.name as req  ')
                ->paginate(10);

        return View::make('manages.contact', compact('contact'));
    }

    public function update_pic() {
        $input = Input::all();
        // print_r($input);
        if (isset($input['new_pic'])) {
            $name = Auth::user()->profile_pic;
            $file = Input::file('new_pic');

            $path = $file->move('assets/profile', $name);

            shell_exec("chmod 644 $path");
            $base_path = Config::get('app.base_path_project');
            $inFile = $base_path . "public/assets/profile/" . $name;
            $outFile_s = $base_path . "public/assets/profile/small_" . $name;
            $outFile_n = $base_path . "public/assets/profile/normal_" . $name;
            $this->create_thumbnails(38, 40, $inFile, $outFile_s);
            $this->create_thumbnails(208, 208, $inFile, $outFile_n);
        }
        die();
    }

    public function Userprofile($id) {

        $users = DB::table('users')
                ->join('categories', function($join) use ($id) {
                    $join->on('users.category', '=', 'categories.name')
                    ->where('users.id', '=', $id);
                })
                ->select('users.*', 'categories.name AS cat')
                ->first();




        // print_r($sample_videos);die();

        $video = DB::table('videos')
                ->where('user_id', '=', $id)
                ->get();
        $default = DB::table('default_videos')
                ->where('user_id', '=', $id)
                ->orderBy('sequence', 'asc')
                ->get();

        $image = DB::table('model_images')
                ->where('user_id', '=', $id)
                ->orderBy('sequence', 'asc')
                ->get();



        $percentage = 0;
        if ($users->verified == 1) {
            $percentage = $percentage + 10;
        }
        if ($users->mobile_verified == 1) {
            $percentage = $percentage + 10;
        }
        if (!empty($image)) {
            $percentage += 15;
        }
        if (!empty($default)) {
            $percentage += 15;
        }
        $percentage_array = $arrayName = array('name', 'address', 'phone', 'gender', 'dob', 'language', 'category', 'eye', 'height_feet', 'height_inch', 'weight', 'color', 'school_level', 'college_level', 'work_level', 'about_me');
        $done = 0;
        $total = 16;
        foreach ($percentage_array as $value) {
            if ($users->$value != '') {

                $done++;
            }
            if (is_numeric($users->$value) && ($users->$value == 0 )) {
                $done--;
            }
            if ($users->$value == '---Select---') {
                $done--;
            }
        }

        $to_add = $done / $total;
        $to_add = $to_add * 50;
        $percentage = $percentage + round($to_add);



        return View::make('users.userprofile', compact('users', 'video', 'default', 'image', 'percentage'));
    }

    public function generatexcel($id) {
        $events = DB::table('videos')
                ->Join('users', 'videos.user_id', '=', 'users.id')
                ->leftJoin('watchlist', 'videos.id', '=', 'watchlist.video_id')
                ->select('videos.*', 'users.*', 'videos.id as v_id', 'watchlist.id as w_id', 'watchlist.id as w_id', 'watchlist.event_id as w_e_id', 'watchlist.user_id as w_u_id')
                ->where('videos.event_id', '=', $id)
                ->get();
        $path = base_path();

        require_once $path . '/vendor/PHPExcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

// Set document properties
        $objPHPExcel->getProperties()->setCreator("Audition")
                ->setLastModifiedBy("Audition")
                ->setTitle("Audition")
                ->setSubject("Audition")
                ->setDescription("Audition")
                ->setKeywords("Audition")
                ->setCategory("Audition");


// Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Audition Details');
        $row = 2;
        $col = 0;
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'Name');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'email');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'address');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'phone');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'gender');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'dob');

        $row = 3; // 1-based index
        foreach ($events as $event) {
            $col = 0;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->name);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->email);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->address);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->phone);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->gender);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->dob);
            $row++;
        }

        $objPHPExcel->getActiveSheet()->setTitle('Audition');

        foreach (range('A', 'G') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
        }

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
        $callStartTime = microtime(true);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $file_name = $path . '/public/assets/files/audition' . $id . '.xlsx';
        $objWriter->save($file_name);
        shell_exec("chmod 777 " . $file_name);
        echo 'audition' . $id . '.xlsx';
    }

    public function generatexcel_watch() {
        $mark = Auth::user()->id;
        $events = DB::table('watchlist')
                ->Join('users', 'watchlist.user_id', '=', 'users.id')
                ->Join('videos', 'videos.user_id', '=', 'users.id')
                ->select('videos.*', 'users.*', 'watchlist.*', 'watchlist.id as w_id')
                ->where('watchlist.marked_by', '=', $mark)
                ->get();
        $path = base_path();

        require_once $path . '/vendor/PHPExcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

// Set document properties
        $objPHPExcel->getProperties()->setCreator("Audition")
                ->setLastModifiedBy("Audition")
                ->setTitle("Audition")
                ->setSubject("Audition")
                ->setDescription("Audition")
                ->setKeywords("Audition")
                ->setCategory("Audition");


// Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Watch List');
        $row = 2;
        $col = 0;
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'Name');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'email');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'address');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'phone');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'gender');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, 'dob');

        $row = 3; // 1-based index
        foreach ($events as $event) {
            $col = 0;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->name);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->email);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->address);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->phone);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->gender);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $event->dob);
            $row++;
        }

        $objPHPExcel->getActiveSheet()->setTitle('Audition');

        foreach (range('A', 'G') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
        }
        $objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
        $callStartTime = microtime(true);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $file_name = $path . '/public/assets/files/watchlist' . $mark . '.xlsx';
        $objWriter->save($file_name);
        shell_exec("chmod 777 " . $file_name);
        echo 'watchlist' . $mark . '.xlsx';
    }

    // 
    public function manage_client_tool() {
        $manage_clients = DB::table('manage_client_tool_details')
                        ->join('users', 'manage_client_tool_details.user_id', '=', 'users.id')
                        ->select('manage_client_tool_details.id', 'user_id', 'name', 'api_key')->get();

        //$manage_clients=DB::table('manage_client_tool_details')->get();
        return View::make('manage_clients.index', compact('manage_clients'));
    }

    public function manage_clients_edit($client_id) {
        $user_data = DB::table('manage_client_tool_details')
                        ->join('users', 'manage_client_tool_details.user_id', '=', 'users.id')
                        ->select('manage_client_tool_details.id', 'user_id', 'name', 'api_key')->get();

        return View::make('manage_clients.edit', compact('user_data'));


        //echo $client_id;
        //die();
    }

    public function manage_clients_update() {
        $input = Input::all();
        DB::table('manage_client_tool_details')->where('id', $input['id'])->update(array('api_key' => $input['api_key']));
        $manage_clients = DB::table('manage_client_tool_details')
                        ->join('users', 'manage_client_tool_details.user_id', '=', 'users.id')
                        ->select('manage_client_tool_details.id', 'user_id', 'name', 'api_key')->get();
        return View::make('manage_clients.index', compact('manage_clients'));
    }

    public function manage_clients_delete($client_id) {
        DB::table('manage_client_tool_details')->where('id', '=', $client_id)->delete();
        $manage_clients = DB::table('manage_client_tool_details')
                        ->join('users', 'manage_client_tool_details.user_id', '=', 'users.id')
                        ->select('manage_client_tool_details.id', 'user_id', 'name', 'api_key')->get();
        return View::make('manage_clients.index', compact('manage_clients'));
    }

    public function manage_clients_view($client_id) {
        $user_data = DB::table('manage_client_tool_details')
                        ->join('users', 'manage_client_tool_details.user_id', '=', 'users.id')
                        ->select('manage_client_tool_details.id', 'user_id', 'name', 'api_key')->get();
        return View::make('manage_clients.view', compact('user_data'));
    }

    public function manage_clients_create() {
        $input = Input::all();
        $today = new DateTime('today');
        DB::table('manage_client_tool_details')->insert(
                array('user_id' => $input['user_id'],
                    'api_key' => $input['api_key'],
                    'created_at' => $today,
                    'updated_at' => $today));
        $manage_clients = DB::table('manage_client_tool_details')
                        ->join('users', 'manage_client_tool_details.user_id', '=', 'users.id')
                        ->select('manage_client_tool_details.id', 'user_id', 'name', 'api_key')->get();
        return View::make('manage_clients.index', compact('manage_clients'));
    }

    public function manage_clients_add_new() {
        $user_ids = DB::table('users')
                ->select('id')->where('user_type', 'Audition Manager')
                ->whereNotIn('id', function($query) {
                    $query->select('user_id')
                    ->from('manage_client_tool_details');
                })
                ->get();
        //$user_id=DB::table('')->lists('user_id');
        /* $user_id=DB::table('users')
          ->leftjoin('manage_client_tool_details','users.id','=','manage_client_tool_details.user_id')
          ->select('users.id')->where('manage_client_tool_details.user_id','=','NULL')->get(); */
        //print_r($user_id);
        //die(); 
        //$user_ids=DB::table('users')->select('id')->where('user_type','Audition Manager')->whereNotIn('id',$user_id)->get();
        Return View::make('manage_clients.create', compact('user_ids'));
    }

    //api call
    public function validate_client_tool() {
        $input = Input::all();

        $input_api = $input['api_key'];
        $input_acc = $input['acc_sync'];
        /* $response['status']=$input_api;
          return json_encode($response);
          if($input_api=="12345"){

          $response['status']="success";
          return json_encode($response);
          }

          die(); */
        $response = array('status' => '');
        $check_api = DB::table('manage_client_tool_details')->where('api_key', $input_api)->get();
        if (count($check_api) > 0) {
            $user_id = DB::table('manage_client_tool_details')->where('api_key', $input_api)->pluck('user_id');
            $check_acc = DB::table('users')->where('id', $user_id)->pluck('email');
            if ($check_acc == $input_acc) {
                $response['status'] = "success";
            } else {
                $response['status'] = "error";
            }
        } else {
            $response['status'] = "error";
        }
        return json_encode($response);
    }

    //sync db
    public function sync_details() {
        $input = Input::all();

        $input_api = $input['api_key'];
        $input_acc = $input['acc_sync'];
        $audition_data = array();
        $videos_data = array();
        $users_data = array();
        $response = array();
        $data = array();

        $response['videos'] = array();
        $response['users'] = array();
        $response['audition'] = array();

        $check_api = DB::table('manage_client_tool_details')->where('api_key', $input_api)->get();
        if (count($check_api) > 0) {

            $check_acc = DB::table('users')
                            ->join('manage_client_tool_details', 'users.id', '=', 'manage_client_tool_details.user_id')
                            ->select('email', 'user_id')->where('api_key', $input_api)->get();
            $email = $check_acc[0]->email;
            $user_id = $check_acc[0]->user_id;

            if ($email == $input_acc) {
                if (!empty($input['audition_ids'])) {
                    $input_audition_ids = $input['audition_ids'];
                    foreach ($input_audition_ids as $value) {
                        $get_audition_data = DB::table('auditionevents')->where('id', $value)->get();
                        array_push($audition_data, $get_audition_data);
                    }

                    foreach ($audition_data as $key => $value) {
                        foreach ($value as $val)
                            array_push($response['audition'], $val);
                    }
                }
                if (!empty($input['user_ids'])) {
                    $input_user_ids = $input['user_ids'];
                    foreach ($input_user_ids as $value) {
                        $get_users_data = DB::table('users')->where('id', $value)->get();
                        array_push($users_data, $get_users_data);
                    }

                    foreach ($users_data as $key => $value) {
                        foreach ($value as $val)
                            array_push($response['users'], $val);
                    }
                }
                if (!empty($input['videos_ids'])) {
                    $input_video_ids = $input['videos_ids'];
                    foreach ($input_video_ids as $value) {
                        $get_videos_data = DB::table('videos')->where('id', $value)->get();
                        array_push($videos_data, $get_videos_data);
                    }

                    foreach ($videos_data as $key => $value) {
                        foreach ($value as $val)
                            array_push($response['videos'], $val);
                    }
                }
                /* $get_data=DB::table('videos')
                  ->join('auditionevents','videos.event_id','=','auditionevents.id')
                  ->join('users','users.id','=','videos.user_id')
                  ->select('videos.event_id','users.id')->where('manager_id',$user_id)->where('sync_status',0)->get();
                  //print_r($get_data);
                  //die();
                 */

                /* $eventId_arr=array();
                  $userId_arr=array();
                  $users_arr['users']=array();
                  foreach($get_data as $value){
                  $eventId=$value->event_id;
                  $userId=$value->id;

                  if(!in_array($eventId,$eventId_arr)){

                  $get_videos_data=DB::table('videos')->where('event_id',$eventId)->get();
                  //$video_data=$get_videos_data;

                  array_push($videos_data,$get_videos_data);
                  array_push($eventId_arr,$eventId);
                  }
                  if(!in_array($userId,$userId_arr)){

                  $get_users_data=DB::table('users')->where('id',$userId)->get();

                  //$users_data=array('users'=>$get_users_data);
                  array_push($users_data,$get_users_data);
                  array_push($userId_arr,$userId);
                  }
                  } */

                //print_r($videos_data);
                //print_r($users_data);		
            } else {
                $response['status'] = "error";
            }
        } else {
            $response['status'] = "error";
        }
        if (!empty($input_audition_ids)) {
            foreach ($input_audition_ids as $value) {
                DB::table('auditionevents')
                        ->where('id', $value)
                        ->update(array('sync_status' => 1));
            }
        }
        if (!empty($input_video_ids)) {
            foreach ($input_video_ids as $value) {
                DB::table('videos')
                        ->where('id', $value)
                        ->update(array('sync_status' => 1));
            }
        }
        if (!empty($input['user_ids'])) {
            foreach ($input_user_ids as $value) {
                DB::table('users')
                        ->where('id', $value)
                        ->update(array('sync_status' => 1));
            }
        }
        return json_encode($response);
    }

    public function get_files() {

        $input = Input::all();

        $input_api = $input['api_key'];
        $input_acc = $input['acc_sync'];
        //$input_event_id=$input['event_id'];

        $response = array();

        $check_api = DB::table('manage_client_tool_details')->where('api_key', $input_api)->get();
        if (count($check_api) > 0) {

            $check_acc = DB::table('users')
                            ->join('manage_client_tool_details', 'users.id', '=', 'manage_client_tool_details.user_id')
                            ->select('email', 'user_id')->where('api_key', $input_api)->get();

            $email = $check_acc[0]->email;
            $user_id = $check_acc[0]->user_id;
            if ($email == $input_acc) {
                $response['audition_ids'] = array();
                $response['audition_thumbnails'] = array();
                if (empty($input['event_id'])) {
                    $get_audition_data = DB::table('auditionevents')->select('id', 'thumbnail')->where('manager_id', $user_id)->where('sync_status', 0)->get();

                    //return $get_audition_thumbnails;
                    //die();
                    foreach ($get_audition_data as $key => $value) {
                        array_push($response['audition_ids'], $value->id);
                        array_push($response['audition_thumbnails'], $value->thumbnail);
                    }

                    /* return $audition_ids;
                      die();
                      $data=array('audition_thumbnails'=>$get_audition_thumbnails);

                      $response=$data;

                      die(); */

                    $get_data = DB::table('videos')
                                    ->join('auditionevents', 'videos.event_id', '=', 'auditionevents.id')
                                    ->join('users', 'users.id', '=', 'videos.user_id')
                                    ->select('users.id as user_id', 'videos.id as video_id', 'videos.event_id')->where('manager_id', $user_id)->where('videos.sync_status', 0)->get();
                } else {
                    $input_event_id = $input['event_id'];
                    $get_data = DB::table('videos')
                                    ->join('auditionevents', 'videos.event_id', '=', 'auditionevents.id')
                                    ->join('users', 'users.id', '=', 'videos.user_id')
                                    ->select('users.id as user_id', 'videos.id as video_id', 'videos.event_id')->where('manager_id', $user_id)->where('videos.sync_status', 0)->where('videos.event_id', $input_event_id)->get();
                }
                $videos_data = array();
                $eventId_arr = array();
                $userId_arr = array();
                $response['video_ids'] = array();
                $response['user_ids'] = array();
                //$response['event_ids']=array();
                foreach ($get_data as $key => $value) {
                    //$eventId=$value->event_id;
                    $videoId = $value->video_id;
                    $userId = $value->user_id;
                    array_push($response['video_ids'], $videoId);
                    $get_videos_data = DB::table('videos')->select('video_file', 'thumbnail')->where('id', $videoId)->get();
                    array_push($videos_data, $get_videos_data);
                    /* if(!in_array($eventId,$eventId_arr)){
                      array_push($response['event_ids'],$eventId);
                      array_push($eventId_arr,$eventId);
                      } */
                    if (!in_array($userId, $userId_arr)) {
                        $sync_status_user = DB::table('users')->where('id', $userId)->pluck('sync_status');
                        if ($sync_status_user == 0) {
                            array_push($response['user_ids'], $userId);
                            array_push($userId_arr, $userId);
                        }
                    }
                }

                $response['videos'] = array();
                foreach ($videos_data as $key => $value) {
                    foreach ($value as $val)
                        array_push($response['videos'], $val);
                }
            } else {
                $response['status'] = "error";
            }
        }
        return json_encode($response);
    }

    public function select_source() {
        $source = DB::table('source')->first();
        return View::make('users.source', compact('source'));
    }

    public function source_update() {
        $input = Input::all();
        DB::table('source')->update(array('you_tube' => $input['you_tube']));

        return Redirect::to('select_source');
    }

    public function view_profile($id) {

        $you_tube = DB::table('source')->first();
        $users = DB::table('users')
                ->where('users.id', '=', $id)
                ->first();


        $sample_videos = "";
        if ($users->user_type == "Actor") {
            $sample_videos = DB::table('default_videos')
                    ->where('sequence', '=', 1)
                    ->where('user_id', '=', $id)
                    ->take(3)
                    ->get();
        } else if ($users->category == "Model") {
            $sample_videos = DB::table('default_videos')
                    ->where('sequence', '=', 1)
                    ->where('user_id', '=', $id)
                    ->take(3)
                    ->get();
        }



        // print_r($sample_videos);die();
        $video = DB::table('videos')
                ->where('user_id', '=', $id)
                ->get();
        $default = DB::table('default_videos')
                ->where('user_id', '=', $id)
                ->where('page', '=', 'profile')
                ->orderBy('sequence', 'asc')
                ->get();

        $image = DB::table('model_images')
                ->where('user_id', '=', $id)
                ->where('page', '=', 'profile')
                ->orderBy('sequence', 'asc')
                ->get();

        $default_feed = DB::table('default_videos')
                ->where('user_id', '=', $id)
                ->where('page', '!=', 'profile')
                ->orderBy('sequence', 'asc')
                ->take(4)
                ->get();
        $image_feed = DB::table('model_images')
                ->where('user_id', '=', $id)
                ->where('page', '!=', 'profile')
                ->orderBy('sequence', 'asc')
                ->take(4)
                ->get();



        $percentage = 0;
        if ($users->verified == 1) {
            $percentage = $percentage + 10;
        }
        if ($users->mobile_verified == 1) {
            $percentage = $percentage + 10;
        }
        if (!empty($image)) {
            $percentage += 15;
        }
        if (!empty($default)) {
            $percentage += 15;
        }
        $percentage_array = $arrayName = array('name', 'address', 'phone', 'gender', 'dob', 'language', 'category', 'eye', 'height_feet', 'height_inch', 'weight', 'color', 'school_level', 'college_level', 'work_level', 'about_me');
        $done = 0;
        $total = 16;
        foreach ($percentage_array as $value) {
            if ($users->$value != '') {

                $done++;
            }
            if (is_numeric($users->$value) && ($users->$value == 0 )) {
                $done--;
            }
            if ($users->$value == '---Select---') {
                $done--;
            }
        }

        $to_add = $done / $total;
        $to_add = $to_add * 50;
        $percentage = $percentage + round($to_add);

        return View::make('users.view_profile', compact('users', 'video', 'default', 'image', 'percentage', 'sample_videos', 'you_tube', 'default_feed', 'image_feed'));
    }

    public function view_manager($id) {

        $you_tube = DB::table('source')->first();
        $users = DB::table('users')
                ->where('users.id', '=', $id)
                ->first();




        $video = DB::table('videos')
                ->where('user_id', '=', $id)
                ->get();
        $default = DB::table('default_videos')
                ->where('user_id', '=', $id)
                ->orderBy('sequence', 'asc')
                ->get();

        $image = DB::table('model_images')
                ->where('user_id', '=', $id)
                ->orderBy('sequence', 'asc')
                ->get();
        $eventvideos = DB::table('auditionevents')
                ->where('manager_id', '=', $id)
                ->get();



        $percentage = 0;
        if ($users->verified == 1) {
            $percentage = $percentage + 10;
        }
        if ($users->mobile_verified == 1) {
            $percentage = $percentage + 10;
        }
        if (!empty($image)) {
            $percentage += 15;
        }
        if (!empty($default)) {
            $percentage += 15;
        }
        $percentage_array = $arrayName = array('name', 'address', 'phone', 'gender', 'dob', 'language', 'category', 'eye', 'height_feet', 'height_inch', 'weight', 'color', 'school_level', 'college_level', 'work_level', 'about_me');
        $done = 0;
        $total = 16;
        foreach ($percentage_array as $value) {
            if ($users->$value != '') {

                $done++;
            }
            if (is_numeric($users->$value) && ($users->$value == 0 )) {
                $done--;
            }
            if ($users->$value == '---Select---') {
                $done--;
            }
        }

        $to_add = $done / $total;
        $to_add = $to_add * 50;
        $percentage = $percentage + round($to_add);
        return View::make('users.view_manager', compact('users', 'video', 'default', 'image', 'eventvideos', 'you_tube', 'percentage'));
    }

}
