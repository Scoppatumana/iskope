<?php 
    include("../../path.php");
    include(ROOT_PATH . '/app/database/connection.php');
    include(ROOT_PATH . '/app/database/controller/users.php');


    // Pagination Codes
// Pagination Code


    
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
    <link
      type="text/css"
      rel="stylesheet"
      href="../../assets/slick/slick.css"
    />
    <link type="text/css" rel="stylesheet" href="../../assets/css/style.css" />
    <link
      type="text/css"
      rel="stylesheet"
      href="../../assets/css/animate.css"
    />
    <link type="text/css" rel="stylesheet" href="../../assets/css/aos.css" />
    <link type="text/css" rel="stylesheet" href="../../assets/css/public.css" />
    <link
      type="text/css"
      rel="stylesheet"
      href="../../assets/awesome-font/css/font-awesome.min.css"
    />
    <script src="../../assets/Javascript/jquery.min.js"></script>
    <script src="../../assets/Javascript/jquery-library.js"></script>
    <script src="../../assets/slick/slick.min.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard -- Manage Users</title>
  </head>

  <body>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Page Container -->
    <div class="page-wrapper">
    <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
      <div class="page-content">
        <div class="admin-container">
          <div class="admin-table lg-box">
            <h1 class="center" style="padding: 0; margin: 0">Users</h1>
            <hr />
            

            <div class="table-actions">
              <div class="table-filter-group">
                <input
                  type="text"
                  name="search-term"
                  id="search-user-input"
                  placeholder="Search..."
                />
                <!-- <select name="filter-users" id="filter-posts">
                  <option value="ALL">---FILTER---</option>
                  <option value="ALL">All</option>
                  <option value="NEWEST">Newest</option>
                  <option value="OLDEST">Oldest</option>
                  <option value="VERIFIED">Verified</option>
                  <option value="UNVERIFIED">Unverified</option>
                  <option value="USER">User</option>
                  <option value="STAFF">Staff</option>
                  <option value="ADMIN">Admin</option>
                  <option value="Author">Author</option>
                  <option value="EDITOR">Editor</option>
                </select> -->
              </div>

              <div class="table-buttons">
              <a href="trash.php" class="btn warning-btn small-btn">
                <i class="fa fa-trash"></i> Trash
              </a>
              
                <a href="create.php" class="btn primary-btn small-btn">
                  <i class="fa fa-plus-circle"></i> Add User
                </a>
              </div>
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
                    foreach ($pageData['result'] as $key => $user) {
                    
                  ?>
                  <tr>
                    <td> <?php echo $key+1; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td>
                    <?php echo $user['email']; ?>
                      <div class="td-action-links">
                        <a href="trash.php?trash_id=<?php echo $user['id']; ?>" class="trash">Trash</a>
                        <span class="inline-divider">|</span>
                        <a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">Edit</a>
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
                    <?php
                    foreach ($pageNumbers as $key => $page) {  
                      if ($page == $currentPage || $page == '...') {
                    ?>
                    
                    <a href="index.php?page=<?php echo $page ?>" class="link disabled"><?php echo $page ?></a>
                    <?php
                      }else{
                    ?>
                    
                    <a href="index.php?page=<?php echo $page ?>" class="link active"><?php echo $page ?></a>
                    <?php
                    }
                     }
                    ?>
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
    </script>
  </body>

  
</html>
