<?php

class UploadmController extends BaseController {

    const FILEPATH = "../public/uploads/";
    const PACKETSIZE = 262144; // (512 * 512)
    const STOREFILES = true;

    public static function sendAsJSON($array) {
        echo json_encode($array);
        exit;
    }

    public static function throwError($error) {
        echo json_encode(array(
            "error" => $error
        ));
        exit;
    }

    public static function init() {

        if (isset($_POST)) {

            if (count($_GET) == 0) {
                if (isset($_POST['totalSize']) && isset($_POST['type']) && isset($_POST['fileName']) && is_numeric($_POST['totalSize'])) {
                    self::new_upload();
                } elseif (isset($_POST['fileid']) && isset($_POST['token']) && is_numeric($_POST['fileid']) && preg_match('/[A-Za-z0-9]/', $_POST['token'])) {
                    self::mergeFiles();
                }
            } else {
                self::getPacket();
            }
        } else {
            self::throwError("No post request");
        }
    }

    public static function getPacket() {
        if (isset($_GET['fileid']) && isset($_GET['token']) && isset($_GET['packet']) && is_numeric($_GET['packet']) && is_numeric($_GET['fileid'])) {
            if (file_exists(self::FILEPATH . $_GET['fileid'] . "-" . $_GET['token'] . ".txt")) {
                if (self::STOREFILES) {
                    if (!$handle = fopen(self::FILEPATH . $_GET['fileid'] . "-" . $_GET['packet'], 'w')) {
                        exit;
                    }

                    if (fwrite($handle, $GLOBALS['HTTP_RAW_POST_DATA']) === FALSE) {

                        self::throwError("Unable to write to package #" . $_GET['packet']);
                    }
                    fclose($handle);
                }

                $json = array(
                    "action" => "new_packet",
                    "result" => "success",
                    "packet" => $_GET['packet'],
                );

                self::sendAsJSON($json);
            }
        }


        //  print_r($_GET);
        //  echo strlen($GLOBALS['HTTP_RAW_POST_DATA']);
    }

    public static function mergeFiles() {
        $contents = @file_get_contents(self::FILEPATH . $_POST['fileid'] . "-" . $_POST['token'] . ".txt");
        if (!$contents) {
            self::throwError("No file found for the provided ID / token");
        }

        // check if we the file has already been uploaded, merged and completed
        if (!file_exists(self::FILEPATH . $_POST['fileid'])) {

            list($fileSize, $fileType, $fileName) = explode("|", $contents);

            $totalPackages = ceil($fileSize / self::PACKETSIZE);

            // check that all packages exist
            if (self::STOREFILES) {
                for ($package = 0; $package < $totalPackages; $package++) {
                    if (!file_exists(self::FILEPATH . $_POST['fileid'] . "-" . $package)) {
                        self::throwError("Missing package #" . $package);
                    }
                }

                // open file to create final file
                if (!$handle = fopen(self::FILEPATH . $_POST['fileid'], 'w')) {
                    self::throwError("Unable to create new file for merging");
                }

                // write each package to the file
                for ($package = 0; $package < $totalPackages; $package++) {

                    $contents = @file_get_contents(self::FILEPATH . $_POST['fileid'] . "-" . $package);
                    if (!$contents) {
                        unlink(self::FILEPATH . $_POST['fileid']);
                        self::throwError("Unable to read contents of package #" . $package);
                    }

                    if (fwrite($handle, $contents) === FALSE) {
                        unlink(self::FILEPATH . $_POST['fileid']);
                        self::throwError("Unable to write package #" . $package . " to merge");
                    }
                }

                // remove the packages
                for ($package = 0; $package < $totalPackages; $package++) {
                    if (!unlink(self::FILEPATH . $_POST['fileid'] . "-" . $package)) {
                        self::throwError("Unable to remove package #" . $package);
                    }
                }
            }
        }
        $json = array(
            "action" => "complete",
            "file" => $_POST['fileid']
        );

        self::sendAsJSON($json);
        
    }

    public static function new_upload() {
        $fileData = $_POST['totalSize'] . "|" . preg_replace('/[^A-Za-z0-9\/]/', '', $_POST['type']) . "|" . preg_replace('/[^A-Za-z0-9_\.]/', '', $_POST['fileName']);

        $fileid = time() . rand(1, 150000); //the probability of this being unique is good enough in most cases

        $token = md5($fileData);

        if (!$handle = fopen(self::FILEPATH . $fileid . "-" . $token . ".txt", 'w')) {
            self::throwError("Unable to create new file for metadata");
        }

        if (fwrite($handle, $fileData) === FALSE) {
            self::throwError("Unable to write metadata for file");
        }
        fclose($handle);
        $json = array(
            "action" => "new_upload",
            "fileid" => $fileid,
            "token" => $token,
        );

        self::sendAsJSON($json);
    }

    // user uploading file
    public function ajax_upload_file() {

        $upload_status = Input::all();

        if (isset($upload_status['action']) && $upload_status['action'] == 'complete') {

            $uploaded_file = $upload_status['file'];
            $file_ext = $upload_status['file_ext'];

            if (self::is_video($uploaded_file)) {

                $vc = new VideosController();
                $result = $vc->set_post_video($uploaded_file, $file_ext);
                $result["action"] = $upload_status['action'];
                
                self::sendAsJSON($result);
                
            } else {
                // File type image
                $vc = new VideosController();
                $result = $vc->set_post_images($uploaded_file, $file_ext);
                $result["action"] = $upload_status['action'];
                
                self::sendAsJSON($result);
                
            }
            
            
            
        }
        self::sendAsJSON(array('status' => 'invalid'));
    }

    

    public static function is_video($file_name) {

        $file_path = self::FILEPATH . $file_name;
        $mime = mime_content_type($file_path);
        if (strpos($mime, 'video') !== false) {
            // treat a video file
            return true;
        }

        return false;
    }

    public function ajax_delete_uploaded_files() {

        $input = Input::all();

        if ($input['post_type'] == 'image') {
            $portfolio_path = '../public/assets/protofolio/';

            $delete_files = array(
                $portfolio_path . $input['file'],
                $portfolio_path . 'small_' . $input['file'],
                $portfolio_path . 'normal_' . $input['file'],
                $portfolio_path . 'slider_' . $input['file'],
                $portfolio_path . 'real_' . $input['file'],
            );
        }

        if ($input['post_type'] == 'video') {

            $main_file_path = "../public/assets/event_video/" . $input['file'];
            $pathinfo = pathinfo($main_file_path);

            $delete_files = array(
                $main_file_path,
                "../public/assets/thumbnails/" . $pathinfo['filename'] . ".png",
                "../public/assets/thumbnails/player_" . $pathinfo['filename'] . ".png",
            );
        }

        $deleted_files_count = 0;
        if (isset($delete_files) && !empty($delete_files)) {

            foreach ($delete_files as $value) {
                if (file_exists($value)) {
                    unlink($value);
                    $deleted_files_count++;
                }
            }

            $response = array(
                'status' => 'valid',
                'file_count' => count($delete_files),
                'deleted_files_count' => $deleted_files_count,
            );

            self::sendAsJSON($response);
        }
        
        self::sendAsJSON(array('status' => 'invalid'));
        
    }
}
