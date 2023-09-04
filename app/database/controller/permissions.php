<?php
    include(ROOT_PATH . "/app/database/db.php");
    include(ROOT_PATH . "/app/helpers/validatePermission.php");
    include(ROOT_PATH . "/app/helpers/middleware.php");

    $table = 'permissions';
    $id = '';
    $name = '';
    $description = '';
    $errors = array();

    $permissions = selectAll($table);
    $permissions_trash = selectAll('permission_trash');

    if(isset($_POST['add-permission'])){
        // adminOnly();
        $errors = validatePermission($_POST);
        if (count($errors) === 0) {
            unset($_POST['add-permission']);
            create($table, $_POST);
            $_SESSION['message'] = "Permission Created Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/permissions/index.php');
            exit();
        }else{
            $name = $_POST['name'];
            $description = $_POST['description'];
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $permission = selectOne($table, ['id' => $id]);
        $id = $permission['id'];
        $name = $permission['name'];
        $description = $permission['description'];
    }

    if(isset($_POST['update-btn'])){
        // adminOnly();
        $errors = validatePermission($_POST);

        if (count($errors) === 0) {
            $id = $_POST['id'];
            printResult($_POST);
            unset($_POST['update-btn'], $_POST['id']);
            $permission_id = update($table, $_POST, $id);
            $_SESSION['message'] = "Permission Updated Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/permissions/index.php');
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
    //     $_SESSION['message'] = "Permission Deleted Successfully";
    //     $_SESSION['type'] = "success";
    //     header('location: ' . BASE_URL . '/admin/permissions/index.php');
    //     exit();
    // }



    if(isset($_GET['trash_id'])){
        // adminOnly();
        $permissionId = $_GET['trash_id'];
        $getPermission = selectOne($table, ['id' => $permissionId]);
        $permission = create('permission_trash', $getPermission);
        $count = delete($table, $permissionId);
        $_SESSION['message'] = "Permission Added To Trash";
        $_SESSION['type'] = "warning";
        header('location: ' . BASE_URL . '/admin/permissions/trash.php');
        exit();
    }
    
    
    if(isset($_GET['restore_id'])){
        // adminOnly();
        $permissionId = $_GET['restore_id'];
        $getPermission = selectOne('permission_trash', ['id' => $permissionId]);
        $permission = create($table, $getPermission);
        $count = delete('permission_trash', $permissionId);
        $_SESSION['message'] = "Permission Successfully Restored";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/permissions/index.php');
        exit();
    }
    
    if(isset($_GET['delet_id'])){
        // adminOnly();
        $permissionId = $_GET['delet_id'];
        $getPermission = selectOne('permission_trash', ['id' => $permissionId]);
        $permissionname = $getPermission['name'];
        $permissionId = $getPermission['id'];
    }
    
    if(isset($_GET['del_id'])){
        // adminOnly();
        $permissionId = $_GET['del_id'];
        $getPermission = selectOne('permission_trash', ['id' => $permissionId]);
        $count = delete('permission_trash', $permissionId);
        $_SESSION['message'] = "Permission Successfully Deleted";
        $_SESSION['type'] = "warning";
        header('location: ' . BASE_URL . '/admin/permissions/trash.php');
        exit();
    }

?>