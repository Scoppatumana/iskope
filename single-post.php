<?php
  include 'path.php'; 
  include(ROOT_PATH . "/app/database/controller/posts.php");

  if(isset($_GET['p'])){
      $post = selectOne('posts', ['post_slug'=> $_GET['p']]);
      if(empty($post)){
        header('location: index.php');
      }
  }else{
    header('location: index.php');
  }




  $posts = array();
  $postTitle = 'You might want to see this';

  

  if(isset($_POST['search-term'])){
      $posts = searchPosts($_POST['search-term']);
      
      if(!empty($posts)){
          $postTitle = "You searched for posts under '" . $_POST['search-term'] . "'";
      }else{
          $postTitle = "Your Search for '" . $_POST['search-term'] . "' yielded " . count($posts) . " result(s)";
          $posts = getPublishedPosts();
      }
  }else{
      $posts = getPublishedPosts();
  }














  $baseUrl ="http://localhost/scopeecorner/";

  $posts = selectAll('posts', ['published'=> 1]);
  $topics =  selectAll('topics');
  $user =  selectOne('users', ['id' => $post['user_id']]);
  $top_posts =  selectOne('topics', ['id' => $post['topic_id']]);
  $randomPosts = selectRandom('posts', $top_posts['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Carousel Style -->
  <link type="text/css" rel="stylesheet" href="../assets/css/public.css" />
  <link type="text/css" rel="stylesheet" href="../assets/css/style.css" />

  <link type="text/css" rel="stylesheet" href="../assets/css/animate.css" />
  <link type="text/css" rel="stylesheet" href="../assets/css/public.css" />
  <link type="text/css" rel="stylesheet" href="../assets/css/aos.css" />
  <link type="text/css" rel="stylesheet" href="../assets/awesome-font/css/font-awesome.min.css" />

  <script src="../assets/Javascript/jquery.min.js"></script>
  <!-- <script src="../assets/Javascript/jquery-library.js"></script> -->
  <script src="../assets/slick/slick.min.js"></script>
  <link type="text/css" rel="stylesheet" href="../assets/slick/slick.css" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Post--- <?php echo $post['post_slug']; ?> </title>
</head>

<body>
  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
  <!-- Page banner Starts -->
  <section class="page-banner">
    <div class="banner-container">
      <div class="left-box animated zoomIn">
        <div class="breadcrumbs" role="navigation">
          <small>
            <a href="index.php">Home</a> >
            <span> <a href="topic_posts.php?tp_id=<?php echo $top_posts['id']; ?>"><?php echo $top_posts['name']; ?></a> > </span>
            <span>  <?php echo $post['title']; ?>  </span>
          </small>
        </div>

        <div class="banner-title">    <?php echo $post['title']; ?> </div>

        <div class="post-details">
          <div class="author-wrapper">
            <img src="../assets/images/developer.jpg" alt="" />
            <div class="name-wrapper">
              <a href="user-posts.php" class="link td-none"><?php echo $user['username']; ?></a>
              <small class="grey-1"><?php echo date('F j, Y', strtotime($post['created_at'])); ?> &middot; <?php echo timeElapsedSinceNow( $post['created_at'] ) ; ?></small>
            </div>
          </div>
          <div class="social-links">
            <span>Share</span>
            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $baseUrl . $post['post_slug']; ?>" target="_blank" class="td-none">
              <img src="../assets/images/20230808_041244.png" alt="Instagram" />
            </a>
            <a href="http://www.facebook.com/sharer.php?u=<?php echo $baseUrl . $post['post_slug']; ?>" target="_blank" class="td-none">
              <img src="../assets/images/facebookicon.png" alt="Facebook" />
            </a>
            <a href="http://twitter.com/share?text=Visit the link &url=<?php echo $baseUrl . $post['post_slug']; ?>&hashtags=blog,technosmarter,programming,tutorials,codes,examples,language,development" target="_blank" class="td-none">
              <img src="../assets/images/20230808_041537.png" alt="Twitter" />
            </a>
          </div>
        </div>
      </div>
      <div class="right-box" data-aos="flip-right" data-aos-duration="800">
        <div class="bg-image featured-image-wrapper" style="
              background-image: url(../assets/images/postimages/<?php echo $post['image']; ?>);
            "></div>
      </div>
    </div>
  </section>

  <!-- Page banner Ends -->

  <!-- Page Container -->
  <div class="page-container default-page-container single-page">
    <!-- Main Content -->
    <div class="main-content">
      <div class="primary-font" data-aos="fade-up" data-aos-duration="500">
        <p>
          <?php echo html_entity_decode($post['body']); ?> 
        </p>
      </div>

      <!-- Author Bio -->
      <div class="author-bio" data-aos="fade-down" data-aos-duration="800">
        <div class="avatar-wrapper">
          <img src="../assets/images/userimages/<?php echo $user['image']; ?>" class="avatar" alt="Author Image" />
        </div>
        <div class="bio-wrapper">
          <a href="user-posts.php?u_id=<?php echo $user['id']; ?>" class="link author-name td-none">
            <h3><?php echo $user['username']; ?></h3>
          </a>
          <div class="primary-font">Content Creator</div>
          <div class="social-links">
            <a href="<?php echo $user['instagram']; ?>" target="_blank" class="td-none">
              <img src="../assets/images/20230808_041244.png" alt="Instagram" />
            </a>
            <a href="<?php echo $user['facebook']; ?>" target="_blank" class="td-none">
              <img src="../assets/images/facebookicon.png" alt="Facebook" />
            </a>
            <a href="<?php echo $user['twitter']; ?>" target="_blank" class="td-none">
              <img src="../assets/images/20230808_041537.png" alt="Twitter" />
            </a>
          </div>
        </div>
      </div>
      <!-- Auhor Bio Ends -->

      <!-- Suggested Posts -->
      <!-- Start of Carosuel -->
      <section class="page-section carousel-container" data-aos="fade-up" data-aos-duration="700">
        <div class="carousel-header">
          <h2><?php echo $postTitle ?></h2>
          <a href="topic_posts.php?tp_id=<?php echo $top_posts['id']; ?>">See More</a>
        </div>

        <button class="slider-arrow prev-arrow">
          <i class="fa fa-arrow-circle-left"></i>
        </button>

        <button class="slider-arrow next-arrow">
          <i class="fa fa-arrow-circle-right"></i>
        </button>

        <div class="post-slider">
          <?php
 
            foreach ($randomPosts as $key => $randomPost) {
              $author = selectOne('users', ['id'=> $randomPost['user_id']]);
          ?>
            <article class="post-card">
            <div class="image-wrapper bg-image" style="background-image: url(../assets/images/postimages/<?php echo $randomPost['image']; ?>);"></div>
            <div class="post-info">
              <div class="">
                <h3 class="post-title">
                <?php echo '<a href="'.$randomPost['post_slug'].'" class="td-none">';
                    if (strlen($randomPost['title']) < 50) {
                      echo $randomPost['title'];
                    }else{
                      echo substr($randomPost['title'], 0,50) . '...';
                    }

                  '</a>';
                ?>
             <a href=""></a>
                </h3>
              </div>
              <div class="author-info">
                <div class="author">
                  <img src="../assets/images/userimages/<?php echo $author['image']; ?>" class="avatar" alt="author image" />
                  <a href="user-posts.php?u_id=<?php echo $randomPost['user_id']; ?>" class="grey-1 td-none link"> <?php echo $author['username']; ?></a>
                </div>
              </div>
            </div>
          </article>

          <?php
            }
          ?>
          
        </div>
      </section>
      <!-- End of Carosuel -->

      <!-- Suggested Posts ends -->
    </div>
    <!-- Main Content Ends -->
    <div class="sidebar" data-aos="fade-up" data-aos-duration="700">
      <div class="sidebar-section topic-section">
        <h2 class="title">Topics</h2>
        <div class="topic-list">
       
          <?php
          $topics = selectAll('topics');
          foreach ($topics as $key => $topic) {
              echo '<a href="../t/' . $topic['name'] . '">' . $topic['name'] . '</a>';
          }
          ?>

        </div>
      </div>
    </div>

  </div>
  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
  <!-- //Page Container -->

  <script>
    $(".post-slider").each(function (index, slider) {
      $(slider).slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        infinite: false,
        autoPlaySpeed: 2000,
        nextArrow: $(slider).siblings(".next-arrow"),
        prevArrow: $(slider).siblings(".prev-arrow"),
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 3,
            },
          },

          {
            breakpoint: 550,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
    });


        // Dropdown Script
        const dropdowns = document.querySelectorAll('.navitem .dropdown');

        dropdowns.forEach(dropdown => {
          const navItem = dropdown.closest('.navitem');
          navItem.addEventListener('click', function () {
            navItem.classList.toggle('active');
          });
        });
  </script>

  <script src="../assets/Javascript/script.js"></script>

  <script src="../assets/Javascript/aos.js"></script>
  <script>
    AOS.init({
      easing: "ease-in-out-sine",
    });
  </script>
</body>

</html>