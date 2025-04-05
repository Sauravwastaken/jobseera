<?php
include_once('_dbconnect.php');
include_once('_form_functions.php');

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {

    if (DEBUG_MODE) {
        echo "<br>Inside Post";

        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
    }

    // exit();

    $user_id = $_SESSION['user_id'];

    // Checking if data already exists
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `step3` WHERE step3_user_id = ?";
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        echo "<br>prepared";
        mysqli_stmt_bind_param($stmt, 'i', $user_id);
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error in executing query" . mysqli_error($connect);
        } else {
            echo "<br>executed";
            $result = mysqli_stmt_get_result($stmt);
            $resultCount = mysqli_num_rows($result);
            // echo $resultCount;
            if ($resultCount > 0) {
                $i = 1;
                while (isset($_POST["workExperienceSno-$i"])) {
                    $entryType = $_POST["workExperienceEntryType-$i"] ?? '';
                    $startDate = $_POST[$entryType . 'StartDateMonth-' . $i] . '-' . $_POST[$entryType . 'StartDateYear-' . $i] ?? '';
                    $endDate = $_POST[$entryType . 'EndDateMonth-' . $i] . '-' . $_POST[$entryType . 'EndDateYear-' . $i] ?? '';
                    $jobDescription = $_POST[$entryType . "Description-$i"] ?? '';
                    $jobDetails = [
                        $entryType . 'Title' => $_POST[$entryType . "Title-$i"] ?? '',
                        'companyName' => $_POST["companyName-$i"] ?? '',
                        $entryType . 'Location' => $_POST[$entryType . "Location-$i"] ?? '',
                        $entryType . 'Type' => $_POST[$entryType . "Type-$i"] ?? '',
                        $entryType . 'TechUsed' => $_POST[$entryType . "TechUsed-$i"] ?? ''
                    ];
                    $jobDetailsJson = json_encode($jobDetails);
                    $rowId = $_POST['workExperienceRowId-' . $i] ?? NULL;
                    if ($i > $resultCount) {
                        $sql = "INSERT INTO `step3` (`step3_user_id`, `step3_entry_type`, `step3_details`,`step3_start_date`,`step3_end_date`,`step3_description`) VALUES (?, ?, ?, ?, ?, ?)";
                        $stmt = mysqli_prepare($connect, $sql);
                        mysqli_stmt_bind_param(
                            $stmt,
                            "isssss",
                            $user_id,
                            $entryType,
                            $jobDetailsJson,
                            $startDate,
                            $endDate,
                            $jobDescription
                        );

                    } else {
                        $sql = "UPDATE `step3` SET `step3_entry_type` = ?, `step3_details` = ?, `step3_start_date` = ?, `step3_end_date` = ?, `step3_description` = ? WHERE `step3_id` = ?";
                        $stmt = mysqli_prepare($connect, $sql);
                        mysqli_stmt_bind_param(
                            $stmt,
                            "sssssi",
                            $entryType,
                            $jobDetailsJson,
                            $startDate,
                            $endDate,
                            $jobDescription,
                            $rowId,
                        );
                    }

                    if (!mysqli_stmt_execute($stmt)) {
                        echo "Error in executin query: " . mysqli_error($connect);
                    } else {
                        if (DEBUG_MODE) {
                            echo "Success";
                        }


                    }
                    $i++;
                }

                header('location: ../form/step4.php');
                exit();

            } else {
                $i = 1;
                while (isset($_POST["workExperienceSno-$i"])) {
                    // echo $i;
                    // echo $_POST["workExperienceSno-$i"];
                    $entryType = $_POST["workExperienceEntryType-$i"] ?? '';
                    $startDate = $_POST[$entryType . 'StartDateMonth-' . $i] . '-' . $_POST[$entryType . 'StartDateYear-' . $i] ?? '';
                    $endDate = $_POST[$entryType . 'EndDateMonth-' . $i] . '-' . $_POST[$entryType . 'EndDateYear-' . $i] ?? '';
                    $jobDescription = $_POST[$entryType . "Description-$i"] ?? '';
                    $jobDetails = [
                        $entryType . 'Title' => $_POST[$entryType . "Title-$i"] ?? '',
                        'companyName' => $_POST["companyName-$i"] ?? '',
                        $entryType . 'Location' => $_POST[$entryType . "Location-$i"] ?? '',
                        $entryType . 'Type' => $_POST[$entryType . "Type-$i"] ?? '',
                        $entryType . 'TechUsed' => $_POST[$entryType . "TechUsed-$i"] ?? ''
                    ];
                    $jobDetailsJson = json_encode($jobDetails);

                    // echo "<pre>";
                    // var_dump($_POST);
                    // var_dump($jobDetailsJson);
                    // echo "</pre>";
                    // exit();

                    $sql = "INSERT INTO `step3` (`step3_user_id`, `step3_entry_type`, `step3_details`,`step3_start_date`,`step3_end_date`,`step3_description`) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($connect, $sql);
                    if (!$stmt) {
                        // Handle prepare failure
                        die("Failed to prepare statement: " . mysqli_error($connect));
                    } else {
                        echo "prepared";
                    }
                    mysqli_stmt_bind_param(
                        $stmt,
                        "isssss",
                        $user_id,
                        $entryType,
                        $jobDetailsJson,
                        $startDate,
                        $endDate,
                        $jobDescription
                    );
                    if (!mysqli_stmt_execute($stmt)) {
                        echo "Error in executin query: " . mysqli_error($connect);
                    } else {
                        if (DEBUG_MODE) {
                            echo "Success";
                        }

                    }
                    $i++;
                }
                header('location: ../form/step4.php');
                exit();

            }
        }

    } else {
        echo "Could not prepare ";
    }
}
?>