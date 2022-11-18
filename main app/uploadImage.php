<?php 
session_start();
if($_SESSION['admin_login_success']!='1'){
  header("Location: error.html");
}
$username=$_SESSION['admin_username'];

$target_dir = "images/profiles/admin/";
$imageFileType = $_FILES["profileImage"]["type"];
    
$imageFileType = explode("/", $imageFileType)[1];
if($imageFileType=='jpg' || $imageFileType=='jpeg' || $imageFileType=='png'){$imageFileType='jpg';}
$target_file = $target_dir.$username.".".$imageFileType;
$uploadOk = 1;



// var_dump($_POST['uploadProfileImage'])."\n";




if ($_FILES["profileImage"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  var_dump($_FILES) ;
  echo "Sorry, only JPG, JPEG, PNG files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["profileImage"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

header("Location: adminSettings.php");
?>