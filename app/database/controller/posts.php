<?php
    include(ROOT_PATH . "/app/database/db.php");
    include(ROOT_PATH . "/app/helpers/validatePost.php");
    include(ROOT_PATH . "/app/helpers/middleware.php");
    $table = 'posts';
    $id = '';
    $name = '';
    $published = '';
    $errors = array();
    $posts = selectAll($table);
    $posts_trash = selectAll('post_trash');
    $myPosts = selectAll($table, ['user_id' => $_SESSION['id']]);
    $topics = selectAll('topics');
    // printResult($posts);
    $title = '';
    $body = '';
    $topic_id = '';
    $image = '';


    if(isset($_POST['add-post'])){
        // adminOnly();
        // printResult($_FILES['image']['name']);
        $errors = validatePost($_POST);

        if(!empty($_FILES['image']['name'])){
           $imageName = time() . '_' . $_FILES['image']['name'];
           $destination = ROOT_PATH . "/assets/images/postimages/" . $imageName;

            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            if ($result) {
                $_POST['image'] = $imageName;
            } else {
                array_push($errors, "Failed to Upload Image");
            }
        }else{
            array_push($errors, "Image Required");
        }

       
        

        if (count($errors) === 0) {
            unset($_POST['add-post']);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);

            $post = create($table, $_POST);
            printResult($post);
            $_SESSION['message'] = "Post Created Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/posts/myposts.php');
        }else{
            $title = $_POST['title'];
            $body = $_POST['body'];
            $topic_id = $_POST['topic_id'];
            $published = isset($_POST['published']) ? 1 : 0;
            // $image = $_POST['image'];
        }
       


        // $errors = validateTopic($_POST);
        // if (count($errors) === 0) {
        //     unset($_POST['add-topic']);
        //     create($table, $_POST);
        //     $_SESSION['message'] = "Topic Created Successfully";
        //     $_SESSION['type'] = "cess";
        //     header('location: ' . BASE_URL . '/admin/topics/index.php');
        //     exit();
        // }else{
        //     $name = $_POST['name'];
        //     $description = $_POST['description'];
        // }
    }

    if(isset($_GET['id'])){
        
        $post = selectOne($table, ['id' => $_GET['id']]);
        $id = $post['id'];
        $topic_id = $post['topic_id'];
        $title = $post['title'];
        $body = $post['body'];
        $published = $post['published'];
        $image = $post['image'];
    }

    if(isset($_POST['update-btn'])){
        // adminOnly();
        $errors = validatePost($_POST);

        

        if(!empty($_FILES['image']['name'])){
            $imageName = time() . '_' . $_FILES['image']['name'];
            $destination = ROOT_PATH . "/assets/images/postimages/" . $imageName;
            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
         }
         if ($result) {
            $_POST['image'] = $imageName;

            $checkImage = selectOne('posts', ['id' => $id]);
            if($checkImage['image'] !== $_POST['image']){
                unlink(ROOT_PATH . "/assets/images/postimages/" . $checkImage['image']);
            }
         }

        

        if (count($errors) === 0) {
            $id = $_POST['id'];
            unset($_POST['update-btn'], $_POST['id']);
            // $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);
            printResult($_POST);

            $post_id = update($table, $_POST, $id);
            $findAuthor = selectOne($table, ['id' => $id]);
            $_SESSION['message'] = "Post Updated Successfully";
            $_SESSION['type'] = "success";

            if($findAuthor['user_id'] === $_SESSION['id']){
                header('location: ' . BASE_URL . '/admin/posts/myposts.php');
                exit();
            }else{
                header('location: ' . BASE_URL . '/admin/posts/index.php');
            exit();
            }
        }else{
            $title = $_POST['title'];
            $body = $_POST['body'];
            $topic_id = $_POST['topic_id'];
            $published = isset($_POST['published']) ? 1 : 0;
            $id = $_POST['id'];
            $image = $_POST['image'];
        }
        
    }

    if(isset($_GET['p_id']) && isset($_GET['published'])){
        // adminOnly();
        $published = $_GET['published'];
        $p_id = $_GET['p_id'];
        $count = update($table, ['published' => $published], $p_id);
        $_SESSION['message'] = "Post Published State Changed";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    }

    if(isset($_GET['publish'])){
        // adminOnly();
        $id = $_GET['del_id'];
        $count = delete($table, $id);
        $_SESSION['message'] = "Post Deleted Successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    }

    if(isset($_GET['trash_id'])){
        // adminOnly();
        $postId = $_GET['trash_id'];
        $getPost = selectOne($table, ['id' => $postId]);
        $post = create('post_trash', $getPost);
        $count = delete($table, $postId);
        $_SESSION['message'] = "Post Moved To Trash";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/posts/trash.php');
        exit();
    }


    if(isset($_GET['restore_id'])){
        // adminOnly();
        $postId = $_GET['restore_id'];
        $getPost = selectOne('post_trash', ['id' => $postId]);
        $post = create($table, $getPost);
        $count = delete('post_trash', $postId);
        $_SESSION['message'] = "Post Restored Successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    }

    if(isset($_GET['delete_id'])){
        // adminOnly();
        $postId = $_GET['delete_id'];
        $getPost = selectOne('post_trash', ['id' => $postId]);
        $postTitle = $getPost['title'];
        $postId = $getPost['id'];
    }

    if(isset($_GET['del_id'])){
        // adminOnly();
        $postId = $_GET['del_id'];
        $getPost = selectOne('post_trash', ['id' => $postId]);
        $image = $getPost['image'];
        unlink(ROOT_PATH . "/assets/images/postimages/" . $image);
        $count = delete('post_trash', $postId);
        $_SESSION['message'] = "Post Deleted Successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/posts/trash.php');
        exit();
    }



?>