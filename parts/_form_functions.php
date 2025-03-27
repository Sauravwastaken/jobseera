<?php
    
    function getLinks(array $data) {
        echo "function fired";
        $i = 1;
        while($_POST['link-'.$i]) {
            echo $_POST['link-'.$i];
            echo $i;
            $data["link-".$i] = $_POST['link-'.$i];
            $i++;        
        }
        return json_encode($data);
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
           return json_encode($data);    

    }
?>