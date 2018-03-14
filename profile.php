<!DOCTYPE html>
<html>
    <head>
        <style>
    html,body {
    background: #efefef;
    font-family: "Arial";
  }
  .container {
    max-width: 1250px;
    margin: 0px auto 30px;
    padding: 0 !important;
    width: 90%;
    background-color: #fff;
    box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
  }
  #a {
    background: #eee;
    background-image: url("https://image.noelshack.com/fichiers/2017/38/2/1505775648-annapurnafocus.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-color: white;
    height: 200px;
  }
  #b {
    position: relative;
    cursor: pointer;
    right: -96%;
    top: 25px;
    font-size: 18px !important;
    color: #fff;
  }
  @media (max-width:800px) {
    header {
      height: 150px;
    } 
    
    #b {
      right: -90%;
    }
  }
  
  main {
        padding: 20px 20px 0px 20px;
  }
  
  .left {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }
  
  .photo {
    width: 200px;
    height: 200px;
    margin-top: -120px;
    border-radius: 100px;
    border: 4px solid #fff;
  }
  
  .active {
    width: 20px;
    height: 20px;
    border-radius: 20px;
    position: absolute;
    right: calc(50% - 70px);
    top: 75px;
    background-color: #FFC107;
    border: 3px solid #fff;
  }
  
  @media (max-width:990px) {
    .active {
      right: calc(50% - 60px);
      top: 50px;
    } 
  }
  
  .name {
    margin-top: 20px;
    font-family: "Open Sans";
    font-weight: 600;
    font-size: 18pt;
    color: #777;
  }
  
  .info {
    margin-top: -5px;
    margin-bottom: 5px;
    font-family: 'Montserrat', sans-serif;
    font-size: 11pt;
    color: #aaa;
  }
  
  .stats {
    margin-top: 25px;
    text-align: center;
    padding-bottom: 20px;
    border-bottom: 1px solid #ededed;
    font-family: 'Montserrat', sans-serif;
  }
  
  
  .number-stat {
    padding: 0px;
    font-size: 14pt;
    font-weight: bold;
    font-family: 'Montserrat', sans-serif;
    color: #aaa;
  }
  
  .desc-stat {
    margin-top: -15px;
    font-size: 10pt;
    color: #bbb;
  }
  
  .desc {
    text-align: center;
    margin-top: 25px;
    margin: 25px 40px;
    color: #999;
    font-size: 11pt;
    font-family: "Open Sans";
    padding-bottom: 25px;
    border-bottom: 1px solid #ededed;
  }
  
  .social {
    margin: 5px 0 12px 0;
    text-align: center;
    display: inline-block;
    font-size: 20pt;
  }
  
  .social i {
    cursor: pointer;
    margin: 0 15px;
  }
  
  .social i:nth-child(1)  { color: #4267b2; }
  .social i:nth-child(2)  { color: #1da1f2; }
  .social i:nth-child(3)  { color: #bd081c; }
  .social i:nth-child(4)  { color: #36465d; }
  
  .right {
    padding: 0 25px 0 25px !important;
  }
  
  #c {
    display: inline-flex;
  }
  #c li {
    margin: 40px 30px 0 10px;
    cursor: pointer;
    font-size: 13pt;
    text-transform: uppercase;
    font-family: 'Montserrat', sans-serif;
    font-weight: 500;
    color: #888;
  } 
  #c li:hover, #c li:nth-child(1)  { 
    color: #999;
    border-bottom: 2px solid #999;
  } 
  .follow {
    position: absolute;
    right: 8%;
    top: 35px;
    font-size: 11pt;
    background-color: #42b1fa;
    color: #fff;
    padding: 8px 15px;
    cursor: pointer;
    transition: all .4s;
    font-family: 'Montserrat', sans-serif;
    font-weight: 400;
  }
  
  .follow:hover {
    box-shadow: 0 0 15px rgba(0,0,0,0.2), 0 0 15px rgba(0,0,0,0.2);
  }
  
  @media (max-width:990px) {
    #c {
      display: none;
    }
    .follow {
      width: 50%;
      margin-left: 25%;
      display: block;
      position: unset;
      text-align: center;
    }
  }
  .gallery  {
    margin-top: 35px;
  }
  
  .gallery div {
    margin-bottom: 30px;
  }
  
  .gallery img {
    box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
    width: auto; 
    height: auto;
    cursor: pointer;
    max-width: 100%;
  }
  
  </style>
</head>

<?php 
session_start();
$sid=$_SESSION['sid'];

include("head.php");
$sel8=mysqli_query($link,"select email from admin where fname='$sid'");
$arr8=mysqli_fetch_assoc($sel8);
$sel=mysqli_query($link,"select * from admin");
$num=mysqli_num_rows($sel);  ?>
<body class="skin-blue">


<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>friendsBook</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <?php
                
               
               $pic=$sid.".jpg";
                ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="uploads/<?= $pic ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?= $sid;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="uploads/<?= $pic ?>" class="img-circle" alt="User Image">

                <p>
                    <h2><?= $sid;?></h2>
                  
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                 
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php" class="btn btn-default btn-flat">Home</a>
                </div>
                
                <div class="pull-right">
                  <a href="login.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
</header>
  <!-- Left side column. contains the logo and sidebar -->
  


  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    
    </br>
<div class="container">
    <header id="a">
    <i id="b" class="fa fa-bars" aria-hidden="true"></i>

    </header>
    <?php
                
               // $fn=$_SESSION['fn'];
               $pic=$sid.".jpg";
                ?>
    <main>
      <div class="row">
        <div class="left col-lg-4">
          <div class="photo-left">
            <img class="photo" src="uploads/<?=$pic?>"/>
            <div class="active"></div>
          </div>
          <h4 class="name"><?= $sid;?></h4>
          <form action="upload.php" method="post" enctype="multipart/form-data">
               Select profile pic:               
                <input type="file"  name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
                </form></br>
          <p class="info">PHP Developer</p>
          <p class="info">Home City:</p>
          <p class="info"><?=$arr8['email']?></p>
          <div class="stats row">
            <div class="stat col-xs-4" style="padding-right: 50px;">
              <p class="number-stat">&nbsp;&nbsp;&nbsp;<?=$num?></p>
              <p class="desc-stat">Friends</p>
            </div>
           
          </div>
          <p class="desc">Hi ! My name is Jane Doe. I'm a UI/UX Designer from Paris, in France. I really enjoy photography and moutains.</p>
          <div class="social">
            <i class="fa fa-facebook-square" aria-hidden="true"></i>
            <i class="fa fa-twitter-square" aria-hidden="true"></i>
            <i class="fa fa-pinterest-square" aria-hidden="true"></i>
            <i class="fa fa-tumblr-square" aria-hidden="true"></i>
          </div>
        </div>
        <div class="right col-lg-8">
          <ul class="nav" id="c">
            <li>gallery</li>
            <li>friends</li>
            
          </ul>
          <span class="follow">Follow</span>
          <div class="row gallery">
            <?php
              $sel1=mysqli_query($link,"select pic from activity where fname='$sid'");
              
              $sel9=mysqli_query($link,"select * from activity");
              $num=mysqli_num_rows($sel9); 
              
              if($num>0)
              {
                  $s=1;
                  while($arr1=mysqli_fetch_assoc($sel1))
                  {
            
             ?>   
            <div class="col-md-4">
               <img src="activity/<?= $arr1['pic'] ?>"/>
            </div>
            <?php
            $s++;
          }
        }
            ?>
          </div>
          <div class="row Friends">
            <?php
              $sel2=mysqli_query($link,"select ppic from admin");
              
              $sel99=mysqli_query($link,"select * from admin");
              $num7=mysqli_num_rows($sel99); 
              
              if($num7>0)
              {
                  $s=1;
                  while($arr2=mysqli_fetch_assoc($sel2))
                  {
            
             ?>   
            <div class="col-md-4">
               <img src="admin/<?= $arr2['ppic'] ?>"/>
            </div>
            <?php
            $s++;
          }
        }
            ?>
          </div>
        </div>
    </main>
</div>
    <!-- Main content -->
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
