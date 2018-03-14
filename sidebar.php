<?php
                
               // $fn=$_SESSION['fn'];
               $pic=$sid.".jpg";
                ?>
<aside class="main-sidebar" style="height:800px;" >
<section class="sidebar">
<div class="user-panel">
        <div class="pull-left image">
          <img src="uploads/<?= $pic ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $sid;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
<ul class="sidebar-menu" data-widget="tree">


        <li class="header">MAIN NAVIGATION</li>
        
        <li class="fa fa-files-o">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Home</span>
        </a>
          
        <li>
          <a href="profile.php">
            <i class="fa fa-th"></i> <span>profile</span>
            
          </a>
        </li>
        <li>
          <a href="DST.php">
            <i class="fa fa-th"></i> <span>calculate DST</span>
            
          </a>
        </li>
      </ul>
      </section>
      </aside>