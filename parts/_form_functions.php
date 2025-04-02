<?php
    
    function getLinks() {
        $data = [];
        echo "function fired";
        

        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
        
        $i = 1;
        while(isset($_POST['link-id-sno-'.$i])){
           

            $id =  $_POST['link-id-sno-'.$i];
            echo $id;
            $data["link-id-$id"] = $_POST["link-id-$id"];
            $i++;
            
        }
        // var_dump(json_encode($data));
            // exit();
        return $data;
    }
    function getWorkExperience() {
        $data = [];
        echo "function fired";       

        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        $fields =  [
            "workExperienceSno",
            "jobTitle",
            "companyName",
            "jobLocation",
            "employementType",
            "startDate",
            "endDate",          
            "techUsed",
            "jobDescription",
          ];
        
        
        $i = 1;
        while(isset($_POST['workExperienceSno-'.$i])){
           

            $sno =  $_POST['workExperienceSno-'.$i];
            foreach($fields as $field) {
                if($field == 'startDate' || $field == 'endDate') {
                    $data[$field] = $_POST[$field.'Month-'.$i].'-'.$_POST[$field.'Year-'.$i];
                } 
                else{
                    $data[$field] = $_POST[$field.'-'.$i];
                }
            }
            
            $i++;
            
        }
        // var_dump(json_encode($data));
            // exit();
        return $data;
    }

    function getHigherEducationDetails() {
        $data = [];
        // echo '<pre>';
        //         var_dump($_POST);    
        //         echo '</pre>';
        // echo "<br>education function fired<br>";

        $fields = [
            "courseName",
            "branchName",
            "higherEducationCgpa",
            "higherEducationInstituteName",
            "higherEducationJoiningDate",
            "higherEducationPassingDate",
          ];     
    
        $i = 1;
        while(isset($_POST['qualificationType'.$i])){
            $qualificationType = $_POST['qualificationType'.$i];
            $id = "";
    
            switch ($qualificationType) {
                case 'Undergraduation':
                    $id = 1;
                    break;
                    
                case 'Postgraduation':
                    $id = 2;
                    break;
            
                case 'Doctorate':
                    $id = 3;
                    break;
                        
                case 'Diploma':
                    $id = 4;
                    break;      
                
            
                case 'Professional & Vocational Courses':
                    $id = 5;
                    break;   
                default:
                    echo "<br>error in switch case";
                    break;
            }

            $data[$qualificationType] = [];
            // var_dump($data);
            
            foreach($fields as $field) {
              
                // echo '<pre>';
                // echo $_POST[$field."-".$id];    
                // echo '</pre>';
                $data[$qualificationType][$field] = $_POST[$field."-".$id];
                
    
            }
            $i++;
                   
           }
           return $data;    

    }

    function updateSchoolDetails($connect,$row,$user_details,$class,$step){
      
        echo "<br>User details: ";
        var_dump($row);
        $database_details = json_decode($row[$class],true);
        $user_id = $_SESSION['user_id'];

        if($database_details !== $user_details) {
            $json_user_details = json_encode($user_details);
            
            $sql = "UPDATE `$step` SET $class = ? WHERE ". $step."_user_id = ?";
            $stmt = mysqli_prepare($connect,$sql);
            mysqli_stmt_bind_param($stmt,'si',$json_user_details,$user_id);
            if(!mysqli_stmt_execute($stmt)){
                echo "error";
            } else{
                echo "<br>executed";
            }
            echo "not matched";
        } else{
            echo "matched";
        }        
    }
?>