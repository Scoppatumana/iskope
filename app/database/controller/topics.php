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


    if(isset($_GET['t_id'])){
        $id = $_GET['t_id'];
        $topic = selectOne($table, ['id' => $id]);
        $id = $topic['id'];
        $name = $topic['name'];
        $description = $topic['description'];
    }



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


    // Pagination Code

    function pagination($currentPage= 1, $recordsPerPage=5){

        //find the total number of results stored in the database  
  
        $results = selectAll('posts');  
  
        $number_of_result = count($results);  
        //determine the total number of pages available  
        $numberOfPages = ceil ($number_of_result / $recordsPerPage);  
        //determine which page number visitor is currently on  
        
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($currentPage-1) * $recordsPerPage;  
  
    //retrieve the selected results from database  
    $result = limit('topics', $page_first_result, $recordsPerPage);
    return [
        'result' => $result,
        'numofpages' => $numberOfPages,
        'prevPage' => $currentPage > 1 ? $currentPage - 1 : false,
        'nextPage' => $currentPage + 1 <= $numberOfPages ? $currentPage + 1 : false
    ];
    } 
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $pageData = pagination($currentPage);
    $pageNumbers = getPaginationNumbers($currentPage, $pageData['numofpages']);


    function getPaginationNumbers($currentPage, $totalNumberOfPages) { 
        $current = $currentPage; 
        $last = $totalNumberOfPages; 
        $delta = 2; 
        $left = $current - $delta; 
        $right = $current + $delta + 1; 
        $range = array(); 
        $rangeWithDots = array(); 
        $l = -1; 
        for ($i = 1; $i <= $last; $i++) { 
            if ($i == 1 || $i == $last || $i >= $left && $i < $right) { 
                array_push($range, $i); 
            } 
        } 
        for($i = 0; $i<count($range); $i++) { 
            if ($l != -1) { 
                if ($range[$i] - $l === 2) { 
                    array_push($rangeWithDots, $l + 1); 
                } else if ($range[$i] - $l !== 1) { 
                    array_push($rangeWithDots, '...'); 
                } 
            } 
            array_push($rangeWithDots, $range[$i]); 
            $l = $range[$i]; 
        } 
        return $rangeWithDots; 
    }


  

?>