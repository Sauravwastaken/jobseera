<?php 
include_once('_dbconnect.php');

$method = $_SERVER['REQUEST_METHOD'];
if($method == "POST") {
    $user_name = $_POST['user-name'];
    $user_email = $_POST['user-email'];
    $user_password = $_POST['user-password'];


    // Checking if user already exists
    $stmt = $connect->prepare("SELECT * from `users` WHERE `user_email` = ?");
    $stmt->bind_param('s',$user_email);
       
    if(!$stmt->execute()) {
        if(DEBUG_MODE) {
            echo "Error: ".stmt->error;
        } else {
            $error_msg = "Something went wrong. Please try again.";
        }
    }
    $result = $stmt->get_result();
    $count = $result->num_rows;
    if($count < 1) {  
        $provider = 'local';
        $hased_password = password_hash($user_password,PASSWORD_BCRYPT);

        $stmt2 = $connect->prepare("INSERT INTO `users` (user_name,user_email,user_password,user_provider) VALUES (?,?,?,?)");
        $stmt2->bind_param('ssss', $user_name,$user_email,$hased_password,$provider);

        if(!$stmt2) {
            echo "error";
        }
            

        if($stmt2->execute()) {

         
            $user_id = $stmt2->insert_id;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['loggedIn'] = true;

            header('location: ../index.php');
            exit();
            
         
        } else {
            echo $stmt2->error;
        }
    } else {        
        $row = $result->fetch_assoc();
        if($row['user_provider'] == 'google' && $row['user_password'] == NULL) {
            $error_msg = "An account with this email address alrady exists. Please use google to sign in";
                         
        } else if ($row['user_google_linked']) {
            $error_msg = "An account with this email address alrady exists. Please log in with password or google";  
        } 
        
        else {
            $error_msg = "An account with this email address alrady exists. Please log in with password";  
        }
    }  
    header('location: ../signup.php?error_msg='.$error_msg.'&user_name='.$user_name.'&user_email='.$user_email);
}
?>