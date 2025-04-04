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
    $sql = "SELECT * FROM `step4_abilities` WHERE step4_user_id = ? UNION SELECT * FROM `step4_achievements` WHERE step4_user_id = ?";
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        echo "<br>prepared";
        mysqli_stmt_bind_param($stmt, 'ii', $user_id, $user_id);
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error in executing query" . mysqli_error($connect);
        } else {
            echo "<br>executed";
            $result = mysqli_stmt_get_result($stmt);
            $resultCount = mysqli_num_rows($result);
            // echo $resultCount;
            if ($resultCount > 0) {
                $i = 1;
                while (isset($_POST["cvSummaryEntryType-$i"])) {
                    $entryType = $_POST["cvSummaryEntryType-$i"] ?? '';
                    echo $entryType;
                    if ($entryType == "skill" || $entryType == "lang") {

                        $name = $_POST[$entryType . "Name-" . $i];

                        $level = $_POST[$entryType . "Level-" . $i];
                        $rowId = $_POST['cvSummaryRowId-' . $i] ?? NULL;

                        if ($i > $resultCount) {
                            $sql = "INSERT INTO `step4_abilities` (`step4_user_id`, `step4_entry_type`, `step4_name`,`step4_level`) VALUES (?, ?, ?, ?)";
                            $stmt = mysqli_prepare($connect, $sql);
                            if (!$stmt) {
                                // Handle prepare failure
                                die("Failed to prepare statement: " . mysqli_error($connect));
                            } else {
                                echo "prepared";
                            }
                            mysqli_stmt_bind_param(
                                $stmt,
                                "isss",
                                $user_id,
                                $entryType,
                                $name,
                                $level,

                            );
                        } else {
                            // echo "updaitng";
                            // echo $name;
                            $sql = "UPDATE `step4_abilities` SET `step4_user_id` = ?, `step4_entry_type` = ?, `step4_name` = ?,`step4_level` = ? WHERE `step4_id` = ?";
                            $stmt = mysqli_prepare($connect, $sql);
                            if (!$stmt) {
                                // Handle prepare failure
                                die("Failed to prepare statement: " . mysqli_error($connect));
                            } else {
                                echo "prepared";
                            }
                            mysqli_stmt_bind_param(
                                $stmt,
                                "isssi",
                                $user_id,
                                $entryType,
                                $name,
                                $level,
                                $rowId
                            );
                        }



                        if (!mysqli_stmt_execute($stmt)) {
                            echo "Error in executin query: " . mysqli_error($connect);
                        } else {
                            if (DEBUG_MODE) {
                                echo "Success";
                            }

                        }
                    } else if ($entryType == "accomplish" || $entryType == "certificate") {

                        echo $entryType;
                        $name = $_POST[$entryType . "Name-" . $i];
                        $provider = $_POST[$entryType . "Provider-" . $i];
                        $month = $_POST[$entryType . "Month-" . $i];
                        $year = $_POST[$entryType . "Year-" . $i];
                        $date = $month . '-' . $year ?? '';
                        $desc = $_POST[$entryType . "Desc-" . $i];

                        $details = [
                            "name" => $name,
                            "provider" => $provider,
                            "description" => $desc
                        ];

                        $details = json_encode($details);
                        $rowId = $_POST['cvSummaryRowId-' . $i] ?? NULL;

                        if ($i > $resultCount) {
                            $sql = "INSERT INTO `step4_achievements` (`step4_user_id`, `step4_entry_type`, `step4_details`,`step4_date`) VALUES (?, ?, ?, ?)";
                            $stmt = mysqli_prepare($connect, $sql);
                            if (!$stmt) {
                                // Handle prepare failure
                                die("Failed to prepare statement: " . mysqli_error($connect));
                            } else {
                                echo "prepared";
                            }
                            mysqli_stmt_bind_param(
                                $stmt,
                                "isss",
                                $user_id,
                                $entryType,
                                $details,
                                $date,

                            );
                        } else {
                            // echo "updaitng";
                            // echo $name;
                            $sql = "UPDATE `step4_achievements` SET `step4_user_id` = ?, `step4_entry_type` = ?, `step4_details` = ?,`step4_date` = ? WHERE `step4_id` = ?";
                            $stmt = mysqli_prepare($connect, $sql);
                            if (!$stmt) {
                                // Handle prepare failure
                                die("Failed to prepare statement: " . mysqli_error($connect));
                            } else {
                                echo "prepared";
                            }
                            mysqli_stmt_bind_param(
                                $stmt,
                                "isssi",
                                $user_id,
                                $entryType,
                                $details,
                                $date,
                                $rowId
                            );
                        }



                        if (!mysqli_stmt_execute($stmt)) {
                            echo "Error in executin query: " . mysqli_error($connect);
                        } else {
                            if (DEBUG_MODE) {
                                echo "Success";
                            }

                        }
                    }
                    $i++;
                }

                header('location: ../form/step4.php');
                exit();

            } else {
                $i = 1;
                while (isset($_POST["cvSummarySno-$i"])) {

                    $entryType = $_POST["cvSummaryEntryType-$i"] ?? '';
                    echo $entryType;

                    if ($entryType == "skill" || $entryType == "lang") {
                        // echo "matched";
                        $name = $_POST[$entryType . "Name-" . $i];
                        $level = $_POST[$entryType . "Level-" . $i];

                        echo $name . "<br>";
                        echo $level . "<br>";
                        $sql = "INSERT INTO `step4_abilities` (`step4_user_id`, `step4_entry_type`, `step4_name`,`step4_level`) VALUES (?, ?, ?, ?)";
                        $stmt = mysqli_prepare($connect, $sql);
                        if (!$stmt) {
                            // Handle prepare failure
                            die("Failed to prepare statement: " . mysqli_error($connect));
                        } else {
                            echo "prepared";
                        }
                        mysqli_stmt_bind_param(
                            $stmt,
                            "isss",
                            $user_id,
                            $entryType,
                            $name,
                            $level,

                        );
                        if (!mysqli_stmt_execute($stmt)) {
                            echo "Error in executin query: " . mysqli_error($connect);
                        } else {
                            if (DEBUG_MODE) {
                                echo "Success";
                            }

                        }
                    } else if ($entryType == "certficate" || $entryType = "accomplish") {
                        $name = $_POST[$entryType . "Name-" . $i];
                        $provider = $_POST[$entryType . "Provider-" . $i];
                        $month = $_POST[$entryType . "Month-" . $i];
                        $year = $_POST[$entryType . "Year-" . $i];
                        $date = $month . '-' . $year ?? '';
                        $desc = $_POST[$entryType . "Desc-" . $i];

                        $details = [
                            "name" => $name,
                            "provider" => $provider,
                            "description" => $desc
                        ];

                        $details = json_encode($details);


                        $sql = "INSERT INTO `step4_achievements` (`step4_user_id`, `step4_entry_type`, `step4_details`,`step4_date`) VALUES (?, ?, ?, ?)";
                        $stmt = mysqli_prepare($connect, $sql);
                        if (!$stmt) {
                            // Handle prepare failure
                            die("Failed to prepare statement: " . mysqli_error($connect));
                        } else {
                            echo "prepared";
                        }
                        mysqli_stmt_bind_param(
                            $stmt,
                            "isss",
                            $user_id,
                            $entryType,
                            $details,
                            $date,

                        );
                        if (!mysqli_stmt_execute($stmt)) {
                            echo "Error in executin query: " . mysqli_error($connect);
                        } else {
                            if (DEBUG_MODE) {
                                echo "Success";
                            }

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