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
        $sql="";
        if(!$con){
            die('could not connect');
        }
        else{
            // var_dump($_POST);
            $studentID=$_SESSION['studentID'];
            unset($_SESSION['studentID']);
            $studentName=$_POST['studentName'];
            $studentAddress=$_POST['studentAddress'];
            $studentDepartment=$_POST['studentDepartment'];
            $studentAccountStatus=$_POST['accountStatus'];
            $changePassReq=$_POST['passwordToggle'];
            $changeImageReq=$_POST['imageToggle'];

            if($changePassReq=='true'){
                $newPass=$_POST['changePass'];
                $newPassHash=hash('sha256',$newPass);
                $sql='update student_info set student_name="'.$studentName.'" ,student_address="'.$studentAddress.'" ,student_department="'.$studentDepartment.'" ,student_status="'.$studentAccountStatus.'"  ,default_password="'.$newPass.'",student_password="'.$newPassHash.'" where student_id= "'.$studentID.'";' ; 

            }
            else if($changeImageReq=='true'){
               
                $sql="UPDATE student_info (student_id,student_name,student_address,student_department,student_status) VALUES ('$studentID','$studentName','$studentAddress','$studentDepartment')";

            }
            else{
                
                $sql='update student_info set student_name="'.$studentName.'" ,student_address="'.$studentAddress.'" ,student_department="'.$studentDepartment.'" ,student_status="'.$studentAccountStatus.'" where student_id= "'.$studentID.'";' ; 
                // echo '<br>';
                // echo($sql);


            }

            //check if student exists or not
            $lookResultSql = 'select student_id from student_info where student_id="'.$studentID.'" ; ';
            $lookResultquery = mysqli_query($con, $lookResultSql);
            $ifResultExist=mysqli_num_rows($lookResultquery);
            // echo '<br>';
            // var_dump($lookResultquery) ;


            if(!$ifResultExist){
                $_SESSION['student_account_updation_success']=0;
            }
            else{
                $result= mysqli_query($con,$sql);
                $_SESSION['student_account_updation_success']=1;
                echo '<br>';
                var_dump(mysqli_error($con));
            }

            header("Location: loadStudentUpdate.php");
            
        
        }
}
?>