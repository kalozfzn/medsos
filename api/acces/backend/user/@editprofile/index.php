<?php 
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();
	$sessionid = $_SESSION['id'];
	$oldusername = $perintah->AntiInjection($_POST['oldusername']);
	$oldemail = $perintah->AntiInjection($_POST['oldemail']);
	$newusername = $perintah->AntiInjection($_POST['newusername']);
	$newemail = $perintah->AntiInjection($_POST['newemail']);

	$equalemail = $perintah->getUserEmail($sessionid);
	$equalusername = $perintah->getUsername($sessionid);

	if (empty($oldusername) && empty($newusername)) {

		if (empty($newemail)) {

				echo "<script>alert('tidak boleh kosong')</script>";

		} 
			else if($oldemail <> $equalemail){

				echo "<script>alert('Username Tidak sama')</script>";

			}
				else if(empty($oldemail)){

					echo "<script>alert('tidak boleh kosong')</script>";

				}
					else{

						if ($newemail == $equalemail) {
							echo "<script>alert('Email Sudah digunakan')</script>";
						}
							else{

								$perintah->getDB()->query("UPDATE user SET email = '$newemail' WHERE userid = '$sessionid'");
								$perintah->getRedirect("profile/$newusername");

							}

						

					}
	} 
		elseif (empty($oldemail) && empty($newemail)) {
			

			if (empty($newusername)) {

				echo "<script>alert('tidak boleh kosong')</script>";

			} 
				else if($oldusername <> $equalusername){

					echo "<script>alert('Email Tidak sama')</script>";

				}
					else if(empty($oldusername)){

						echo "<script>alert('tidak boleh kosong')</script>";

					}
						else{

							$perintah->getDB()->query("UPDATE user SET username = '$newusername' WHERE userid = '$sessionid'");
							$perintah->getRedirect("profile/$newusername");

						}

		}
			
				
					else if ($newemail <> "" && $newusername <> "" && $oldemail <> "" && $oldusername <> "") {

						if($oldemail <> $equalemail || $oldusername <> $equalusername){

							echo "<script>alert('Username Atau Password Tidak sama')</script>";

						}
						
							else{

								if ($newusername == $equalusername) {
									
									echo "<script>alert('Username Sudah DIgunakan')</script>";

								}
									else {

										$perintah->getDB()->query("UPDATE user SET username = '$newusername', email = '$newemail' WHERE userid = '$sessionid'");				
										$perintah->getRedirect("profile/$newusername");

									}

								
							}


					}
 
	