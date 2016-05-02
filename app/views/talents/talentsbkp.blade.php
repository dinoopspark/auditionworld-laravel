<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        
        <script src="{{asset('assets/dists/jquery-1.11.1.min.js')}}"></script> 
        <link href="{{asset('assets/dists/bootstrap.min.css')}}" rel="stylesheet">
        <script src="{{asset('assets/dists/bootstrap.min.js')}}"></script>
        <link href="{{asset('assets/dists/jquery.fancybox.css')}}" rel="stylesheet">
        <script src="{{asset('assets/dists/jquery.fancybox.pack.js')}}"></script>
        
        
        
        
        <script src="{{asset('assets/js/app-const.js')}}"></script>
        <link href="{{asset('assets/dists/post-custom-styles.css')}}" rel="stylesheet">
        <script src="{{asset('assets/dists/jsUpload.js')}}"></script>
        <script src="{{asset('assets/dists/post-scripts.js')}}"></script>

        <title>Audition World</title>

    </head>
    <body>



    <li><a href="#" data-toggle="modal" data-target="#uploadpro_video" ><i class="fa fa-picture-o"></i> Add Photo/Video</a></li>

    <div class="container talent-grid">
        <article></article>

    </div>



    <div class="modal fade signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="uploadpro_video">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="server/post.php" enctype="multipart/form-data" method="post" class="vidupdate" id="post-image">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-left">Add Media</h4>
                    </div>
                    <div class="modal-body">

                        <textarea name="post_content" class='form-control' style='min-height:78px;border-color:#CCD1D9;padding-top:10px;margin-bottom:15px;' placeholder="Enter your thoughts about the video you are about to upload  :)"></textarea>
                        <input type='hidden' name='pagetype' id='eventid' value='feed'>

                        <input type="file" id="post-file"  name="up_data" class="upload" >

                        <div class="upload_new">    
                            <p>Upload File</p>
                        </div>

                        <div id="post-file-preview"></div>

                        <div class="post-progress">
                            <div class="progress">
                                <div class="bar"></div >
                            </div>
                            <div class="percent">0%</div >
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-right post-share" data-dismiss="modal" disabled="disabled"><i class="fa fa-pencil-square-o"></i> Share</button>
                        <button type="button" class="btn btn-default pull-left" id="cancelbtn" data-dismiss="modal" >Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>