
var appConst = {};

if (location.host == 'localhost') {
    appConst.base_url = location.port + '//' + location.host + '/auditionworld-laravel/public';
    
} else {
    appConst.base_url = location.port + '//' + location.host;
}


appConst.user_default_profile_pic = appConst.base_url + "/assets/profile/user.jpg";
appConst.url_share = appConst.base_url + '/ajax/share-post';
appConst.url_delete_status = appConst.base_url + "/ajax/delete_mystatus";
appConst.url_delete_myimage = appConst.base_url + "/ajax/delete_myimages";
appConst.url_delete_myvideo = appConst.base_url + "/ajax/delete_myvideo";
appConst.url_post_status = appConst.base_url + "/ajax/addstatus";
appConst.url_move_uploaded_file = appConst.base_url + "/ajax/mu-file";
appConst.url_delete_uploaded_files = appConst.base_url + "/ajax/du-file";
appConst.file_ext = "";