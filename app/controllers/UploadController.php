<?php

class UploadController extends BaseController {

    public function showWelcome() {
        return View::make('hello');
    }

    public function view() {
        return View::make('upload');
    }

    public function upload() {
        $video = Input::file('video');
        $destinationPath = 'uploads/';
        $thumbnailPath = 'uploads/thumbnails';
        $filename = $video->getClientOriginalName();
        Input::file('video')->move($destinationPath, $filename);
    }

    //start mysqlinit()
    public function mysqlinit() {
        // sendAsJSON(array('saayooj'=>$_POST['tubin']));
        define('FILE_PATH', 'uploads/');
        define('PACKET_SIZE', 512 * 512); // bytes, need to be same as in JavaScript
        define('STORE_FILES', true); // whether store files or not
        
        
        

        function throwError($error) {
            echo json_encode(array(
                "error" => $error
            ));
            exit;
        }

        function sendAsJSON($array) {
            echo json_encode($array);
            exit;
        }

        if (!isset($_POST)) {
            throwError("No post request");
        }

        function newUpload() {
            
            $fileData = $_POST['totalSize'] . "|" . preg_replace('/[^A-Za-z0-9\/]/', '', $_POST['type']) . "|" . preg_replace('/[^A-Za-z0-9_\.]/', '', $_POST['fileName']);
            $originalFileName = $_POST['fileName'];
            $token = md5($fileData);
            $fileid = time() . mt_rand(5, pow(2, 31) - 1);
            
            DB::table('files')->insert(array('fileData' => $fileData, 'fileid' => $fileid, 'token' => $token, 'original_filename' => $originalFileName, 'upload_date' => 0));
            sendAsJSON(array(
                "action" => "new_upload",
                "fileid" => $fileid,
                "token" => $token
            ));
        }

        function mergeFiles() {
            
            Log::info('--------------------merging ');
            
            

            $row = DB::table('files')
                    ->where('fileid', $_POST['fileid'])
                    ->where('token', $_POST['token'])
                    ->first();
            if ($row === FALSE) {
                throwError("No file found in the database for the provided ID / token");
            }

            // check if we the file has already been uploaded, merged and completed
            if (!file_exists(FILE_PATH . $_POST['fileid'])) {

                list($fileSize, $fileType, $fileName) = explode("|", $row->fileData);

                $totalPackages = ceil($fileSize / PACKET_SIZE);

                // check that all packages exist
                for ($package = 0; $package < $totalPackages; $package++) {
                    if (!file_exists(FILE_PATH . $_POST['fileid'] . "-" . $package)) {
                        throwError("Missing package #" . $package);
                    }
                }

                // open file to create final file
                if (!$handle = fopen(FILE_PATH . $_POST['fileid'], 'w')) {
                    throwError("Unable to create new file for merging");
                }

                
                

                // write each package to the file
                for ($package = 0; $package < $totalPackages; $package++) {
                    
                    shell_exec("chmod 644  " . FILE_PATH . $_POST['fileid'] . "-" . $package);
                    

                    $contents = @file_get_contents(FILE_PATH . $_POST['fileid'] . "-" . $package);
                    if (!$contents) {
                        unlink(FILE_PATH . $_POST['fileid']);
                        throwError("Unable to read contents of package #" . $package);
                    }

                    if (fwrite($handle, $contents) === FALSE) {
                        unlink(FILE_PATH . $_POST['fileid']);
                        throwError("Unable to write package #" . $package . " to merge");
                    }
                }

                // remove the packages
                for ($package = 0; $package < $totalPackages; $package++) {
                    if (!unlink(FILE_PATH . $_POST['fileid'] . "-" . $package)) {
                        throwError("Unable to remove package #" . $package);
                    }
                }
            }
            //$orginalname = DB::table('files')->where('fileid',$_POST['fileid'])->first();
            //code for rename the file.
            //on success, update the uploaded date in mysql
            //mysql_query("UPDATE files SET upload_date = " . time() ." WHERE fileid = '".$_POST['fileid']."'");
//            DB::table('files')->where('fileid', $_POST['fileid'])->update(array('upload_date' => time()));
//            //code to rename file
//            $oldName = 'uploads/' . $_POST['fileid'];
//            $b = preg_replace('/[^A-Za-z0-9_\.]/', '', $_POST['thumb']);
//            $a = time() . $b;
//            $newName = 'uploads/' . $a;
//            rename($oldName, $newName);
//            $thumbobj = $a . '.jpg';
//            $thumb = 'uploads/thumbnails/' . $thumbobj;
//            //code to create the thumbnail of each uploaded videos.
//            $cmd = Config::get('app.ffmpegpath');
//            shell_exec("$cmd -i $newName -deinterlace -an -ss 1 -t 00:00:20 -r 1 -y -vcodec mjpeg -f mjpeg -s 120x120 $thumb 2>&1");
//            $cmd = Config::get('app.bitrate');
//            $dir = Config::get('app.uploads');
//            $cmd_bitrate = "$cmd  $dir $a";
//            $bitrate = shell_exec($cmd_bitrate);
//            // DB::table('videos')->insert(array('fileid' => $a, 'userid' => Session::get('user_id'), 'title' => $_POST['title'], 'description' => $_POST['description'], 'thumb' => $thumbobj, 'bitrate' => $bitrate));
            sendAsJSON(array(
                "action" => "complete",
                "file" => $_POST['fileid']
            ));
        }

        /**
         * After initialized the upload, we can start receiving the packets (or 'slices')
         */
        function getPacket() {
            //$sql = mysql_query("SELECT fileid FROM files WHERE fileid = '" . $_GET['fileid'] . "' AND token = '" . $_GET['token']."'");
            //$rowExists = is_resource($sql) && (mysql_num_rows($sql) > 0);
            $count = DB::table('files')->where('fileid', $_GET['fileid'])->where('token', $_GET['token'])->count();
            //die (var_dump($_GET). 'rows: '.mysql_num_rows($sql));

            if ($count > 0) {
                if (STORE_FILES) {
                    
                    if (!$handle = fopen(FILE_PATH . $_GET['fileid'] . "-" . $_GET['packet'], 'w')) {
                        throwError("Unable to open package handle");
                    }
                    

                    if (fwrite($handle, $GLOBALS['HTTP_RAW_POST_DATA']) === FALSE) {

                        throwError("Unable to write to package #" . $_GET['packet']);
                    }
                    shell_exec("chmod 644  " . FILE_PATH . $_GET['fileid'] . "-" . $_GET['packet']);
                    fclose($handle);
                }

                sendAsJSON(array(
                    "action" => "new_packet",
                    "result" => "success",
                    "packet" => $_GET['packet'],
                ));
            }
        }

        if (count($_GET) == 0) {
            if (isset($_POST['totalSize']) && isset($_POST['type']) && isset($_POST['fileName']) && is_numeric($_POST['totalSize'])) {
                newUpload();
            } else if (isset($_POST['fileid']) && isset($_POST['token']) && is_numeric($_POST['fileid']) && preg_match('/[A-Za-z0-9]/', $_POST['token'])) {
                mergeFiles();
            }
        } else {
            if (isset($_GET['fileid']) && isset($_GET['token']) && isset($_GET['packet']) && is_numeric($_GET['packet']) && is_numeric($_GET['fileid'])) {
                getPacket();
            }
        }
    }

}

//end mysqlinit()
