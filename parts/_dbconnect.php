<?php
    $server = 'localhost';
    $host = 'root';
    $password = "";
    $database = 'jobseera';

    $connect = mysqli_connect($server,$host,$password,$database);

    define('DEBUG_MODE',true);

    if(!$connect) {
        echo "Error: ".mysqli_connect_error();
    } else{
        echo "Connected to database";
    }

    session_start();
    error_reporting(E_ALL);
ini_set('display_errors', 1);

    
?>