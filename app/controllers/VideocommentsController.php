<?php

class VideocommentsController extends BaseController {


	protected $videocomment;

	public function __construct(Videocomment $videocomment)
	{
		$this->videocomment = $videocomment;
	}

	public function index()
	{
		
		$videocomments = DB::table('comments')
		 				->where('status','=', 1)
		 				->where('approved','=',0)
		 				->get();
		return View::make('videocomments.index', compact('videocomments'));
	}
	
	public function edit($id)
	{
		DB::table('comments')
            ->where('id', '=',$id)
            ->update(array('approved' => 1));
            
        return Redirect::to($_SERVER['HTTP_REFERER']);
	}

	
	public function destroy($id)
	{
		// echo $id;
		$delete = DB::table('comments')
					->where('id', '=', $id)
					->delete();
		
		return Redirect::to($_SERVER['HTTP_REFERER']);
	}

}
