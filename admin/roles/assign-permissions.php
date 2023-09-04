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
  <title>Admin Dashboard -- Assign Permissions</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <div class="admin-table sm-box">
          <h1 class="center" style="padding: 0; margin: 0">Assign Permissions</h1>
          <hr />

          <div class="selected-role">
            <h3>Author</h3>
            <div class="description">
              The author is able to create, edit, update and deleter their posts.
            </div>
          </div>


          <div class="table-actions">
            <span></span>
            <a href="#" class="btn primary-btn small-btn">
              <i class="fa fa-plus-circle"></i> Add Role
            </a>
          </div>

          <form action="" method="post" class="assign-permissions-form">

            <div class="responsive-table">
              <table>
                <thead>
                  <th class="sm-column">SN</th>
                  <th>Permission</th>
                  <th class="sm-column">
                    <label for="select-all">
                      All
                      <input type="checkbox" name="select-all" id="select-all">
                    </label>
                  </th>

                </thead>

                <tbody>
                  <?php foreach ($permissions as $key => $permission) {
                  ?>
                  <tr>
                    <td><?php echo $key+1 ;?></td>
                    <td>
                    <?php echo $permission['name'] ;?>
                    </td>
                    <td class="center">
                      <input type="checkbox" name="permission" id="permission">
                    </td>

                  </tr>
                  <?php
                  }

                  ?>
                </tbody>

                <tfoot>
                  <tr>
                    <td colspan="3">
                      <button type="submit" class="btn primary-btn long-btn">
                        Save Permissions
                      </button>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- //Page Container -->
</body>

<script>
  const selectAll = document.querySelector('#select-all');
  const assignPermissionForm = document.querySelector('.assign-permissions-form');

  selectAll.addEventListener('change', function () {
    const checkBoxList = assignPermissionForm.querySelectorAll('td input[type=checkbox]');
    checkBoxList.forEach(checkbox => checkbox.checked = selectAll.checked);
  });
</script>

<script src="../../assets/Javascript/aos.js"></script>
<script src="../../assets/Javascript/script.js"></script>

</html>