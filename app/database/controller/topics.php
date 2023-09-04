<?php
    include(ROOT_PATH . "/app/database/db.php");
    include(ROOT_PATH . "/app/helpers/validateTopic.php");
    include(ROOT_PATH . "/app/helpers/middleware.php");

    $table = 'topics';
    $id = '';
    $name = '';
    $description = '';
    $errors = array();

    $topics = selectAll($table);
    $topics_trash = selectAll('topic_trash');

    if(isset($_POST['add-topic'])){
        // adminOnly();
        $errors = validateTopic($_POST);
        if (count($errors) === 0) {
            unset($_POST['add-topic']);
            create($table, $_POST);
            $_SESSION['message'] = "Topic Created Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/topics/index.php');
            exit();
        }else{
            $name = $_POST['name'];
            $description = $_POST['description'];
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $topic = selectOne($table, ['id' => $id]);
        $id = $topic['id'];
        $name = $topic['name'];
        $description = $topic['description'];
    }

    if(isset($_POST['update-btn'])){
        // adminOnly();
        $errors = validateTopic($_POST);

        if (count($errors) === 0) {
            $id = $_POST['id'];
            printResult($_POST);
            unset($_POST['update-btn'], $_POST['id']);
            $topic_id = update($table, $_POST, $id);
            $_SESSION['message'] = "Topic Updated Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/topics/index.php');
            exit();
        }else{
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
        }
        
    }

    // if(isset($_GET['del_id'])){
    //     // adminOnly();
    //     $id = $_GET['del_id'];
    //     $count = delete($table, $id);
    //     $_SESSION['message'] = "Topic Deleted Successfully";
    //     $_SESSION['type'] = "success";
    //     header('location: ' . BASE_URL . '/admin/topics/index.php');
    //     exit();
    // }



    if(isset($_GET['trash_id'])){
        // adminOnly();
        $topicId = $_GET['trash_id'];
        $getTopic = selectOne($table, ['id' => $topicId]);
        $topic = create('topic_trash', $getTopic);
        $count = delete($table, $topicId);
        $_SESSION['message'] = "Topic Added To Trash";
        $_SESSION['type'] = "warning";
        header('location: ' . BASE_URL . '/admin/topics/trash.php');
        exit();
    }
    
    
    if(isset($_GET['restore_id'])){
        // adminOnly();
        $topicId = $_GET['restore_id'];
        $getTopic = selectOne('topic_trash', ['id' => $topicId]);
        $topic = create($table, $getTopic);
        $count = delete('topic_trash', $topicId);
        $_SESSION['message'] = "Topic Successfully Restored";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/topics/index.php');
        exit();
    }
    
    if(isset($_GET['delet_id'])){
        // adminOnly();
        $topicId = $_GET['delet_id'];
        $getTopic = selectOne('topic_trash', ['id' => $topicId]);
        $topicname = $getTopic['name'];
        $topicId = $getTopic['id'];
    }
    
    if(isset($_GET['del_id'])){
        // adminOnly();
        $topicId = $_GET['del_id'];
        $getTopic = selectOne('topic_trash', ['id' => $topicId]);
        $count = delete('topic_trash', $topicId);
        $_SESSION['message'] = "Topic Successfully Deleted";
        $_SESSION['type'] = "warning";
        header('location: ' . BASE_URL . '/admin/topics/trash.php');
        exit();
    }

?>