<?php
class AuditionsController extends BaseController {

	public function audition(){
		if(Auth::check()){
		$events = DB::table('auditionevents')
				->leftjoin('videos',function($join) 
				{	
					$auth_id=(string)Auth::user()->id;
					$join->on('auditionevents.id', '=', 'videos.event_id')
						 ->on( 'videos.user_id','=',DB::raw($auth_id));
				})
				->select('videos.user_id','auditionevents.*')
				->where('auditionevents.date', '>=', date('Y-m-d')) 
				->get();
		}
		else{

			$events = DB::table('auditionevents')
					->where('date', '>=', date('Y-m-d')) 
					->get();
		}
		$prev_events = DB::table('auditionevents')
					->where('date', '<', date('Y-m-d')) 
					->get();

		return View::make('auditions.show',compact('events','prev_events'));
	}

	

public function get_previousAudition(){

$id = Auth::user()->id;
		$events = DB::table('auditionevents')
				->where('manager_id', '=',$id) 
				->where('date', '<', date('Y-m-d')) 
				->get();
$type="Previous";
return View::make('auditions.prev_aud',compact('events','type'));


}

public function get_upcomingAudition(){

if(Auth::check()){



$id = Auth::user()->id;
		$events = DB::table('auditionevents')
				->where('manager_id', '=',$id) 
				->where('date', '>=', date('Y-m-d')) 
				->get();
$type="Upcoming";
return View::make('auditions.prev_aud',compact('events','type'));
}
else{

return Redirect::to('/');


}

}

public function getaudition_report(){


		$managers=DB::table('users as u')
				->join('auditionevents as a','a.manager_id','=','u.id')
				->select('u.id','u.name','u.email')
				->distinct()
				->get();


		foreach($managers as $m){

				       $auditions=DB::table('auditionevents')
						->select('name','description','date','time','id')
						->where('manager_id','=',$m->id)
						->where('date','>=',date('Y-m-d'))
						->get();
				if(!empty( $auditions)){
					$auditionManager=$m->name; 
					$emailto=$m->email;
					$data=array();
					$report_type='Daily Report';
					foreach($auditions as $au){
							
							$users = DB::table('videos')
								->where('event_id','=',$au->id)
								->count();

							$new_users = DB::table('videos')
								->where('event_id','=',$au->id)
								->where('date','=',date("Y-m-d"))
								->count();

							echo  "<br>".$au->name."--------------------".$users.".....".$new_users."<br>";
							       
								
							 $emailcontent[$au->name."&&".$au->id] = $users."&&".$au->description."&&".$au->date."&&".$au->time."&&".$new_users;
											


						}

						Mail::send('emails.report',['emailcontent' => $emailcontent,'auditionManager' => $auditionManager,'report_type' => $report_type], function($message) use($emailto)
							{
							  
							    $message->to($emailto)->subject('Report');

							});
					}

				}


}


public function getweekly_report(){



		$managers=DB::table('users as u')
				->join('auditionevents as a','a.manager_id','=','u.id')
				->select('u.id','u.name','u.email')
				->distinct()
				->get();


		foreach($managers as $m){

				       $auditions=DB::table('auditionevents')
						->select('name','description','date','time','id')
						->where('manager_id','=',$m->id)
						->where('date','>=',date('Y-m-d'))
						->get();
				if(!empty( $auditions)){

					$auditionManager=$m->name; 
					$emailto=$m->email;
					$data=array();
					$report_type='Weekly Report';
					foreach($auditions as $au){
							
							$users = DB::table('videos')
								->where('event_id','=',$au->id)
								->count();

							$new_users = DB::table('videos')
								->where('event_id','=',$au->id)
								 ->whereBetween('date', array(date('Y-m-d', strtotime('-7 days')), date("Y-m-d")))
								->count();

							echo  "<br>".$au->name."--------------------".$users.".....".$new_users."<br>";
							       
								
							 $emailcontent[$au->name."&&".$au->id] = $users."&&".$au->description."&&".$au->date."&&".$au->time."&&".$new_users;
											


						}

						Mail::send('emails.report',['emailcontent' => $emailcontent,'auditionManager' => $auditionManager,'report_type' => $report_type], function($message) use($emailto)
							{
							  
							    $message->to($emailto)->subject('Report');

							});
				}
		}
}


public function getmonthly_report(){

 $myDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
$managers=DB::table('users as u')
				->join('auditionevents as a','a.manager_id','=','u.id')
				->select('u.id','u.name','u.email')
				->distinct()
				->get();


		foreach($managers as $m){

				       $auditions=DB::table('auditionevents')
						->select('name','description','date','time','id')
						->where('manager_id','=',$m->id)
						->where('date','>=',date('Y-m-d'))
						->get();
				if(!empty( $auditions)){
					$auditionManager=$m->name; 
					$emailto=$m->email;
					$data=array();
					$report_type='Monthly Report';
					foreach($auditions as $au){
							
							$users = DB::table('videos')
								->where('event_id','=',$au->id)
								->count();

							$new_users = DB::table('videos')
								->where('event_id','=',$au->id)
								 ->whereBetween('date', array($myDate, date("Y-m-d")))
								->count();

							echo  "<br>".$au->name."--------------------".$users.".....".$new_users."<br>";
							       
								
							 $emailcontent[$au->name."&&".$au->id] = $users."&&".$au->description."&&".$au->date."&&".$au->time."&&".$new_users;
											


						}

						Mail::send('emails.report',['emailcontent' => $emailcontent,'auditionManager' => $auditionManager,'report_type' => $report_type], function($message) use($emailto)
							{
							  
							    $message->to($emailto)->subject('Report');

							});
				}
	}


}













	public function participate(){
		$input = Input::all();
		$file = Input::file('Audvideo');
		$org_name = $file->getClientOriginalName();
		$new_name = uniqid(time()) .$org_name;
		$path = $file->move('assets/event_video',$new_name);
		shell_exec("chmod 644 $path");
		$size = '264x146';
		$base_path =  Config::get('app.base_path_project');
		$thumbnail = shell_exec("ffmpeg  -itsoffset -4  -i $base_path/public/assets/event_video/$new_name -vcodec mjpeg -vframes 1 -an -f rawvideo -s $size $base_path/public/assets/thumbnails/$new_name.png -loglevel panic");
		shell_exec("chmod 644 $base_path/public/assets/thumbnails/$new_name.png");
		// print_r($input);
		// die("Sfs");

		// $events  = 	DB::table('audition_events')
		// 			->where('id',$id)
		// 			->pluck('name');
			
		// if(Auth::check()){
		// 	return View::make('auditions.apply',compact('events'));
 	// 		}
 	// 	else{
 	// 		return Redirect::to('/');
 	// 	}
		
	}
	public function description($id){
		/*if(Auth::check()){
			/*$events =  DB::table('auditionevents')
				->leftjoin('videos',function($join) 
				{	
					$auth_id=(string)Auth::user()->id;
					$join->on('auditionevents.id', '=', 'videos.event_id')
						 ->on( 'videos.user_id','=',DB::raw($auth_id));
				})
				->select('videos.user_id','auditionevents.*')
				->where('auditionevents.id',$id)
				->get();
				
					$auth_id=Auth::user()->id;

					$events=DB::table('auditionevents')
							->join('videos','auditionevents.id','=','videos.event_id')
							->select('auditionevents.*','videos.user_id')
							->where('videos.user_id','=',$auth_id)
							->where('auditionevents.id',$id)
							->get();


					if(empty($events))
						{
					$events = DB::table('auditionevents')
					->where('auditionevents.id',$id)
					->get();

						}


			/*$events_2 =DB::table('auditionevents')
                                ->leftjoin('videos',function($join)
                                {
                                        $auth_id=(string)Auth::user()->id;
                                        $join->on('auditionevents.id', '=', 'videos.event_id')
                                                 ->on( 'videos.user_id','=',DB::raw($auth_id));
                                })
				->where('auditionevents.date', '>=', date('Y-m-d'))
                                ->select('videos.user_id','auditionevents.*')
                                ->where('auditionevents.id','<>',$id)
				->take(2)
                                ->get(); 

				$events_2=DB::table('auditionevents')
							->join('videos','auditionevents.id','=','videos.event_id')
							->where('videos.user_id','=',$auth_id)
							->where('auditionevents.date', '>=', date('Y-m-d'))
							->where('auditionevents.id','<>',$id)
							->select('auditionevents.*','videos.user_id')
							->take(2)
							->get();

		}else{
			$events = DB::table('auditionevents')
					->where('auditionevents.id',$id)
					->get();
			$events_2 = DB::table('auditionevents')
					->where('auditionevents.date', '>=', date('Y-m-d'))
                                        ->where('auditionevents.id','<>',$id)
					->take(2)
                                        ->get();
		}*/


		$videos =  DB::table('videos')
				->Join('auditionevents', 'videos.event_id', '=', 'auditionevents.id')
				->select('videos.*','auditionevents.date')
				->where('auditionevents.date','<=',date('Y-m-d'))
				->where('auditionevents.id','=',$id)
				->get();


		$events=DB::table('auditionevents')
				->join('users','users.id','=','auditionevents.manager_id')
				 ->select('auditionevents.*','users.name as manager')
				 ->where('auditionevents.id',$id)
				 ->get();


		$events_2=DB::table('auditionevents')
				->where('auditionevents.date', '>=', date('Y-m-d'))
				->where('auditionevents.id','<>',$id)
				->select('auditionevents.*')
				->take(2)
				->get();

		return View::make('auditions.details',compact('events','videos','events_2'));
	}


	public function livechannels(){

		return View::make('auditions.livechannels');



}

	public function talents(){

		$video = DB::table('videos')
				->Join('users', 'videos.user_id', '=', 'users.id')
				->Join('audition_events','videos.event_id','=','audition_events.id')
				->select('videos.thumbnail','videos.video_file','users.category','users.name','users.id','audition_events.name AS event','videos.id AS vid')
				->orderBy('videos.created_at', 'desc')
				->get();

		$ads 	= DB::table('ads')
				->lists('file_name');
				
		return View::make('auditions.talents',compact('video','ads'));
	}

	public function checkuser(){
		$event = Input::get('id');
		$user  = Auth::user()->id;
		$exist = DB::table('videos')
				->where('event_id','=',$event)
				->where('user_id','=',$user)
				->get();
		if(empty($exist))
		{
			echo "apply";
		}
		else{
			echo "applied";
		}
		die();
	}

	public function myaudition(){
		$id = Auth::user()->id;
		$events = DB::table('auditionevents')
				->where('manager_id', '=',$id) 
				->get();
		return View::make('auditions.myauditions',compact('events'));
	}
	public function viewall($id){
		$events = DB::table('videos')
				->Join('users', 'videos.user_id', '=', 'users.id')
				->leftJoin('watchlist', 'videos.id','=','watchlist.video_id')
				->select('videos.*','users.*','videos.id as v_id','watchlist.id as w_id','watchlist.id as w_id','watchlist.event_id as w_e_id','watchlist.user_id as w_u_id')
				->where('videos.event_id','=',$id)
				->get();
		return View::make('auditions.participants',compact('events','id'));
	}


	public function watchlist(){
		$event = Input::get('eid');
		$user  = Input::get('uid');
		$v_id = Input::get('v_id');
		$mark  = Auth::user()->id;
		$query = DB::table('watchlist')
				->where('event_id','=',$event)
				->where('user_id','=',$user)
				->where('marked_by','=',$mark)
				->where('video_id','=',$v_id)
				->pluck('id');
		if(empty($query)){
			$sql = DB::table('watchlist')
					->insert(array('event_id' => $event, 'user_id' => $user,'video_id'=>$v_id,
					'marked_by'=> $mark)
					);
		 echo "sucess";
		}else
		{
			echo "already";
		}
		die();
	}

	public function viewlist(){
		$mark  = Auth::user()->id;
		$events = DB::table('watchlist')
				->Join('users', 'watchlist.user_id', '=', 'users.id')
				->Join('videos', 'videos.user_id', '=', 'users.id')
				->select('videos.*','users.*','watchlist.*','watchlist.id as w_id')
				->where('watchlist.marked_by','=',$mark)
				->get();
		return View::make('auditions.watchlist',compact('events'));
	}

	public function managerEvents(){
		return View::make('auditionevents.managerevents');

	}

public function ViewAudition(){
$event=$_POST['eventid'];
DB::table('auditionevents')->where('id','=',$event)->increment('eventviews', 1);
return $event;
}
	
}
