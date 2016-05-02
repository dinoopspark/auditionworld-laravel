<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

App::missing(function() {
    return Response::make(View::make('errors.missing'), 404);
});

Route::any('talentdetails_images/report_spam', 'TalentsController@report_item');

Route::any('view_user_profile/authenticate', 'UsersController@authenticate');

Route::any('view_user_profile/liketalent', 'TalentsController@liketalent');

Route::any('talentdetails/report_spam', 'TalentsController@report_item');

Route::any('/', 'HomeController@homePage');

Route::any('register', 'UsersController@store');
Route::any('app/register', 'UsersController@storeForMob');

Route::post('/authenticate', 'UsersController@authenticate');
Route::post('app/authenticate', 'UsersController@authenticatemob');

Route::any('/fbauthenticate', 'UsersController@fblogin');

Route::any('test', 'HomeController@test');

Route::any('/audition', 'AuditionsController@audition');

Route::any('/logout', 'UsersController@logout');

Route::group(array('before' => 'check_admin'), function() {

    Route::any('/communicateuser/{id}', 'UsersController@communicate_user');

    Route::any('/send_mail_user', 'UsersController@send_mail_user');

    Route::any('/users', 'UsersController@index');

    Route::resource('users', 'UsersController');

    Route::any('/user_edit/{id}', 'UsersController@edit');

    Route::any('/user_update', 'UsersController@update');

    Route::any('/usershow', 'UsersController@show');

    Route::resource('auditionevents', 'AuditioneventsController');

    Route::any('/audition_events', 'AuditioneventsController@index');

    Route::resource('videocomments', 'VideocommentsController');

    Route::resource('ads', 'AdsController');

    //manage clent tool
    Route::any('/manage_client_tool', 'UsersController@manage_client_tool');

    Route::any('/manage_clients_edit/{id}', 'UsersController@manage_clients_edit');

    Route::any('/manage_clients_update', 'UsersController@manage_clients_update');

    Route::any('/manage_clients_view/{id}', 'UsersController@manage_clients_view');

    Route::any('/manage_clients_create', 'UsersController@manage_clients_create');

    Route::any('/manage_clients_add_new', 'UsersController@manage_clients_add_new');

    Route::any('/manage_clients_delete/{id}', 'UsersController@manage_clients_delete');

    Route::any('/select_source', 'UsersController@select_source');

    Route::any('/source_update', 'UsersController@source_update');

    Route::any('hidevideo/{id}', 'VideosController@hidevideo');

    Route::any('deletevideo/{id}', 'VideosController@delete_video');

    Route::any('hideimage/{id}', 'VideosController@hideimage');

    Route::any('deleteimage/{id}', 'VideosController@deleteimage');

    Route::any('adminsettings', 'UsersController@adminsettings');

    Route::any('passwordchange', 'UsersController@adminpasswordchange');

    Route::any('updateadmin', 'UsersController@updateadmin');

    Route::any('adminupdatepassword', 'UsersController@adminupdatepassword');
});

// Route::any('/audition','AuditionsController@audition');
Route::any('talents_hunt/{id}', 'AuditionsController@description');

Route::any('livechannels', 'AuditionsController@livechannels');

Route::group(array('before' => 'check_login'), function() {

    Route::any('upload_data', 'VideosController@upload_data');

    Route::any('participate', 'VideosController@store');

    Route::any('myprofile', 'UsersController@profile');


    Route::any('edit_profile', 'UsersController@editprofile');

    Route::any('update_profile', 'UsersController@updateprofile');

    Route::any('pro_pic_up', 'UsersController@prop_pic_update');

    Route::any('pro_video_up', 'UsersController@pro_video_up');

    Route::any('update_profile', 'UsersController@updateprofile');

    Route::any('verify_mobile', 'UsersController@verifymobile');

    Route::any('do_verification', 'UsersController@doverification');

    Route::any('myvideo/{id}', 'VideosController@myvideo');

    Route::any('update_pic', 'UsersController@update_pic');

    Route::any('comment_delete', 'CommentsController@delete_comment');

    Route::any('delete_video/{id}', 'VideosController@delete_video');

    Route::any('delete_image', 'VideosController@delete_image');

    Route::any('userprofile/{id}', 'UsersController@Userprofile');

    Route::any('delete_myvideos/{id}', 'VideosController@delete_myvideo');
    Route::any('ajax/delete_myvideo/{id}', 'VideosController@ajax_delete_myvideo');

    Route::any('delete_myimages/{id}', 'VideosController@delete_myimage');
    Route::any('ajax/delete_myimages/{id}', 'VideosController@ajax_delete_myimage');

    Route::any('delete_mystatus/{id}', 'VideosController@delete_mystatu');
    Route::any('ajax/delete_mystatus/{id}', 'VideosController@ajax_delete_mystatus');

    Route::any('remove_watchlist/{id}', 'VideosController@remove_watchlist');
});
//start-for mobile
Route::any('app/myprofile', 'UsersController@profilemob');
Route::any('app/updateprofile', 'UsersController@updateprofilemob');
//end-for mobile
Route::any('viewevent', 'AuditionsController@ViewAudition');

Route::any('view_user_profile/{id}', 'UsersController@view_profile');

Route::any('view_manager_profile/{id}', 'UsersController@view_manager');

Route::any('checkuser', 'AuditionsController@checkuser');

Route::any('default_video', 'UsersController@defaultVideo');

Route::any('protofolio', 'UsersController@protofolio');

Route::any('/verify/{id}', 'UsersController@verify');

Route::any('/checkmail/{id}', 'UsersController@checkverified');

Route::any('/talents', 'TalentsController@talents');
Route::any('/talents_bkp', 'TalentsController@talents_bkp');

Route::any('/talentdetails/{id}', 'TalentsController@talent_details');

Route::any('deletetalent/{id}', 'TalentsController@deletetalent');

Route::any('/talentdetails_images/{id}', 'TalentsController@talent_details_images');

Route::any('/postcomment', 'TalentsController@postcomment');

Route::any('/replycomment', 'TalentsController@replycomment');

Route::any('liketalent', 'TalentsController@liketalent');

Route::Any('viewitem', 'TalentsController@viewitem');

Route::any('report_spam', 'TalentsController@report_item');

Route::any('share/{id}', 'TalentsController@shareitem');

Route::any('addstatus', 'TalentsController@addUserstatus');
Route::any('ajax/addstatus', 'TalentsController@ajax_addUserstatus');

Route::any('/real_img', 'VideosController@real_img');

Route::any('/fetch_pages', 'TalentsController@content');

Route::any('/fetch_protfolio_img', 'TalentsController@fetch_protfoli_img');

Route::any('/fetch_data', 'TalentsController@fetch_data');

Route::any('/details/{id}', 'UsersController@details');

Route::any('approve_videos', 'UsersController@approve_videos');

Route::any('approve_images', 'UsersController@approve_images');

Route::any('spam_videos', 'TalentsController@spam_videos');

Route::any('spam_images', 'TalentsController@spam_images');

Route::any('adminapprove_video/{id}', 'UsersController@adminapprove');

Route::any('adminapprove_image/{id}', 'UsersController@adminapproveimage');

Route::Any('admindelete_image/{id}', 'UsersController@admindeleteimage');

Route::resource('roles', 'RolesController');

Route::any('roles/create', array('as' => 'admin_add_role', 'uses' => 'RolesController@create'));

Route::any('roles/{id}/edit', array('as' => 'admin_edit_role', 'uses' => 'RolesController@edit'));

Route::any('roles/{id}/destroy', array('as' => 'admin_destroy_role', 'uses' => 'RolesController@destroy'));

Route::any('roles/{id}', array('as' => 'admin_show_role', 'uses' => 'RolesController@index'));

Route::any('autocomplete', 'UsersController@autocomplete');

Route::any('reports', 'AuditioneventsController@reports');

Route::any('eventreport', 'AuditioneventsController@eventreport');

Route::any('videoplayer/{id}', 'VideosController@videoPlayer');

Route::any('protfolio_image/{id}', 'VideosController@protfolio_image');

Route::any('eventplayer/{id}', 'VideosController@eventPlayer');

Route::any('like', 'VideosController@like');

Route::any('/comment', 'VideosController@comment');

Route::any('/signature', 'UsersController@signature');

Route::any('/guestauth', 'UsersController@guestauth');

Route::any('/verifycomments', 'CommentsController@verifyguest');

Route::any('/contact', 'UsersController@contact');

Route::any('/aboutus', 'UsersController@about_us');

Route::any('/copyrights', 'UsersController@copyrights');

Route::any('/termsandcodition', 'UsersController@termsandcodition');

Route::any('/faq', 'UsersController@faq');

Route::any('sendmail', 'UsersController@sendmail');

Route::any('/contactme', 'UsersController@contactme');

Route::any('/admincontact', 'UsersController@admincontact');

Route::any('/myauditions', 'AuditionsController@myaudition');

Route::any('/getreport', 'AuditionsController@getaudition_report');

Route::any('/getweekly_report', 'AuditionsController@getweekly_report');

Route::any('/getmonthly_report', 'AuditionsController@getmonthly_report');

Route::any('previousAudition', 'AuditionsController@get_previousAudition');

Route::any('upcomingAudition', 'AuditionsController@get_upcomingAudition');

Route::any('/viewall/{id}', 'AuditionsController@viewall');

Route::any('/watchlist', 'AuditionsController@watchlist');

Route::any('/viewlist', 'AuditionsController@viewlist');

Route::any('/fileupload/{id}', 'VideosController@fileupload');

Route::any('/imageupload/{id}', 'VideosController@imageupload');

Route::any('/manager_event', 'AuditionsController@managerEvents');

Route::any('/event_manger', 'AuditioneventsController@eventManagercreate');

Route::any('checkeventname', 'AuditioneventsController@checkname');

Route::any('forgot', 'UsersController@forgot');

Route::any('password', 'UsersController@password');

Route::any('changepassword', 'UsersController@changepassword');

Route::any('updatepswrd', 'UsersController@updatepassword');

Route::any('generatexcel/{id}', 'UsersController@generatexcel');

Route::any('generatexcel_watch', 'UsersController@generatexcel_watch');

//api calls
Route::any('validate_client_tool', 'UsersController@validate_client_tool');
Route::any('sync_details', 'UsersController@sync_details');
Route::any('get_files', 'UsersController@get_files');



Route::any('/server-mysql', 'UploadmController@init');
Route::any('ajax/mu-file', 'UploadmController@ajax_upload_file');
Route::any('ajax/du-file', 'UploadmController@ajax_delete_uploaded_files');
Route::any('testpage', 'TestController@test');
Route::any('ajax/share-post', 'VideosController@ajax_insert_post');