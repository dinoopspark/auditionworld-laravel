<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Audition Tool</title>
<!-- <link href="<?php //echo URL::asset('assets/css/main-style.css') ?>" rel="stylesheet" type="text/css" />     -->
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.min.css')}}"> 
<link rel="stylesheet" href="{{URL::asset('assets/css/screen.css')}}" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}" type="text/css" media="screen" title="default" />

<script src="{{URL::asset('assets/js/jquery/jquery-1.4.1.min.js') }}" type="text/javascript"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 
<!--  checkbox styling script -->
<script src="{{URL::asset('assets/js/jquery/ui.core.js') }}" type="text/javascript"></script>
<script src="{{URL::asset('assets/js/jquery/ui.checkbox.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/js/jquery/jquery.bind.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo URL::asset('assets/js/custom.js') ?>"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="{{ URL::asset('assets/js/jquery/jquery.selectbox-0.5.js') }}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>


<!--  styled select box script version 2 --> 
<script src="{{ URL::asset('assets/js/jquery/jquery.selectbox-0.5_style_2.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="{{ URL::asset('assets/js/jquery/jquery.selectbox-0.5_style_2.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="{{ URL::asset('assets/js/jquery/jquery.filestyle.js')}}" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
	image: "images/forms/upload_file.gif",
	imageheight : 29,
	imagewidth : 78,
	width : 300
	});
});
</script>

<!-- Custom jquery scripts -->
<script src="{{ URL::asset('assets/js/jquery/custom_jquery.js')}}" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="{{ URL::asset('assets/js/jquery/jquery.tooltip.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/jquery/jquery.dimensions.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 

<link rel="stylesheet" href="{{ URL::asset('assets/css/datePicker.css') }}" type="text/css" />
<script src="{{ URL::asset('assets/js/jquery/date.js" type="text/javascript') }}"></script>
<script src="{{ URL::asset('assets/js/jquery/jquery.datePicker.js') }}" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
 $(function(){

// initialise the "Select date" link
  $('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="{{ URL::asset('assets/js/jquery/jquery.pngFix.pack.js') }}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>




<!--<style>

.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1;display: block;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>-->

<style>
.select li:hover ul{display:block;}
.drop-test{
    position: absolute;
    display: none;
    background-color:#424242;
    width:200px;
    margin-top:37px;
}
.drop-test li{float:left; list-style:none;width:200px; font-weight:bold;}
</style>
<style>
        .beta-icon {border-radius: 4px;background-color: #e74c3c;color: #fff;padding:0px 4px 1px 4px;font-size:12px;margin-left: 3px;}
    </style>
</head>
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">

	<a href=""><img src="{{ URL::asset('assets/new_theme/images/logo.png')}}" width="156" height="40" alt="" />
<span class="beta-icon">Beta</span></a>
	</div>
	<!-- end logo -->
	<!--  start top-search -->
	<!-- <div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		 
		<select  class="styledselect">
			<option value="">All</option>
			<option value="">Products</option>
			<option value="">Categories</option>
			<option value="">Clients</option>
			<option value="">News</option>
		</select> 
		 
		</td>
		<td>
		<input type="image" src="assets/images/shared/top_search_btn.gif"  />
		</td>
		</tr>
		</table>
	</div> -->
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>



<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<a href="{{ URL::asset('/logout') }}" id="logout"><img src="{{ URL::asset('assets/admin_images/shared/nav/nav_logout.gif')}}" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav" style="width:900px; display: inline-flex; font-family: Arial,Helvetica Neue,Helvetica,sans-serif; " >
		<div class="table" style="display: inline-flex;">

	
		




<ul class="select"><li><a href=""><b style="color: #fff;">Users</b></a>
                   <ul class="drop-test">
		      <li><a href="{{ URL::asset('/users?type=2')}}"><b> Audition Managers</b></a></li>
		<li><a href="{{ URL::asset('/users?type=3')}}"><b> Users</b></a></li>
		   </ul> 
		</li>
		
		</ul>



		@if(Auth::user()->id == "1")
		<ul class="current">
			<li><a href="{{ URL::asset('/roles')}}"><b>Roles</b><!--[if IE 7]><!--></a><!--<![endif]-->
		</li>
		</ul>
		@endif
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select">
			<li>
				<a href="{{ URL::asset('/audition_events') }}"><b>Events</b><!--[if IE 7]><!--></a><!--<![endif]-->
		
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="{{ URL::asset('/videocomments') }}"><b>Comments</b><!--[if IE 7]><!--></a><!--<![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="{{ URL::asset('/ads') }}"><b>Ads</b><!--[if IE 7]><!--></a><!--<![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
	@if(Auth::user()->user_type == "admin")	
	<!--<ul class="select"><li><a href="#nogo"><b>Manage</b> 
	
		<div class="select_sub"> 
		 	<ul class="sub">
				<li><a href="{{ URL::asset('/approve_videos') }}">Approve videos</a></li>
				<li><a href="{{ URL::asset('/approve_images') }}">Approve Images</a></li>
				<li><a href="{{ URL::asset('/admincontact') }}">Contact</a></li>
			</ul> 

		</div>
		
		</li>
		</ul> -->



			<div class="dropdown">
<ul class="select">
		<li><a href="#nogo"><b>Approve</b></a>
     	<ul class="drop-test">
            <li><a href="{{ URL::asset('/approve_videos') }}">Approve videos</a></li>
				<li><a href="{{ URL::asset('/approve_images') }}">Approve Images</a></li>
				<li><a href="{{ URL::asset('/admincontact') }}">Contact</a></li>
        </ul>
</li>
</ul>
		
<!--<div class="dropdown-content select_sub">

<ul class="sub">
 <li><a href="{{ URL::asset('/approve_videos') }}">Approve videos</a></li>
				<li><a href="{{ URL::asset('/approve_images') }}">Approve Images</a></li>
				<li><a href="{{ URL::asset('/admincontact') }}">Contact</a></li>
</ul>
  </div>-->
</div>

		@endif
			<div class="nav-divider">&nbsp;</div>		
			<div class="dropdown">
				<ul class="select">
						<li><a href="#nogo"><b>Spam Items</b></a>
				     	<ul class="drop-test">
					    <li><a href="{{ URL::asset('/spam_videos') }}">videos</a></li>
				           <li><a href="{{ URL::asset('/spam_images') }}">Images</a></li>							
					</ul>
				</li>
				</ul>
			</div>
			<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="{{ URL::asset('/reports') }}"><b>Reports</b><!--[if IE 7]><!--></a><!--<![endif]-->
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>

                <ul class="select"><li><a href="{{ URL::asset('/select_source') }}"><b>Source</b><!--[if IE 7]><!--></a><!--<![endif]-->
                </li>
                </ul>
		<div class="nav-divider">&nbsp;</div>
		<ul class="select"><li><a href="{{ URL::asset('/manage_client_tool') }}"><b>Manage Client Tool</b></a></li></ul>

		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href=""><b style="color: #fff;">Settings</b></a>
                   <ul class="drop-test">
		      <li><a href="{{ URL::asset('/adminsettings') }}"><b> Profile Edit</b></a></li>
		<li><a href="{{ URL::asset('/passwordchange') }}"><b> Change Password</b></a></li>
		   </ul> 
		</li>
		<!--<li><a href="{{ URL::asset('/adminsettings') }}"><b> Profile Edit</b></a></li>
		<li><a href="{{ URL::asset('/passwordchange') }}"><b> Change Password</b></a></li>-->
		</ul>

		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->
 
 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<!-- <div id="page-heading"><h1>Add product</h1></div> -->


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="{{asset('/assets/admin_images/shared/side_shadowleft.jpg')}}" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="{{asset('/assets/admin_images/shared/side_shadowright.jpg')}}" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	 @yield('main')	
	</td>
	
</tr>
</table>


<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>









 





<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<div id="footer-left">
	Admin  &copy; Copyright Audition. <a href=""><?php echo Config::get('app.url');?></a>. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>
