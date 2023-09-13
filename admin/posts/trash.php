<?php
    include("../../path.php");  
    include(ROOT_PATH . "/app/database/controller/posts.php");
    
    $user = selectOne('users', ['id' => $_SESSION['id']]);
    $role = selectOne('roles', ['id' => $user['role_id']]);

    if(empty($_SESSION['id'])){
      header('location: ' . BASE_URL . '/index.php');
    }
    allAdminsOnly();
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
          <h1 class="center" style="padding: 0; margin: 0">Post Trash</h1>
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
                <th>Author</th>
                <th>Title</th>
                <th>Topic</th>
                <th>Views</th>
                <th>Publish</th>
              </thead>

              <tbody>
              <?php
                foreach ($posts_trash as $key => $post_trash) {
                  $author = selectOne('users', ['id' => $post_trash['user_id']]);
                  $topic = selectOne('topics', ['id' => $post_trash['topic_id']]);
              ?>
                <tr>
                  <td><?php echo $key + 1; ?></td>
                  <td><?php echo $author['username']; ?></td>
                  <td>
                    <a href="#" target="_blank"> <?php echo $post_trash['title']; ?> </a>
                    <div class="td-action-links">
                      <a href="index.php?restore_id=<?php echo $post_trash['id']; ?>" class="trash">Restore</a>
                      <span class="inline-divider">|</span>
                      <a href="confirm-delete.php?delete_id=<?php echo $post_trash['id']; ?>" class="edit">Delete</a>
                    </div>
                  </td>
                  <td><?php echo $topic['name'] ?></td>
                  <td>1,000</td>
                  <?php
                    if ($post['published']) {
                    ?>
                        <td><a style="color: orange;" href="edit.php?published=0&p_id=<?php echo $post_trash['id']; ?>" class="unpublish">Unpublish</a></td>
                    <?php
                        }else{
                    ?>
                        <td><a style="color: blue;" href="edit.php?published=1&p_id=<?php echo $post_trash['id']; ?>" class="publish" >Publish</a></td>
                    <?php
                        }
                    ?>
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

        // History back
        function _detect_history(){
            window.history.back({id:1}), null, null;
        }
  </script>
</body>



</html>