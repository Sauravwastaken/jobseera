<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $base_url = "http://localhost/jobseera/";
    $server = 'localhost';
    $user = 'root';
    $password = "";
    $database = 'jobseera';
} else {
    $base_url = "http://206.189.129.236/";
    $server = "localhost";
    $user = "root";
    $password = "wP59IT`I9N1F";
    $database = "jobseera";
}


$connect = mysqli_connect($server, $host, $password, $database);

define('DEBUG_MODE', true);

if (!$connect) {
    echo "Error: " . mysqli_connect_error();
}
//  else {
//     if (DEBUG_MODE) {
//         echo "Connected to database";
//     }
// }

session_start();
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}



?>