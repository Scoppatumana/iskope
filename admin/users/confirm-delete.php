<?php
    include("../../path.php");  
    include(ROOT_PATH . "/app/database/controller/users.php");
    // adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Carousel Style -->
  <link type="text/css" rel="stylesheet" href="../../assets/slick/slick.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/style.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/animate.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/aos.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/public.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/awesome-font/css/font-awesome.min.css" />
  <script src="../../assets/Javascript/jquery.min.js"></script>
  <script src="../../assets/Javascript/jquery-library.js"></script>
  <script src="../../assets/slick/slick.min.js"></script>


  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard -- Confirm Delete</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <div class="admin-table lg-box">
          <h1 class="" style="padding: 0; margin: 0">Are you sure?</h1>
          <hr />

          <div class="responsive-table">
            <p>Are you sure you want to delete user <strong><?php echo $username ?></strong> Permanently?
            </p>
            <p style="color: red;">This action CANNOT be undone</p>
            <div>
              <a href="confirm-delete.php?del_id=<?php echo $userId ?>" class="btn danger-btn">Permanently Delete</a>
              <a href="index.php" class="btn">Do Nothing</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- //Page Container -->
</body>

<script src="../../assets/Javascript/aos.js"></script>
<script src="../../assets/Javascript/script.js"></script>

</html>