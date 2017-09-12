<?php 
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

      $id = $_SESSION['toid'];


      $followers      = $perintah->countFollowers($id);

      if ($followers >= 1000000) {

        $cfollowers = $followers / 1000000;

        echo $cfollowers." M";


      } 


        else if($followers >= 1000){

            $cfollowers = $followers / 1000000;

            echo  $cfollowers." K";

        } 


          else if($followers == 0){

            echo 0;;    

          }

          else {

            echo $followers;

          }

      