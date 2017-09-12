<?php 
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();
	
	$post = $_POST['pos'];
	$id = $_SESSION['id'];
	$date = date('Y-m-d H:i:s');

	$perintah->getDB()->query("INSERT INTO post VALUES(null,'$id','$post','$date')");