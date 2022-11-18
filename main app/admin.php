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

    }
    </style>
    <title>SRMS admin portal</title>
</head>

<body>
    <div class="container-fluid h-100 d-flex flex-column">

    <?php session_start(); if(isset($_SESSION['error'])&& $_SESSION['error']==1){?>
        <div class="row">

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> <?php if(isset($_SESSION['wrongCredMsg'])){echo $_SESSION['wrongCredMsg'];unset($_SESSION['wrongCredMsg']);}
                                             else{echo $_SESSION['loginErrorMsg'];unset($_SESSION['loginErrorMsg']);}?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php };unset($_SESSION['error']); ?>




        <div class="row flex-grow-1 d-flex align-items-center">
            <div class="col-md ">

            </div>
            <div class="col-md d-flex justify-content-center">
                <div class="w-75">
                    <div class="container-fluid">
                        <form action="admin-login.php" method="POST">
                            <div class="d-flex justify-content-center w-100  border-warning mb-3">
                                <img src="./images/srms-a.png" alt="" class="w-100  border-success">
                            </div>
                            <div class="input-group input-group-md mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Username &Tab;</span>
                                <input required name="admin_username" required type="text" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="input-group input-group-md mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp;Password</span>
                                <input required name="admin_password" required type="password" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <!-- 
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div> -->
                            <button type="submit" class="btn  btn-primary mt-3 w-100  themebtn">Login</button>
                            <button type="button" onclick="location.href='index.php';"
                                class="btn btn-outline-success mt-5 w-100  themebtn">Not an Admin? Login as
                                Student</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md">

            </div>

        </div>




    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>