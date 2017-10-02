<?php
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

  $sessionid = $_SESSION['id'];

  $sql = $perintah->getDB()->query("SELECT userid, username, foto FROM user WHERE
                                      userid in(SELECT toid FROM follow WHERE

                                        fromid IN(SELECT toid FROM follow WHERE fromid = '$sessionid') )

                                        AND userid NOT IN(SELECT toid FROM follow WHERE

                                          fromid = '$sessionid')
                                          AND userid <> '$sessionid'");

    while ($result = $sql->fetch_object()) {
    ?>
    <div class="project-item" style="background-color: whitesmoke">
        <div class="project-item-user">
            <div class="user-avatar"><img src="assets/img/avatar.jpg" alt="avatar"></div>
        </div>
        <div class="project-item-state">
            <a href="<?php echo MED_URL ?>/profile/<?php echo $result->username ?>">
              <?php echo $result->username; ?>
            </a>
        </div>
        <div class="project-item-state"></div>
        <div class="project-item-state"></div>
        <div class="project-item-actions">
          <a id="folfriend" href="javascript:void(0)" data-script="<?php echo $result->userid ?>" class="btn btn-primary">Follow</a>
        </div>
    </div>

  <?php } ?>
