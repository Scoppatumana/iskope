<?php
  include '../path.php'; 
  include(ROOT_PATH . "/app/database/controller/topics.php");
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
    <script src="../assets/Javascript/jquery.min.js"></script>
    <script src="../assets/Javascript/jquery-library.js"></script>
    <script src="../assets/slick/slick.min.js"></script>
    <script src="../assets/Javascript/script.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Page Container -->
    <div class="page-wrapper">
    <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
        <div class="page-content">
            <div class="admin-container">
                <h1 class="center">Administrative Dashboard</h1>
            </div>
            

            <?php include(ROOT_PATH . "/app/includes/message.php"); ?>
            
        </div>
    </div>
    <!-- //Page Container -->

    
   
    

</body>

<script src="../assets/Javascript/aos.js"></script>
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

</html>