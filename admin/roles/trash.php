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
  <title>Manage Roles</title>
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
            <span></span>
            <a href="create.php" class="btn primary-btn small-btn">
              <i class="fa fa-plus-circle"></i> Edit Role
            </a>
          </div>

          <div class="responsive-table">
          <?php include(ROOT_PATH . "/app/includes/message.php"); ?>
            <table>
              <thead>
                <th>SN</th>
                <th>Role</th>
               

              </thead>

              <tbody>
              <?php
                  
                  foreach ($roles_trash as $key => $role_trash) {
                    $usersCount = selectAll('users', ['role_id' => $role_trash['id']]);
              ?>
                <tr>
                  
                  <td><?php echo $key + 1; ?></td>
                  <td>
                  <?php echo $role['name']; ?>
                    <div class="td-action-links">
                    <a href="index.php?restore_id=<?php echo $role_trash['id']; ?>" class="trash">Restore</a>
                      <span class="inline-divider">|</span>
                    <a href="confirm-delete.php?delet_id=<?php echo $role_trash['id']; ?>" class="edit">Delete</a>
                    </div>
                  </td>
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
</body>
<script src="../../assets/ckeditor5-build-classic/ckeditor.js"></script>
  <script src="../../assets/Javascript/ckeditor-script.js"></script>
<script src="../../assets/Javascript/aos.js"></script>
<script src="../../assets/Javascript/script.js"></script>

</html>