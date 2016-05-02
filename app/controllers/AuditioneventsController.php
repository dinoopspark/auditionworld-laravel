<?php

class AuditioneventsController extends BaseController {

	/**
	 * Audition_event Repository
	 *
	 * @var Audition_event
	 */
	protected $auditionevent;

	public function __construct(Auditionevent $auditionevent)
	{
		$this->auditionevent = $auditionevent;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$auditionevents = $this->auditionevent->all();

		return View::make('auditionevents.index', compact('auditionevents'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$category = DB::table('categories')->select('name', 'id')->get();
		$roles = DB::table('users')
				->where('user_type','=','Audition Manager')
		        ->lists('name','id');
		// print_r($category);
		// die();
		return View::make('auditionevents.create',compact('category','roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$input = array_except(Input::all(), array('Hour','Minute','Second'));
		if(isset($input['promo']))
			{
			$file = Input::file('promo');
			$org_name = $file->getClientOriginalName();
			$org_name =preg_replace("/[^A-Za-z0-9\.]/", '', $org_name);
			$new_name = uniqid(time()) .$org_name;
			//$new_name = str_replace(" ", '_', $new_name);
			$path = $file->move('assets/event_video',$new_name);
			shell_exec("chmod 644 $path");
			$size = '312x212';
			$base_path =  Config::get('app.base_path_project');
			$thumbnail =shell_exec("ffmpeg  -itsoffset -4  -i $base_path/public/assets/event_video/$new_name -vcodec mjpeg -vframes 1 -an -f rawvideo -s $size $base_path/public/assets/thumbnails/$new_name.png -loglevel panic");
			shell_exec("chmod 644 $base_path/public/assets/thumbnails/$new_name.png");
			$input['promo']    = $new_name;
			$input['thumbnail']= $new_name.".png";
			}
		$validation = Validator::make($input, Auditionevent::$rules);

		if ($validation->passes())
		{
			$vid_ref = $this->auditionevent->create($input);
			        $command_text  = 'python '.Config::get('app.celery_location').'main.py '.$vid_ref->id.' auditionevents promo';
                                $command = escapeshellcmd($command_text);
                                $output = shell_exec($command);

			return Redirect::route('auditionevents.index');
		}

		return Redirect::route('auditionevents.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$auditionevent = $this->auditionevent->findOrFail($id);

		 
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$auditionevent = $this->auditionevent->find($id);

		if (is_null($auditionevent))
		{
			return Redirect::route('auditionevents.index');
		}

		return View::make('auditionevents.edit', compact('auditionevent'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Auditionevent::$rules);

		if ($validation->passes())
		{
			$auditionevent = $this->auditionevent->find($id);
			$auditionevent->update($input);

			return Redirect::route('auditionevents.show', $id);
		}

		return Redirect::route('auditionevents.edit', $id)
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
	public function destroy($id)
	{
		$this->auditionevent->find($id)->delete();

		return Redirect::route('auditionevents.index');
	}
	public function reports(){
		$category = DB::table('auditionevents')
					->select('id','name')
					->get();
		return View::make('auditionevents.reports',compact('category'));	
	}
	public function eventreport(){
		$eid = $_POST['eid'];
		$event = DB::table('videos')
				->Join('users', 'videos.user_id', '=', 'users.id')
				->select('users.name','videos.*')
				->where('event_id','=',$eid)
				->get();
		return View::make('auditionevents.eventreports',compact('event'));
	}


				public function checkname(){

				$eventname=$_REQUEST['event'];
				$data=	DB::table('auditionevents')
						->where('name','=',$eventname)
						->first();
				if(empty($data)){
					return 0;
					}	
				else{
						return 1;
					}

				}






	public function eventManagercreate(){
		$input = Input::all();
		$input = array_except(Input::all(), array('Hour','Minute','Second'));
		if(isset($input['promo']))
			{
			$file = Input::file('promo');
			$org_name = $file->getClientOriginalName();

		
			$org_name =preg_replace("/[^A-Za-z0-9\.]/", '', $org_name);
			
			$new_name = uniqid(time()) .$org_name;

			//$new_name = str_replace(" ", '_', $new_name);
			$path = $file->move('assets/event_video',$new_name);
			shell_exec("chmod 644 $path");
			$size = '312x212';
			$base_path =  Config::get('app.base_path_project');
			$thumbnail =shell_exec("ffmpeg  -itsoffset -4  -i $base_path/public/assets/event_video/$new_name -vcodec mjpeg -vframes 1 -an -f rawvideo -s $size $base_path/public/assets/thumbnails/$new_name.png -loglevel panic");
			shell_exec("chmod 755 $base_path/public/assets/thumbnails/$new_name.png");
			$input['promo']    = $new_name;
			$input['thumbnail']= $new_name.".png";
			}
			$input['manager_id']=  Auth::user()->id;
			$validation = Validator::make($input, Auditionevent::$rules);

			if ($validation->passes())
			{
			$this->auditionevent->create($input);
			return Redirect::to('myauditions');
			}else{
				return Redirect::to('manager_event')
						->withInput()
						->withErrors($validation)
						->with('message', 'There were validation errors.');
			}

	}
}
