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

if(isset($_POST['sendotp'])){
    $errors = validateOtp($_POST);
    $email = $_POST['email'];  // Get the user's email from the form
    if(count($errors) === 0){
        
        $user = selectOne($table, ['email' => $email]);
        if (count($user) < 1) {
            array_push($errors, "User with this email does not exist");
        } else {
            // Step 3: Generate OTP and Send to User's Email
            $otp = rand(100000, 999999); // Generate a 6-digit OTP
            $expiration = date('Y-m-d H:i:s', strtotime('+5 minutes')); // Set OTP expiration time
            
            
             // Send the OTP to the user's email
             include(ROOT_PATH . "/app/database/reset_password_mail/mail.php");
            // Store the OTP and expiration time in the database
            $count = emailUpdate($table, ['otp' => $otp, 'expiration'=> $expiration], $email);
           
            $_SESSION['message'] = "An OTP has been sent to your mail. It expires in 5 minutes";
            $_SESSION['type'] = "warning";
            header('location: password-reset.php?email=' . $email);
            exit();  
        }
    }
}


if(isset($_GET['email'])){
    $user = selectOne($table, ['email'=> $_GET['email']]);
    $id = $user['id'];
}

if(isset($_POST['reset-password'])){
    $errors = validatePasswordReset($_POST);

    if(count($errors) === 0){
        // // Step 4: Verify OTP Page (verify-otp.php)
        // Verify if the entered OTP matches the stored OTP and hasn't expired
        $user = selectOne($table, ['id' => $_POST['id']]);
        if(!empty($user['otp'])){
            if ($_POST['otp'] == $user['otp'] ) {
                unset($_POST['reset-password'], $_POST['otp'], $_POST['conf_password']);
                // OTP is valid, allow the user to reset their password
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                // Update the user's password in the database
                $count = update($table, ['password'=> $_POST['password']], $_POST['id']);
                // Invalidate the OTP
                $delete = update($table, ['otp'=> "", 'expiration'=> ""], $_POST['id']);
                // Redirect the user to a login page
                header('location: login.php?');
                exit();  
            } else {
                array_push($errors, "OTP has either expired or was not sent, request for a new otp");
            }
        }
        
    }

}



// Pagination Codes
// Pagination Code

function pagination($currentPage= 1, $recordsPerPage=5){

    //find the total number of results stored in the database  

    $results = selectAll('users');  

    $number_of_result = count($results);  
    //determine the total number of pages available  
    $numberOfPages = ceil ($number_of_result / $recordsPerPage);  
    //determine which page number visitor is currently on  
    
//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($currentPage-1) * $recordsPerPage;  

//retrieve the selected results from database  
$result = limit('users', $page_first_result, $recordsPerPage);
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