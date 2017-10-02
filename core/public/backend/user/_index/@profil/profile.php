<?php

		  $get      = $_GET['U2'];

	    $sessionid = $_SESSION['id'];

	    $sql = $perintah->getDB()->query("SELECT userid, username, foto FROM user WHERE username ='$get' ");

	    $getid = $sql->fetch_object();

	    $id = $getid->userid;

      $_SESSION['toid'] = $id;

      $following      = $perintah->countFollowing($id);

			$sqlabout = $perintah->getDB()->query("SELECT work, birthday, mobile, website, location FROM about_me WHERE
																							userid = '$id'");
			$about = $sqlabout->fetch_object();

			$birthday = explode("-",$about->birthday);
			$bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
			if ($birthday[1] <10) {
				$angkabulan = substr($birthday[1],1);
			}



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
    <link rel="stylesheet" type="text/css" href="assets/lib/font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/custom.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/css/theme.css" rel="stylesheet">
		<link type="text/css" href="assets/css/app.css" rel="stylesheet">

				<style media="screen">
			[data-tooltip-content]:hover{
				color: blue;
			}
			[data-tooltip-content]::after{
				content: attr(data-tooltip-content);
				color: grey;
				background: black;
				padding: 1rem;
				border-radius: .25rem;
				margin-left: 1rem;
				position: absolute;
				white-space: nowrap;
				z-index: 100;
				top: -2%;
				left: 60%;
			}

			[data-tooltip-content]:hover::after{
				opacity: 1;
				visibility: visible;
			}
			[data-tooltip-content]::after{
				opacity: 1;
				visibility: hidden;
			}
		</style>
	</head>
  <body style="background-color: #DFE5EC;">
  <?php require('public/backend/user/_fragment/header.php'); ?>
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
                <div class="panel-heading panel-heading-divider">
									About Me
									<a href="<?php echo MED_URL ?>/aboutme" class="tools" ><span class="icon s7-next-2" id="tes" data-tooltip-content="Sunting"></span></a>
								</div>
                <div class="panel-body">
                  <table class="no-border no-strip skills">
                    <tbody class="no-border-x no-border-y">
                      <tr>
                        <td class="icon"><span class="icon s7-portfolio"></span></td>
                        <td class="item">Work</td>
                        <td><a href="#"><?php echo $about->work; ?></a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-gift"></span></td>
                        <td class="item">Birthday</td>
                        <td> <a href="#"><?php echo $birthday[2]." ".$bulan[$angkabulan]." ".$birthday[0]; ?></a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-phone"></span></td>
                        <td class="item">Mobile</td>
                        <td> <a href="#"><?php echo $about->mobile; ?></a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-global"></span></td>
                        <td class="item">Website</td>
                        <td> <a href="#"><?php echo $about->website; ?></a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-map-marker"></span></td>
                        <td class="item">Location</td>
                        <td> <a href="#"><?php echo $about->location; ?></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="panel-heading panel-heading-divider">Status</div>
                <div class="panel-body">
                  <table class="no-border no-strip social">
                    <tbody class="no-border-x no-border-y">
                      <tr>
                        <td class="icon"><span class="fa fa-heart"></span></td>
                        <td class="item"><a href="#">alone</a></td>
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
    <script src="assets/lib/countdown/jquery.countdown.min.js" type="text/javascript"></script>
    <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <!-- <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript

        load();
				loadnotif();
        loadbutton();
        loadfollowers();


      });
    </script> -->
    <script type="text/javascript">
      $(document).ready(function(){

        load();
        loadfollowers();
				refnotif();
        loadbutton();
				loadnotif();

      });
			$('#tes').hover(function(){
				$('.tooltip').show();
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
			function refnotif(){
      setTimeout(function(){
        loadnotif();
        refnotif();
      }, 30000);
    }
		$(document).on("click", "#not" ,function() {

      $.ajax({
          type: 'POST',
          url:"<?php echo MED_API; ?>/acces/backend/user/@readnotif/index.php",
          data:{ 'off' : 0
          },
          success: function(data){
              $('#rest').html(data);
          }
      });

    });
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

        $(document).on("click", "#com", function(){

            var dataid = $('#met').val();
            var pot = $(this).attr('data-script');


            $.ajax({
                url: '<?php echo MED_API;?>/acces/backend/user/@comment/index.php',
                type: 'POST',
                data: {id : dataid, postid:pot},
                success: function(data) {
                    load();
                }
            });
            return false;
        });
				function loadnotif(){
	        $.ajax({
	            type: 'GET',
	            url:"<?php echo MED_API; ?>/acces/backend/user/@loadnotif/index.php",
	            data:{
	                'off':0

	            },
	            success: function(data){
	                $('#notif').html(data);
	            }
	        });
	      }
        $(document).on("click", "#like", function(){

            var dataid = $(this).attr('data-script');



            $.ajax({
                url: '<?php echo MED_API;?>/acces/backend/user/@addlike/index.php',
                type: 'POST',
                data: {id : dataid},
                success: function(data) {
                    load();
                }
            });
            return false;
        });

        $(document).on("click", "#disslike", function(){

            var dataid = $(this).attr('data-script');

            $.ajax({
                url: '<?php echo MED_API;?>/acces/backend/user/@disslike/index.php',
                type: 'POST',
                data: {id : dataid},
                success: function(data) {
                    load();
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

                    load();

                    }
            });
            return false;
        });
				$("#cari").keyup(function() {
	        $('#tempat').show();
	        searchTerm = $("#cari").val();
	        loadsearch(searchTerm);
	    });

	    function loadsearch(term){
	      $.ajax({
	          type: 'POST',
	          url:"<?php echo MED_API; ?>/acces/backend/user/@loadsearch/index.php",
	          data:{ id : term
	          },
	          success: function(data){
	              $('.tampung').html(data);
	          }
	      });
	    }
			function detail(dataid){
        $.ajax({
            type: 'POST',
            url:"<?php echo MED_API; ?>/acces/backend/user/@detail/index.php",
            data:{
                id:dataid

            },
            success: function(data){
                $('#detail').html(data);
            }
        });
      }

	    $(document).on("click", ".search-data" ,function() {
	        $('#cover').fadeToggle();
	        $('.search-index').fadeToggle();
	        $('#cari').focus();
	    });
			$(document).on("click", "#men" ,function() {
	        $('#cov').fadeToggle();
	        var dataid = $(this).attr('data-script');
	        detail(dataid);

	    });
	    $(document).on("click", "#lek" ,function() {
	        $('#cov').fadeToggle();
	        var dataid = $(this).attr('data-script');
	        detail(dataid);

	    });


    </script>

  </body>

<!-- Mirrored from foxythemes.net/preview/products/maisonnette/pages-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2017 02:44:38 GMT -->
</html>
