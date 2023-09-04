<?php
    include(ROOT_PATH . "/app/database/db.php");
    include(ROOT_PATH . "/app/helpers/validateCollection.php");
    include(ROOT_PATH . "/app/helpers/middleware.php");

    $table = 'collections';
    $id = '';
    $name = '';
    $description = '';
    $errors = array();

    $collections = selectAll($table);
    $collections_trash = selectAll('collection_trash');

    if(isset($_POST['add-collection'])){
        // adminOnly();
        $errors = validateCollection($_POST);
        if (count($errors) === 0) {
            unset($_POST['add-collection']);
            create($table, $_POST);
            $_SESSION['message'] = "Collection Created Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/collections/index.php');
            exit();
        }else{
            $name = $_POST['name'];
            $description = $_POST['description'];
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $collection = selectOne($table, ['id' => $id]);
        $id = $collection['id'];
        $name = $collection['name'];
        $description = $collection['description'];
    }

    if(isset($_POST['update-btn'])){
        // adminOnly();
        $errors = validateCollection($_POST);

        if (count($errors) === 0) {
            $id = $_POST['id'];
            unset($_POST['update-btn'], $_POST['id']);
            $collection_id = update($table, $_POST, $id);
            $_SESSION['message'] = "Collection Updated Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/collections/index.php');
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
    //     $_SESSION['message'] = "Collection Deleted Successfully";
    //     $_SESSION['type'] = "success";
    //     header('location: ' . BASE_URL . '/admin/collections/index.php');
    //     exit();
    // }



    if(isset($_GET['trash_id'])){
        // adminOnly();
        $collectionId = $_GET['trash_id'];
        $getCollection = selectOne($table, ['id' => $collectionId]);
        $collection = create('collection_trash', $getCollection);
        $count = delete($table, $collectionId);
        $_SESSION['message'] = "Collection Added To Trash";
        $_SESSION['type'] = "warning";
        header('location: ' . BASE_URL . '/admin/collections/trash.php');
        exit();
    }
    
    
    if(isset($_GET['restore_id'])){
        // adminOnly();
        $collectionId = $_GET['restore_id'];
        $getCollection = selectOne('collection_trash', ['id' => $collectionId]);
        $collection = create($table, $getCollection);
        $count = delete('collection_trash', $collectionId);
        $_SESSION['message'] = "Collection Successfully Restored";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/collections/index.php');
        exit();
    }
    
    if(isset($_GET['delet_id'])){
        // adminOnly();
        $collectionId = $_GET['delet_id'];
        $getCollection = selectOne('collection_trash', ['id' => $collectionId]);
        $collectionname = $getCollection['name'];
        $collectionId = $getCollection['id'];
    }
    
    if(isset($_GET['del_id'])){
        // adminOnly();
        $collectionId = $_GET['del_id'];
        $getCollection = selectOne('collection_trash', ['id' => $collectionId]);
        $count = delete('collection_trash', $collectionId);
        $_SESSION['message'] = "Collection Successfully Deleted";
        $_SESSION['type'] = "warning";
        header('location: ' . BASE_URL . '/admin/collections/trash.php');
        exit();
    }

?>