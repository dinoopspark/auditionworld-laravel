<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>404 Not found</title>

<!-- Bootstrap -->
<link href="css/style.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #loader-wrapper {
        display: table;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10000;
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#e74c3c+0,932626+100 */
background: #e74c3c; /* Old browsers */
background: -moz-radial-gradient(center, ellipse cover,  #e74c3c 0%, #932626 100%); /* FF3.6-15 */
background: -webkit-radial-gradient(center, ellipse cover,  #e74c3c 0%,#932626 100%); /* Chrome10-25,Safari5.1-6 */
background: radial-gradient(ellipse at center,  #e74c3c 0%,#932626 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e74c3c', endColorstr='#932626',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

        }
        #loader {display: table-cell; vertical-align: middle;text-align:center;}
        #loader img{width: 270px}
        .error-message{font-family:'robotolight'; font-size: 28px; color: #fff;}
        #loader .bten{background-color: #fff;color:#e74c3c!important; line-height: 45px; padding-left: 15px; padding-right: 15px; height: 45px; margin-top: 30px; font-family:'robotolight'; font-size: 15px; }
        #loader .bten:hover{background-color: #e74c3c; border: solid 1px #fff; color: #fff!important}
        
        @media screen and (max-width:360px) {
          #loader img{width: 200px}
          .error-message{ font-size: 20px;}
            #loader .bten{ margin-top: 20px; height: 35px; line-height: 35px;}
        }
    </style>
</head>
<body>
<div id="loader-wrapper">
    <div id="loader">
        <img src="/assets/new_theme/images/404.svg" alt="">
        <p class="error-message">Component not found.</p>
        <a class="bten" href="{{URL::to('/')}}" title="HOME"><i class="fa fa-chevron-left"></i> Go Back Home</a>
   </div>
</div>
</body>
</html>
