<?php
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');

session_start();
$perintah = new CORE();

	$sessionid = $_SESSION['id'];
  $id = $_POST['id'];

	$sql = $perintah->getDB()->query("SELECT postid, userid,content,date FROM post WHERE postid = '$id'
                                    ORDER BY postid DESC LIMIT 1");

	$result = $sql->fetch_object();


		$username = $perintah->getUsername($result->userid);

		$image = $perintah->getUserFoto($result->userid);

		$firstime = explode(" ", $result->date);

		$time 	= explode(":", $firstime[1]);

    $likesql = $perintah->getDB()->query("SELECT postid, userid, date FROM post_like WHERE postid = '$result->postid'
																					AND userid = '$sessionid' ORDER BY postlikeid DESC");

    $like = $likesql->fetch_object();
?>

	<div class="row">
            <div class="col-12">
                  <div class="panel-body" style="margin: 1%;">
                      <div class="timeline-avatar"><img src="<?php echo MED_IMAGE; ?>/50/<?php echo $image; ?>" alt="Avatar" class="circle"></div>
                      <div class="timeline-header"><span class="timeline-time"><?php echo $time[0].":".$time[1]; ?></span><span class="timeline-autor"><?php echo $username; ?></span>
                        <p class="timeline-activity">Mauris condimentum est</p>
                        <hr>
                        <div class="timeline-summary">
                          <?php echo $result->content; ?> <a href="#">Readmore...</a>
                        </div>
                        <hr>
                        <p class="text-left">
                        <?php if ($like->userid == "") { ?>
                          <a href="Javascript:void(0)" id="like" data-script="<?php echo $result->postid; ?>"><i class="icon icon-left s7-like2"></i> Like</a>
                        <?php } else { ?>
                          <a href="Javascript:void(0)" id="disslike" data-script="<?php echo $result->postid; ?>" style="color: red;"><i class="icon icon-left s7-like2" style="color: red;"></i> dissLike</a>
                          <?php } ?>
                          <a href=""><i class="icon icon-left s7-comment"></i> Comments</a>
                        </p>
                      </div>
                      <div id="com">
                      <?php

                        $sqlcom = $perintah->getDB()->query("SELECT postid, userid, comment,date FROM post_comment WHERE postid = '$id'");
                        while ($com = $sqlcom->fetch_object()) {

                          $usernameComment = $perintah->getUsername($com->userid);
                          $imageComment = $perintah->getUserFoto($com->userid);

                        ?>

                      	<div class="panel-body" style="box-shadow: 0.5px 0.5px 0.5px 0.5px gray;margin: 1%;">
                      <div class="timeline-avatar"><img src="<?php echo MED_IMAGE; ?>/50/<?php echo $imageComment; ?>" alt="Avatar" class="circle"></div>
                      <div class="timeline-header"><span class="timeline-time">7:15 PM</span><span class="timeline-autor"><?php echo $usernameComment; ?></span>
                        <p class="timeline-activity"><?php echo $com->comment; ?></p>
                        <hr>
                        <div class="timeline-summary">
                           <a href="#">Readmore...</a>
                        </div>
                      </div>
                    </div>

                    <?php
                      }
                     ?>
                      </div>
                    <div class="panel-body" style="box-shadow: 0.5px 0.5px 0.5px 0.5px gray;margin: 1%;">

                      <div class="col-sm-12">
                        <textarea id="met" class="form-control" placeholder="Komentari.." rows="5"></textarea>
                      </div>
                    </div>
                    <p class="text-right">
                      <a href="Javascript:void(0)" data-script="<?php echo $result->postid; ?>" id="com" class="btn btn-primary"><i class="icon icon-left s7-next-2"></i>Kirim</a>
                    </p>

            </div>
    </div>
		<br>
