<?php
    include 'app/database/connection.php';
    include("path.php");
    include 'app/database/controller/users.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link type="text/css" rel="stylesheet" href="assets/css/style.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/animate.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/aos.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/public.css" />
    <link type="text/css" rel="stylesheet" href="assets/awesome-font/css/font-awesome.min.css" />
    <script src="assets/Javascript/jquery.min.js"></script>
    <!-- <script src="assets/Javascript/jquery-library.js"></script> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
</head>

<body>

    <!-- Page Container -->
    <div class="default-page-container">
        <form action="" method="post" class="admin-form auth-form small-form animated zoomIn" enctype="multipart/form-data">
            <h1 class="center form-title">Request new Password</h1>
            <?php include("app/helpers/formErrors.php"); ?>
            <div class="lead-text">
                Enter the email address with which you signed up on this website so we can assist
                with resetting your password
            </div>
            <div class="input-group">
                <label for=""></label>
                <input placeholder="Email Address" type="email" name="email" id="email" class="input-control" />
            </div>

            <div class="input-group">
                <button class="btn long-btn primary-btn big-btn" name="sendotp" type="submit">
                    Send Reset Link
                </button>
            </div>
            
        </form>
    </div>
    <!-- //Page Container -->


    <script src="assets/Javascript/script.js"></script>
    <script src="assets/Javascript/aos.js"></script>
</body>




</html>