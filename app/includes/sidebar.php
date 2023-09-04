<div class="sidebar-overlay"></div>
    <div class="sidebar">
      <div class="sidebar-author-mobile">
        <img src="../../assets/images/Scope00.jpg" class="avatar" alt="" />
        <h3 class="author-name">Omisanya Boluwaduro</h3>
        <a href="" class="logout-link">Logout</a>
      </div>
      <ul class="list-menu">
       <?php
          if($_SESSION['role_id'] === 1){
      ?>
         <li>
          <a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>"><i class="fa fa-dashboard menu-icon"></i> Dashboard
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . '/admin/posts/index.php' ?>"><i class="fa fa-eye menu-icon"> </i>Posts
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . '/admin/topics/index.php' ?>"><i class="fa fa-chevron-right menu-icon"> </i>Topics
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . '/admin/users/index.php' ?>"><i class="fa fa-users menu-icon"> </i>Users
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . '/admin/roles/index.php' ?>"><i class="fa fa-lock menu-icon"> </i>Roles
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <!-- <li>
          <a href="<?php echo BASE_URL . '/admin/permissions/index.php' ?>"><i class="fa fa-key menu-icon"> </i>Permissions
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . '/admin/collections/index.php' ?>"><i class="fa fa-eye menu-icon"> </i>Collections
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li> -->
        <li>
          <a href="<?php echo BASE_URL . '/admin/posts/myposts.php' ?>"><i class="fa fa-dashboard menu-icon"></i> My Posts
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <?php
          }elseif ($_SESSION['role_id'] === 2) {
        ?>

        <li>
          <a href="<?php echo BASE_URL . '/dashboard.php' ?>"><i class="fa fa-dashboard menu-icon"></i> Dashboard
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . '/admin/posts/index.php' ?>"><i class="fa fa-eye menu-icon"> </i>Posts
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . '/admin/topics/index.php' ?>"><i class="fa fa-chevron-right menu-icon"> </i>Topics
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . '/admin/posts/myposts.php' ?>"><i class="fa fa-dashboard menu-icon"></i> My Posts
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <?php
          }elseif ($_SESSION['role_id'] === 3) {
            ?>
    
          <li>
            <a href="<?php echo BASE_URL . '/dashboard.php' ?>"><i class="fa fa-dashboard menu-icon"></i> Dashboard
              <i class="fa fa-chevron-right chevron-forward"></i></a>
          </li>
          <li>
            <a href="<?php echo BASE_URL . '/admin/posts/index.php' ?>"><i class="fa fa-eye menu-icon"> </i>Posts
              <i class="fa fa-chevron-right chevron-forward"></i></a>
          </li>
          <li>
          <a href="<?php echo BASE_URL . '/admin/posts/myposts.php' ?>"><i class="fa fa-dashboard menu-icon"></i> My Posts
            <i class="fa fa-chevron-right chevron-forward"></i></a>
        </li>
        <?php
          }
        ?>
      </ul>
    </div>