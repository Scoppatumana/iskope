<?php

function usersOnly($redirect = '/index.php'){
    if(empty($_SESSION['id'])){
        $_SESSION['message'] = 'You need to Login First';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit();
    }
}



function adminOnly($redirect = '/index.php'){
    if(empty($_SESSION['id']) || $_SESSION['role_id'] !== 1){
        $_SESSION['message'] = 'You are not authorized';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit();
    }
}


function adminAndEditorOnly($redirect = '/index.php'){
    if(empty($_SESSION['id']) || $_SESSION['role_id'] == 3 || $_SESSION['role_id'] == 4){
        $_SESSION['message'] = 'You are not authorized';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit();
    }
}

function allAdminsOnly($redirect = '/index.php'){
    if(empty($_SESSION['id']) || $_SESSION['role_id'] === 4 ){
        $_SESSION['message'] = 'You are not authorized';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit();
    }
}


function guestOnly($redirect = '/index.php'){
    if(isset($_SESSION['id'])){
        header('location: ' . BASE_URL . $redirect);
        exit();
    }
}

?>