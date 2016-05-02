$(function () {

    var bar = $('.bar');
    var percent = $('.percent');
    var hit_files = "";
    var instant_upload_img = "";

    var postObj = {
        cancel: function () {
            $("#status_text").val("");
            $("#post-file").val("");
            $("#post-file-preview").html("");
            $(".upload_new").show();
            instant_upload_img = ""

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
        postObj.cancel();
    });



    $("#post-file").change(function (evt) {
        var $this = $(this);
        var files = evt.target.files;

        startupload(files)

        for (var i = 0, f; f = files[i]; i++) {

            var megabyte = 1000 * 1024;
            var fsize = Math.round(f.size / megabyte);
            if (fsize <= 10) {
            } else {
                alert('Maximum filesize in 10MB');
                break;
            }

            var reader = new window.FileReader();

            reader.onload = (function (theFile) {
                return function (e) {
                    var re = e.target.result.split('/');
                    var type = re[0].split(':');
                    if (type[1] == 'image') {
                        $(".upload_new").hide();
                        $("#post-file-preview").html("<img src='" + e.target.result + "' height='200px' style='margin:0 auto; display:block;'>");
                        instant_upload_img = e.target.result;
                    }
                    if (type[1] == 'video') {
                        $("#post-file-preview").html("<video src='" + e.target.result + "' height='250px' width='350px' style='margin:0 auto; display:block;'></video>");
                    }
                };

            })(f);

            reader.readAsDataURL(f);
        }

    });


    $(".post-share").click(function () {

        var url = "server/post.php";
        var post_content = $("[name='post_content']").val();
        var formdata = {post_content: post_content};

        if (instant_upload_img != "") {
            var html = '<img src="' + instant_upload_img + '" width="350px"><p>' + post_content + '</p>';
            $(".talent-grid article:first-child").after(html);
        }

        postObj.cancel();

        $.post(url, formdata, function (response) {

        });
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
                    progressHandler: function (percentVal, serverFileId) {
                        console.log(percentVal);
                        bar.width(percentVal + '%');
                        percent.html(percentVal);
                    },
                    //pass the reference to pauseButton element 
                    pauseButton: document.getElementById('pausebutton-' + i)

                });

            })(i);
        }
    }



    /*
     The following function will generate this <li> item:
     <li id="file-item-0">
     <span class="filename"></span>
     <div id="pausebutton-0" class="pauseButton small button green">Pause</div>
     <div id="progressbar-0" class="progressbar"></div>
     <div id="log-link-0" class="log-link">Open log v</div>
     <div id="log-0" class="log">#Log...<div>
     </li>
     */
    function createPreviewElements(files) {
        this.files = files;

        for (var i = 0; i < this.files.length; i++) {

            this.fileName = this.files[i].name;

            //shorten long filenames
            if (this.fileName.length > 45)
                this.fileName = this.fileName.substr(0, 45) + '...';

            this.fileName = htmlEscape(this.fileName);
            var droppedFiles = document.getElementById('dropped-files');

            //create <li> item
            var item = document.createElement('li');
            item.id = 'file-item-' + i;
            droppedFiles.appendChild(item);

            //create "filename"
            var filename = document.createElement('span');
            filename.className = 'filename';
            filename.innerHTML = this.fileName;
            item.appendChild(filename);

            //create space for download link
            var downloadLink = document.createElement('a');
            downloadLink.id = 'downloadLink-' + i;
            downloadLink.className = 'downloadLink';
            downloadLink.target = '_blank';
            item.appendChild(downloadLink);

            //add pause button
            var pause = document.createElement('div');
            pause.id = 'pausebutton-' + i;
            pause.className = 'pauseButton small button green';
            pause.innerHTML = 'Pause';
            //custom property
            pause.uploadState = 'uploading';
            item.appendChild(pause);

            //create progressbar
            var progress = document.createElement('div');
            progress.id = 'progressbar-' + i;
            progress.className = 'progressbar';
            item.appendChild(progress);
            $("#progressbar-" + i).progressbar({value: 0.01}); //initalize the jquery progressbar 

            //create the "open log" link
            var loglink = document.createElement('div');
            loglink.id = 'log-link-' + i;
            loglink.className = 'log-link';
            loglink.innerHTML = 'Open log >';
            item.appendChild(loglink);

            //create the logger element
            var log = document.createElement('div');
            log.id = 'log-' + i;
            log.className = 'log';
            log.style.display = 'none';
            log.innerHTML = '#Log...<br>';
            item.appendChild(log);


            //-add event listener to to onclick to show the log
            (function (i, loglink) {
                loglink.onclick = function () {
                    $('#log-' + i).slideToggle('fast');

                    if (loglink.innerHTML == 'Close log v') {
                        loglink.innerHTML = 'Open log >';

                    } else {
                        loglink.style.display = 'block';
                        loglink.innerHTML = 'Close log v';
                    }
                };
            })(i, loglink);

            //Update the preview of resumed uploads, passing the elements we want to change, like progressbar, pausebutton..
            updateResumedItems(this.files[i], progress, pause, downloadLink);

            //end for loop
        }
    }

});
