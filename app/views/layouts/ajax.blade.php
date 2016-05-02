<link href="<?php echo URL::asset('assets/css/main-style.css') ?>" rel="stylesheet" type="text/css" />   
 <?php if(Session::has('message')){?>
        <div class="flash alert">
          <p style="color:red;margin-left: 28px;"><?php echo Session::get('message');?></p>
        </div>
     <?php } ?>

            @yield('main')