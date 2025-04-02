<?php
include_once('_dbconnect.php');
include_once('_form_functions.php');

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {

    if (DEBUG_MODE) {
        echo "<br>Inside Post";
    }

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
                    $startDate = $_POST['startDateMonth-' . $i] . '-' . $_POST['startDateYear-' . $i] ?? '';
                    $endDate = $_POST['endDateMonth-' . $i] . '-' . $_POST['endDateYear-' . $i] ?? '';
                    $jobDescription = $_POST["jobDescription-$i"] ?? '';
                    $jobDetails = [
                        'jobTitle' => $_POST["jobTitle-$i"] ?? '',
                        'companyName' => $_POST["companyName-$i"] ?? '',
                        'jobLocation' => $_POST["jobLocation-$i"] ?? '',
                        'employmentType' => $_POST["employmentType-$i"] ?? '',
                        'techUsed' => $_POST["techUsed-$i"] ?? ''
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
                    $startDate = $_POST['startDateMonth-' . $i] . '-' . $_POST['startDateYear-' . $i] ?? '';
                    $endDate = $_POST['endDateMonth-' . $i] . '-' . $_POST['endDateYear-' . $i] ?? '';
                    $jobDescription = $_POST["jobDescription-$i"] ?? '';
                    $jobDetails = [
                        'jobTitle' => $_POST["jobTitle-$i"] ?? '',
                        'companyName' => $_POST["companyName-$i"] ?? '',
                        'jobLocation' => $_POST["jobLocation-$i"] ?? '',
                        'employmentType' => $_POST["employmentType-$i"] ?? '',
                        'techUsed' => $_POST["techUsed-$i"] ?? ''
                    ];
                    $jobDetailsJson = json_encode($jobDetails);

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