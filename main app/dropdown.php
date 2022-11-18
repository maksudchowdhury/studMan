<?php 
session_start();
$username=$_SESSION['admin_username'];
$servername='localhost';
$serverUsername='root';
$serverPassword='';
$dbname='srms';
$dropdownmenu=$_GET['menu'];
$con= mysqli_connect($servername,$serverUsername,$serverPassword,$dbname);

if($dropdownmenu=='instructor'){

    if($con && $_SERVER['REQUEST_METHOD']=="GET" && $_SESSION['login_success']=='1'){
        $studentSemester=$_GET['semester'];
        $studentYear=$_GET['year'];
        $query='SELECT instructor_codename FROM course_details NATURAL JOIN course_instructor where semester="'.$studentSemester .'" and year="'.$studentYear.'"';
        // echo $insName;
        $result = mysqli_query($con, $query);
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
        echo json_encode($data);
    }
    else{
        
        die('could not connect');
    }
}

elseif($dropdownmenu=='course'){
    if($con && $_SERVER['REQUEST_METHOD']=="GET" && $_SESSION['login_success']=='1'){
        $studentSemester=$_GET['semester'];
        $studentYear=$_GET['year'];
        $instructorName=$_GET['instructor'];
       
        $query='SELECT course_name FROM course_details NATURAL JOIN course_instructor where instructor_codename="'.$instructorName .'" and semester="'.$studentSemester .'" and year="'.$studentYear.'"';
        // echo $insName;
        $result = mysqli_query($con, $query);
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
        echo json_encode($data);
    }
    else{
        
        die('could not connect');
    }

}

elseif($dropdownmenu=='section'){
    if($con && $_SERVER['REQUEST_METHOD']=="GET" && $_SESSION['login_success']=='1'){
        $studentSemester=$_GET['semester'];
        $studentYear=$_GET['year'];
        $instructorName=$_GET['instructor'];
        $courseName=$_GET['course'];

        // echo $courseName." ".$instructorName." ".$studentSemester." ".$studentYear;
       
        $query='SELECT course_section FROM course_details NATURAL JOIN course_instructor where course_name="'.$courseName .'" and instructor_codename="'.$instructorName .'" and semester="'.$studentSemester .'" and year="'.$studentYear.'"';
        // echo $query;
        $result = mysqli_query($con, $query);
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
        echo json_encode($data);
    }
    else{
        
        die('could not connect');
    }

}

?>