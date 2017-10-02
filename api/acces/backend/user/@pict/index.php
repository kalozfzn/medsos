<?php
require('../../../../../core/static/frontend/asset/lib/class.upload.php');
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');

	session_start();
	$perintah = new CORE();

	$sessionid = $_SESSION['id'];
	$foto = $_FILES['foto'];
	$path = "../../../../../core/static/upload";

	$upload = $perintah->upload($foto,$path);

	$perintah->getDB()->query("UPDATE user SET foto = '$upload' WHERE userid = '$sessionid'");
	$perintah->getRedirect("beranda");
