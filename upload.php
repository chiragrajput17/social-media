<?php
session_start();
$sid=$_SESSION['sid'];
include("database.php");
$target_dir = "activity/".$sid;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
    header("location:profile.php");
    
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $msg="Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $fn=$sid.".$imageFileType";
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/$fn")) 
    {
        if(mysqli_query($link,"update admin set ppic='$fn' where fname='$sid'"))
        {
            
            $_SESSION['fn']=$fn;
             $msg="The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            header("location:profile.php");
        }    
        
    } 
    else
    {
        $err="Sorry, there was an error uploading your file.";
        header("location:profile.php");
        
    }
}
?>