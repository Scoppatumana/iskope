

<header class="animated admin-header fadeInDown" style="position:static;">
        <div class="nav-overlay"></div>
       
        <a href="<?php echo BASE_URL ?>" class="logo-wrapper td-none">
            <div>
                <span>Scope</span>Corner
            </div>
        </a>

        <span role="button" class="menu-icon">
            <i class="fa fa-bars fa-lg"></i>
        </span>

        <nav>
            <ul class="navmenu">
                <?php
                  if(isset($_SESSION['id'])){
                ?>
                <li class="navitem">
                    <a href="#"><i class="fa fa-user-circle"></i> <?php echo $_SESSION['username']; ?> <i class="fa fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li> <a href="<?php echo BASE_URL . '/logout.php' ?>"> <i class="fa fa-sign-out"></i> Logout</a></li>
                        <li> <a href="<?php echo BASE_URL . '/admin/profile.php?id=' . $_SESSION['id']; ?>"><i class="fa fa-user-circle"></i> Profile</a></li>
                        <li> <a href="<?php echo BASE_URL ?>"><i class="fa fa-home"></i> Home</a></li>
                    </ul>
                </li>
                <?php
                  }
                ?>
            </ul>
        </nav>


        

    </header>

    
