<?php 
    session_start ();
    if($_SESSION['login_success']!='1'){
        header("Location: error.html");
    }
    else{
        $servername='localhost';
        $username='root';
        $password='';
        $dbname='srms';
        $con= mysqli_connect($servername,$username,$password,$dbname);
        $studentID=$_GET['studentID'];
   

        if(!$con){
            die('could not connect');
        }
        else if((isset($_SESSION['student_login_success']) && $_SESSION['student_login_success']==true && $_SESSION['studentID']==$studentID) || (isset($_SESSION['admin_login_success']) && $_SESSION['admin_login_success']==true)){
            // echo ($_SESSION['studentID'].'<br>'.$studentID);
            $gradeReportQuery='SELECT semester,year, course_name, sum(marks) AS total_mark FROM (`student_results` NATURAL JOIN student_info NATURAL JOIN course_details NATURAL JOIN course_instructor)
            WHERE student_id="'.$studentID.'"
            GROUP by student_id,course_name,semester,year HAVING COUNT(marks>0)
            ORDER by year;';
            // echo $tableQuery;
            $gradeReport=mysqli_query($con,$gradeReportQuery);

            $detailedReportQuery='SELECT semester,year, course_name,exam, marks from (`student_results` NATURAL JOIN  course_details )
            WHERE student_id="'.$studentID.'";';
            // var_dump($tableResult);
            $detailedReport=mysqli_query($con,$detailedReportQuery);

        }
        
        
        else{
            header("Location: error.html");
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
    <title>SRMS student panel</title>
</head>

<body>

    <div class="container-fluid d-flex flex-column">

        <div class="row">
            <nav class="navbar" style="background-color: #21547F;">
                <div class="container-fluid">
                    <div class="container d-flex justify-content-between">
                        <div>
                            <img src="./images/favicon.ico" style="width: 40px;" alt="">
                            <a class="navbar-brand" style="color:white;" href="#">Report (
                                <?php echo 'ID: '.$studentID;?> )</a>
                        </div>

                        <div class="d-flex flex-row">
                            <div class="dropdown">
                                <a class="btn btn-outline-light dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"></a>

                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item btn btn-outline-light"
                                            onclick="location.href='studentLogout.php'">Sign out</button></li>
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



            <div class="input-group mb-3">
                <button class="btn btn-primary" onclick="window.print()">Download Report</button>

            </div>


            <div>
                <div class=" d-flex justify-content-center">
                    <h3>Grade sheet</h3>
                </div>
                <hr>

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>

                            <th scope="col">Semester</th>
                            <th scope="col">Course</th>
                            <th scope="col">Total Marks</th>
                            <th scope="col">grades</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row=mysqli_fetch_assoc($gradeReport)){
                            echo '<tr>';
                            echo '<td>'.$row['semester'].'-'.$row['year'].'</td>';
                            echo '<td>'.$row['course_name'].'</td>';
                            echo '<td>'.$row['total_mark'].'</td>';
                            echo '<td>';
                            if($row['total_mark']>=97 && $row['total_mark']<=100){
                                echo 'A+';
                            }
                            else if($row['total_mark']>=90 && $row['total_mark']<97){
                                echo 'A';
                            }
                            else if($row['total_mark']>=87 && $row['total_mark']<90){
                                echo 'A-';
                            }
                            else if($row['total_mark']>=83 && $row['total_mark']<87){
                                echo 'B+';
                            }
                            else if($row['total_mark']>=80 && $row['total_mark']<83){
                                echo 'B';
                            }
                            else if($row['total_mark']>=77 && $row['total_mark']<80){
                                echo 'B-';
                            }
                            else if($row['total_mark']>=73 && $row['total_mark']<77){
                                echo 'C+';
                            }
                            else if($row['total_mark']>=70 && $row['total_mark']<73){
                                echo 'C';
                            }
                            else if($row['total_mark']>=67 && $row['total_mark']<70){
                                echo 'C-';
                            }
                            else if($row['total_mark']>=63 && $row['total_mark']<67){
                                echo 'D+';
                            }
                            else if($row['total_mark']>=60 && $row['total_mark']<63){
                                echo 'D';
                            }
                           
                            else{
                                echo 'F';
                            }
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <hr>

            <div>
                <div>
                    <div class=" d-flex justify-content-center">
                        <h4>Detailed Report</h4>
                    </div>
                    <hr>

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>

                                <th scope="col">Semester</th>
                                <th scope="col">Course</th>
                                <th scope="col">Exam</th>
                                <th scope="col">Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        while($row=mysqli_fetch_assoc($detailedReport)){
                            echo '<tr>';
                            echo '<td>'.$row['semester'].'-'.$row['year'].'</td>';
                            echo '<td>'.$row['course_name'].'</td>';
                            echo '<td>'.$row['exam'].'</td>';
                            echo '<td>'.$row['marks'].'</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>


            </div>













        </div>


        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="./js/dropdownAjax.js"></script>
        <script src="./js/addMark.js"></script>
        <script src="./js/script.js"></script>
</body>

</html>