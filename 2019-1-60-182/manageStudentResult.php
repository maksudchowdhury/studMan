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


        <div class="row d-flex flex-row">
            <div class="col-md">
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
            <div class="col-md">

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">&nbsp;&nbsp;&nbsp;Semester</label>
                    <select onclick="loadInstructor()" class="form-select" name="semester" id="studentSemester">
                        <?php
                    if($con){
                        // echo "<option></option>";
                        while($row = mysqli_fetch_assoc($result5)) {
                            echo "<option>". $row["semester"]."</option>";
                        }
                    }
                ?>
                    </select>
                </div>

            </div>
            <div class="col-md">

                <div class="input-group mb-3">
                    <label class="input-group-text"
                        for="inputGroupSelect01">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year</label>
                    <select onclick="loadInstructor()" class="form-select" name="year" id="studentYear">
                        <?php
                    if($con){
                        // echo "<option></option>";
                        while($row = mysqli_fetch_assoc($result6)) {
                            echo "<option value=".$row["year"] .">". $row["year"]."</option>";
                        }
                    }
                ?>
                    </select>
                </div>

            </div>


        </div>

        <hr>
        <h5 class="mb-3">Course Information</h5>


        <div class="row d-flex flex-column">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01"> &nbsp; Instructor</label>
                <select onclick="loadCourse()" class="form-select" name="instructorName" id="instructorName">
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text"
                    for="inputGroupSelect01">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Course</label>
                <select onclick="loadSection()" class="form-select" name="courseName" id="courseName">
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text"
                    for="inputGroupSelect01">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;section</label>
                <select class="form-select" name="sectionNumber" id="sectionNumber">
                </select>
            </div>

        </div>




        <hr class="mt-3">
        <h5 class="mb-3">Grading Policy<h6><i>Please make sure total marks of this course is 100</i></h6></h5>

        <div class="row d-flex">
            

                <div class="input-group mb-3 col-md-2">
                    <span class="input-group-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quiz</span>
                    <input oninput="gradePolicy()" id="quizWt" type="number" class="form-control" placeholder="Weight" oninput="limiter()" >
                    <span class="input-group-text">% of</span>
                    <input oninput="gradePolicy()" id="quizTm" type="number" class="form-control" placeholder="Total Mark of exam" oninput="limiter()">
                </div>

                <div class="input-group mb-3 col-md-2">
                    <span class="input-group-text">Classwork</span>
                    <input oninput="gradePolicy()" id="classworkWt" type="number" class="form-control" placeholder="Weight" oninput="limiter()" >
                    <span class="input-group-text">% of</span>
                    <input oninput="gradePolicy()" id="classworkTm" type="number" class="form-control" placeholder="Total Mark of exam" oninput="limiter()">
                </div>


                <div class="input-group mb-3 col-md-2">
                    <span class="input-group-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mid-1</span>
                    <input oninput="gradePolicy()" id="mid1Wt" type="number" class="form-control" placeholder="Weight" oninput="limiter()" >
                    <span class="input-group-text">% of</span>
                    <input oninput="gradePolicy()" id="mid1Tm" type="number" class="form-control" placeholder="Total Mark of exam" oninput="limiter()">
                </div>

                <div class="input-group mb-3 col-md-2">
                    <span class="input-group-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mid-2</span>
                    <input oninput="gradePolicy()" id="mid2Wt" type="number" class="form-control" placeholder="Weight" oninput="limiter()" >
                    <span class="input-group-text">% of</span>
                    <input oninput="gradePolicy()" id="mid2Tm" type="number" class="form-control" placeholder="Total Mark of exam" oninput="limiter()">
                </div>


                <div class="input-group mb-3 col-md-2">
                    <span class="input-group-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Final</span>
                    <input oninput="gradePolicy()" id="finalWt" type="number" class="form-control" placeholder="Weight" oninput="limiter()" >
                    <span class="input-group-text">% of</span>
                    <input oninput="gradePolicy()" id="finalTm" type="number" class="form-control" placeholder="Total Mark of exam" oninput="limiter()">
                </div>
                <div class="d-flex mb-0 justify-content-center">
                <h6>Total Marks of this course</h6>
                </div>
                <div class="input-group mb-3 col-md-2 justify-content-center">
                <a id="totalMarkOfCourse" class="btn bg-danger bg-opacity-25 text-dark w-100" disabled>0</a> 
                </div>

               

        </div>

        <hr class="mt-3">
        <h5 class="mb-3">Exam Information</h5>

        <div class="row d-flex">

            <div class="col-md input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01"> &nbsp; Exam</label>
                <select class="form-select" name="examName" id="examName" disabled>
                    <option value="quiz">quiz</option>
                    <option value="classwork">classwork</option>
                    <option value="mid1">mid-1</option>
                    <option value="mid2">mid-2</option>
                    <option value="final">final</option>

                </select>
            </div>

            <div class="col-md input-group mb-3 d-flex flex-row">
                <label class="input-group-text" for="inputGroupSelect01">Given</label>
                <input type="number" class="form-control" name="examMarks" id="examMarks" oninput="limiter();gradePolicy()" disabled>

                <label class="input-group-text" for="inputGroupSelect01">obtained</label>
                <input disabled type="number" class="form-control" name="examMarksObtained" id="examMarksObtained" oninput="limiter()"
                    placeholder="0" disabled>
            </div>



        </div>
        <div class="row d-flex">
            <div class="col-md mb-3">
                <button class="btn btn-danger w-100 " onclick="deleteMark()">Delete marks</button>
            </div>
            <div class="col-md mb-3">
                <button class="btn btn-success w-100 " onclick="addMark()">Add marks</button>
            </div>
            <div class="col-md mb-3">
                <a href="admin-homepage.php" class="btn btn-primary w-100">Go back</a>
            </div>
        </div>

        <div class="row d-flex mt-2">
            <div class="col-md"></div>
            <div class="col-md">

            </div>
            <div class="col-md"></div>
        </div>






    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/dropdownAjax.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>