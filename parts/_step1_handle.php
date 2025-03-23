<?php 
$method = $_SERVER['REQUEST_METHOD'];
echo "HI";
if($method == "POST") {
echo "HI";

    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $state = $_POST['location-state'];
    $city = $_POST['location-city'];
    $area = $_POST['location-area'];
    
}
?>