<?php
function getsubcat($a)
    {
       
    	$sub = DB::table('subcategories')->select('subcategory_name')->where('category_id','=',$a)->get();

    	$name=array();
    	foreach ($sub as $subdata)
    	{
    		$name[]=$subdata->subcategory_name;

    		
    		//$name="soni";

    	}

    	return $name;
    }

    function getComment($id,$type){

            $comment = DB::table('comments')
                        ->join('users','users.id','=','comments.user_id')
                        ->select('comments.comment','users.name','comments.id','users.profile_pic','users.id as userid')
                        ->where('comments.parent_id','=',0)
                        ->where('comments.video_id','=',$id)
			->where('comments.type','=',$type)
                        ->get();
            return $comment;
    
    }


function CountComment($id,$type){

 $CommentCount = DB::table('comments')
                        ->where('comments.video_id','=',$id)
			->where('comments.type','=',$type)
                        ->count();
            return $CommentCount;

}


function getReplycomment($id){

    $replyComment = DB::table('comments')
                        ->join('users','users.id','=','comments.user_id')
                        ->select('comments.comment','users.name','comments.id','users.profile_pic')
                        ->where('comments.parent_id','=',$id)
                        ->get();
            return $replyComment;
}

function getLoggedUserType($id){

  

    $userType=DB::table('users')
                ->where('id','=',$id)
                ->lists('user_type');

                return $userType[0];
    }



function GetLike($itemid,$type){


    $countlike=DB::table('likes')
		->where('video_id','=',$itemid)
		->where('type','=',$type)
		->where('status','=',1)->count();
    return $countlike;

}


function GetViews($itemid,$type){

   $countview=DB::table('views')
		->where('video_id','=',$itemid)
		->where('type','=',$type)
		->lists('view_count');

   if(empty($countview[0])){

    return 0;
   }
   else{
    return $countview[0];
   }


}



function getSubmission($id){

$submission = DB::table('videos')->where('event_id','=',$id)->count();

return $submission;

}


function checkApplied($eventid,$userid){

$id = DB::table('videos')->where('event_id','=',$eventid)->where('user_id','=',$userid)->lists('id');

return $id;


}

function checkShared($eventid,$userid){

$id = DB::table('shared_post')->where('audition_id','=',$eventid)->where('user_id','=',$userid)->lists('id');

return $id;


}

function getParticipantCount($id){


$users = DB::table('videos')
	   ->where('event_id','=',$id)
	   ->count();
return $users;
}

function Findate($createddate){



      $posted_at=$createddate;
      $pieces = explode(" ", $posted_at);

      $posted_date=$pieces[0];
      $today_date=date('Y-m-d');

      $posted_time=$pieces[1];  
      $posted_hours= explode(':',$posted_time);

      $current_time=date("H:i:s");
      $current_hours=explode(':',$current_time);

    if ($posted_date != $today_date){ 
              $posted_year=explode('-',$posted_date);
              $current_year=explode('-',$today_date);
              $monthNum = $posted_year[1];
              $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
              if($posted_hours[0]>=12){
                              $m='pm';
                            }
                        else{
                          $m='am';
                        }

                if($posted_year[0]==$current_year[0]){                                                                                             
                            
                 $posted_string="posted on ".$monthName." ".$posted_year[2].' at '.$posted_hours[0];
                }

                else{
                        $posted_string="posted on ".$posted_year[0].'   '.$monthName." ".$posted_year[2].' at '.$posted_hours[0];
                }

        }else{
                  
                $hr_diff=$current_hours[0]-$posted_hours[0];
                  $min_diff=$current_hours[1]-$posted_hours[1];
                if($hr_diff!=0 ) {
                  $hourdiff = round(abs((strtotime($posted_at) - strtotime(date("Y-m-d H:i:s")))/3600));
                  $posted_string= $hourdiff.' hours ago';  
                }
                else{
                 $from_time=strtotime($posted_at);
                  $to_time=strtotime(date("Y-m-d H:i:s"));
                  $posted_string=round(abs($to_time - $from_time) / 60)." minute ago"; 
                  //$hr_diff=$current_hours[1]-$posted_hours[1];
                //  $posted_string=$hr_diff.' minitues ago'; 
              }
    }


    

return $posted_string;


}
?>
