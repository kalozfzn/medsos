<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();
	
	$username = $perintah->AntiInjection($_POST['username']);
	$password = $perintah->AntiInjection($_POST['password']);


	$login = $perintah->getDB()->query("SELECT userid, username,password,usertype FROM user WHERE username = '$username'");


	$login = $login->fetch_row();
	$_SESSION['id'] = $login[0];
	$id = $login[0];
			


	if (empty($username) or empty($password)) {
		$perintah->getAlert("error","opss","tida boleh ada yang kosong");
	}	
		else {

			if (!$login[0]) {
				echo "<script>alert('gagal')</script>";

			} 
				else {
						if (password_verify($password,$login[2])) {
							if ($login[3] == "user") {

								$perintah->getDB()->query("UPDATE user SET status = 'online' WHERE userid = '$id'");

								$perintah->getRedirect("beranda");

							} 

							else if($login[3] == "admin"){
								$perintah->getDB()->query("UPDATE user SET status = 'online' WHERE userid = '$id'");

								$perintah->getRedirect("admin");

							}

						}
							else {
								echo "<script>alert('gagal verifi')</script>";
							}
					

				}
		}

	



