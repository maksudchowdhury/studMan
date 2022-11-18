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
            $stid="SELECT student_id FROM student_info";
            $result1 = mysqli_query($con, $stid);

            

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




            <form action="updateStudentAccount.php" method="POST">




            
                <?php

                    if(isset($_SESSION['student_account_deletion_success']) && $_SESSION['student_account_deletion_success']==1){
                        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Account Deleted successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        unset($_SESSION['student_account_deletion_success']);
                    }
                    
                    elseif(isset($_SESSION['student_account_deletion_success']) && $_SESSION['student_account_deletion_success']==0){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        This account could not be deleted!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        unset($_SESSION['student_account_deletion_success']);
                    }

                    else if(isset($_SESSION['student_account_updation_success']) && $_SESSION['student_account_updation_success']==1){
                        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Account updated successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        unset($_SESSION['student_account_updation_success']);
                    }
                    else if(isset($_SESSION['student_account_updation_success']) && $_SESSION['student_account_updation_success']==0){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        This account could not be updated!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        unset($_SESSION['student_account_updation_success']);
                    }

                ?>


                <div class="col-md">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="studentID">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Student ID</label>
                        <select class="form-select" name="studentID" id="studentID">
                            <?php
                    if($con){
                        // echo "<option></option>";
                        while($row = mysqli_fetch_assoc($result1)) {
                            echo "<option>". $row["student_id"]."</option>";
                        }
                    }
                ?>
                        </select>
                    </div>
                </div>


                <div class="row d-flex">
                    <div class="col-md mb-3">
                    <button type="submit" class="btn btn-outline-danger w-100" value="delete" name="submitBtn">Delete Student</button>
                    </div>
                    <div class="col-md mb-3">
                        <button type="submit" class="btn btn-outline-success w-100" value="update" name="submitBtn">Update Information</button>
                    </div>
                    <div class="col-md mb-3"><a href="admin-homepage.php" class="btn btn-outline-primary w-100">Go back</a></div>
                </div>

                <div class="row d-flex mt-2">
                    <div class="col-md"></div>
                    <div class="col-md">
                        
                    </div>
                    <div class="col-md"></div>
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