<?php
session_start();
$sid=$_SESSION['sid'];
include("database.php");
$sel7=mysqli_query($link,"select * from".$sid);
$num7=mysqli_num_rows($sel7);

$description=mysqli_real_escape_string($link,$description);
$pic=mysqli_real_escape_string($link,$pic);
$location=mysqli_real_escape_string($link,$location);
//$sel=mysqli_query($link,"insert into".$sid." values ($num7,'$fn',$description,'$location')");
$target_dir = "activity/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    
    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        
        $uploadOk = 0;
    }
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
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], "activity/$sid/$fn")) 
    {
        
        if(mysqli_query($link,"insert into".$sid." values ($num7,'$fn','$description','$location')"))
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
?>