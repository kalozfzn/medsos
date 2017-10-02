<?php
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

	$from = $_SESSION['id'];
	$to 	= $_POST['id'];
	$date = date('Y-m-d H:i:s');

	$perintah->getDB()->query("INSERT INTO follow SET fromid = '$from', toid = '$to', date = '$date'");
