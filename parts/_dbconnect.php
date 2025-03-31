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
        if(DEBUG_MODE) {

            echo "Connected to database";
        }
    }

    session_start();
    if(DEBUG_MODE) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }


    
?>