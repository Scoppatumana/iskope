<?php 
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
    header("Acces-Contorl-Allow-Origin");/// to call API and clear the error from web-page
    

    // Database Configuration //
    $main_server = "localhost";
    $server_username = "root";
    $server_password = "";
    $dbName = "blog";

    // Create Connection //
    $conn = new MySQLi($main_server, $server_username, $server_password, $dbName);
    if($conn->connect_error){
        die('Database Connection Error' . $conn->connect_error);
    }
?>
