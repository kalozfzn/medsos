<?php
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

	$sessionid = $_SESSION['id'];
	$oldpassword = $perintah->AntiInjection($_POST['oldpassword']);
	$newpassword = $perintah->AntiInjection($_POST['newpassword']);
	$repeatpassword = $perintah->AntiInjection($_POST['reppassword']);

	$cek = $perintah->getDB()->query("SELECT userid, password FROM user WHERE userid = '$sessionid'");
	$login = $cek->fetch_object();

	if (empty($oldpassword) || empty($newpassword)) {

	}
		else {
			if (password_verify($oldpassword,$login->password)) {
				$password = password_hash($newpassword,PASSWORD_DEFAULT);

				if ($repeatpassword == $newpassword) {
					$perintah->getDB()->query("UPDATE user SET password = '$password' WHERE userid = '$sessionid'");
					$perintah->getRedirect("beranda");
				}

			} else {
				echo "<script>alert('password lama tidak sesuai')</script>";
			}
		}
