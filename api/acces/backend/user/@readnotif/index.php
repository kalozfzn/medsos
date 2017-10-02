<?php
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');

session_start();
$perintah = new CORE();

	$sessionid = $_SESSION['id'];

    $perintah->getDB()->query("UPDATE post_comment SET auth = '1' WHERE postid IN(SELECT postid FROM post WHERE userid = '$sessionid') AND auth = '0'");
    $perintah->getDB()->query("UPDATE post_like SET auth = '1' WHERE postid IN(SELECT postid FROM post WHERE userid = '$sessionid') AND auth = '0'");
    $perintah->getDB()->query("UPDATE follow SET auth = '1' WHERE toid = '$sessionid' AND auth = '0'");
