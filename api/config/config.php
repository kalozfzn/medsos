<?php

$MAIN_URL        = "http://localhost/eresto/medsos/core/";
$MAIN_URL        = rtrim($MAIN_URL,'/\\');

$API_URL        = "http://localhost/eresto/medsos/api/";
$API_URL        = rtrim($API_URL,'/\\');


define ('MED_URL',$MAIN_URL);
define ('MED_API',$API_URL);
define ('MED_IMAGE',$MAIN_URL.'/static/upload/');

define ('MED_PASSWORD_HASH','$2a$07$aYdd86nQz81ITkdKIxzerfaek4l0za50oLVDW$');


define('MED_BASE_FRONTEND', '<base href="'.MED_URL.'/static/frontend/" />');
define('MED_BASE_BACKEND', '<base href="'.MED_URL.'/static/backend/" />');

define ('MED_HOST','localhost'); // Your url local
define ('MED_USER','kaloz'); // your name user
define ('MED_PASS','gajelas'); // your name password
define ('MED_DBNM','media'); // your name media

date_default_timezone_set('Asia/Jakarta');

error_reporting(0);
?>
