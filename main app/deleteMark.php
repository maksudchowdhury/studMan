<?php
    session_start();
	header("Allow-Access-Control-Origin: *");
	header("Content-Type: application/json; charset: UTF-8");
	header("Access-Control-Allow-Methods: POST");
	

    $adminLoginSuccessful=$_SESSION['admin_login_success'];
    $servername='localhost';
    $serverUsername='root';
    $serverPassword='';
    $dbname='srms';
    $con= mysqli_connect($servername,$serverUsername,$serverPassword,$dbname);

    if($con && $adminLoginSuccessful){
        $string = file_get_contents("php://input");
        $json_a = json_decode($string, true);
        $studentID= $json_a['studentID'];
        $semester= $json_a['semester'];

        $year= $json_a['year'];
        $instructor= $json_a['instructor'];
        $course= $json_a['course'];
        $section= $json_a['section'];

        $exam= $json_a['exam'];

        $courseIDsql ='select course_id from course_details natural join course_instructor where course_name ="'. $course .'" and course_section="'.$section.'" and semester ="'.$semester.'" and year ="'.$year.'" and instructor_codename ="'.$instructor.'";';

        $courseIDquery = mysqli_query($con, $courseIDsql);
        $courseID=mysqli_fetch_assoc($courseIDquery)['course_id'];
        // var_dump($courseID." ".$studentID." ".$exam);

        $lookResultSql = 'select result_id from student_results where student_id="'.$studentID.'" and course_id="'.$courseID.'" and exam="'.$exam.'" ; ';
        $lookResultquery = mysqli_query($con, $lookResultSql);
        $ifResultExist=mysqli_num_rows($lookResultquery);
        // var_dump($lookResultquery) ;

        if($ifResultExist){
            $deleteDataSql='delete from student_results where student_id="'.$studentID.'" and course_id="'.$courseID.'" and exam="'.$exam.'";';
            // var_dump($deleteDataSql);
            $deleteDataquery = mysqli_query($con, $deleteDataSql);
            // var_dump($deleteDataquery);
            echo '{"message":"Mark Data has been deleted successfully"}';        
        }
        else{
            echo '{"message":"Mark Data does not exist"}';
        }
    }
    else{
        
        die('could not connect');
        echo '{"message":"could not connect"}';
    }
    
    
?>
