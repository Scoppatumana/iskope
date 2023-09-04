<?php 
    include("../../path.php");
    include(ROOT_PATH . '/app/database/connection.php');
    include(ROOT_PATH . '/app/database/controller/roles.php');
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
  <title>Admin Dashboard --- Edit Role</title>
</head>

<body>
  <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <form action="" method="post" class="admin-form sm-box" enctype="multipart/form-data">
          <h1 class="center">Edit Role</h1>
          <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <div class="input-group">
            <label for="title">Name</label>
            <input type="text" value="<?php echo $name ?>" name="name" id="name" class="input-control" />
          </div>

          <div class="input-group">
            <label for="post-editor">Description</label>
            <textarea name="description" value="<?php echo $description ?>" id="body" class="input-control"><?php echo $description ?></textarea>
          </div>

          <div class="input-group" style="margin-top:20px">
            <button class="btn primary-btn big-btn" name="update-btn" type="submit">
              <i class="fa fa-upload"></i> Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- //Page Container -->

  <script src="../../assets/ckeditor5-build-classic/ckeditor.js"></script>
  <script src="../../assets/Javascript/ckeditor-script.js"></script>
  <script src="../../assets/Javascript/script.js"></script>
  <script src="../../assets/Javascript/aos.js"></script>
</body>




</html>