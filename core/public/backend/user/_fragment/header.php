<?php

  $id = $_SESSION['id'];

  $img          = $perintah->getUserFoto($id);
  $usr       = $perintah->getUsername($id);
 ?>
 <style media="screen">
 body{
   overflow-x: hidden;
 }
 #cover{
position:fixed;
top:0;
left:0;
background:rgba(0,0,0,0.6);
z-index:5;
width:100%;
height:100%;
display:none;
}
.cover{
position:fixed;
top:0;
overflow-y: auto;
overflow-x: hidden;
left:0;
background:rgba(0,0,0,0.6);
z-index:5;
width:100%;
height:100%;
display:none;
}
 </style>
<nav class="navbar navbar-full navbar-inverse navbar-fixed-top mai-top-header">
      <div class="container"><a href="#" class="navbar-brand"></a>
        <!--Left Menu-->
        <ul class="nav navbar-nav mai-top-nav">
          <li class="nav-item"><a href="<?php echo MED_URL; ?>/profile/<?php echo $usr; ?>" class="nav-link">Profile</a></li>
          <li class="nav-item"><a href="<?php echo MED_URL; ?>/beranda" class="nav-link">Beranda</a></li>

            <div role="menu" class="dropdown-menu"><a href="#" class="dropdown-item">Information</a><a href="#" class="dropdown-item">Company</a><a href="#" class="dropdown-item">Documentation</a><a href="#" class="dropdown-item">API Settings</a><a href="#" class="dropdown-item">Export Info</a></div>
          </li>
        </ul>
        <!--Icons Menu-->
        <ul class="nav navbar-nav float-lg-right mai-user-nav">
          <a href="javascript:void(0)" class="search-data">
              <i class="fa fa-search" style="font-size: 20px;color:grey;"></i>
          </a>
        </li>
      </ul>
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
          <li class="dropdown nav-item mai-notifications"><a href="javascript:void(0)" id="not" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="icon s7-bell"></span><span class="indicator"></span></a>
            <ul class="dropdown-menu" sty>
              <li>
                <div class="title">Notifications</div>
                <div class="mai-scroller" style="overflow-y:auto;">
                  <div class="content" style="overflow-y: auto;" id="notif">

                  </div>
                </div>
                <div class="footer"> <a href="#">View all notifications</a></div>
              </li>
            </ul>
          </li>
                  <!--User Menu-->
        <ul class="nav navbar-nav float-lg-right mai-user-nav">
          <li class="dropdown nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle nav-link"> <img src="<?php echo MED_IMAGE; ?>/150/<?php echo $img; ?>"><span class="user-name"><?php echo $usr; ?></span><span class="angle-down s7-angle-down"></span></a>
            <div role="menu" class="dropdown-menu"><a href="#" class="dropdown-item"> <span class="icon s7-home"> </span>My Account</a>
              <a href="<?php echo MED_URL ?>/changeprofile" class="dropdown-item"> <span class="icon s7-user"> </span>change profile</a>
              <a href="<?php echo MED_URL ?>/changepass" class="dropdown-item"> <span class="icon s7-tools"> </span>change password</a>
              <a href="<?php echo MED_URL; ?>/logout" id="log" class="dropdown-item"> <span class="icon s7-power"> </span>Log Out</a></div>
          </li>
        </ul>
        <li>
      </div>
    </nav>
    <div id="cover">
        <section class="p-y-10 r-dp-on search-index" style="display:none;" >
          <div class="container p-l-5 p-r-5">
              <input type="text" id="cari" class="form-control r-search-bar" placeholder="Search..." style="float:left; display:inline-block;">

              <div id="tempat" class="col-md-12" style="display:inline-block;margin-top:20px;">
                  <div class="panel-body" style="background-color: white">
                    <div class="tampung">
                    </div>
                  </div>
              </div>

          </div>
        </section>
    </div>
    <div class="cover" id="cov">
      <div class="row" style="padding-top:100px;" id="isi">
        <div class="col-3"></div>
        <div class="col-6">
          <div class="widget widget-fullwidth">
              <div class="container">
                  <div id="detail">
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
