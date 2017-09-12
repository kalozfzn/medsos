<?php 
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

	    $sessionid = $_SESSION['id'];

	    $id = $_SESSION['toid'];

	    $followsql = $perintah->getDB()->query("SELECT fromid, toid FROM follow WHERE fromid ='$sessionid' AND toid = '$id' ");

	    $follow = $followsql->fetch_object();

		if ($follow->fromid <> "") {

?>

<a class="btn btn-primary" id="ufol" href="javascript:void(0)" data-script="<?php echo $id ?>"><i class="icon icon-left s7-delete-user"></i> UnFollow</a>
<?php 
		} 
			else {
 ?>
 <a id="fol" href="javascript:void(0)" data-script="<?php echo $id ?>" class="btn btn-primary"><i class="icon icon-left s7-add-user"></i> Follow</a>
 <?php 		}
  ?>
<a class="btn btn-primary"><i class="icon icon-left s7-user"></i> Followers</a>
<a class="btn btn-primary"><i class="icon icon-left s7-users"></i> Following</a>