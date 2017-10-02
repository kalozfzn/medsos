<?php 

  $id = $_SESSION['id'];
  $image          = $perintah->getUserFoto($id);
 ?>
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
    <link rel="stylesheet" type="text/css" href="assets/lib/theme-switcher/theme-switcher.min.css"/><link type="text/css" href="assets/css/app.css" rel="stylesheet">  </head>
  <body>
    <?php require('public/backend/user/_fragment/header.php'); ?>

      <form method="post" enctype="multipart/form-data"  id="save">

      <div class="main-content container">
        <div class="row">
          <div class="col-md-8 offset-2">
            <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider">Edit Photo &nbsp;<span class="icon s7-camera"></span><span class="indicator"></span></div>
              <div class="panel-body">
                <div class="col-md-12 offset-1">
                  <img src="<?php echo MED_IMAGE; ?>/150/<?php echo $image; ?>" id="blah" alt="Placeholder" class="img-thumbnail">
                &nbsp;&nbsp;&nbsp;
              <input type="file" name="foto" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" id="file-2" data-multiple-caption="{count}files selected" multiple class="inputfile">
                      <label for="file-2" class="btn btn-primary"> <i class="icon s7-upload"></i><span>Browse files...</span></label>
                      <button type="submit" class="btn btn-primary">save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        </form>
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
              url: '<?php echo MED_API; ?>/acces/backend/user/@pict/index.php',
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