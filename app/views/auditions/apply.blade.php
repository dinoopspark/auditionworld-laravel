@extends('layouts.main')
@section('main')
<div class="clear">
</div>
<div id="container-aply">
    <div class="wrapper">
        <div class="left">
            <div class="left-container-aply">
                <h1>Apply Now </h1>
                <form action="participate" method="get" id="applynow-form">
                    <div class="margin-field">
                        <label>You are about to apply for the {{$events}}.
                            Give your best video to impress the Test Manager</label>
                        <div id="apinput">
                            {{$events}}
                        </div>
                    </div>
                    <div class="margin-field">
                        <label style="width:100px;margin-left:0px;margin-top:-10px;">Sample Video</label>
                                <div id="yourBtn" onclick="getFile()">Click to upload a Video</div>
                                    <div style='height: 0px; width: 0px;overflow:hidden;'>
                                        <input id="upfile" type="file" value="upload" onchange="sub(this)"/>
                                    </div>
                                </div>
                        </label>
                    <div class="margin-field">
                        <input name="" type="submit"  value="Enter Audition"/>
                    </div>
                </form>
            </div>
        </div>
   
    <div class="right">
        <div class="right-container-aply">
            <div class="right-container-aply-sub">
                <h2>Similar Auditions</h2>
               
        </div>
    </div>
</div> </div>
@stop