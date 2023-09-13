<?php
  include 'path.php'; 
  include(ROOT_PATH . "/app/database/controller/roles.php");
$topicID = $_GET['topicID'];
$limit = $_GET['limit'];
$offset = $_GET['offset'];


$findId = selectOne('topics', ['name'=> $topicID]);
$mainTopicId = $findId['id'];
$posts = getPostsByTopicId(1,$mainTopicId,$limit,$offset);

foreach ($posts as $key => $post) {
    // Display your post content here

    echo '
    <article class="post-card flat-card">
        <div class="image-wrapper bg-image" style="background-image: url(../assets/images/postimages/'.$post['image'].');">
        </div>
        <div class="post-info">
            <div class="topic-wrapper">
                <span class="gray-1">'.timeElapsedSinceNow($post['created_at']).'</span>
            </div>
            <div class="">
                <h3 class="post-title">
                    <a href="'.$post['post_slug'].'" class="td-none">';
                    if (strlen($post['title']) < 90) {
                        echo $post['title'];
                    } else {
                        echo substr($post['title'], 0, 90) . '...';
                    }
                    echo '</a>
                    <a href=""></a>
                </h3>
            </div>
            <div class="post-preview">
                <p>';
                echo html_entity_decode(substr($post['body'], 0, 70) . '...');
                echo '</p>
            </div>
            <div class="author-info">
                <div class="author">
    
                    <img src="../assets/images/userimages/'.$post['userImage'].'" class="avatar" alt="author image">
                    <a href="" class="grey-1 td-none link">'.$post['username'].'</a>
                </div>';
                echo '<a href="'.$post['post_slug'].'" class="link" style="color: #205afd">
                    Read More <i class="fa fa-arrow-right readmore-icon"></i>
                </a>';
            echo '
            </div>
        </div>
    </article>';
    }

$conn->close();
?>
