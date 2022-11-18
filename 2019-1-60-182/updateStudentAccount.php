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
            $studentID=$_POST['studentID'];
            $_SESSION['studentID']=$studentID;
            $submitReq=$_POST['submitBtn'];
           

            if($submitReq == 'delete'){
                

                $lookResultSql = 'select student_id from student_info where student_id="'.$studentID.'" ; ';
                $lookResultquery = mysqli_query($con, $lookResultSql);
                $ifResultExist=mysqli_num_rows($lookResultquery);

                
                if(!$ifResultExist){
                    $_SESSION['student_account_deletion_success']=0;
                }
                else{
                    $sql="DELETE FROM student_info WHERE student_id='$studentID'";
                    $result= mysqli_query($con,$sql);
                    $_SESSION['student_account_deletion_success']=1;
                }
                header("Location: loadStudentUpdate.php");
            }
            
            elseif($submitReq == 'update'){
                $nameQuery="SELECT student_name  FROM student_info where student_id='$studentID'";
                $name= mysqli_fetch_assoc(mysqli_query($con, $nameQuery))['student_name'];
                
                
                $addressQuery="SELECT student_address  FROM student_info where student_id='$studentID'";
                $address= mysqli_fetch_assoc(mysqli_query($con, $addressQuery))['student_address'];
                
                
                $departmentQuery="SELECT student_department  FROM student_info where student_id='$studentID'";
                $department= mysqli_fetch_assoc(mysqli_query($con, $departmentQuery))['student_department'];    
                
                
                $accountStatusQuery="SELECT student_status  FROM student_info where student_id='$studentID'";
                $accountStatus = mysqli_fetch_assoc(mysqli_query($con, $accountStatusQuery))['student_status'];
            }
            
            else{
                header("Location: error.html");

            }

            

        }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/SAMSfav.png">
    <style>
    html,
    body {
        padding: 0;
        margin: 0;

    }

    body {
        height: 100vh;
        padding: 0;
        margin: 0;

    }
    </style>
    <title>SRMS admin panel</title>
</head>

<body>

    <div class="container-fluid d-flex flex-column">

        <div class="row">
            <nav class="navbar" style="background-color: #21547F;">
                <div class="container-fluid">
                    <div class="container d-flex justify-content-between">
                        <div>
                            <img src="./images/favicon.ico" style="width: 40px;" alt="">
                            <a class="navbar-brand" style="color:white;"
                                href="#"><?php echo $_SESSION['admin_username'] ?></a>
                        </div>

                        <div class="d-flex flex-row">
                            <img alt="Bootstrap Image Preview"
                                src="./images/profiles/admin/<?php echo $_SESSION['admin_username'] ?>.jpg"
                                class="rounded-circle mx-2" style="height: 40px; width:40px; object-fit: cover" />


                            <div class="dropdown">
                                <a class="btn btn-outline-light dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"></a>

                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item btn btn-outline-light"
                                            onclick="location.href='adminLogout.php'">Sign out</button></li>
                                    <li><button class="dropdown-item btn btn-outline-light"
                                            onclick="location.href='adminSettings.php'">Settings</button></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>

        </div>
    </div>

    <div class="container mt-5">


        <div class="row d-flex flex-row">




            <form action="updateStudentAccountDB.php" method="POST">



                <div class="col-md">
                    <div class="input-group mb-3">

                        <label class="input-group-text" name="studentIDinactive"
                            for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Student ID</label>
                        <select class="form-select" name="studentIDinactive" id="studentIDinactive" disabled>
                            <option>
                                <?php echo $studentID?>
                            </option>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"
                        id="studentName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</span>
                    <input name="studentName" type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm" <?php echo 'value="'.$name.'"'?>>
                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text"
                        id="studentAddress-sizing-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;address</span>
                    <input name="studentAddress" type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm" <?php echo 'value="'.$address.'"'?>>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text"
                        for="inputGroupSelect01">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Department</label>
                    <select name="studentDepartment" class="form-select" id="studentDepartment"
                        placeholder="Select department">

                        <?php 
                        $departmentNames=['CSE','BBA','English','Law','EEE','ECE'];
                        for($i=0;$i<count($departmentNames);$i++){
                            if($department==$departmentNames[$i]){
                                echo '<option selected>'.$departmentNames[$i].'</option>';
                            }
                            else{
                                echo '<option>'.$departmentNames[$i].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>



                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp;&nbsp;&nbsp;&nbsp;Account
                        status</span>
                    <select name="accountStatus" class="form-select" id="accountStatus" placeholder="Select department">

                        <?php 
                        $accountStatusNames=['active','inactive'];
                        for($i=0;$i<count($accountStatusNames);$i++){
                            if($accountStatus==$accountStatusNames[$i]){
                                echo '<option selected>'.$accountStatusNames[$i].'</option>';
                            }
                            else{
                                echo '<option>'.$accountStatusNames[$i].'</option>';
                            }
                        }
                        ?>

                    </select>
                </div>

                <div class="form-check form-switch">
                    <input onchange='passwordToggleAction()' class="form-check-input" type="checkbox" role="switch"
                        id="passwordToggle" name="passwordToggle" value="false">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Change Password</label>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"
                        id="defPassSpan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Password</span>
                    <input name="changePass" id="changePass" type="text" class="form-control"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled
                        placeholder="user's current password">
                </div>


                <div class="form-check form-switch d-none">
                    <input onchange='imageToggleAction()' class="form-check-input" type="checkbox" role="switch"
                        id="imageToggle" name="imageToggle" value="false">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Change profile image (<i><small> file
                                should be under 5mb & of JPG format </small></i>)</label>
                </div>

                <div class="mb-3 d-none">
                    <input class="form-control" type="file" id="imageFileName" disabled>
                </div>



                <div class="row d-flex">
                    <div class="col-md"></div>
                    <div class="col-md">
                        <button type="submit" class="btn btn-success w-100">Update Account</button>
                    </div>
                    <div class="col-md"></div>
                </div>

                <div class="row d-flex mt-2">
                    <div class="col-md"></div>
                    <div class="col-md">
                        <a href="loadStudentUpdate.php" class="btn btn-primary w-100">Go back</a>
                    </div>
                    <div class="col-md"></div>
                </div>
        </div>


        </form>










    </div>









    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/dropdownAjax.js"></script>
    <script src="./js/addMark.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>