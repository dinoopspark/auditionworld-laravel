@extends('layouts.audition_manager')

@section('main')
<link href="<?php echo URL::asset('assets/css/jquery.alerts.css') ?>" rel="stylesheet" type="text/css" media="screen" />
<script src="<?php echo URL::asset('assets/js/jquery.alerts.js') ?>" type="text/javascript"></script>
<!--left-->
<div class="left-aud">
    <div class="left-container-audition-des">

        <div class="head-title ">
            <h1 class="head-title-aud">Contestants </h1></div>
        <div class="space-gen1"> </div>
    </div>
</div>
<div style="float:right">
    <input type="button" onclick="download('{{$id}}')" id="download_btn" class="btn btn-info" value="Download excel">
    <a href="/viewlist" target="blank_">View watch list</a>
</div>
<div class="lft-cnt" style="margin-top:55px;"> 
    <div class="aud-list-outer">
        <div class="aud-list-lft"> 



            @if(count($events) == "0")
            <tr>
                <td>
                    No contestants found
                </td>
            </tr>
            @else
            <table class="table table-striped table-bordered">
            <!--<table style="width:900px" border="1">-->
                <th>Sl.No</th>
                <th>Name</th>
                <th>Thumbnail</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Add to watchlist</th>
                <?php $i = 1; ?>
                @foreach ($events as $event)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$event->name}}</td>
                    <td>
                        <div class="videos portfolio group">
                  <!--                    <a  rel="prettyPhoto[movies]" target="blank_" href="<?php echo Config::get('app.url'); ?>/eventplayer/{{$event->v_id}}"> --> <button onclick="load_video('{{$event->video_file}}')" type="button" class="" data-toggle="modal" data-target="#myModal">
                                <img src="/assets/thumbnails/{{$event->thumbnail}}" width="140" alt="Despicable Me"/> 
                            </button> <!--</a>-->
                        </div>
                    </td>
                    <td>{{$event->email}}</td>		
                    <td>{{$event->phone}}</td>
                    <td>
                        @if(empty($event->w_id))
                        <button id="{{$event->user_id}}" event="{{$event->event_id}}" video_id="{{$event->v_id}}"  class="watchlist btn btn-primary">Add</button>
                        @endif
                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach
            </table>
            @endif
        </div>
    </div>
</div>
</div>
<style>
    .foter-main {
        position: fixed;
        bottom: 0px;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" style="margin-left:0;width:100%;background:none;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Video</h4>
            </div>
            <div id="video_content" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
    function load_video(id){
    $("#video_content").html('<iframe width="100%" height="380" src="/assets/event_video/' + id + '" frameborder="0" allowfullscreen></iframe>');
    }
    function download(id){
    $("#download_btn").prop('disabled', true);
    $.get("{{URL::to('generatexcel')}}/" + id, function(data, status){
    data = $.trim(data);
    $('#download_btn').prop('disabled', false);
    window.location = '{{URL::to('assets / files / ')}}' + '/' + data;
    });
    }
</script>

@stop
