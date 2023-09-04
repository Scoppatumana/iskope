<?php 
    include("../../path.php");
    include(ROOT_PATH . '/app/database/connection.php');
    include(ROOT_PATH . '/app/database/controller/topics.php');
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
  <script src="../../assets/slick/slick.min.js"></script>


  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manage Topics</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <div class="admin-table sm-box">
          <h1 class="center" style="padding: 0; margin: 0">Topics</h1>
          <hr />


          <div class="table-actions">
            
            <a href="trash.php" class="btn warning-btn small-btn">
                <i class="fa fa-trash"></i> Trash
              </a>
            <a href="create.php" class="btn primary-btn small-btn">
              <i class="fa fa-plus-circle"></i> Add Topic
            </a>
          </div>

          <div class="responsive-table">
          <?php include(ROOT_PATH . "/app/includes/message.php"); ?>
            <table>
              <thead>
                <th>SN</th>
                <th>Topic</th>
                <th># of Posts</th>

              </thead>

              <tbody>
                <?php
                  foreach ($topics as $key => $topic) {
                    $postCount = selectAll('posts', ['topic_id' => $topic['id']]);
                ?>
                <tr>
                  <td><?php echo $key + 1; ?></td>
                  <td>
                   <?php echo $topic['name']; ?>
                    <div class="td-action-links">
                      <a href="trash.php?trash_id=<?php echo $topic['id']; ?>" class="trash">Trash</a>
                      <span class="inline-divider">|</span>
                      <a href="edit.php?id=<?php echo $topic['id']; ?>" class="edit">Edit</a>
                    </div>
                  </td>
                  <td>
                  <?php echo count($postCount); ?>
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