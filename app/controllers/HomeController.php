<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	public function homePage()
	{
		$events = DB::table('auditionevents')
				->join('users','users.id','=','auditionevents.manager_id')
				->select('users.name as username','auditionevents.*')								    
				->where('auditionevents.date', '>=', date('Y-m-d'))
				->orderBy('auditionevents.id','desc')
				->take(4)
				->get();
		/*$actor = DB::table('default_videos')
				->Join('users', 'default_videos.user_id', '=', 'users.id')
				->Join('views','default_videos.id','=', 'views.video_id')
				->select('default_videos.thumbnail','default_videos.video_file','users.category','users.name','users.id','default_videos.id AS vid','views.view_count AS count','users.profile_pic as profile_pic')
				->where('users.category', '=', 'Actor')
				->where('default_videos.approve','=',"1")
				->groupby('users.id')->distinct()
				->orderBy('views.view_count', 'desc')
				->take(10)
				->get();*/


			$actor=DB::table('users')
				->join('default_videos as dv','dv.user_id','=','users.id')
				->join('views as v','v.video_id','=','dv.id')
				->select(DB::raw('sum(v.view_count) as count,users.*,dv.id AS vid,dv.thumbnail'))
				->where('users.category', '=', 'Actor')
				->where('dv.approve','=',"1")
				->groupby('users.id')->distinct()
				->orderBy('count', 'desc')
				->take(10)
				->get();


		$model = DB::table('default_videos')
				->Join('users', 'default_videos.user_id', '=', 'users.id')
				->Join('views','default_videos.id','=', 'views.video_id')
				->select('default_videos.thumbnail','default_videos.video_file','users.category','users.name','users.id','default_videos.id AS vid','views.view_count AS count')
				->where('users.category', '=', 'Model')
				->where('default_videos.approve','=',"1")
				->orderBy('views.view_count', 'desc')
				->get();
		$actor_all = DB::table('users')
				->where('users.category', '=', 'Actor')
                                ->orderBy('id', 'desc')
                                ->get();
		// $queries = DB::getQueryLog();
		// $last_query = end($queries);
		// print_r($last_query);
		// 		print_r($actor);



		return View::make('hello',compact('events','actor','model','actor_all'));
	}

	public function test()
	{
		return View::make('test');
	}

}
