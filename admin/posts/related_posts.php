<?php include("../../path.php");

if(empty($_SESSION['id'])){
  header('location: ' . BASE_URL . '/index.php');
}

$user = selectOne('users', ['id' => $_SESSION['id']]);
$role = selectOne('roles', ['id' => $user['role_id']]);
adminAndEditorOnly(); ?>
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
  <title>Admin Dashboard -- Confirm Delete</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <div class="admin-table lg-box twin-table" style="display: flex; justify-content: space-between">
          <!-- All Posts -->
          <div class="sm-box">
            <h2>All Posts</h2>
            <div class="table-actions">
              <input type="text" name="search-term" id="search-post-input" placeholder="Search..." />
            </div>

            <div class="responsive-table">
              <table>
                <thead>
                  <th class="sm-column">SN</th>
                  <th>Title</th>
                </thead>

                <tbody>
                  <tr class="selected">
                    <td class="sm-column">1</td>
                    <td>This is the first post</td>
                    <td class="sm-column">
                      <span class="hide checkmark-icon">
                        <i class="fa fa-check"></i>
                      </span>
                    </td>
                  </tr>

                  <tr>
                    <td class="sm-column">2</td>
                    <td>This is the second post</td>
                    <td class="sm-column">
                      <span class="hide checkmark-icon">
                        <i class="fa fa-check"></i>
                      </span>
                    </td>
                  </tr>

                  <tr class="selected">
                    <td class="sm-column">3</td>
                    <td>This is the third post</td>
                    <td class="sm-column">
                      <span class="hide checkmark-icon">
                        <i class="fa fa-check"></i>
                      </span>
                    </td>
                  </tr>
                </tbody>

                <tfoot>
                  <td colspan="6">
                    To find more posts, type in the search box above
                  </td>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- //All Posts -->

          <!-- Related Posts -->

          <div class="sm-box">
            <h2>Related Posts</h2>
            <p>Tip: Drag and Drop to order item</p>
            <div class="responsive-table">
              <table>
                <thead>
                  <tr>
                    <th colspan="2">
                      <a href="" target="_blank">
                        This is the title of the article
                      </a>
                    </th>
                  </tr>
                  <tr>
                    <th class="sm-column">SN</th>
                    <th>Title</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td class="sm-column">1</td>
                    <td>This is the first post</td>
                    <td class="sm-column">
                      <span class="hide close-icon">
                        <i class="fa fa-close"></i>
                      </span>
                    </td>
                  </tr>

                  <tr>
                    <td class="sm-column">2</td>
                    <td>This is the second post</td>
                    <td class="sm-column">
                      <span class="hide close-icon">
                        <i class="fa fa-close"></i>
                      </span>
                    </td>
                  </tr>
                </tbody>

                <tfoot>
                  <td colspan="2">
                    <button type="button" class="btn primary-btn long-btn">
                      <i class="fa fa-upload"></i> Save Related Post
                    </button>
                  </td>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- //Related Posts -->
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