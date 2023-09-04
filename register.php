<?php 

    include 'app/database/connection.php';
    include("path.php");
    include 'app/database/controller/users.php';
    // guestOnly(); 
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
    <script src="assets/Javascript/jquery-library.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard --- Create User</title>
</head>

<body>
   
    <!-- Page Container -->
    <div class="default-page-container">
        <form action="register.php" method="post" class="admin-form auth-form animated zoomIn" enctype="multipart/form-data">
            <h1 class="center">Sign Up</h1>
            <?php include("app/helpers/formErrors.php"); ?>
            <div class="input-group avatar-input-group center">
                <input type="file" name="image" id="avatar-input" class="hide avatar-input">
                <button type="button" class="change-avatar-btn"  id="change-avatar-btn">
                    <span>
                        <label for="avatar-input">Change</label>
                    </span>
                </button>
                <label for="avatar-input">Profile Image (Optional)</label>
            </div>


            <div class="input-group">
                <label for="title">Username</label>
                <input placeholder="Username" value="<?php echo $username ?>" type="text" name="username" id="username" class="input-control" />
            </div>

            <div class="input-group">
                <label for="title">Email</label>
                <input placeholder="Email" value="<?php echo $email ?>" type="email" name="email" id="title" class="input-control" />
            </div>

            <div class="input-group">
                <label for="title">Password</label>
                <input placeholder="Password" value="" type="password" name="create_password" id="create_password" class="input-control" />
            </div>


            <div class="input-group">
                <label for="title">Password Confirmation</label>
                <input placeholder="Password Confirmation" value="" type="password" name="password" id="password"
                    class="input-control" />
            </div>

            <div class="input-group">
                <button class="btn long-btn primary-btn big-btn" name="register-btn">
                    <i class="fa fa-plus"></i> Register
                </button>
            </div>
            <p class="center">
                <small>Already have an account? You can <a href="login.php">Login</a>
                </small>
            </p>
        </form>
    </div>
    <!-- //Page Container -->


    <script src="assets/Javascript/script.js"></script>
    <script src="assets/Javascript/aos.js"></script>
    <script>
        
    function imagePreview(fileInput) { 
        if (fileInput.files && fileInput.files[0]) { 
            var fileReader = new FileReader(); 
            fileReader.onload = function (event) { 
                $('#change-avatar-btn').css("background-image", "url(" + this.result + ")");
            }; 
            fileReader.readAsDataURL(fileInput.files[0]); 
        } 
    } 
    $("#avatar-input").change(function () { 
        imagePreview(this); 
    });

    </script>
</body>




</html>