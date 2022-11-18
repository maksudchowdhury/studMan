<?php

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
        body{
            height: 100vh;
        }
    </style>
    <title>SRMS student portal</title>
</head>
<body class=" border-primary d-flex position-relative justify-contents-center align-items-center">
    <div class="container-md w-25">
    <form action="student-login.php" method="POST">
                <div class="d-flex justify-content-center w-100  border-warning mb-3">
                    <img src="./images/srms-s.png" alt="" class="w-100  border-success">
                </div>
              <div class="input-group input-group-md mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Student ID &Tab;</span>
                <input type="number" name="studentID" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>
              <div class="input-group input-group-md mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp;&nbsp;Password</span>
                <input name="password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>
    <!-- 
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div> -->
            <button type="submit" class="btn  btn-primary mt-3 w-100  themebtn">Login</button>

            <button type="button" onclick="location.href='http://localhost/admin.php';" class="btn btn-outline-success mt-5 w-100  themebtn">Not a student? Login as Admin</button>

            
          </form>

    </div>
    <div class="container-sm position-absolute bottom-0 end-0" > 
        <!-- <img src="./images/sysLogo.png" alt="" class="position-absolute bottom-0 end-0 w-25 opacity-75  " > -->
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>