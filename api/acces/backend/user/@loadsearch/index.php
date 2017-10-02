<?php
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

    $id = $_POST['id'];
    $sql = $perintah->getDB()->query("SELECT userid, username FROM user WHERE username LIKE '%$id%'");
    while ($loop = $sql->fetch_object()) {
  ?>
  <div class="project-list">
      <div class="project-item" style="background-color: whitesmoke">
          <div class="project-item-user">
              <div class="user-avatar"><img src="assets/img/avatar.jpg" alt="avatar"></div>
          </div>
          <div class="project-item-state">
              <a href="<?php echo MED_URL ?>/profile/<?php echo $loop->username ?>"><?php echo $loop->username; ?></a>
          </div>
          <div class="project-item-state"></div>
          <div class="project-item-state"></div>
      </div>
  </div>
<?php } ?>
