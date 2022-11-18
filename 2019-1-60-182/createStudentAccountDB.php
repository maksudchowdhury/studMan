<?php 
    session_start ();
    $adminLoginSuccessful=$_SESSION['admin_login_success'];
    if($_SESSION['login_success']!='1' && !$adminLoginSuccessful ){
        header("Location: error.html");
    }
    else{
        $servername='localhost';
        $username='root';
        $password='';
        $dbname='srms';
        $con= mysqli_connect($servername,$username,$password,$dbname);
        if(!$con){
            die('could not connect');
        }
        else{
            // var_dump($_POST);
            $studentID=$_POST['studentID'];
            $studentName=$_POST['studentName'];
            $studentAddress=$_POST['studentAddress'];
            $studentDepartment=$_POST['studentDepartment'];
            
            $sql="INSERT INTO student_info (student_id,student_name,student_address,student_department) VALUES ('$studentID','$studentName','$studentAddress','$studentDepartment')";
            $result= mysqli_query($con,$sql);

            if(!$result){
                $_SESSION['student_account_creation_success']=0;
            }
            else{
                $_SESSION['student_account_creation_success']=1;
            }

            header("Location: createStudentAccount.php");
            
        
        }
}
?>
