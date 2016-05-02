$(function () {

    var bar = $('.bar');
    var percent = $('.percent');
    var hit_files = "";
    var new_post = "";
    var progress_percentage = 0;

    var postObj = {
        resetLightBox: function () {

            $("[name='post_content']").val("");
            $("#post-file").val("");
            $("#post-file-preview").html("");
            $(".upload_new").show();

            $(".upload_new").html('<p>Upload File</p>');
            $("#post-file").prop("disabled", false);


            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
    }

    $(".upload_new").click(function (event) {
        if (!$(event.target).is('.upload')) {
            $(".upload").trigger('click');
        }

    });

    $("#cancelbtn").click(function () {

        postObj.resetLightBox();
        
        if (parseInt(progress_percentage) == 100) {
            
            $.post(appConst.url_delete_uploaded_files, new_post, function(response){
                //
            }, 'json');
            
        }

    });

    $("#post-file").change(function (evt) {
        var $this = $(this);
        var files = evt.target.files;
        var file = files[0];

        var megabyte = 1000 * 1024;
        var fsize = Math.round(file.size / megabyte);

        appConst.file_ext = file.name.split('.').pop();

        if (fsize > 10) {
            alert('Maximum filesize in 10MB');

        } else {

            $(".upload_new").html('<p>Uploading ...</p>');
            $("#post-file").prop("disabled", true);
            startupload(files);
        }


    });


    function startupload(files) {

        var percentVal = '0%';
        bar.width(percentVal);
        percent.html(percentVal);

        for (var i = 0; i < files.length; i++) {

            (function (i) {


                new jsUpload({
                    file: files[i],
                    logger: function (message) {
                        //document.getElementById("log-" + i).innerHTML = document.getElementById("log-" + i).innerHTML + message + "<br />";
                    },
                    progressHandler: function (percentVal, serverResponse) {

                        if (isNaN(percentVal)) {
                            percentVal = 100;
                        }



                        bar.width(percentVal + '%');
                        percent.html(percentVal + '%');
                        progress_percentage = percentVal;

                        if (percentVal == 100 && typeof serverResponse != "undefined" && serverResponse.action == "complete") {
                            

                            var data = {
                                action: 'complete',
                                file: serverResponse.file,
                                file_ext: appConst.file_ext,
                            }
                            $(".post-share").prop('disabled', false)
                            $.post(appConst.url_move_uploaded_file, data, function (response) {
                                $(".upload_new").hide();
                                $("#post-file-preview").html("<img src='" + response.post_preview + "' height='200px' style='margin:0 auto; display:block;'>");
                                new_post = response;
                            }, 'json');

                        }
                    },
                    // pauseButton: document.getElementById('pausebutton-' + i)

                });

            })(i);
        }
    }

    $(".post-share").click(function () {
        var url = appConst.url_share;
        new_post.post_content = $("[name='post_content']").val();

        // Insert new post
        $.post(url, new_post, function (response) {
            postObj.resetLightBox();
            new_post.post_id = response.post_id;
            new_post.data_href = response.data_href;
            set_post_timeline(new_post)
        }, 'json');
    });



    function set_post_timeline(response) {

        response.profile_pic = (response.profile_pic) ? response.profile_pic : appConst.user_default_profile_pic;
        response.fbccount = Math.floor((Math.random() * 10000));

        var html = "";
        if (response.post_type == 'image') {
            html += '<article class="white-panel">';
            html += '<span class="pull-left col-xs-11 row">';
            html += '<a href="#"><img src="' + response.profile_pic + '" alt=""></a>';
            html += '<h1><a href="' + response.profile_url + '">' + response.name + '</a></h1>';
            html += '<p><i class="fa fa-clock-o"></i>0 Hours ago</p>';
            html += '</span>';
            html += '<div class="btn-group pull-right">';
            html += '<button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>';
            html += '<ul class="dropdown-menu">';
            html += '<li><a href="#" class="post-delete-image" data-status_id="' + response.post_id + '">Delete</a></li>';
            html += '</ul>';
            html += '</div>';
            html += '<div class="clearfix"></div>';
            html += '<p class="detail">' + response.post_content + '</p>';
            html += '<div class="clearfix"></div>';
            html += '<div class="embed-responsive embed-responsive-16by9">';
            html += '<figure><a class="fancybox " onclick="viewItem(231, \'image\')" rel="1" href="' + response.image_url_slider + '" data-fancybox-group="gallery"><span><img src="' + response.image_url_slider + '"></span></a></figure>';
            html += '</div>';
            html += '<ul class="grid-menu pull-left">';
            html += '<li class="like-post"><i class="fa fa-heart-o"></i><span class="like-count">0</span></li>';
            html += '<li><a data-toggle="collapse" data-parent="#accordion" href="#collapse' + response.fbccount + '"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="' + response.data_href + '"></span></a></li>';
            html += '<li><a href="#"><i class="fa fa-eye"></i> <span class="viewnum231"> 0</span></a></li>';
            html += '</ul>';
            html += '<div class="clearfix"></div>';
            html += '<section class="comment-list panel-collapse collapse" id="collapse' + response.fbccount + '"><div class="fb-comments" data-href="' + response.data_href + '" data-width="500px" data-numposts="5"></div></section>';
            html += '</article>';
        }

        if (response.post_type == 'video') {

            html += '<article class="white-panel">';
            html += '<span class="pull-left col-xs-11 row">';
            html += '<a href="#"><img src="' + response.profile_pic + '" alt=""></a>';
            html += '<h1><a href="' + response.profile_url + '">' + response.name + '</a></h1>';
            html += '<p><i class="fa fa-clock-o"></i>0 Hours ago</p>';
            html += '</span>';
            html += '<div class="btn-group pull-right">';
            html += '<button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i> </button>';
            html += '<ul class="dropdown-menu">';
            html += '<li><a href="#" class="post-delete-video" data-status_id="' + response.post_id + '">Delete</a></li>';
            html += '</ul>';
            html += '</div>';
            html += '<div class="clearfix"></div>';
            html += '<p class="detail">' + response.post_content + '</p>';
            html += '<div class="clearfix"></div>';
            html += '<div class="embed-responsive embed-responsive-16by9">';
            html += '<video width="400" controls><source src="' + response.post_video_url + '"></video>';
            html += '</div>';
            html += '<ul class="grid-menu pull-left">';
            html += '<li class="like-post"><i class="fa fa-heart-o"></i><span class="like-count">0</span></li>';
            html += '<li><a data-toggle="collapse" data-parent="#accordion" href="#collapse' + response.fbccount + '"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="' + response.data_href + '"></span></a></li>';
            html += '<li><a href="#"><i class="fa fa-eye"></i> <span class="viewnum231"> 0</span></a></li>';
            html += '</ul>';
            html += '<div class="clearfix"></div>';
            html += '<section class="comment-list panel-collapse collapse" id="collapse' + response.fbccount + '"><div class="fb-comments" data-href="' + response.data_href + '" data-width="500px" data-numposts="5"></div></section>';
            html += '</article>';

        }

        $(".talent-grid article:first-child").after(html);
    }




    $(".browsw_div").click(function (event) {
        if (!$(event.target).is('.upload')) {
            $(".upload").trigger('click');
        }
    });

    // On delete post

    $("body").on("click", ".post-delete", function (e) {

        e.preventDefault();

        var $this = $(this);
        var status_id = $(this).attr("data-status_id");
        var url = appConst.url_delete_status + '/' + status_id;

        $.get(url, function (response) {
            $this.parents("article").remove();
        });
    });


    // Delete my image post
    $("body").on("click", ".post-delete-image", function (e) {

        e.preventDefault();

        var $this = $(this);
        var status_id = $(this).attr("data-status_id");
        var url = appConst.url_delete_myimage + '/' + status_id;

        $.get(url, function (response) {
            $this.parents("article").remove();
        });
    });

    // Delete my video post
    $("body").on("click", ".post-delete-video", function (e) {

        e.preventDefault();

        var $this = $(this);
        var status_id = $(this).attr("data-status_id");
        var url = appConst.url_delete_myvideo + '/' + status_id;

        $.get(url, function (response) {
            $this.parents("article").remove();
        });
    });

    // On submit post

    $(".post-status").click(function (e) {


        e.preventDefault();
        var $submitPost = $(".post-status");
        var s_text = $("#status_data").val();
        if (s_text == '') {
            alert('Please add your status');
        } else {

            var formdata = $submitPost.parents('form').serialize();
            var url = appConst.url_post_status;
            $.post(url, formdata, function (response) {

                $("#status_data").val("");
                response.profile_pic = (response.profile_pic) ? response.profile_pic : appConst.user_default_profile_pic;
                var html = '';
                html += '<article class="white-panel">';
                html += '<span class="pull-left col-xs-11 row">';
                html += '<a href="#"><img src="' + response.profile_pic + '" alt=""></a>';
                html += '<h1><a href="view_user_profile/290">' + response.name + '</a></h1>';
                html += '<p><i class="fa fa-clock-o"></i> 0 minute ago</p>';
                html += '</span>';
                html += '<div class="btn-group pull-right">';
                html += '<button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-angle-down"></i></button>';
                html += '<ul class="dropdown-menu">';
                html += '<li><a href="#" class="post-delete" data-status_id="' + response.status_id + '">Delete</a></li>';
                html += '</ul>';
                html += '</div>';
                html += '<div class="clearfix"></div><p class="detail" >' + response.status + '</p><div class="clearfix"></div>';
                html += '<ul class="grid-menu pull-left"></ul><div class="clearfix"></div>';
                html += '</article>';
                var formdata = $submitPost.parents('article').after(html);
            }, 'json');
        }

    });


    // Like a post
    $("body").on("click", ".like-post", function () {
        var url = appConst.url_like_post;

        var count = $(this).find('.like-count').text();

        //$.get(url, function());
        count = (count == "0") ? 1 : 0;
        $(this).find('.like-count').text(count);
    });
});
