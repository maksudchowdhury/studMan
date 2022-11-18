<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){


    
    $hostname="localhost";
    $username="root";
    $password="";
    $database="srms";
    $connection= new mysqli($hostname,$username,$password,$database);
    $connection->connect_error;//con error

    $login_ID=$_POST['studentID'];
    $login_password=$_POST['password'];
    $hashed_password=hash('sha256',$login_password);
    $_SESSION['studentID']=$login_ID;
    $_POST['studentID']=$login_ID;
    $_SESSION['studentPassword']=$hashed_password;

    $query="select * from student_info where student_id='$login_ID' and student_password='$hashed_password' and student_status='active' "; 
    $query_results = $connection->query($query);
    $login_success = $query_results->num_rows>0;
    $row=$query_results->fetch_assoc();
  
    if( $login_success){

        $_SESSION['student_login_success']=1;
        $_SESSION['login_success']='1';
        header("Location: showReport.php?studentID=".$login_ID);
    }
    
    else{
        $_SESSION['error']=1;
        $_SESSION['student_login_success']=0;
        $_SESSION['wrongCredMsg']="You may have entered wrong credentials or You this account is not active";
        header("Location: index.php");
    }




}
else{
    $_SESSION['error']=1;
    $_SESSION['loginErrorMsg']="Seems like you forgot to enter the credentials";
    header("Location: index.php");
    
}