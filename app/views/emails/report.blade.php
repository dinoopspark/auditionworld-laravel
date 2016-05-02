
<!DOCTYPE html>
<html lang=&quot;en-US&quot;>
<head>
<meta charset=&quot;utf-8&quot;>
<style>
        body {
            margin: 0px;
            padding: 0px;
            font-family: Arial, Helvetica, sans-serif;
            color: #000;
        }
        h1,
        h2,
        h3,
        h4,
        h4,
        h5,
        ul,
        p {
            margin: 0px;
            padding: 0px;
        }
        p {
            font-size: 13px;
            line-height: 20px;
            color: #555;
        }
        img {
            border: 0;
        }
		table, th, td {
			border:none;
			border-collapse: collapse;
		}
    </style>
</head>
<body style="background-color:#D8D8D8;height: 700px !important;width: 600px !important;padding:75px 75px 75px 75px !important;">


<div style="background-image:url('  http://auditionworldtv.com/assets/new_theme/images/e-banner.jpg'); height:200px;width:600px;">


</div>


<div style=" background-color:#FFFFFF; width:600px;">


<p style="color:#000000; line-height: 200%; padding:15px;">Hi {{ $auditionManager }},</p>

<p style="color:#000000; line-height: 200%; padding:15px;"> Please check the {{ $report_type }} of your auditions.</p>

<table align="center" cellpadding="0" cellspacing="0" width="600" border="0">
        <tr>
            <td>

            <table width="100%" cellpadding="5" cellspacing="0" border="0" style="border: solid 1px #e5e5e5">

               	<tr bgcolor="#e74b3c" valign="middle" align="left" height="40">
                    <th width="100" style="font-size:13px; font-family: Arial, Helvetica, sans-serif; color:#ffffff; line-height: 20px;">Name</th>
                    <th width="100" style="font-size:13px; font-family: Arial, Helvetica, sans-serif; color:#ffffff; line-height: 20px;">Description</th>
                    <th width="150" style="font-size:13px; font-family: Arial, Helvetica, sans-serif; color:#ffffff; line-height: 20px;">No.of Profile Applied</th>
                    <th width="150" style="font-size:13px; font-family: Arial, Helvetica, sans-serif; color:#ffffff; line-height: 20px;">New Application	</th>
                    <th width="100" style="font-size:13px; font-family: Arial, Helvetica, sans-serif; color:#ffffff; line-height: 20px;">Date</th>
                  </tr>

<?php $i=2;?>
@foreach($emailcontent as $a_name=> $count)

                     <?php  $subs1=explode("&&",$a_name);?>
		     <?php $subs2=explode("&&",$count);?>
@if($i%2==0)
<?php $bgclr='#FFFFFF';?>
@else
<?php $bgclr='#e5e5e5';?>

@endif

                    
                      <tr bgcolor="<?php echo $bgclr; ?>" align="left" height="35">
                          <td style="font-size:13px; font-family: Arial, Helvetica, sans-serif; color:#000; line-height: 20px;">
                          {{ $subs1[0] }}
                          </td>
                      <td style="font-size:13px; font-family: Arial, Helvetica, sans-serif; color:#000; line-height: 20px;">
                          {{ $subs2[1] }}
                       </td>
                       
                       <td style="font-size:13px; font-family: Arial, Helvetica, sans-serif; color:#000; line-height: 20px;">
                          {{ $subs2[0] }}
                       </td>
                       
                       <td style="font-size:13px; font-family: Arial, Helvetica, sans-serif; color:#000; line-height: 20px;">
                          {{ $subs2[4] }}
                       </td>
                       
                       <td style="font-size:13px; font-family: Arial, Helvetica, sans-serif; color:#000; line-height: 20px;">
                          {{ $subs2[2] }}
                       </td>
                  </tr>
      
<?php $i++; ?>            
 @endforeach
                    
            </table>
            </td>
          </tr>
        </table>

<div style=" text-align:center; padding-top:15px; padding-bottom:15px; background-color:#ffffff;">
<button type="button" value="Check Now" Style="border-radius: 4px;background-color: #008CBA; border: none;
    color: #FFFFFF;
    padding: 15px 13px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    cursor: pointer;" > <a href="http://auditionworldtv.com/upcomingAudition" style="text-decoration:none;color: #FFFFFF">Check Now</a></button></div>
</div>
 <div style="background-color:#1d1d1d;width:585px; padding:10px 5px 10px 10px !important;">
<p  style="color:#FFFFFF; line-height: 200%;"><span>Audition World Support Team </span>  </p>
<a style="color:#FFFFFF; line-height: 200%;" href="www.auditionworldtv.com">AuditionWorldTV</a>
</div>


</body>
</html>




