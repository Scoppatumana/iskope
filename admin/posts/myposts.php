<?php
    include("../../path.php");  
    include(ROOT_PATH . "/app/database/controller/posts.php");
    include(ROOT_PATH . "/app/database/controller/myPostPaginationController.php");

    $user = selectOne('users', ['id' => $_SESSION['id']]);
    $role = selectOne('roles', ['id' => $user['role_id']]);
    
    if(empty($_SESSION['id'])){
      header('location: ' . BASE_URL . '/index.php');
    }
    allAdminsOnly();





  
    
  
  if(isset($_POST['search-term'])){
    $posts = searchPosts($_POST['search-term']);
    
    if(!empty($posts)){
        $postTitle = "You searched for posts under '" . $_POST['search-term'] . "'";
    }else{
        $postTitle = "Your Search for '" . $_POST['search-term'] . "' yielded " . count($posts) . " result(s)";
        $posts = selectAll('posts');
    }
}else{
    $posts = $pageData['result'];
}

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
  <title>Manage Posts</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <div class="admin-table lg-box">
          <h1 class="center" style="padding: 0; margin: 0">Posts</h1>
          <hr />
          
          <form action="" method="post" class="featured-post-form">
            <!-- <strong>Featured Post:</strong>
            <span class="title-wrapper">
              <span>This is a Sample Post Title</span>
              <button type="button" class="change-featured-post">
                Change
              </button>
            </span> -->

            <span class="input-wrapper hide">
              <input type="text" name="title" id="" class="input-control-sm" placeholder="Enter Post Title..." />
              <button type="submit" class="btn btn-primary">Update</button>
            </span>
          </form>

          <div class="table-actions">
            <div class="table-filter-group">
              <input type="text" name="search-term" id="search-post-input" placeholder="Search..." />
              <select name="filter-posts" id="filter-posts">
                <option value="ALL">---FILTER---</option>
                <option value="ALL">All</option>
                <option value="OLDEST">Oldest</option>
                <option value="NEWEST">Newest</option>
                <option value="POPULAR">Popular</option>
                <option value="PUBLISHED">Published</option>
                <option value="DRAFTS">Drafts</option>
              </select>
            </div>

            <div class="table-buttons">
              <a href="trash.php" class="btn warning-btn small-btn">
                <i class="fa fa-trash"></i> Trash
              </a>
              <a href="create.php" class="btn primary-btn small-btn">
                <i class="fa fa-plus-circle"></i> Add Post
              </a>
            </div>
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
              </thead>

              <tbody>

              <?php
                foreach ($pageData['result'] as $key => $post) {
                  $author = selectOne('users', ['id' => $post['user_id']]);
                  $topic = selectOne('topics', ['id' => $post['topic_id']]);
              ?>
                <tr>
                  <td><?php echo $key + 1; ?></td>
                  <td><?php echo $author['username']; ?></td>
                  <td>
                    <a href="#" target="_blank"> <?php echo $post['title']; ?> </a>
                    <div class="td-action-links">
                      <a href="trash.php" class="trash">Trash</a>
                      <span class="inline-divider">|</span>
                      <a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">Edit</a>
                    </div>
                  </td>
                  <td><?php echo $topic['name'] ?></td>
                  <td>1,000</td>
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
                    
                    <a href="myposts.php?page=<?php echo $page ?>" class="link disabled"><?php echo $page ?></a>
                    <?php
                      }else{
                    ?>
                    
                    <a href="myposts.php?page=<?php echo $page ?>" class="link active"><?php echo $page ?></a>
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