<?php
    if(empty($_SESSION['id'])){
        header('location: ' . BASE_URL . '/index.php');
        exit();
    }
?>