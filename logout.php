<?php
    include("path.php");
    session_start();
    unset($_SESSION['id'], $_SESSION['username'], $_SESSION['admin'], $_SESSION['message'], $_SESSION['type'] );
    session_destroy();
    header('location: ' . BASE_URL . '/index.php');
?>