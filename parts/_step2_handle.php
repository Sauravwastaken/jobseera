<?php 
include_once('_dbconnect.php');
include_once('_form_functions.php');

$method = $_SERVER['REQUEST_METHOD'];
if($method == "POST") {    
 
    if(DEBUG_MODE) {
        echo "<br>Inside Post";
    }
    $school_details_x = [
        'school_name'=>$_POST['x-school-name'],
        'percentage'=>$_POST['x-percentage'],
        'joining_date'=>$_POST['x-joining-date'],
        'passing_date'=>$_POST['x-passing-date'],
    ];
    $school_details_xii = [
        'school_name'=>$_POST['xii-school-name'],
        'percentage'=>$_POST['xii-percentage'],
        'joining_date'=>$_POST['xii-joining-date'],
        'passing_date'=>$_POST['xii-passing-date'],
    ];   
    
    $json_school_details_x = json_encode($school_details_x);
    $json_school_details_xii = json_encode($school_details_xii);
    $json_higher_education_details = getHigherEducationDetails(); 

    // echo $json_higher_education_details;
    // exit();
    
    // User id
    $user_id = $_SESSION['user_id'];

    // Checking if data already exists
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `step2` WHERE step2_user_id = ?";
    $stmt = mysqli_prepare($connect,$sql);
  
    if($stmt) {
        echo "prepared";
        mysqli_stmt_bind_param($stmt,'i',$user_id);
        if(!mysqli_stmt_execute($stmt)) {
            echo "Error in executing query".mysqli_error($connect);
        } else{
            echo "executed";
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result) > 0){
            //   Do noting for now
            header('location: ../form/step3.php');
            exit();
            } else { 
                $sql = "INSERT INTO `step2` (`step2_user_id`, `step2_school_x_details`, `step2_school_xii_details`, `step2_higher_education_details`) VALUES ( ?, ?, ?, ? )";
                $stmt = mysqli_prepare($connect,$sql);
            
                if (!$stmt) {
                    // Handle prepare failure
                    die("Failed to prepare statement: " . mysqli_error($connect));
                } else{
                    echo "prepared";
                }
                
                mysqli_stmt_bind_param($stmt,"isss",$user_id,$json_school_details_x,$json_school_details_xii,$json_higher_education_details);
            
                if(!mysqli_stmt_execute($stmt)) {
                    echo "Error in executin query: ".mysqli_error($connect);
                } else{
                    if(DEBUG_MODE) {
                        echo "Success";
                    } 
                    header('location: ../form/step3.php');
                    exit();
                }
            }        
            
         
  
        }
    } else{
        echo "Could not prepare ";
    }


}


?>