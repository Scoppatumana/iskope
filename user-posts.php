<?php
  include 'path.php'; 
  include(ROOT_PATH . "/app/database/controller/roles.php");


  if(isset($_GET['u-p'])){
    $user = selectOne('users', ['username'=> $_GET['u-p']]);
    if(empty($user)){
      header('location: ../index.php');
    }
}else{
  header('location: ../index.php');
}

// $posts = array();
// $postTitle = '';


// $user =  selectOne('users', ['id' => $_GET['u_id']]);
// // $topic =  selectOne('topics', ['id' => $topicId]);
// $posts = getPostsByUserId($userId);

// if(isset($_GET['u_id'])){
//     $posts = getPostsByUserId($_GET['u_id']);
//     if(!empty($posts)){
//         $postTitle = "Posts Created by '" . $user['username'] . "'";
//     }else{
//         $postTitle = "Your Search for '" . $_GET['name'] . "' yielded " . count($posts) . " result(s)";
//         $posts = getPublishedPosts();
//     }
//   }
//   if(isset($_POST['search-term'])){
//     $posts = searchPosts($_POST['search-term']);
    
//     if(!empty($posts)){
//         $postTitle = "You searched for posts under '" . $_POST['search-term'] . "'";
//     }else{
//         $postTitle = "Your Search for '" . $_POST['search-term'] . "' yielded " . count($posts) . " result(s)";
//         $posts = getPublishedPosts();
//     }
// }else{
//     $posts = getPublishedPosts();
// }

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
    <title>Articles By <?php echo $user['username'] ?></title>
</head>

<body>

<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <!-- Page banner Starts -->
    <section class="page-banner">
        <div class="banner-container">
            <div class="left-box animated zoomIn">
                <img src="../assets/images/userimages/<?php echo $user['image']; ?>" alt="Avatar Image" class="avatar">
                <h1 class="banner-title">
                    <?php echo $user['username'] ?>
                </h1>
                <div class="primary-font">
                    Content Creator   
                </div>
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
    </section>

    <!-- Page banner Ends -->


    <!-- Page Container -->
    <div class="page-container default-page-container single-page">
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
        <div class="sidebar" data-aos="fade-up" data-aos-duration="700">
            <div class="sidebar-section topic-section">
                <h2 class="title">
                    Topics
                </h2>
                <div class="topic-list">
                <?php
                $topics = selectAll('topics');
                foreach ($topics as $key => $topic) {
                ?>
                <a href="topic_posts.php?u_id=<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></a>
                <?php
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
    var user = getTopicIDFromURL(); // You'll need to implement this function.
console.log(user);
    var limit = 5; // Number of posts to load at a time
    var offset = 0; // Initial offset

    function loadPosts() {
        $.ajax({
            url: '../fetch_user_post.php',
            type: 'GET',
            data: {
                userID: user,
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
         <script src="../assets/Javascript/script.js"></script>
         <script src="../assets/Javascript/load_more.js"></script>
<script src="../assets/Javascript/aos.js"></script>

<script>
  AOS.init({
    easing: "ease-in-out-sine",
  });
</script>
</body>

</html>