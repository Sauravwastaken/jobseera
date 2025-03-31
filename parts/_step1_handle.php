<?php 
include_once('_dbconnect.php');
include_once('_form_functions.php');



$method = $_SERVER['REQUEST_METHOD'];
if($method == "POST") {    
 
    if(DEBUG_MODE) {
        echo "<br>Inside Post";
    }

    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'] ?? NULL;
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $state = $_POST['location-state'];
    $city = $_POST['location-city'];
    $area = $_POST['location-area'];

    // Location
    $location = [
        'state'=>$state,
        'city'=>$city,
        'area'=>$area
    ];

    $json_location = json_encode($location);

    if(DEBUG_MODE) {
        echo $json_location;
    } 

    // Links
    $links = getLinks();
    $json_links = json_encode($links,true);

   
    // User id
    $user_id = $_SESSION['user_id'];

    // Checking if data already exists
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `step1` WHERE step1_user_id = ?";
    $stmt = mysqli_prepare($connect,$sql);
  
    if($stmt) {
        echo "prepared";
        mysqli_stmt_bind_param($stmt,'i',$user_id);
        if(!mysqli_stmt_execute($stmt)) {
            echo "Error in executing query".mysqli_error($connect);
        } else{
            echo "executed";
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
            //   Do noting for now

            updateSchoolDetails($connect,$row,$links,'links','step1');

            header('location: ../form/step2.php');
            exit();
            } else {
 
                $sql = "INSERT INTO `step1` (`step1_user_id`, `first_name`, `last_name`, `phone`, `email`, `location`, `links`) VALUES ( ?, ?, ?, ?, ?, ?, ? )";
                $stmt = mysqli_prepare($connect,$sql);
            
                if (!$stmt) {
                    // Handle prepare failure
                    die("Failed to prepare statement: " . mysqli_error($connect));
                } else{
                    echo "prepared";
                }
                
                mysqli_stmt_bind_param($stmt,"issssss",$user_id,$first_name,$last_name,$phone,$email,$json_location,$json_links);
            
                if(!mysqli_stmt_execute($stmt)) {
                    echo "Error in executin query: ".mysqli_error($connect);
                } else{
                    if(DEBUG_MODE) {
                        echo "Success";
                    } 
                    header('location: ../form/step2.php');
                    exit();
                }
            }        
            
         
  
        }
    } else{
        echo "Could not prepare ";
    }


}


?>