<?php 
include_once('_dbconnect.php');

$method = $_SERVER['REQUEST_METHOD'];
if($method == "POST") {
    $user_name = $_POST['user-name'];
    $user_email = $_POST['user-email'];
    $user_password = $_POST['user-password'];


    // Checking if user already exists
    $sql = "SELECT `user_email` from `users` WHERE `user_email` = '$user_email'";

    $result = mysqli_query($connect,$sql);

    if(!$result) {
        if(DEBUG_MODE) {
            echo "Error: ".mysqli_error($connect);
        } else {
            $error_msg = "Something went wrong. Please try again.";
        }
    }

    $count = mysqli_num_rows($result);
    echo var_dump($count);
    if($count < 1) {  
        $sql = "INSERT INTO `users` (user_name,user_email,user_password) VALUES (?,?,?)";

        $stmt = $connect->prepare($sql);

        if($stmt) {
         $hased_password = password_hash($user_password,PASSWORD_BCRYPT);
         $stmt->bind_param('sss',$user_name,$user_email,$hased_password);

         if(!$stmt->execute()) {
            if(DEBUG_MODE) {
                $error_msg =  $stmt->error;
            } else {
                $error_msg = "Something went wrong. Please try again.";
            }
         } else{
            $user_id = $stmt->insert_id;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['loggedIn'] = true;

            header('location: ../index.php');
            exit();
            
         }
        }
    } else {
        $error_msg = "Email already taken";
    }  
    header('location: ../signup.php?error_msg='.$error_msg.'&user_name='.$user_name.'&user_email='.$user_email);
}
?>