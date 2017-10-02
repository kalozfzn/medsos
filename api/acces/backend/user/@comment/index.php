<?php 
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

	$date = date('Y-m-d H:i:s');
	$sessionid = $_SESSION['id'];
	$id = $_POST['postid'];
	$comment = $_POST['id'];

	
	

		$perintah->getDB()->query("INSERT INTO post_comment VALUES(null,'$id','$sessionid','$comment','$date')");

		