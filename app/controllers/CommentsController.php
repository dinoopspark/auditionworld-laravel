<?php

class CommentsController extends BaseController {


	public function verifyguest(){
		
		$email = Input::get('email');
		$video = Input::get('video');
		$sql   = DB::table('comments')
           		 ->where('video_id','=', $video)
           		 ->where('guest_email','=',$email)
           		 ->update(array('status' => 1));
		return View::make('comments.verification');
	}
	public function delete_comment(){
		$input 	= Input::all();
		$comment = Comment::find($input['id']);

		$comment->delete();
		echo "success";
		// print_r($input);die();
	}

}