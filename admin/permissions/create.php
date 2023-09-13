<?php
    include("../../path.php");  
    include(ROOT_PATH . "/app/database/controller/permissions.php");
    // adminOnly();
    if(empty($_SESSION['id'])){
      header('location: ' . BASE_URL . '/index.php');
    }
    adminOnly();
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
  <title>Create Permission</title>
</head>

<body>
  <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <form action="" method="post" class="admin-form sm-box" enctype="multipart/form-data">
          <h1 class="center">Create Permission</h1>
          <?php include(ROOT_PATH . '/app/helpers/formErrors.php'); ?>

          <div class="input-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo $name ?>" id="name" class="input-control" />
          </div>

          <div class="input-group">
            <label for="post-editor">Description</label>
            <textarea name="description" value="<?php echo $description ?>" id="text-editor" class="input-control"><?php echo $description ?></textarea>
          </div>

          <div class="input-group">
            <button class="btn primary-btn big-btn" type="submit" name="add-permission">
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
</body>




</html>