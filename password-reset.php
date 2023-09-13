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
    <title>Reset Password</title>
</head>

<body>

    <!-- Page Container -->
    <div class="default-page-container">
        <form action="" method="post" class="admin-form auth-form small-form animated zoomIn" enctype="multipart/form-data">
            <h1 class="center">Reset Password</h1>
            <?php include("app/helpers/formErrors.php"); ?>
            <?php include("app/includes/message.php"); ?>
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            <div class="input-group">
                <label for="title">OTP</label>
                <input placeholder="OTP" value="<?php echo $otp ?>" type="text" name="otp" id="otp" class="input-control" />
            </div>

            <div class="input-group">
                <label for="title">Password</label>
                <input placeholder="Password" type="password" name="password" id="password" class="input-control" />
            </div>

            <div class="input-group">
                <label for="title">Confirm Password</label>
                <input placeholder="Confirm Password" type="password" name="conf_password" id="conf_password" class="input-control" />
            </div>


            <div class="input-group">
                <button class="btn long-btn primary-btn big-btn" type="submit" name="reset-password">
                    <i class="fa fa-sign-in"></i> Reset
                </button>
            </div>
            <p class="center">
                <small>Back to <a href="index.php">Home Page</a>
                </small>
            </p>
        </form>
    </div>
    <!-- //Page Container -->


    <script src="assets/Javascript/script.js"></script>
    <script src="assets/Javascript/aos.js"></script>
</body>




</html>