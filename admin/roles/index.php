<?php 
    include("../../path.php");
    include(ROOT_PATH . '/app/database/connection.php');
    include(ROOT_PATH . '/app/database/controller/roles.php');
    
    $user = selectOne('users', ['id' => $_SESSION['id']]);
    $role = selectOne('roles', ['id' => $user['role_id']]);

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
  <!-- Carousel Style -->
  <link type="text/css" rel="stylesheet" href="../../assets/slick/slick.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/style.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/animate.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/aos.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/css/public.css" />
  <link type="text/css" rel="stylesheet" href="../../assets/awesome-font/css/font-awesome.min.css" />
  <script src="../../assets/Javascript/jquery.min.js"></script>
  <script src="../../assets/Javascript/jquery-library.js"></script>


  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard --- Manage Roles</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <div class="admin-table sm-box">
          <h1 class="center" style="padding: 0; margin: 0">Roles</h1>
          <hr />


          <div class="table-actions">
          <a href="trash.php" class="btn warning-btn small-btn">
                <i class="fa fa-trash"></i> Trash
            </a>
            <a href="create.php" class="btn primary-btn small-btn">
              <i class="fa fa-plus-circle"></i> Add Role
            </a>
          </div>

          <div class="responsive-table">
          <?php include(ROOT_PATH . "/app/includes/message.php"); ?>
            <table>
              <thead>
                <th>SN</th>
                <th>Role</th>
                <th># of Users</th>
                <!-- <th>Update Permissions</th> -->

              </thead>

              <tbody>
              <?php

                  
                  foreach ($roles as $key => $role) {
                    $usersCount = selectAll('users', ['role_id' => $role['id']]);
                    
              ?>
                <tr>
                  
                  <td><?php echo $key + 1; ?></td>
                  <td>
                  <?php echo $role['name']; ?>
                    <div class="td-action-links">
                      <a href="trash.php?trash_id=<?php echo $role['id']; ?>" class="trash">Trash</a>
                      <span class="inline-divider">|</span>
                      <a href="edit.php?id=<?php echo $role['id']; ?>" class="edit">Edit</a>
                    </div>
                  </td>
                  <td>
                     <?php echo count($usersCount); ?>
                  </td>
                  <!-- <td class="center">
                    <a href="assign-permissions.php" title="Assign permission to role" class="edit">Permissions</a>
                  </td> -->
                </tr>
                <?php
                    }
                ?>
              </tbody>
            </table>
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
<script src="../../assets/ckeditor5-build-classic/ckeditor.js"></script>
<script src="../../assets/Javascript/ckeditor-script.js"></script>
<script src="../../assets/Javascript/script.js"></script>

</html>