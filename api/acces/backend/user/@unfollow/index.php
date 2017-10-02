<?php 
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

	$from = $_SESSION['id'];
	$to 	= $_POST['id'];

	$perintah->getDB()->query("DELETE FROM follow WHERE fromid = '$from' AND toid = '$to'");
	


	