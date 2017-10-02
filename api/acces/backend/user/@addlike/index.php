<?php
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

	$date = date('Y-m-d H:i:s');
	$sessionid = $_SESSION['id'];
	$id = $_POST['id'];

		$perintah->getDB()->query("INSERT INTO post_like SET postid = '$id', userid = '$sessionid', date = '$date'");
