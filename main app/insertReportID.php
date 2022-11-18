<?php 
    session_start ();
    if($_SESSION['login_success']!='1' ){
        header("Location: error.html");
    }
    else{
        $servername='localhost';
        $username='root';
        $password='';
        $dbname='srms';
        $con= mysqli_connect($servername,$username,$password,$dbname);
        $rowFound=false;
        if(!$con){
            die('could not connect');
        }
        else{

            $stid="SELECT student_id FROM student_info";
            // $insName="SELECT DISTINCT instructor_codename FROM course_details NATURAL JOIN course_instructor";
            // $courseName="SELECT DISTINCT course_name FROM course_details NATURAL JOIN course_instructor";
            // $section="SELECT DISTINCT course_section FROM course_details NATURAL JOIN course_instructor";
            $semester="SELECT DISTINCT semester FROM course_details NATURAL JOIN course_instructor";
            $year="SELECT DISTINCT year FROM course_details NATURAL JOIN course_instructor";
            $result1 = mysqli_query($con, $stid);
            // $result2 = mysqli_query($con, $insName);
            // $result3 = mysqli_query($con, $courseName);
            // $result4 = mysqli_query($con, $section);
            $result5 = mysqli_query($con, $semester);
            $result6 = mysqli_query($con, $year);
            // if($result1 && $result2 && $result3 && $result4 && $result5 && $result6){
            //     $rowFound=true;
            // }
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

        <form action="showReport.php" method="GET">

        <div class="row d-flex flex-row">
            <div class="col-md-10">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Student ID</label>
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

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Load Report</button>
            </div>
            



        
        </div> 


        </form>
         






    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/dropdownAjax.js"></script>
    <script src="./js/addMark.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>