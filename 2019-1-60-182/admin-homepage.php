<?php 
    session_start ();
    if($_SESSION['login_success']!='1'){
        header("Location: error.html");
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

    <div class="container-fluid h-100 d-flex flex-column">

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

        <div class="row">
        <?php

if(isset($_SESSION['success']) && $_SESSION['success']==1){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    '.$_SESSION['successMsg'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['success']);
    unset($_SESSION['successMsg']);
}

elseif(isset($_SESSION['error']) && $_SESSION['error']==1){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    '. $_SESSION['errorMsg'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['error']);
    unset($_SESSION['errorMsg']);
}
?>
        </div>
        <div class="row d-flex align-items-stretch flex-grow-1">



            






            <div class="col-md ">

            </div>
            <div class="col-md d-flex justify-content-center align-items-center">
                <div class="w-75">

                    <div class="container-fluid border border-dark rounded-pill p-0 m-0 mb-2"
                        style="--bs-border-opacity: .2;">
                        <a href="createStudentAccount.php" class="btn btn-primary-outline rounded-pill w-100">Create
                            Student Account</a>
                    </div>

                    <div class="container-fluid border border-dark rounded-pill p-0 m-0 mb-2"
                        style="--bs-border-opacity: .2;">
                        <a href="loadStudentUpdate.php" class="btn btn-primary-outline rounded-pill w-100">Update
                            Student Account</a>
                    </div>

                    <div class="container-fluid border border-dark rounded-pill p-0 mb-2"
                        style="--bs-border-opacity: .2;">
                        <a href="manageStudentResult.php" class="btn btn-primary-outline rounded-pill w-100">Manage
                            result</a>
                    </div>

                    <div class="container-fluid border border-dark rounded-pill p-0 mb-2"
                        style="--bs-border-opacity: .2;">
                        <a href="insertReportID.php" class="btn btn-primary-outline rounded-pill w-100">View result</a>
                    </div>

                    <!-- <div class="container-fluid alert alert-primary p-0 mt-2 mb-2">
                        <a href="admin-homepage.php" class="btn btn-primary-outline w-100">Manage result</a>
                    </div> -->
                </div>
            </div>

            <div class="col-md align-items-end d-flex">
                <img src="./images/adminbg.svg" alt="" class="img-fluid">
            </div>

        </div>




    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>