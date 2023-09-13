


<?php  
    include("../../path.php");
    include(ROOT_PATH . '/app/database/connection.php');
    include(ROOT_PATH . '/app/database/controller/topics.php');
    
    $user = selectOne('users', ['id' => $_SESSION['id']]);
    $role = selectOne('roles', ['id' => $user['role_id']]);

    if(empty($_SESSION['id'])){
      header('location: ' . BASE_URL . '/index.php');
    }
    adminAndEditorOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/awesome-font/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/public.css" type="text/css">
    <script src="../../assets/Javascript/jquery-library.js"></script>
    <script src="../../assets/Javascript/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->
    <title>Admin Dashboard -- Update Topic</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
  <!-- Page Container -->
  <div class="page-wrapper">

  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <form action="" method="post" class="admin-form sm-box" enctype="multipart/form-data">
          <h1 class="center">Create Topic</h1>
          <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
          <input type="hidden" name="id" value="<?php echo $id ?>">

          <div class="input-group">
            <label for="title">Name</label>
            <input type="text" value="<?php echo $name ?>" name="name" id="name" class="input-control" />
          </div> 

          <div class="input-group">
            <label for="">Description</label>
            <textarea name="description" id="body"><?php echo $description ?></textarea>
          </div>

          
          <div class="input-group">
            <button class="btn primary-btn small-btn" type="button" onclick="_detect_history();">
              <i class="fa fa-chevron-left"></i> Previous
            </button>


            <button class="btn primary-btn small-btn" type="submit" name="update-btn">
              <i class="fa fa-upload"></i> Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- //Page Container -->
  <script>
     // Sidebar Responsivenes
     const menuIcon = document.querySelector('.menu-icon');
        const sideBar = document.querySelector('.sidebar');
        const sideBarOverlay = document.querySelector('.sidebar-overlay');

        function toggleSidebar() {
            sideBar.classList.toggle('open');
            sideBarOverlay.classList.toggle('open');
        }

        menuIcon.addEventListener('click', toggleSidebar);

        sideBarOverlay.addEventListener('click', toggleSidebar);

         // History back
         function _detect_history(){
            window.history.back({id:1}), null, null;
        }
  </script>
  <script src="../../assets/ckeditor5-build-classic/ckeditor.js"></script>
  <script src="../../assets/Javascript/ckeditor-script.js"></script>


</body>




</html>