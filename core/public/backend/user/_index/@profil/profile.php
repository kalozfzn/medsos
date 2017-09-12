<?php 

		  $get      = $_GET['U2'];

	    $sessionid = $_SESSION['id'];

	    $sql = $perintah->getDB()->query("SELECT userid, username, foto FROM user WHERE username ='$get' ");

	    $getid = $sql->fetch_object();

	    $id = $getid->userid;

      $_SESSION['toid'] = $id;

      $following      = $perintah->countFollowing($id);

      if ($following >= 1000000) {

        $cfollowing = $following / 1000000;

        $testfollowing = $cfollowing." M";

      } 
        else if($following >= 1000){

            $cfollowing = $following / 1000000;

            $testfollowing = $cfollowing." K";

        } 
          else if($following == 0){

            $testfollowing = 0;    

          }

          else {

            $testfollowing = $following;
            
          }
      

    	$image          = $perintah->getUserFoto($id);

    	$username       = $perintah->getUsername($id);
 ?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from foxythemes.net/preview/products/maisonnette/pages-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2017 02:44:16 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.html">
    <title>Maisonnette</title>
    <?php echo MED_BASE_BACKEND; ?>
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/theme-switcher/theme-switcher.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/font-awesome/css/font-awesome.min.css"/><link type="text/css" href="assets/css/app.css" rel="stylesheet">  </head>
  <body style="background-color: #DFE5EC;">
    <nav class="navbar navbar-full navbar-inverse navbar-fixed-top mai-top-header">
      <div class="container"><a href="#" class="navbar-brand"></a>
        <!--Left Menu-->
        <ul class="nav navbar-nav mai-top-nav">
          <li class="nav-item"><a href="index-2.html" class="nav-link">Profile</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Beranda</a></li>
            <div role="menu" class="dropdown-menu"><a href="#" class="dropdown-item">Information</a><a href="#" class="dropdown-item">Company</a><a href="#" class="dropdown-item">Documentation</a><a href="#" class="dropdown-item">API Settings</a><a href="#" class="dropdown-item">Export Info</a></div>
          </li>
        </ul>
        <!--Icons Menu-->
        <ul class="navbar-nav float-lg-right mai-icons-nav">
          <li class="dropdown nav-item mai-messages"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="icon s7-comment"></span></a>
            <ul class="dropdown-menu">
              <li>
                <div class="title">Messages</div>
                <div class="mai-scroller">
                  <div class="content">
                    <ul>
                      <li><a href="#">
                          <div class="img"><img src="assets/img/avatars/img1.jpg"></div>
                          <div class="content"><span class="date">16 Sept</span><span class="name">Victor Jara</span><span class="desc">The song that has been brave, will always be the new song. </span></div></a></li>
                      <li><a href="#">
                          <div class="img"><img src="assets/img/avatars/img2.jpg"></div>
                          <div class="content"><span class="date">4 Sept</span><span class="name">Gustavo Cerati</span><span class="desc">You will see me fly across the city of fury where no one knows of me.</span></div></a></li>
                      <li><a href="#">
                          <div class="img"><img src="assets/img/avatars/img3.jpg"></div>
                          <div class="content"><span class="date">13 Aug</span><span class="name">Jaime Garzón</span><span class="desc">Now everything came back to the abnormality.</span></div></a></li>
                      <li><a href="#">
                          <div class="img"><img src="assets/img/avatars/img4.jpg"></div>
                          <div class="content"><span class="date">13 Aug</span><span class="name">Allen Collins</span><span class="desc">Things just couldn't even be the same 'Cause I'm as free as a bird now.</span></div></a></li>
                    </ul>
                  </div>
                </div>
                <div class="footer"> <a href="#">View all messages</a></div>
              </li>
            </ul>
          </li>
          <li class="dropdown nav-item mai-notifications"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="icon s7-bell"></span><span class="indicator"></span></a>
            <ul class="dropdown-menu">
              <li>
                <div class="title">Notifications</div>
                <div class="mai-scroller">
                  <div class="content">
                    <ul>
                      <li><a href="#">
                          <div class="icon"><span class="s7-check"></span></div>
                          <div class="content"><span class="desc">This is a new message for my dear friend <strong>Rob</strong>.</span><span class="date">10 minutes ago</span></div></a></li>
                      <li><a href="#">
                          <div class="icon"><span class="s7-add-user"></span></div>
                          <div class="content"><span class="desc">You have a new fiend request pending from <strong>John Doe</strong>.</span><span class="date">2 days ago</span></div></a></li>
                      <li><a href="#">
                          <div class="icon"><span class="s7-graph1"></span></div>
                          <div class="content"><span class="desc">Your site visits have increased <strong>15.5%</strong> more since the last week.</span><span class="date">2 hours ago</span></div></a></li>
                      <li><a href="#">
                          <div class="icon"><span class="s7-check"></span></div>
                          <div class="content"><span class="desc">This is a new message for my dear friend <strong>Rob</strong>.</span><span class="date">10 minutes ago</span></div></a></li>
                    </ul>
                  </div>
                </div>
                <div class="footer"> <a href="#">View all notifications</a></div>
              </li>
            </ul>
          </li>
                  <!--User Menu-->
        <ul class="nav navbar-nav float-lg-right mai-user-nav">
          <li class="dropdown nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle nav-link"> <img src="<?php echo MED_IMAGE; ?>/150/<?php echo $image; ?>"><span class="user-name"><?php echo $username; ?></span><span class="angle-down s7-angle-down"></span></a>
            <div role="menu" class="dropdown-menu"><a href="#" class="dropdown-item"> <span class="icon s7-home"> </span>My Account</a><a href="#" class="dropdown-item"> <span class="icon s7-user"> </span>Profile</a><a href="#" class="dropdown-item"> <span class="icon s7-cash"> </span>Billing</a><a href="#" class="dropdown-item"> <span class="icon s7-tools"> </span>Settings</a><a href="#" class="dropdown-item"> <span class="icon s7-power"> </span>Log Out</a></div>
          </li>
        </ul>
      </div>
    </nav>
          <!--
          <div class="search">
            <input type="text" placeholder="Search..." name="q"><span class="s7-search"></span>
          </div>
        </div>Search input-->
      </nav>
      <div class="main-content container">
        <div class="user-profile">
          <div class="row">
            <div class="col-md-12">
              <div class="user-display">
                <div class="user-display-cover"><img src="assets/img/cover.jpg" alt="cover"></div>
                <div class="user-display-bottom">
                  <div class="user-display-id"><img src="<?php echo MED_IMAGE; ?>/300/<?php echo $image; ?>" alt="avatar" class="user-display-avatar">
                    <div class="user-display-name"><?php echo $username; ?></div>
                  </div>
                  <div class="user-display-stats">
                    <div class="user-display-stat"><span class="user-display-stat-counter" id="tfollowers"></span><span class="user-display-stat-title">Followers</span></div>
                    <div class="user-display-stat"><span class="user-display-stat-counter"><?php echo $testfollowing; ?></span><span class="user-display-stat-title">Following</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="user-info-list panel panel-default">
                <div class="panel-heading panel-heading-divider">About Me</div>
                <div class="panel-body">
                  <table class="no-border no-strip skills">
                    <tbody class="no-border-x no-border-y">
                      <tr>
                        <td class="icon"><span class="icon s7-portfolio"></span></td>
                        <td class="item">Ocupation</td>
                        <td><a href="#">Designer</a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-gift"></span></td>
                        <td class="item">Birthday</td>
                        <td> <a href="#">16 September 1989</a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-phone"></span></td>
                        <td class="item">Mobile</td>
                        <td> <a href="#">(999) 999-9999</a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-global"></span></td>
                        <td class="item">Website</td>
                        <td> <a href="#">www.website.com</a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-map-marker"></span></td>
                        <td class="item">Location</td>
                        <td> <a href="#">Montreal, Canada</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="panel-heading panel-heading-divider">Elsewhere</div>
                <div class="panel-body">
                  <table class="no-border no-strip social">
                    <tbody class="no-border-x no-border-y">
                      <tr>
                        <td class="icon"><span class="fa fa-facebook"></span></td>
                        <td class="item"><a href="#">Facebook</a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="fa fa-twitter"></span></td>
                        <td class="item"> <a href="#">Twitter</a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="fa fa-dribbble"></span></td>
                        <td class="item"> <a href="#">Dribble</a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="fa fa-github"></span></td>
                        <td class="item"> <a href="#">Github</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="widget widget-fullwidth user-develop-chart">
                <div class="widget-head">
                      <div id="buttonfol"></div>
                </div>
                <hr>
              </div>
              <?php if ($id == $sessionid) { ?>
              <div class="widget widget-fullwidth user-develop-chart">
              <form method="post" id="pot">
                <div class="widget-head">
                  <div class="tools"><span class="icon s7-next-2"></span></div><span class="title">Status</span>
                </div>
                <hr>
                <div class="container">
                  <div class="form-group row">
                      <div class="col-sm-12">
                        <textarea name="pos" class="form-control" placeholder="Tulis Sesuatu..." rows="8"></textarea>
                      </div>
                  </div>
                  <p class="text-right">
                      <button type="submit" class="btn btn-primary active"  style="margin-bottom: 2%"><i class="icon icon-left s7-next-2"></i>Kirim</button>
                  </p>
                </div>
                </form>
              </div>
              <?php } ?>

              <div class="widget widget-fullwidth">
                <div class="container">
                    <div id="result"></div>
                    
                  </div>
                </div>
              
              </div>
          </div>
      </div>
      <div id="rest"></div>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/theme-switcher/theme-switcher.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="assets/lib/countdown/jquery.countdown.min.js" type="text/javascript"></script>
    <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      	App.profile();
        load();
        
        loadbutton();
        loadfollowers();
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
      	App.livePreview();
        load();
        loadfollowers();
        loadbutton();
        
      });
      function load(){
        $.ajax({
            type: 'GET',
            url:"<?php echo MED_API; ?>/acces/backend/user/@loadpost/index.php",
            data:{ 
                'off':0
                
            },
            success: function(data){
                $('#result').html(data);
            }
        });
      }
      function loadfollowers(){
        $.ajax({
            type: 'GET',
            url:"<?php echo MED_API; ?>/acces/backend/user/@loadfollowers/index.php",
            data:{ 
                'off':0
                
            },
            success: function(data){
                $('#tfollowers').html(data);
            }
        });
      }
      function loadcomment(){
        $.ajax({
            type: 'GET',
            url:"<?php echo MED_API; ?>/acces/backend/user/@loadcomment/index.php",
            data:{ 
                'off':0
                
            },
            success: function(data){
                $('#com').html(data);
            }
        });
      }

      function loadbutton(){
        $.ajax({
            type: 'GET',
            url:"<?php echo MED_API; ?>/acces/backend/user/@buttonfol/index.php",
            data:{ 
                'off':0
                
            },
            success: function(data){
                $('#buttonfol').html(data);
            }
        });
      }

      $(document).on("click", "#fol", function(){

            var dataid = $(this).attr('data-script');
            

            $.ajax({
                url: '<?php echo MED_API;?>/acces/backend/user/@follow/index.php',
                type: 'POST',
                data: {id : dataid},
                success: function(data) {
                    loadbutton();
                    loadfollowers();
                }
            });
            return false;
        });
        $(document).on("click", "#ufol", function(){

            var dataid = $(this).attr('data-script');
            

            $.ajax({
                url: '<?php echo MED_API;?>/acces/backend/user/@unfollow/index.php',
                type: 'POST',
                data: {id : dataid},
                success: function(data) {
                    loadbutton();
                    loadfollowers();
                }
            });
            return false;
        });
        $('#pot').submit(function(){
        
            $.ajax({
                url: '<?php echo MED_API; ?>/acces/backend/user/@post/index.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data) {
                    
                    $('#rest').html(data);
                    
                    }
            });
            return false;
        });
      
    </script>

  </body>

<!-- Mirrored from foxythemes.net/preview/products/maisonnette/pages-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2017 02:44:38 GMT -->
</html>