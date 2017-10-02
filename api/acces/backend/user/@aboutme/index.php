<?php
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

  $sessionid = $_SESSION['id'];
  $username = $perintah->getUsername($sessionid);
	$work = $perintah->AntiInjection($_POST['work']);
  $birthday = $perintah->AntiInjection($_POST['birthday']);
  $phone = $perintah->AntiInjection($_POST['phone']);
  $location = $perintah->AntiInjection($_POST['location']);
  $website = $perintah->AntiInjection($_POST['website']);

  $perintah->getDB()->query("INSERT INTO about_me SET userid = '$sessionid'
                                                      ,work = '$work',
                                                      birthday = '$birthday'
                                                      ,mobile = '$phone'
                                                      ,website = '$website',
                                                      location = '$location' ");

                                                      $perintah->getRedirect("profile/$username");
