<?php
extract($_POST);
//error_reporting(0);
//session_start();
//$sid=$_SESSION['sid'];
include("database.php");

//$sel=mysqli_query($link,"insert into".$sid." values ($num7,'$fn',$description,'$location')");
$target_dir = "activity/";

$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

  $sel7=mysqli_query($link,"select * from activity");
  $num7=mysqli_num_rows($sel7);
  
  $description=mysqli_real_escape_string($link,$description);
  $pic=mysqli_real_escape_string($link,$pic);
  
  $target_file = $target_dir . basename($_FILES["pic"]["name"]);
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  
  $location=mysqli_real_escape_string($link,$location);
    
    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    $msg= "Sorry, file already exists.";
    header("location:profile.php");
    
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $msg="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    header("location:index.php");
    
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $msg="Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $fn=$location.".$imageFileType";
    $num7++;
   // mkdir("activity/$sid");
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], "activity/$fn")) 
    {
        
        if(mysqli_query($link,"insert into activity(id,fname,pic,description,location) values ('$num7','$sid','$fn','$description','$location')"))
        {
            
            $_SESSION['fn']=$fn;
             $msg="The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.";
            header("location:index.php");
        }    
        
    } 
    else
    {
        $err="Sorry, there was an error uploading your file.";
        header("location:index.php");
        
    }
}
}
?>
<div class="col-md-8" >
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="index.php" data-toggle="tab">Home</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="uploads/<?=$sid?>.jpg" alt="user image">
                        <span class="username">
                          <a href="profile.php"><?=$sid ?></a>
                          
                        </span>
                </div>
                <form method="post" enctype="multipart/form-data">
                        <input class="form-control input-sm" type="text" name="description" placeholder="Share your thoughts">
                        </br>  
                        <label> Wanna upload a pic:&nbsp;</label><button type="button" class="btn btn-info btn-sm " data-toggle="modal" data-target="#myModal">Upload</button></br>
                  <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                          <!-- Modal content-->
                       <div class="modal-content">
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">upload pic</h4>
                         </div>
                          <div class="modal-body">
                             <p>
                              
                                <div class="form-group">
                                  <label>Image:</label>
                                  <input type="file" name="pic" required class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>pic location:</label>
                                  <input type="text" name="location" required class="form-control"/>
                                </div>
                                <input type="submit" value="Upload Image" name="submit" class="btn btn-success">
                              
                              </p>
                 
                          </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              
                    </div>
                    
                  </div>
               </form>
                </div>
              </div>       
              <?php
               $sel3=mysqli_query($link,"select * from activity order by date desc");
               $n=mysqli_num_rows($sel3);
               if($n>0)
               {
                   $s=1;
                   while($arr=mysqli_fetch_assoc($sel3))
                   {

                  ?>
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="uploads/<?= $arr['fname'] ?>.jpg" alt="user image">
                        <span class="username">
                          <a href="profile.php"><?= $arr['fname'] ?></a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description"><?= $arr['date']; ?></span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    <?php echo $arr['description']; ?>
                  </p>
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                      <img class="img-responsive" data-toggle="modal" data-target="#mymodal" src="activity/<?=$arr['pic'];?>" alt="Photo">
                      <div id="mymodal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                              
                              </div>
                              <div class="modal-body">
                              <img class="img-responsive" style="height:500px;width:600px" src="activity/<?=$arr['pic'];?>" alt="Photo">
                              <?php
                              $a=$arr['pic'];
                              $aa=mysqli_query($link,"select * from tagging where pic='$a'");
                              $arr11=mysqli_fetch_assoc($aa);
                              
                              ?>
                              <p>
                                <h4>The Tagged persons are:&nbsp;<?=$arr11['p1'];?>,&nbsp;<?=$arr11['p2'];?>&nbsp;<?=$arr11['p3'];?>&nbsp;<?=$arr11['p4'];?>&nbsp;<?=$arr11['p5'];?></h4>
                              </p>

                              </div>
                              
                              
                            </div>
                    
                        </div>
                      </div>
                  
                   </div>
                  </div>
                  
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                
                <?php

                $s++;
                }
              }

                ?>
                <!-- /.post -->

                <!-- Post -->
                
                <!-- /.post -->

                <!-- Post -->
                
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              
              </div>
          </div>
</div>
