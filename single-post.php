<?php
  include 'path.php'; 
  include(ROOT_PATH . "/app/database/controller/posts.php");

  if(isset($_GET['p_id'])){
      $post = selectOne('posts', ['id'=> $_GET['p_id']]);
  }

  $posts = selectAll('posts', ['published'=> 1]);
  $topics =  selectAll('topics');
  $user =  selectOne('users', ['id' => $post['user_id']]);
  $top_posts =  selectOne('topics', ['id' => $post['topic_id']]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Carousel Style -->
  <link type="text/css" rel="stylesheet" href="assets/css/public.css" />
  <link type="text/css" rel="stylesheet" href="assets/css/style.css" />

  <link type="text/css" rel="stylesheet" href="assets/css/animate.css" />
  <link type="text/css" rel="stylesheet" href="assets/css/public.css" />
  <link type="text/css" rel="stylesheet" href="assets/css/aos.css" />
  <link type="text/css" rel="stylesheet" href="assets/awesome-font/css/font-awesome.min.css" />

  <script src="assets/Javascript/jquery.min.js"></script>
  <script src="assets/Javascript/jquery-library.js"></script>
  <script src="assets/slick/slick.min.js"></script>
  <link type="text/css" rel="stylesheet" href="assets/slick/slick.css" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog</title>
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
            <img src="assets/images/developer.jpg" alt="" />
            <div class="name-wrapper">
              <a href="user-posts.php" class="link td-none"><?php echo $user['username']; ?></a>
              <small class="grey-1"><?php echo date('F j, Y', strtotime($post['created_at'])); ?> &middot; <?php echo timeElapsedSinceNow( $post['created_at'] ) ; ?></small>
            </div>
          </div>
          <div class="social-links">
            <span>Share</span>
            <a href="<?php echo $user['instagram']; ?>" target="_blank" class="td-none">
              <img src="assets/images/20230808_041244.png" alt="Instagram" />
            </a>
            <a href="<?php echo $user['facebook']; ?>" target="_blank" class="td-none">
              <img src="assets/images/facebookicon.png" alt="Facebook" />
            </a>
            <a href="<?php echo $user['twitter']; ?>" target="_blank" class="td-none">
              <img src="assets/images/20230808_041537.png" alt="Twitter" />
            </a>
          </div>
        </div>
      </div>
      <div class="right-box animated fadeInRight">
        <div class="bg-image featured-image-wrapper" style="
              background-image: url(assets/images/postimages/<?php echo $post['image']; ?>);
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
      <div class="author-bio" data-aos="zoom-in" data-aos-duration="500">
        <div class="avatar-wrapper">
          <img src="assets/images/body-background5.jpg" class="avatar" alt="Author Image" />
        </div>
        <div class="bio-wrapper">
          <a href="#" class="link author-name td-none">
            <h3>Omisanya Boluwaduro</h3>
          </a>
          <div class="primary-font">Content Creator</div>
          <div class="social-links">
            <a href="<?php echo $user['instagram']; ?>" target="_blank" class="td-none">
              <img src="assets/images/20230808_041244.png" alt="Instagram" />
            </a>
            <a href="<?php echo $user['facebook']; ?>" target="_blank" class="td-none">
              <img src="assets/images/facebookicon.png" alt="Facebook" />
            </a>
            <a href="<?php echo $user['twitter']; ?>" target="_blank" class="td-none">
              <img src="assets/images/20230808_041537.png" alt="Twitter" />
            </a>
          </div>
        </div>
      </div>
      <!-- Auhor Bio Ends -->

      <!-- Suggested Posts -->
      <!-- Start of Carosuel -->
      <section class="page-section carousel-container" data-aos="fade-up" data-aos-duration="700">
        <div class="carousel-header">
          <h2>You might want to see this</h2>
          <a href="topic_posts.php">See All</a>
        </div>

        <button class="slider-arrow prev-arrow">
          <i class="fa fa-arrow-circle-left"></i>
        </button>

        <button class="slider-arrow next-arrow">
          <i class="fa fa-arrow-circle-right"></i>
        </button>

        <div class="post-slider">
          <article class="post-card">
            <div class="image-wrapper bg-image" style="
                  background-image: url(assets/images/body-background5.jpg);
                "></div>
            <div class="post-info">
              <div class="">
                <h3 class="post-title">
                  <a href="#" class="td-none">
                    One day we will be happy and free
                  </a>
                </h3>
              </div>
              <div class="author-info">
                <div class="author">
                  <img src="assets/images/Scope00.jpg" class="avatar" alt="author image" />
                  <a href="#" class="grey-1 td-none link">Omisanya Boluwaduro</a>
                </div>
              </div>
            </div>
          </article>

          <article class="post-card">
            <div class="image-wrapper bg-image" style="
                  background-image: url(assets/images/body-background5.jpg);
                "></div>
            <div class="post-info">
              <div class="heading">
                <h3 class="post-title">
                  <a href="#" class="td-none">
                    One day we will be happy and free
                  </a>
                </h3>
              </div>
              <div class="author-info">
                <div class="author">
                  <img src="assets/images/body-background5.jpg" class="avatar" alt="author image" />
                  <a href="#" class="grey-1 td-none link">Omisanya Boluwaduro</a>
                </div>
              </div>
            </div>
          </article>

          <article class="post-card">
            <div class="image-wrapper bg-image" style="
                  background-image: url(assets/images/body-background5.jpg);
                "></div>
            <div class="post-info">
              <div class="">
                <h3 class="post-title">
                  <a href="#" class="td-none">
                    One day we will be happy and free
                  </a>
                </h3>
              </div>
              <div class="author-info">
                <div class="author">
                  <img src="assets/images/body-background5.jpg" class="avatar" alt="author image" />
                  <a href="#" class="grey-1 td-none link">Omisanya Boluwaduro</a>
                </div>
              </div>
            </div>
          </article>

          <article class="post-card">
            <div class="image-wrapper bg-image" style="
                  background-image: url(assets/images/body-background5.jpg);
                "></div>
            <div class="post-info">
              <div class="">
                <h3 class="post-title">
                  <a href="#" class="td-none">
                    One day we will be happy and free
                  </a>
                </h3>
              </div>
              <div class="author-info">
                <div class="author">
                  <img src="assets/images/body-background5.jpg" class="avatar" alt="author image" />
                  <a href="#" class="grey-1 td-none link">Omisanya Boluwaduro</a>
                </div>
              </div>
            </div>
          </article>
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
        ?>
          <a href="topic_posts.php?t_id=<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></a>
        <?php
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

  <script src="assets/Javascript/script.js"></script>

  <script src="assets/Javascript/aos.js"></script>
  <script>
    AOS.init({
      easing: "ease-in-out-sine",
    });
  </script>
</body>

</html>