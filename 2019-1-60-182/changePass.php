<?php 
session_start();
$username=$_SESSION['admin_username'];
$servername='localhost';
$serverUsername='root';
$serverPassword='';
$dbname='srms';
$con= mysqli_connect($servername,$serverUsername,$serverPassword,$dbname);
if($con && $_SERVER['REQUEST_METHOD']=="POST"){
   if($_POST['newPass']==$_POST['confirmPass'] && $_POST['newPass']!=''){
       $newPass=hash('sha256',$_POST['newPass']);
       $query="update admin_info set password='$newPass' where user_name='$username'";
       $result=mysqli_query($con,$query);
       if($result){
           $_SESSION['success']=1;
           $_SESSION['successMsg']="Password changed successfully";
           echo "password chnged successfully";
           header("Location: admin-homepage.php");
       }
       else{
           $_SESSION['error']=1;
           $_SESSION['errorMsg']="Password change failed";
           echo "query failed";
           header("Location: admin-homepage.php");
       }
   }
   else{
       $_SESSION['error']=1;
       $_SESSION['errorMsg']="Passwords do not match";
       echo "Passwords do not match";
       header("Location: admin-homepage.php");
   }
   
}
else{
    
    die('could not connect');
}
// header("Location: adminSettings.php");
?>