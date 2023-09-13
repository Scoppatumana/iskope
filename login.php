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
    <title>User Login</title>
</head>

<body>

    <!-- Page Container -->
    <div class="default-page-container">
        <form action="" method="post" class="admin-form auth-form small-form animated zoomIn" enctype="multipart/form-data">
            <h1 class="center">Log In</h1>
            <?php include("app/helpers/formErrors.php"); ?>
            <div class="input-group">
                <label for="title">Email</label>
                <input placeholder="Email" value="<?php echo $email ?>" type="email" name="email" id="email" class="input-control" />
            </div>

            <div class="input-group">
                <div class="forgot-password-wrapper">
                    <label for="title">Password</label>
                    <small><a href="forgot-password.php">Forgot Password?</a></small>
                </div>
                <input placeholder="Password" type="password" name="password" id="password" class="input-control" />
            </div>

            <div class="input-group">
                <label for="remember-me">
                <input type="checkbox" name="remember-me" id="remember-me" />
                Remember me
                </label>
            </div>

            <div class="input-group">
                <button class="btn long-btn primary-btn big-btn" type="submit" name="login-btn">
                    <i class="fa fa-sign-in"></i> Login
                </button>
            </div>
            <p class="center">
                <small>Don't have an account? You can <a href="register.php">Sign Up</a>
                </small>
            </p>
        </form>
    </div>
    <!-- //Page Container -->


    <script src="assets/Javascript/script.js"></script>
    <script src="assets/Javascript/aos.js"></script>
</body>




</html>