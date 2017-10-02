<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from foxythemes.net/preview/products/maisonnette/ui-panels.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2017 02:42:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.html">
    <?php echo MED_BASE_BACKEND; ?>
    <title>Maisonnette</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/theme-switcher/theme-switcher.min.css"/>
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/lib/font-awesome/css/font-awesome.min.css"/>
  </head>
  <body>
    <?php include 'public/backend/user/_fragment/header.php'; ?>
      <br>
            <div class="row">
                <div class="col-md-4" style="margin-bottom: 1%;">
                    <div class="panel-body" style="background-color: white">
                        <div class="project-list">
                            <div class="project-list-title">Mungkin Anda Kenal</div>
                            <div class="load">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel-dividers"></div>
                    <div class="panel-body" style="background-color: #ffffff">
                      <form id="pot" method="post">
                        <div class="col-sm-12">
                            <textarea name="pos" class="form-control" placeholder="Tulis sesuatu..." rows="7"></textarea>
                        </div>
                            <div class="panel-body">
                                <p class="text-right" style="margin-bottom: -2.5%;">
                                    <button type="submit" class="btn-small btn-primary active">Kirim</button>
                                </p>
                            </div>
                          </form>
                    </div>
                <div class="widget widget-fullwidth">
                    <div class="container">
                        <div id="result">
                        </div>
                    </div>
            </div>
      </div>
    </div>
    <div id="buang">

    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/theme-switcher/theme-switcher.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
        $('#tempat').hide();
        loadpost();
        loadnotif();
        refnotif();
        loadfriend();
      });

    </script>
    <script type="text/javascript">
      $(document).ready(function(){
      	App.livePreview();
      });
      function refnotif(){
        setTimeout(function(){
          loadnotif();
          refnotif();
        }, 30000);
      }
      $('#pot').submit(function(){

          $.ajax({
              url: '<?php echo MED_API; ?>/acces/backend/user/@post/index.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData:false,
              success: function(data) {

                  loadpost();

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
      function loadfriend(){

        $.ajax({
            type: 'GET',
            url:"<?php echo MED_API; ?>/acces/backend/user/@loadfriend/index.php",
            data:{ 'off' : 0
            },
            success: function(data){
                $('.load').html(data);
            }
        });

      }
      function loadpost(){
        $.ajax({
            type: 'GET',
            url:"<?php echo MED_API; ?>/acces/backend/user/@loadpostberanda/index.php",
            data:{ 'off' : 0
            },
            success: function(data){
                $('#result').html(data);
            }
        });
      }
      $("#cari").keyup(function() {
        $('#tempat').show();
        searchTerm = $("#cari").val();
        load(searchTerm);
    });

    function load(term){
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
    $(document).on("click", "#folfriend", function(){

          var dataid = $(this).attr('data-script');


          $.ajax({
              url: '<?php echo MED_API;?>/acces/backend/user/@follow/index.php',
              type: 'POST',
              data: {id : dataid},
              success: function(data) {
                  loadfriend();
              }
          });
          return false;
      });

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
    $(document).on("click", "#not" ,function() {

      $.ajax({
          type: 'POST',
          url:"<?php echo MED_API; ?>/acces/backend/user/@readnotif/index.php",
          data:{ 'off' : 0
          },
          success: function(data){
              $('#buang').html(data);
          }
      });

    });
    $(document).on("click", "#com", function(){

      var dataid = $('#met').val();
      var pot = $(this).attr('data-script');


      $.ajax({
        url: '<?php echo MED_API;?>/acces/backend/user/@comment/index.php',
        type: 'POST',
        data: {id : dataid, postid:pot},
        success: function(data) {
          loadpost();
        }
      });
      return false;
    });
  $(document).on("click", "#like", function(){

      var dataid = $(this).attr('data-script');



      $.ajax({
          url: '<?php echo MED_API;?>/acces/backend/user/@addlike/index.php',
          type: 'POST',
          data: {id : dataid},
          success: function(data) {
              loadpost();
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
              loadpost();
          }
      });
      return false;
  });

    </script>
  </body>

</html>
