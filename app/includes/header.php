<header class="animated fadeInDown">
    <span role="button" class="menu-icon" onClick="_open_menu();">
      <i class="fa fa-bars fa-lg"></i>
    </span>
    <a href="index.php" class="logo-wrapper td-none">
      <div><span>Scope</span>Corner</div>
    </a>

    <nav>
      <div class="search-item">
        <div class="search-icon">
          <span role="button">
            <i class="fa fa-search"></i>
          </span>
        </div>
        <form action="" method="post" class="header-search-form hide">
          <input type="text" placeholder="Search this website..." class="input-control input-control-in search-input" />
        </form>
      </div>
      <ul class="navmenu">
        <li class="navitem"><a href="">All Posts</a></li>
        <li class="navitem"><a href="">Politics</a></li>
        <li class="navitem drapdown">
          <a href="#">Best Articles <i class="fa fa-chevron-down"></i></a>
          <ul class="dropdown">
            <li><a href="#">Best of 2022</a></li>
            <li><a href="#">Best of 2021</a></li>
            <li><a href="#">Best of 2020</a></li>
            <li><a href="#">Best of 2019</a></li>
          </ul>
        </li>
        <li class="navitem"><a href="">Life OT</a></li>

        <?php
          if(isset($_SESSION['id'])){
        ?>
             <li class="navitem">
              <a href="#"><i class="fa fa-user-circle"></i> <?php echo $_SESSION['username'] ?> <i class="fa fa-chevron-down"></i></a>
              <ul class="dropdown">
                <?php
                  if($_SESSION['id']){
                ?>
                <li><a href="admin/dashboard.php">Dashboard</a></li>
                <?php
                  }
                ?>
                  <li><a href="<?php echo BASE_URL . '/logout.php' ?>">Logout</a></li>
              </ul>
            </li>
        <?php
        } else{
        ?>
        
          <li class="navitem"><a href="register.php">Register</a></li>
          <li class="navitem"><a href="login.php">Login</a></li>
        <?php
        } 
        ?>
       
                
      </ul>
    </nav>
  </header>

  <!-- hamburger -->
  <div class="menu-bar-overall-div">
    <div class="side-menu-bar">
      <ul class="navmenu">
        <li class="navitem"><a href="">All Posts</a></li>
        <li class="navitem"><a href="">Politics</a></li>
        <li class="navitem">
          <a href="#">Best Articles <i class="fa fa-chevron-down"></i></a>
          <ul class="dropdown">
            <li><a href="#">Best of 2022</a></li>
            <li><a href="#">Best of 2021</a></li>
            <li><a href="#">Best of 2020</a></li>
            <li><a href="#">Best of 2019</a></li>
          </ul>
        </li>
        <li class="navitem"><a href="">Life OT</a></li>
        <li class="navitem"><a href="">Register</a></li>
        <li class="navitem"><a href="">Login</a></li>
        <!-- <li class="navitem">
                    <a href="#"><i class="fa fa-user-circle"></i> Scope Soft <i class="fa fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="">Dashboard</a></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                </li>  -->
      </ul>
    </div>
    <span onClick="_close_menu();">
      <i class="fa fa-window-close fa-2x"></i>
    </span>
  </div>

  <!-- /hamburger -->