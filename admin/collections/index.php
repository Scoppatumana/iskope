<?php 
    include("../../path.php");
    include(ROOT_PATH . '/app/database/connection.php');
    include(ROOT_PATH . '/app/database/controller/collections.php');

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
  <title>Admin -- Manage Post Collections</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <div class="admin-table sm-box">
          <h1 class="center" style="padding: 0; margin: 0">Post Collections</h1>
          <hr />


          <div class="table-actions">
            <a href="trash.php" class="btn warning-btn small-btn">
                <i class="fa fa-trash"></i> Trash
            </a>
            <a href="create.php" class="btn primary-btn small-btn">
              <i class="fa fa-plus-circle"></i> Add Post Collection
            </a>
          </div>
          <p>Tip: Drag and Drop to order items only the first four will feature on the home page</p>
          <div class="responsive-table">
          <?php include(ROOT_PATH . "/app/includes/message.php"); ?>
            <table>
              <thead>
                <th>SN</th>
                <th>Collection Title</th>
                <th># of Posts</th>

              </thead>

              <tbody>
                <?php
                   foreach ($collections as $key => $collection) {
                    // $usersCount = selectAll('users', ['role_id' => $role['id']]);
                    // $numOfUsers = count($usersCount);
                ?>
                  <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td>
                      <?php echo $collection['name']; ?>
                      <div class="td-action-links">
                        <a href="trash.php?trash_id=<?php echo $collection['id']; ?>" class="trash">Delete</a>
                        <span class="inline-divider">|</span>
                        <a href="edit.php?id=<?php echo $collection['id']; ?>" class="edit">Edit</a>
                        <span class="inline-divider">|</span>
                        <a href="collection_posts.php" class="edit">Posts</a>
                      </div>
                    </td>
                    <td>
                      4
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

<script src="../../assets/Javascript/aos.js"></script>
<script src="../../assets/Javascript/script.js"></script>

</html>