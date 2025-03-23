<?php 
include_once('_dbconnect.php');

$method = $_SERVER['REQUEST_METHOD'];
if($method == "POST") {
    $user_email = $_POST['user-email'];
    $user_password = $_POST['user-password'];
    $error_msg;


    // Checking if user already exists
    $stmt = $connect->prepare("SELECT * from `users` WHERE `user_email` = ?");
    $stmt->bind_param('s',$user_email);
       
    if(!$stmt->execute()) {
        if(DEBUG_MODE) {
            echo "Error: ".$stmt->error;
        } else {
            $error_msg = "Something went wrong. Please try again.";
        }
    }
    $result = $stmt->get_result();
    $count = $result->num_rows;
    if($count > 0) {  
        $row = $result->fetch_assoc();

        if(password_verify($user_password,$row['user_password'])) {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['loggedIn'] = true;

            header('location: ../index.php');
            exit();          
         
        } else {
            $error_msg = "Password did not match";

        }               
    } else {        
       
            $error_msg = "We don't have any account with this email address. Please sign up first";
                         
       
    }  
    
    header('location: ../login.php?error_msg='.$error_msg.'&user_email='.$user_email);
}
?>