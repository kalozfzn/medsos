<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from foxythemes.net/preview/products/maisonnette/ui-panels.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2017 02:42:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo MED_BASE_BACKEND; ?>
    <link rel="shortcut icon" href="assets/img/favicon.html">
    <title>Maisonnette</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/theme-switcher/theme-switcher.min.css"/><link type="text/css" href="assets/css/app.css" rel="stylesheet">  </head>
  <body>
    <?php require('public/backend/user/_fragment/header.php'); ?>
      
      <div class="main-content container">
        <div class="row">
          <div class="col-md-8 offset-2">
            <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider">Edit Profile<span class="icon s7-lock"></span><span class="indicator"></span></div>
              <div class="panel-body">
                <form method="post" id="save">
                  <div class="form-group row">
                    <label class="col-3 col-form-label text-right">Old Username</label>
                    <div class="col-6">
                      <input type="text" name="oldusername" placeholder="...." class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-3 col-form-label text-right">Username</label>
                    <div class="col-6">
                      <input type="text" name="newusername" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-3 col-form-label text-right">Old Email</label>
                    <div class="col-6">
                      <input type="text" name="oldemail"  placeholder="...." class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-3 col-form-label text-right">New Email</label>
                    <div class="col-6">
                      <input type="text" class="form-control" name="newemail">
                      <button type="submit" class="btn btn-primary" style="width: 100%;margin-top: 5%;">Simpan <span class="icon s7-check"></span></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div id="result"></div>
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
      });
      
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
      	App.livePreview();
      });
      $('#save').submit(function(){
        
            $.ajax({
                url: '<?php echo MED_API; ?>/acces/backend/user/@editprofile/index.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data) {
                    $('#result').html(data);
                    }
            });
            return false;
        });
      
    </script>
  </body>

<!-- Mirrored from foxythemes.net/preview/products/maisonnette/ui-panels.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2017 02:42:53 GMT -->
</html>