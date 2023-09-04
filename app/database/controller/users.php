<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/app/helpers/middleware.php");

function loginUser($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role_id'] = $user['role_id'];
    $_SESSION['message'] = "You're Logged In";
    $_SESSION['type'] = "success";
    // header('location: ' . BASE_URL . '/index.php');

    if ($_SESSION['role_id'] === 4) {
        header('location: ' . BASE_URL . '/index.php');
    }else{
        header('location: ' . BASE_URL . '/admin/dashboard.php');
    }
    // printResult($_SESSION);
    exit();  
}



$table = 'users';
$errors = array();
$username = '';
$email = '';
$password = '';
$admin = '';
$image ='';
$id='';
$role_id = '';

$bio = '';
$facebook = '';
$twitter = '';
$instagram ='';

$users= selectAll($table);

$users_trash = selectAll('user_trash');



if(isset($_POST["register-btn"])){
    $errors = validateUser($_POST);
    

    if(!empty($_FILES['image']['name'])){
        $imageName = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/userimages/" . $imageName;
            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        }

        if(!isset($_POST['role_id'])){
        $assignRole = selectOne('roles', ['name' => 'Guest']); 
        $_POST['role_id'] = $assignRole['id'];
        }

    if(count($errors) === 0){
        if ($result) {
            unset($_POST['register-btn'], $_POST['create_password']);
            $_POST['image'] = $imageName;

            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            loginUser($user);
        } else{
            unset($_POST['register-btn'], $_POST['create_password'],$_POST['image']);
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            loginUser($user);
        }
        
    }else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $create_password = $_POST['create_password'];
        $password = $_POST['password'];
    }
    }

if(isset($_POST['login-btn'])){
    $errors = validateLogin($_POST);

    if(count($errors) === 0){
        $user = selectOne($table, ['email' => $_POST['email']]);

        if($user && password_verify($_POST['password'], $user['password'])){
            loginUser($user);
        }else{
            array_push($errors, "Wrong Credentials");
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        }
            
        }else{
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
    }
}






// Admin Registration

if(isset($_POST["create-admin"])){
    $errors = validateUser($_POST);
    

    if(!empty($_FILES['image']['name'])){
        $imageName = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/userimages/" . $imageName;

            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        }

        


    if(count($errors) === 0){
        if ($result) {
            unset($_POST['create-admin'], $_POST['create_password']);
            if(empty($_POST['facebook'])){
                unset($_POST['facebook']);
            }
            if(empty($_POST['twitter'])){
                unset($_POST['twitter']);
            }
            if(empty($_POST['instagram'])){
                unset($_POST['instagram']);
            }
            $_POST['image'] = $imageName;
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "Admin User Created Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        } else{
            unset($_POST['create-admin'], $_POST['create_password'],$_POST['image']);
            if(empty($_POST['facebook'])){
                unset($_POST['facebook']);
            }
            if(empty($_POST['twitter'])){
                unset($_POST['twitter']);
            }
            if(empty($_POST['instagram'])){
                unset($_POST['instagram']);
            }
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "Admin User Created Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        }
        
    }else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $create_password = $_POST['create_password'];
        $password = $_POST['password'];
        $bio = $_POST['bio'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $instagram =$_POST['instagram'];
    }
    }



    if (isset($_GET['delete_id'])) {
    // adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "User Deleted Successfully";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
    }




    if (isset($_POST['update-user'])) {
    // adminOnly();
    $errors = validateUpdate($_POST);

    


    if(!empty($_FILES['image']['name'])){
        $imageName = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/userimages/" . $imageName;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    }

    if(count($errors) === 0){
        if ($result) {
            unset($_POST['create-admin'], $_POST['create_password']);
            if(empty($_POST['facebook'])){
                unset($_POST['facebook']);
            }
            if(empty($_POST['twitter'])){
                unset($_POST['twitter']);
            }
            if(empty($_POST['instagram'])){
                unset($_POST['instagram']);
            }

            $id = $_POST['id'];
            $_POST['image'] = $imageName;
            // Remove the previous image from the image folder
            $checkUser = selectOne('users', ['id' => $id]);
            if($checkUser['image'] !== $_POST['image']){
                unlink(ROOT_PATH . "/assets/images/userimages/" . $checkUser['image']);
            }

            unset($_POST['update-user'], $_POST['id']);

            
            $count = update($table, $_POST, $id);
            $_SESSION['message'] = "User Profile Updated Successfully";
            $_SESSION['type'] = "success";

            if($id === $_SESSION['id']){
                header('location: ' . BASE_URL . '/admin/dashboard.php');
                exit();  
            }else{
            
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
            }

        }else{
            unset($_POST['create-admin'], $_POST['create_password'],$_POST['image']);
            if(empty($_POST['facebook'])){
                unset($_POST['facebook']);
            }
            if(empty($_POST['twitter'])){
                unset($_POST['twitter']);
            }
            if(empty($_POST['instagram'])){
                unset($_POST['instagram']);
            }
            
            $id = $_POST['id'];
            unset($_POST['update-user'], $_POST['id']);

            
            $count = update($table, $_POST, $id);
            $_SESSION['message'] = "Admin User Updated Successfully";
            $_SESSION['type'] = "success";
            
            if($id == $_SESSION['id']){
                header('location: ' . BASE_URL . '/admin/dashboard.php');
                exit();  
            }else{
            
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
            }
        }
        
    }else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $create_password = $_POST['create_password'];
        $password = $_POST['password'];
        $bio = $_POST['bio'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $instagram =$_POST['instagram'];
        $role_id = $_POST['role_id'];
    }

    }

    
    if (isset($_GET['id'])) {

    $user = selectOne($table, ['id'=> $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $email = $user['email'];
    $admin = $user['admin'];
    $bio = $user['bio'];
    $facebook = $user['facebook'];
    $twitter = $user['twitter'];
    $instagram =$user['instagram'];
    $image =$user['image'];
    $role_id = $user['role_id'];
    }




    if(isset($_GET['trash_id'])){
    // adminOnly();
    $userId = $_GET['trash_id'];
    $getUser = selectOne($table, ['id' => $userId]);
    $user = create('user_trash', $getUser);
    $count = delete($table, $userId);
    $_SESSION['message'] = "User Added To Trash";
    $_SESSION['type'] = "warning";
    header('location: ' . BASE_URL . '/admin/users/trash.php');
    exit();
}


if(isset($_GET['restore_id'])){
    // adminOnly();
    $userId = $_GET['restore_id'];
    $getUser = selectOne('user_trash', ['id' => $userId]);
    $user = create($table, $getUser);
    $count = delete('user_trash', $userId);
    $_SESSION['message'] = "User Successfully Restored";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}

if(isset($_GET['delet_id'])){
    // adminOnly();
    $userId = $_GET['delet_id'];
    $getUser = selectOne('user_trash', ['id' => $userId]);
    $username = $getUser['username'];
    $userId = $getUser['id'];
}

if(isset($_GET['del_id'])){
    // adminOnly();
    $userId = $_GET['del_id'];
    $getUser = selectOne('user_trash', ['id' => $userId]);
    $image = $getUser['image'];
    unlink(ROOT_PATH . "/assets/images/userimages/" . $image);
    $count = delete('user_trash', $userId);
    $_SESSION['message'] = "User Successfully Deleted";
    $_SESSION['type'] = "warning";
    header('location: ' . BASE_URL . '/admin/users/trash.php');
    exit();
}



?>