<?php

class AppController extends BaseController {

    public function audition() {
        if (Auth::check()) {
            $events = DB::table('auditionevents')
                    ->leftjoin('videos', function($join) {
                        $auth_id = (string) Auth::user()->id;
                        $join->on('auditionevents.id', '=', 'videos.event_id')
                        ->on('videos.user_id', '=', DB::raw($auth_id));
                    })
                    ->select('videos.user_id', 'auditionevents.*')
                    ->where('auditionevents.date', '>=', date('Y-m-d'))
                    ->get();
        } else {

            $events = DB::table('auditionevents')
                    ->where('date', '>=', date('Y-m-d'))
                    ->get();
        }
        $prev_events = DB::table('auditionevents')
                ->where('date', '<', date('Y-m-d'))
                ->get();

        return View::make('auditions.show', compact('events', 'prev_events'));
    }

}
