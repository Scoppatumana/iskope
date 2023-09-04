<?php 
    include("../../path.php");
    include(ROOT_PATH . '/app/database/connection.php');
    include(ROOT_PATH . '/app/database/controller/users.php');
    // guestOnly(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/style.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/animate.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/aos.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/public.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/awesome-font/css/font-awesome.min.css" />
  <script src="../../assets/Javascript/jquery.min.js"></script>
  <script src="../../assets/Javascript/jquery-library.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard --- Create User</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <form action="" method="post" class="admin-form sm-box" enctype="multipart/form-data">
          <h1 class="center">Create User</h1>
          <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
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
            <input placeholder="Username" value="<?php echo $username; ?>" type="text" name="username" id="username" class="input-control" />
          </div>

          <div class="input-group">
            <label for="title">Email</label>
            <input placeholder="Email" value="<?php echo $email; ?>" type="email" name="email" id="title" class="input-control" />
          </div>

          <div class="input-group">
            <label for="title">Password</label>
            <input placeholder="Password" type="password" name="create_password" id="create_password" class="input-control" />
          </div>


          <div class="input-group">
            <label for="title">Password Confirmation</label>
            <input placeholder="Password Confirmation" type="password" name="password" id="password"
              class="input-control" />
          </div>

          <div class="input-group">
            <label for="role">Role</label>
            <select name="role_id" id="role_id" class="input-control">
              <option value="" selected>Select Role</option>
              <option value="1">Admin</option>
              <option value="2">Editor</option>
              <option value="3">Author</option>
            </select>
          </div>

          <div class="input-group">
            <label for="bio">Bio</label>
            <textarea placeholder="Bio" value="<?php echo $bio; ?>" name="bio" id="bio" class="input-control"><?php echo $bio; ?></textarea>
          </div>

          <div class="input-group">
            <label for="twitter">Facebook (Optional)</label>
            <input placeholder="Facebook" value="<?php echo $facebook; ?>" type="text" name="facebook" id="facebook" class="input-control" />
          </div>

          <div class="input-group">
            <label for="linkedin">Twitter (Optional)</label>
            <input placeholder="Twitter" value="<?php echo $twitter; ?>" type="text" name="twitter" id="twitter" class="input-control" />
          </div>

          <div class="input-group">
            <label for="instagram">Instagram (Optional)</label>
            <input placeholder="Instagram" value="<?php echo $instagram; ?>" type="text" name="instagram" id="instagram" class="input-control" />
          </div>

          <div class="input-group">
            <button class="btn primary-btn big-btn" type="submit" name="create-admin">
              <i class="fa fa-upload"></i> Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- //Page Container -->


  <script src="../../assets/Javascript/script.js"></script>
  <script src="../../assets/Javascript/aos.js"></script>
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