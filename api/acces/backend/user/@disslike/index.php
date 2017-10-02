<?php 
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

	$sessionid = $_SESSION['id'];
	$id = $_POST['id'];
	
	$perintah->getDB()->query("DELETE FROM post_like WHERE postid = '$id' AND userid = '$sessionid'");