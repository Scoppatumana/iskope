<?php
  include '../path.php'; 
  include(ROOT_PATH . "/app/database/controller/users.php");

  if(empty($_SESSION['id'])){
    header('location: ' . BASE_URL . '/index.php');
  }

  $user = selectOne($table, ['id' => $_SESSION['id']]);
  $role = selectOne('roles', ['id' => $user['role_id']]);
  
  allAdminsOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Carousel Style -->
    <link type="text/css" rel="stylesheet" href="../assets/slick/slick.css">
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="../assets/css/animate.css">
    <link type="text/css" rel="stylesheet" href="../assets/css/aos.css">
    <link type="text/css" rel="stylesheet" href="../assets/css/public.css">
    <link type="text/css" rel="stylesheet" href="../assets/awesome-font/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrative Dashboard ----- Main Dashboard</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Page Container -->
    <div class="page-wrapper">
    <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
        <div class="page-content">
            <div class="admin-container">
            <div class="admin-table lg-box">
                <h1 class="center">Administrative Dashboard</h1>

                <?php include(ROOT_PATH . "/app/includes/message.php"); ?>

                <div class="admin-content">
                    <ul class="welcome">
                    <li>Welcome Back <?php echo $role['name']; ?> <?php echo $user['username']; ?>!!</li>
                    </ul>
                </div>

                </div>
        </div>
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
    </script>

</body>



</html>