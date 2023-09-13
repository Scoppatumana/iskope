<header class="animated index-header fadeInDown">
    <span role="button" class="menu-icon" onClick="_open_menu();">
      <i class="fa fa-bars fa-lg"></i>
    </span>
    <a href="<?php echo BASE_URL ?>/index.php" class="logo-wrapper td-none">
      <div><span>Scope's</span>Corner</div>
    </a>

    <nav>
      <div class="search-item">
        <div class="search-icon">
          <span role="button">
            <i class="fa fa-search"></i>
          </span>
        </div>
        <form action="" method="post" class="header-search-form hide">
          <input type="text" placeholder="Search this website..." class="input-control input-control-in search-input" name="search-term" />
        </form>
      </div>
      <ul class="navmenu">
        <li class="navitem active"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="navitem">
          
        
        
        <?php echo '<a href="'.'politics'.'" class="link" style="color: #205afd">
                Politics
                </a>
                ';
          ?>
      
      </li>



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
        
          <li class="navitem"><a href="<?php echo BASE_URL . '/register.php'  ?>">Register</a></li>
          <li class="navitem"><a href="<?php echo BASE_URL . '/login.php'  ?>">Login</a></li>
        <?php
        } 
        ?>
       
                
      </ul>
    </nav>
  </header>

  <!-- hamburger -->
  <div class="menu-bar-overall-div">
    <div class="side-menu-bar">
      <ul class="navmenu" id="navmenu">
        <li class="navitem"><a href="">All Posts</a></li>
        <li class="navitem"><a href="topic_posts.php?t_id=politics">Politics</a></li>
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
        
          <li class="navitem"><a href="<?php echo BASE_URL . '/register.php'  ?>">Register</a></li>
          <li class="navitem"><a href="<?php echo BASE_URL . '/login.php'  ?>">Login</a></li>
        <?php
        } 
        ?>
       
      </ul>
    </div>
    <span onClick="_close_menu();">
      <i class="fa fa-window-close fa-2x"></i>
    </span>
  </div>

  <script>
    // Searcch Icon Toggle
const mobileBreakpoint = 755;
const searchIcon = document.querySelector(".search-icon");
const headerSearchForm = document.querySelector(".header-search-form");
const searchInput = document.querySelector(".search-input");
const logoWrapper = document.querySelector(".logo-wrapper");

function toggleSearchBar() {
  searchIcon.classList.toggle("hide");
  headerSearchForm.classList.toggle("hide");
  searchInput.focus();
  if (innerWidth <= mobileBreakpoint) {
    logoWrapper.classList.toggle("hide");
  }
}

searchIcon.addEventListener("click", toggleSearchBar);
searchInput.addEventListener("blur", toggleSearchBar);

// Searcch icon toggle


// Acve bn

var btnContainer = document.getElementById("navmenu");
var btns = btnContainer.getElementsByClassName("navitem");

for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    if (current.length > 0) {
      current[0].className.replace("active", "");
    }
    this.className += " active"
  });
  
}


  </script>

  <!-- /hamburger -->