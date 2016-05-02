<?php

class TestController extends BaseController {

    public static $column = 25;

    function test() {



		$uploadfile = time() . '-' . $_POST['fileName'];
		$uploadfilename = $_FILES['file']['tmp_name'];

		$destination = "../public/uploads";
		 
		if(move_uploaded_file($uploadfilename, $destination.'/'.$uploadfile)){
		        echo 'File successfully uploaded!';
		} else {
		        echo 'Upload error!';
		}

		die();
        
    }

   

}
