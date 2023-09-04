<?php
  include 'path.php'; 
  include(ROOT_PATH . "/app/database/controller/topics.php");
    
  $posts = array();
  $postTitle = 'Recent Posts';

  if(isset($_GET['t_id'])){
      $posts = getPostsByTopicId($_GET['t_id']);
      if(!empty($posts)){
          $postTitle = "You searched for posts under '" . $_GET['name'] . "'";
      }else{
          $postTitle = "Your Search for '" . $_GET['name'] . "' yielded " . count($posts) . " result(s)";
          $posts = getPublishedPosts();
      }
  }else if(isset($_POST['search-term'])){
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



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Carousel Style -->
  <link type="text/css" rel="stylesheet" href="assets/css/style.css" />
  <link type="text/css" rel="stylesheet" href="assets/css/public.css" />
  <link type="text/css" rel="stylesheet" href="assets/slick/slick.css" />
  <link type="text/css" rel="stylesheet" href="assets/css/animate.css" />
  <link type="text/css" rel="stylesheet" href="assets/css/aos.css" />

  <link type="text/css" rel="stylesheet" href="assets/awesome-font/css/font-awesome.min.css" />
  <script src="assets/Javascript/jquery.min.js"></script>
  <script src="assets/Javascript/jquery-library.js"></script>
  <script src="assets/slick/slick.min.js"></script>


  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog</title>
</head>

<body>
  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

  <div class="default-page-container">
    <!-- Start of featured post -->
    <article class="post-card flat-card featured-post" data-aos="flip-right" data-aos-duration="1500">
      <div class="image-wrapper bg-image" style="background-image: url(assets/images/body-background5.jpg)"></div>
      <div class="post-info">
        <div class="topic-wrapper">
          <a href="topic_posts.php" class="topic-tag td-none">life lessons</a>
          <span class="gray-1">5 min</span>
        </div>
        <div class="">
          <h3 class="post-title">
            <a href="single-post.php" class="td-none">
              One day we will be happy and free
            </a>
          </h3>
        </div>
        <div class="post-preview">
          <p>
            The Shurah committee was constituted in line with the constitution
            of the society on Sunday 15th May, 2023 at NASFAT Islamic Center,
            Iperu,.
          </p>
        </div>
        <div class="author-info">
          <div class="author">
            <img src="assets/images/body-background5.jpg" class="avatar" alt="author image" />
            <a href="#" class="grey-1 td-none link">Omisanya Boluwaduro</a>
          </div>
          <a href="single-post.php" class="link" style="color: #205afd">
            Read More <i class="fa fa-arrow-right readmore-icon"></i>
          </a>
        </div>
      </div>
    </article>
    <!-- End of featured Post -->











    <!-- Start of Carosuel -->
    <!--  -->
    <section class="page-section carousel-container" data-aos="fade-up" data-aos-duration="1500">
      <div class="carousel-header">
        <h2>Latest</h2>
        <a href="topic_posts.php">See All</a>
      </div>

      <button class="slider-arrow prev-arrow">
        <i class="fa fa-arrow-circle-left"></i>
      </button>

      <button class="slider-arrow next-arrow">
        <i class="fa fa-arrow-circle-right"></i>
      </button>

      <div class="post-slider">
        
        <?php
          foreach ($posts as $key => $post) {
        ?>

        <article class="post-card">
          <div class="image-wrapper bg-image" style="background-image: url(assets/images/postimages/<?php echo $post['image']; ?>)"></div>
          <div class="post-info">
            <div class="topic-wrapper">
              <a href="topic_posts.php" class="topic-tag td-none"><?php echo $post['topicName']; ?></a>
              <span class="gray-1"><?php echo timeElapsedSinceNow( $post['created_at'] ) ; ?></span>
            </div>
            <div class="heading">
              <h3 class="post-title">
                <a href="single-post.php?p_id=<?php echo $post['id']; ?>" class="td-none">
                  <?php 
                    if (strlen($post['title']) < 90) {
                      echo $post['title'];
                    }else{
                      echo substr($post['title'], 0,90) . '...';
                    }
                  ?>
                </a>
              </h3>
            </div>
            <div class="post-preview">
              <p>
              <?php echo html_entity_decode(substr($post['body'], 0,150) . '...'); ?>
              </p>
            </div>
            <div class="author-info">
              <div class="author">
                <img src="assets/images/userimages/<?php echo $post['userImage'];?>" class="avatar" alt="author image" />
                <a href="#" class="grey-1 td-none link"> <?php echo $post['username']; ?></a>
              </div>
              <a href="single-post.php?p_id=<?php echo $post['id']; ?>" class="link" style="color: #205afd">
                Read More <i class="fa fa-arrow-right readmore-icon"></i>
              </a>
            </div>
          </div>
        </article>
        <?php
          }
        ?>

        
      </div>
    </section>
    <!-- End of Carosuel -->











    <!-- Start of Second Carosuel -->
    <!--  -->
    <section class="page-section carousel-container" data-aos="fade-up" data-aos-duration="1500">
      <div class="carousel-header">
        <h2>Politics</h2>
        <a href="topic_posts.php">See All</a>
      </div>

      <button class="slider-arrow prev-arrow">
        <i class="fa fa-arrow-circle-left"></i>
      </button>

      <button class="slider-arrow next-arrow">
        <i class="fa fa-arrow-circle-right"></i>
      </button>

      <div class="post-slider">
        
        <?php
        $politics = getPoliticsNews();
          foreach ($politics as $key => $politic) {
        ?>

        <article class="post-card">
          <div class="image-wrapper bg-image" style="background-image: url(assets/images/postimages/<?php echo $politic['image']; ?>)"></div>
          <div class="post-info">
            <div class="topic-wrapper">
              <a href="topic_posts.php" class="topic-tag td-none"><?php echo $politic['topicName'];  ?></a>
              <span class="gray-1"><?php echo timeElapsedSinceNow( $politic['created_at'] ) ; ?></span>
            </div>
            <div class="heading">
              <h3 class="post-title">
                <a href="single-post.php?p_id=<?php echo $politic['id']; ?>" class="td-none">
                  <?php 
                    if (strlen($politic['title']) < 90) {
                      echo $politic['title'];
                    }else{
                      echo substr($politic['title'], 0,90) . '...';
                    }
                  ?>
                </a>
              </h3>
            </div>
            <div class="post-preview">
              <p>
              <?php echo html_entity_decode(substr($politic['body'], 0,150) . '...'); ?>
              </p>
            </div>
            <div class="author-info">
              <div class="author">
                <img src="assets/images/userimages/<?php echo $politic['userImage'];?>" class="avatar" alt="author image" />
                <a href="#" class="grey-1 td-none link"> <?php echo $politic['username']; ?></a>
              </div>
              <a href="single-post.php?p_id=<?php echo $politic['id']; ?>" class="link" style="color: #205afd">
                Read More <i class="fa fa-arrow-right readmore-icon"></i>
              </a>
            </div>
          </div>
        </article>
        <?php
          }
        ?>

        
      </div>
    </section>
    <!-- End of Second Carosuel -->






    <!-- Start of Third Carosuel -->
    <!--  -->
    <section class="page-section carousel-container" data-aos="fade-up" data-aos-duration="1500">
      <div class="carousel-header">
        <h2>Entertainment</h2>
        <a href="topic_posts.php">See All</a>
      </div>

      <button class="slider-arrow prev-arrow">
        <i class="fa fa-arrow-circle-left"></i>
      </button>

      <button class="slider-arrow next-arrow">
        <i class="fa fa-arrow-circle-right"></i>
      </button>

      <div class="post-slider">
        
        <?php
        $entertainments = getEntertainmentNews();
          foreach ($entertainments as $key => $entertainment) {
        ?>

        <article class="post-card">
          <div class="image-wrapper bg-image" style="background-image: url(assets/images/postimages/<?php echo $entertainment['image']; ?>)"></div>
          <div class="post-info">
            <div class="topic-wrapper">
              <a href="topic_posts.php" class="topic-tag td-none"><?php $entertainment['topicName'];  ?></a>
              <span class="gray-1"><?php echo timeElapsedSinceNow( $entertainment['created_at'] ) ; ?></span>
            </div>
            <div class="heading">
              <h3 class="post-title">
                <a href="single-post.php?p_id=<?php echo $entertainment['id']; ?>" class="td-none">
                  <?php 
                    if (strlen($entertainment['title']) < 90) {
                      echo $entertainment['title'];
                    }else{
                      echo substr($entertainment['title'], 0,90) . '...';
                    }
                  ?>
                </a>
              </h3>
            </div>
            <div class="post-preview">
              <p>
              <?php echo html_entity_decode(substr($entertainment['body'], 0,150) . '...'); ?>
              </p>
            </div>
            <div class="author-info">
              <div class="author">
                <img src="assets/images/userimages/<?php echo $entertainment['userImage'];?>" class="avatar" alt="author image" />
                <a href="#" class="grey-1 td-none link"> <?php echo $entertainment['username']; ?></a>
              </div>
              <a href="single-post.php?p_id=<?php echo $entertainment['id']; ?>" class="link" style="color: #205afd">
                Read More <i class="fa fa-arrow-right readmore-icon"></i>
              </a>
            </div>
          </div>
        </article>
        <?php
          }
        ?>

        
      </div>
    </section>
    <!-- End of Third Carosuel -->





    <!-- Start Fourth of Carosuel -->
    <!--  -->
    <section class="page-section carousel-container" data-aos="fade-up" data-aos-duration="1500">
      <div class="carousel-header">
        <h2>Sports</h2>
        <a href="topic_posts.php">See All</a>
      </div>

      <button class="slider-arrow prev-arrow">
        <i class="fa fa-arrow-circle-left"></i>
      </button>

      <button class="slider-arrow next-arrow">
        <i class="fa fa-arrow-circle-right"></i>
      </button>

      <div class="post-slider">
        
        <?php
        $sports = getSportNews();
          foreach ($sports as $key => $sport) {
        ?>

        <article class="post-card">
          <div class="image-wrapper bg-image" style="background-image: url(assets/images/postimages/<?php echo $sport['image']; ?>)"></div>
          <div class="post-info">
            <div class="topic-wrapper">
              <a href="topic_posts.php" class="topic-tag td-none"><?php echo $sport['topicName']; ?></a>
              <span class="gray-1"><?php echo timeElapsedSinceNow( $sport['created_at'] ) ; ?></span>
            </div>
            <div class="heading">
              <h3 class="post-title">
                <a href="single-post.php?p_id=<?php echo $sport['id']; ?>" class="td-none">
                  <?php 
                    if (strlen($sport['title']) < 90) {
                      echo $sport['title'];
                    }else{
                      echo substr($sport['title'], 0,90) . '...';
                    }
                  ?>
                </a>
              </h3>
            </div>
            <div class="post-preview">
              <p>
              <?php echo html_entity_decode(substr($sport['body'], 0,150) . '...'); ?>
              </p>
            </div>
            <div class="author-info">
              <div class="author">
                <img src="assets/images/userimages/<?php echo $sport['userImage'];?>" class="avatar" alt="author image" />
                <a href="#" class="grey-1 td-none link"> <?php echo $sport['username']; ?></a>
              </div>
              <a href="single-post.php?p_id=<?php echo $sport['id']; ?>" class="link" style="color: #205afd">
                Read More <i class="fa fa-arrow-right readmore-icon"></i>
              </a>
            </div>
          </div>
        </article>
        <?php
          }
        ?>

        
      </div>
    </section>
    <!-- End of Fourth Carosuel -->

    



























    <!-- Topic Section Starts -->
    <section class="page-section topics-container center">
      <h2 data-aos="slide-up" data-aos-duration="1500">
        Explore Articles in Various Topics
      </h2>
      <p>Our articles are organised into topics</p>
      <div class="topics-pills">
        <?php
          $topics = selectAll('topics');
          foreach ($topics as $key => $topic) {
        ?>
          <a href="topic_posts.php?t_id=<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></a>
        <?php
          }
        ?>
      </div>
    </section>
    <!-- Topic Section Starts -->
  </div>
  <!-- //Page Container -->

  <!-- footer starts -->
  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
  <!-- footer ends -->

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
            },
          },

          {
            breakpoint: 550,
            settings: {
              slidesToShow: 1,
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