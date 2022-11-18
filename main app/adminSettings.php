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
        /* background-image: url(./images/adminbg.svg); */
        /* background-repeat: no-repeat; */
        /* background-position: right bottom; */
        /* background-size: 30%; */

    }

    body {
        height: 100vh;
        padding: 0;
        margin: 0;

    }


    .imgContainer {
        width: 150px;
        height: 150px;
        display: block;
        margin: 0 auto;
    }

    .outer {
        width: 100%;
        height: 100%;
        max-width: 150px;
        max-height: 150px;
        margin: auto;

        background-image: url("./images/profiles/admin/<?php echo $_SESSION['admin_username'] ?>.jpg");
        /* background-image: url("./images/marker.png") ; */
        background-position: center;
        background-size: cover;
        border-radius: 100%;
        position: relative;
        transition: 0.5s;

    }

    .inner {

        width: 30px;
        height: 30px;
        border: 1px solid black !important;
        border-radius: 100%;
        position: absolute;
        bottom: -15px;
        right: 60px;

        background-image: url("images/editpl.png");
        background-position: center;
        background-size: cover;
        opacity: 01;
        transition: 0.3s;

    }

    .inner:hover {
        background-image: url("images/editpd.png");
        background-position: center;
        opacity: 1;
        background-size: cover;

    }
    </style>
    <title>SRMS admin panel</title>
</head>

<body>

    <!-- Modal for image upload-->
    <div class="modal fade" id="uploadImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h6 class="modal-title" id="exampleModalLabel">Select the image you would like to upload (jpg)</h4>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                        <form action="uploadImage.php" method="POST" enctype="multipart/form-data" name="uploadProfileImage">
                            <div class="modal-body">
                                <div class="">
                                    <input class="form-control" name="profileImage" id="profileImage" type="file">
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">


                                <button type="button" class="btn btn-outline-danger"
                                    data-bs-dismiss="modal">&nbsp;Close&nbsp;</button>
                                <button type="text" name="imgpass" class="visually-hidden" value="img"></button>
                                <button type="submit" class="btn btn-outline-success" value="img">Upload</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->






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
                                        <li><button class="dropdown-item btn btn-outline-light"  onclick="location.href='adminLogout.php'" >Sign out</button></li>
                                        <li><button class="dropdown-item btn btn-outline-light"  onclick="location.href='adminSettings.php'" >Settings</button></li>
                                    </ul>
                                </div>
                       
                        </div>
                    </div>
                </div>
            </nav>

        </div>
        <div class="row d-flex align-items-stretch flex-grow-1">

            <div class="col-md "></div>
            <div class="col-md d-flex justify-content-center align-items-center">
                <div class="w-75">

                    <div class="mb-3">
                        <form action="changePass.php" method="POST" enctype="multipart/form-data" name="changePass">


                            <div class="imgContainer mt-5 mb-5 ">
                                <div class="outer border">
                                    <div class="inner btn border border-white" type="button" data-bs-toggle="modal"
                                        data-bs-target="#uploadImage">

                                    </div>
                                </div>
                            </div>

                            <input name="newPass" type="password" class="form-control mb-2" id="newPass"
                                placeholder="New Password">
                            <input  name="confirmPass" type="password" class="form-control mb-5" id="confirmPass"
                                placeholder="Confirm Password">

                    </div>
                    <div class="d-flex  flex-row w-100">
                        <button type="submit"
                            class="btn btn-outline-success m-1 flex-grow-1  ">&nbsp;Save&nbsp;</button>
                        <button type="button" onclick="location.href='admin-homepage.php'" class="btn btn-outline-primary m-1 flex-grow-1 ">Close</button>
                    </div>
                    </form>
                </div>
            </div>

            <div class="col-md align-items-end d-flex">
                <img src="./images/adminbg.svg" alt="" class="img-fluid">
            </div>

        </div>




    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>