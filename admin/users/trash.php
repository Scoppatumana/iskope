<?php
    include("../../path.php");  
    include(ROOT_PATH . "/app/database/controller/users.php");
    
    $user = selectOne($table, ['id' => $_SESSION['id']]);
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
  <script src="../../assets/slick/slick.min.js"></script>


  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard -- Post Trash</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <div class="admin-table lg-box">
          <h1 class="center" style="padding: 0; margin: 0">User Trash</h1>
          <hr />

          <div class="table-actions">
            <button class="btn primary-btn small-btn" type="button" onclick="_detect_history();">
              <i class="fa fa-chevron-left"></i> Previous
            </button>

            <a href="#" class="btn primary-btn small-btn">
              <i class="fa fa-setting"></i> Manage Post
            </a>
          </div>

          <div class="responsive-table">
          <?php include(ROOT_PATH . "/app/includes/message.php"); ?>
          <table>
                <thead>
                  <th>SN</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                </thead>

                <tbody>
                  <?php 
                    foreach ($users_trash as $key => $user_trash) {
                    
                  ?>
                  <tr>
                    <td> <?php echo $key+1; ?></td>
                    <td><?php echo $user_trash['username']; ?></td>
                    <td>
                    <?php echo $user['email']; ?>
                      <div class="td-action-links">
                        <a href="trash.php?restore_id=<?php echo $user_trash['id']; ?>" class="trash">Restore</a>
                        <span class="inline-divider">|</span>
                        <a href="confirm-delete.php?delet_id=<?php echo $user_trash['id']; ?>" class="edit">Delete</a>
                      </div>
                    </td>
                    <td>
                    <?php
                      if($user['role_id'] == 1){
                    ?>
                    Admin
                    <?php
                      }elseif ($user['role_id'] == 2) {
                    ?>
                    Editor
                    <?php
                      }elseif ($user['role_id'] == 3) {
                    ?>
                    Author
                    <?php
                      }else{
                    ?>
                    Guest
                    <?php 
                      }
                    ?>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                  
                 
                </tbody>

                <tfoot>
                  <td colspan="6">
                    <div class="pagination-links">
                      <a href="#" class="link active">1</a>
                      <a href="#" class="link">2</a>
                      <a href="#" class="link">3</a>
                      <a href="#" class="link">4</a>
                      <a href="#" class="link">5</a>
                      <a href="#" class="link">6</a>
                      <a href="#" class="link">7</a>
                    </div>
                  </td>
                </tfoot>
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

         // History back
         function _detect_history(){
            window.history.back({id:1}), null, null;
        }
  </script>
</body>

<script src="../../assets/Javascript/aos.js"></script>
<script src="../../assets/Javascript/script.js"></script>

</html>