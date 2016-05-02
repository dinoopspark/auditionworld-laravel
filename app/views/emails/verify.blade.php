
Hi {{$name}}
<br/>
This is an automatic response sent to those who wish to register
an email address with AuditionTool in order to verify that this is a valid address.

<br/>
To register the following email address({{$email}})to "{{$name}}"
please enter the verification code listed above on your smartphone.
<br/>

If you are reading this email on an iPhone or Android,
please tap the following link to complete the email registration process.

<br/>

<?php echo Config::get('app.url')."/checkmail/".$enc_key ?>
