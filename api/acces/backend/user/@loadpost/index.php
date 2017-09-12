<?php 
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');

session_start();
$perintah = new CORE();
	
	$sessionid = $_SESSION['id'];
	$id	= $_SESSION['toid'];
	$sql = $perintah->getDB()->query("SELECT postid, userid,content,date FROM post WHERE userid = '$id'");
	while ($result = $sql->fetch_object()) {

		$username = $perintah->getUsername($result->userid);

		$image = $perintah->getUserFoto($result->userid);

		$firstime = explode(" ", $result->date);

		$time 	= explode(":", $firstime[1]);
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
                          <a href=""><i class="icon icon-left s7-like2"></i> Like</a>
                          <a href="" style="color: red;"><i class="icon icon-left s7-like2" style="color: red;"></i> Like</a>
                          <a href=""><i class="icon icon-left s7-comment"></i> Comments</a>
                        </p>
                      </div>
                      <div id="com">
                      	<div class="panel-body" style="box-shadow: 0.5px 0.5px 0.5px 0.5px gray;margin: 1%;">
                      <div class="timeline-avatar"><img src="assets/img/avatars/img4.jpg" alt="Avatar" class="circle"></div>
                      <div class="timeline-header"><span class="timeline-time">7:15 PM</span><span class="timeline-autor">Brett Harris</span>
                        <p class="timeline-activity">Mauris condimentum est</p>
                        <hr>
                        <div class="timeline-summary">
                           KomenKomen Komen Komen Komen Komen Komen Komen Komen Komen KomenKomenKomen Komen Komen KomenKomen
                           <a href="#">Readmore...</a>
                        </div>
                      </div>
                    </div>
                      </div>
                    <div class="panel-body" style="box-shadow: 0.5px 0.5px 0.5px 0.5px gray;margin: 1%;">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <textarea class="form-control" placeholder="Komentari.." rows="5"></textarea>
                      </div>
                    </div>
                    <p class="text-right">
                      <button class="btn btn-primary"><i class="icon icon-left s7-next-2"></i>Kirim</button>
                      </p>
            </div>
    </div>
<?php } ?>