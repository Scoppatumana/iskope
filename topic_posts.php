<?php
  include 'path.php'; 
  include(ROOT_PATH . '/app/database/controller/topics.php');


  if(isset($_GET['t'])){
    $topic = selectOne('topics', ['name'=> $_GET['t']]);
    if(empty($topic)){
      header('location: index.php');
    }
}else{
  header('location: index.php');
}
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

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Articles on <?php echo $topic['name']; ?></title>
</head>

<body>
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <!-- Page banner Starts -->
    <section class="page-banner">
        <div class="banner-container">
            <div class="left-box" data-aos="zoom-in" data-aos-duration="700">
                <div class="breadcrumbs" role="navigation">
                    <small>
                        <a href="index.php">Home</a> >
                        <span>
                        <?php echo $topic['name']; ?>
                        </span>
                    </small>
                </div>

                <div class="banner-title">
                <?php echo $topic['name']; ?>
                </div>

                <div class="post-details">
                    <div class="primary-fonts">
                    <?php echo $topic['description']; ?>
                    </div>
                </div>
            </div>
            <div class="right-box" data-aos="fade-up" data-aos-duration="800">
                <div class="bg-image featured-image-wrapper" style="background-image: url(../assets/images/company-employee-presenting-business-strategy-with-charts-monitor-planning-project-workmates-analyzing-financial-statistics-display-working-together-company-development_482257-37174.jpg);">

                </div>
            </div>
        </div>
    </section>

    <!-- Page banner Ends -->


    <!-- Page Container -->
    <div class="page-container default-page-container single-page" data-aos="fade-up" data-aos-duration="900">
        <!-- Main Content -->

       
        <div class="main-content" data-aos="fade-up" data-aos-duration="1500">
        <div class="message warning" id="errorContainer" style="display:none;">
          <i class="fa fa-empty message-icon fa-lg"></i>
          <span> No Posts found  <?php echo $topic['name']; ?> </span>
        </div>
        <div id="postContainer">

        </div>
         
            
              <button class="btn long-btn load-more-btn" id="loadMore" style="margin-bottom: 15px; display:none;">
                Load More
              </button>
          
        </div>
              
        <!-- Main Content Ends -->
        <div class="sidebar" >
            <div class="sidebar-section topic-section">
                <h2 class="title">
                    Topics
                </h2>
                <div class="topic-list">
                <?php

                foreach ($topics as $key => $topic) {
                  echo '<a href="../t/' . $topic['name'] . '">' . $topic['name'] . '</a>';
                }
                ?>
                </div>
            </div>
        </div>

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


    // Load More

        $(document).ready(function () {
    var top = getTopicIDFromURL(); // You'll need to implement this function.
console.log(top);
    var limit = 5; // Number of posts to load at a time
    var offset = 0; // Initial offset

    function loadPosts() {
        $.ajax({
            url: '../fetch_posts.php',
            type: 'GET',
            data: {
                topicID: top,
                limit: limit,
                offset: offset
            },
            success: function (data) {
                if (data.trim() === '') {
                  $("#loadMore").text("That's All");
                  if (offset === 0) {
                    $('#errorContainer').show();
                  }
                } else {
                  $('#postContainer').append(data);
                  offset += limit;
                  $("#loadMore").text("Load More").show();
                  $('#errorContainer').hide();
                }
            }
        });
    }

    if(!$('#errorContainer').is(':visible')){
      loadPosts();
    }

    $('#loadMore').click(function () {

      $("#loadMore").text('Loading...'); 

        loadPosts();
    });
});



function getTopicIDFromURL() {
    var pathArray = window.location.pathname.split('/');
    var topicId = pathArray[pathArray.length - 1];
    return topicId;
}

      </script>
      <!-- <script src="../assets/Javascript/load_more.js"></script> -->
        <script src="../assets/Javascript/script.js"></script>

<script src="../assets/Javascript/aos.js"></script>

<script>
  AOS.init({
    easing: "ease-in-out-sine",
  });
</script>
</body>

</html>