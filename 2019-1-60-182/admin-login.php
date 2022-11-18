<?php

session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){


    $hostname="localhost";
    $username="root";
    $password="";
    $database="srms";
    $connection= new mysqli($hostname,$username,$password,$database);
    $connection->connect_error;//con error

    $login_name=$_POST['admin_username'];
    $login_password=$_POST['admin_password'];
    $hashed_password=hash('sha256',$login_password);
    

    $query="select * from admin_info where user_name='$login_name' and password='$hashed_password' ";
    $query_results = $connection->query($query);
    //if query_results==true then succeeded else failed
    $login_success = $query_results->num_rows>0;
    $row=$query_results->fetch_assoc();
    if( $login_success && $row['role']=='admin'){
        $_SESSION['admin_username']=$login_name;
        $_SESSION['admin_password']=$hashed_password;
        $_SESSION['login_success']='1';
        $_SESSION['admin_login_success']=true;
        $_SESSION['profileImage']=$row['image'];
        
        header("Location: admin-homepage.php?login=1");
    }
    else{
        $_SESSION['error']=1;
        $_SESSION['wrongCredMsg']="You may have entered wrong credentials";
        header("Location: admin.php");

    }




}
else{
        $_SESSION['error']=1;
        $_SESSION['loginErrorMsg']="Seems like you forgot to enter the credentials";
        header("Location: admin.php");
}

?>