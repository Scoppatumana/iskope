<?php
    include(ROOT_PATH . "/app/database/db.php");
    include(ROOT_PATH . "/app/helpers/validateRole.php");
    include(ROOT_PATH . "/app/helpers/middleware.php");

    $table = 'roles';
    $id = '';
    $name = '';
    $description = '';
    $errors = array();

    $roles = selectAll($table);
    $permissions = selectAll('permissions');
    $roles_trash = selectAll('role_trash');

    if(isset($_POST['add-role'])){
        // adminOnly();
        $errors = validateRole($_POST);
        if (count($errors) === 0) {
            unset($_POST['add-role']);
            create($table, $_POST);
            $_SESSION['message'] = "Role Created Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/roles/index.php');
            exit();
        }else{
            $name = $_POST['name'];
            $description = $_POST['description'];
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $role = selectOne($table, ['id' => $id]);
        $id = $role['id'];
        $name = $role['name'];
        $description = $role['description'];
    }

    if(isset($_POST['update-btn'])){
        // adminOnly();
        $errors = validateRole($_POST);

        if (count($errors) === 0) {
            $id = $_POST['id'];
            printResult($_POST);
            unset($_POST['update-btn'], $_POST['id']);
            $role_id = update($table, $_POST, $id);
            $_SESSION['message'] = "Role Updated Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/roles/index.php');
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
    //     $_SESSION['message'] = "Role Deleted Successfully";
    //     $_SESSION['type'] = "success";
    //     header('location: ' . BASE_URL . '/admin/roles/index.php');
    //     exit();
    // }




    if(isset($_GET['trash_id'])){
        // adminOnly();
        $roleId = $_GET['trash_id'];
        $getRole = selectOne($table, ['id' => $roleId]);
        $role = create('role_trash', $getRole);
        $count = delete($table, $roleId);
        $_SESSION['message'] = "Role Added To Trash";
        $_SESSION['type'] = "warning";
        header('location: ' . BASE_URL . '/admin/roles/trash.php');
        exit();
    }
    
    
    if(isset($_GET['restore_id'])){
        // adminOnly();
        $roleId = $_GET['restore_id'];
        $getRole = selectOne('role_trash', ['id' => $roleId]);
        $role = create($table, $getRole);
        $count = delete('role_trash', $roleId);
        $_SESSION['message'] = "Role Successfully Restored";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/roles/index.php');
        exit();
    }
    
    if(isset($_GET['delet_id'])){
        // adminOnly();
        $roleId = $_GET['delet_id'];
        $getRole = selectOne('role_trash', ['id' => $roleId]);
        $rolename = $getRole['name'];
        $roleId = $getRole['id'];
    }
    
    if(isset($_GET['del_id'])){
        // adminOnly();
        $roleId = $_GET['del_id'];
        $getRole = selectOne('role_trash', ['id' => $roleId]);
        $count = delete('role_trash', $roleId);
        $_SESSION['message'] = "Role Successfully Deleted";
        $_SESSION['type'] = "warning";
        header('location: ' . BASE_URL . '/admin/roles/trash.php');
        exit();
    }


?>