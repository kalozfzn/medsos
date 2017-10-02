<?php
require('../../../../config/config.php');
require('../../../../config/core.php');
require('../../../../core/router.php');
require('../../../../core/class.php');


session_start();
$perintah = new CORE();

    $sessionid = $_SESSION['id'];

    $sql = $perintah->getDB()->query("SELECT postid, userid, comment, date FROM post_comment WHERE postid IN(SELECT postid FROM post WHERE userid = '$sessionid') GROUP BY postid ORDER BY postcommentid DESC");
        while ($b = $sql->fetch_object()) {

?>
    <ul>
        <?php
        $loadsql = $perintah->getDB()->query("SELECT postid, userid, comment, date FROM post_comment WHERE postid =
                                              '$b->postid' GROUP BY userid ORDER BY postcommentid DESC");

        ?>
        <li><a href="javascript:void(0)" id="men" data-script="<?php echo $b->postid ?>">
                <div class="icon"><span class="s7-check"></span></div>
                <div class="content">
                  <span class="desc">
                    <strong>

                      <?php

                      while ($load = $loadsql->fetch_object()) {
                          $name = $perintah->getUsername($load->userid);
                          $name = $name.",";
                          $allname = ltrim($name,",");
                          echo $allname;
                        }

                       ?>
                    </strong>
                    Mengomentari post anda
                  </span>
                  <span class="date">10 minutes ago</span></div>
            </a>
        </li>
        <?php

  }
    ?>
    </ul>
    <?php

        $sqllike = $perintah->getDB()->query("SELECT postid, userid, date FROM post_like WHERE  postid IN(SELECT postid FROM post WHERE userid = '$sessionid') GROUP BY postid ORDER BY postlikeid DESC");
            while ($a = $sqllike->fetch_object()) {

    ?>
        <ul>
            <?php
            $loadsqllike = $perintah->getDB()->query("SELECT postid, userid, date FROM post_like WHERE postid =
                                                  '$a->postid' GROUP BY userid   ORDER BY postlikeid DESC");

            ?>
            <li><a href="javascript:void(0)" id="lek" data-script="<?php echo $a->postid ?>">
                    <div class="icon"><span class="s7-check"></span></div>
                    <div class="content">
                      <span class="desc">
                        <strong>

                          <?php

                          while ($loadlike = $loadsqllike->fetch_object()) {
                              $namelike = $perintah->getUsername($loadlike->userid);
                              $namelike = $namelike.",";
                              $allnamelike = rtrim(",", $namelike);
                              echo $allnamelike;

                            }

                           ?>
                        </strong>
                        Menyukai post anda
                      </span>
                      <span class="date">10 minutes ago</span></div>
                </a>
            </li>
            <?php

      }
        ?>
        </ul>
        <?php

            $sqlfollow = $perintah->getDB()->query("SELECT fromid, toid, date, auth FROM follow WHERE toid = '$sessionid'
                                                      ORDER BY followid DESC");
                while ($loadfollow = $sqlfollow->fetch_object()) {
                  $namefollow = $perintah->getUsername($loadfollow->fromid);

        ?>
            <ul>
                <li><a href="<?php echo MED_URL ?>/profile/<?php echo $namefollow ?>">
                        <div class="icon"><span class="s7-check"></span></div>
                        <div class="content">

                          <span class="desc">
                            <strong>
                              <?php echo $namefollow; ?>
                            </strong>:
                            Mulai mengikuti anda
                          </span>
                          <span class="date">10 minutes ago</span></div>
                    </a>
                </li>
                <?php

          }
            ?>
            </ul>
