<?php
include_once('../parts/_dbconnect.php');
$title = 'Build Your Resume - JobSeera';
$is_sub_folder = true;
$nav_included = true;

$form_step = 4;

include_once('../components/header.php');
include_once('../components/nav.php');

?>

<form action="../parts/_step4_handle.php" method="POST">
    <section class="site-padding py-8">
        <?php include_once('../components/resume_builder_header.php'); ?>

        <!-- Main form container -->
        <div class="border border-theme_border_gray py-4 rounded-lg">
            <div class="px-8">
                <p class="my-4 text-lg">Skills</p>

                <div class="space-y-6" id="skillContainer">

                    <input class="hidden" id="cvSummarySno" type="text">



                    <!-- Row -->
                    <div class="flex w-full  space-x-4 items-end">

                        <div class="flex flex-col w-5/12">
                            <label for="first-name" class="resume-form-label">Skills:</label>
                            <input id="skillName" class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-0">
                            <label for="first-name" class="resume-form-label">Profiency:</label>
                            <select class="resume-form-input" name="" id="skillLevel">
                                <option value="" selected disabled>Select</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Proficient">Proficient</option>
                                <option value="Advanced">Advanced</option>
                                <option value="Expert">Expert</option>

                            </select>
                        </div>
                        <div class="flex flex-col flex-grow-0">
                            <a id="addSkillBtn" class="bg-theme_green text-white px-4 py-2 rounded-lg">
                                Add
                            </a>
                        </div>
                    </div>

                    <!-- Added Data -->

                    <?php

                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `step4_abilities` WHERE step4_user_id = ? AND step4_entry_type = ?";
                    $stmt = mysqli_prepare($connect, $sql);
                    $entryType = "skill";


                    if ($stmt) {
                        if (DEBUG_MODE) {
                            echo "prepared";
                        }
                        mysqli_stmt_bind_param($stmt, 'is', $user_id, $entryType);
                        if (!mysqli_stmt_execute($stmt)) {
                            echo "Error in executing query" . mysqli_error($connect);
                        } else {
                            if (DEBUG_MODE) {

                                echo "executed";
                            }
                            $result = mysqli_stmt_get_result($stmt);
                            $resultCount = mysqli_num_rows($result);
                            $totalResultCount = $resultCount;
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $rowId = $row['step4_id'];
                                $name = $row['step4_name'];
                                $level = $row['step4_level'];

                                ?>
                                <?php echo '<br>';
                                echo "count:";
                                echo $i;
                                ?>
                                <input class="hidden cvSummarySno" type="text" name="cvSummarySno-<?php echo $i; ?>">
                                <input class="hidden cvSummaryEntryType" type="text" value="skill"
                                    name="cvSummaryEntryType-<?php echo $i; ?>">
                                <input class="hidden cvSummaryRowId" name="cvSummaryRowId-<?php echo $i; ?>" type="text"
                                    value="<?php echo $rowId ?>">
                                <!-- Row -->
                                <div class="flex w-full  space-x-4 items-end">

                                    <div class="flex flex-col w-5/12">
                                        <label for="first-name" class="resume-form-label">Skills:</label>
                                        <input class="resume-form-input skillName" type="text" name="skillName-<?php echo $i; ?>"
                                            value="<?php echo $name; ?>">
                                    </div>
                                    <div class="flex flex-col flex-grow-0">
                                        <label for="first-name" class="resume-form-label">Profiency:</label>
                                        <select class="resume-form-input skillLevel" name="skillLevel-<?php echo $i; ?>">
                                            <?php
                                            // $level
                                            $level_types = [
                                                "Beginner",
                                                "Intermediate",
                                                "Proficient",
                                                "Advanced",
                                                "Expert",
                                            ];



                                            foreach ($level_types as $types) {
                                                if ($types == $level) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';

                                                }
                                                echo "<option value='$types' $selected>$types</option>";
                                            }

                                            ?>

                                        </select>
                                    </div>

                                </div>

                                <?php
                                $i++;
                            }
                        }
                    } else {
                        echo "Could not prepare ";
                    }
                    ?>
                    <!-- Template -->
                    <template id="skillTemplate">
                        <input class="hidden cvSummarySno" type="text">
                        <input class="hidden cvSummaryEntryType" type="text" value="skill">
                        <!-- Row -->
                        <div class="flex w-full  space-x-4 items-end">

                            <div class="flex flex-col w-5/12">
                                <label for="first-name" class="resume-form-label">Skills:</label>
                                <input class="resume-form-input skillName" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow-0">
                                <label for="first-name" class="resume-form-label">Profiency:</label>
                                <select class="resume-form-input skillLevel" name="">
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Proficient">Proficient</option>
                                    <option value="Advanced">Advanced</option>
                                    <option value="Expert">Expert</option>
                                </select>
                            </div>

                        </div>
                    </template>

                </div>
            </div>

            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8">
                <p class="my-4 text-lg">Accomplishments</p>

                <div class="space-y-6" id="accomplishContainer">
                    <input class="hidden" id="cvSummarySno" type="text">
                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Title / Achievement:</label>
                            <input id="accomplishName" class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Organization /
                                Event Name:</label>

                            <input id="accomplishProvider" class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Date / Year:</label>
                            <div class="flex resume-form-input px-0">
                                <select id="accomplishMonth" class="flex-grow px-2 bg-theme_bg_light_yellow" name=""
                                    id="">

                                    <option value="01" selected>January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select id="accomplishYear" class="flex-grow px-2 bg-theme_bg_light_yellow" name=""
                                    id="">
                                    <?php
                                    $startYear = 1925;
                                    $currentYear = date("Y");

                                    for ($year = $currentYear + 1; $year >= $startYear; $year--) {
                                        if ($year == $currentYear) {
                                            echo "<option value=\"$year\" selected>$year</option>";
                                        } else {
                                            echo "<option value=\"$year\">$year</option>";
                                        }

                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow-[0 single-input-row">
                            <label for="first-name" class="resume-form-label"> Description:</label>

                            <input id="accomplishDesc" class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex">
                        <a id="addAccomplishBtn" class="bg-theme_green text-white px-4 py-2 rounded-lg">
                            Add
                        </a>
                    </div>

                    <!-- Added Data -->
                    <?php

                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `step4_achievements` WHERE step4_user_id = ? AND step4_entry_type = ?";
                    $stmt = mysqli_prepare($connect, $sql);
                    $entryType = "accomplish";


                    if ($stmt) {
                        if (DEBUG_MODE) {
                            echo "prepared";
                        }
                        mysqli_stmt_bind_param($stmt, 'is', $user_id, $entryType);
                        if (!mysqli_stmt_execute($stmt)) {
                            echo "Error in executing query" . mysqli_error($connect);
                        } else {
                            if (DEBUG_MODE) {

                                echo "executed";
                            }
                            $result = mysqli_stmt_get_result($stmt);
                            $resultCount = mysqli_num_rows($result);
                            $i = 1 + $totalResultCount;
                            $totalResultCount += $resultCount;
                            // echo $i;
                            // echo $totalResultCount;
                    
                            while ($row = mysqli_fetch_assoc($result)) {
                                // echo "<pre>";
                                // var_dump($row);
                                // echo "</pre>";
                    
                                $rowId = $row['step4_id'];
                                $entryType = $row['step4_entry_type'];
                                $date = $row['step4_date'];
                                $details = json_decode($row['step4_details'], true);

                                list($month, $year) = explode('-', $date);

                                ?>


                                <input class="hidden cvSummarySno" type="text" name="cvSummarySno-<?php echo $i; ?>">
                                <input class="hidden cvSummaryEntryType" type="text" value="accomplish"
                                    name="cvSummaryEntryType-<?php echo $i; ?>">
                                <input class="hidden cvSummaryRowId" name="cvSummaryRowId-<?php echo $i; ?>" type="text"
                                    value="<?php echo $rowId ?>">

                                <!-- Row -->
                                <div class="flex w-full space-x-8">
                                    <div class="flex flex-col flex-grow">
                                        <label for="first-name" class="resume-form-label">Title / Achievement:</label>
                                        <input class="resume-form-input accomplishName" type="text"
                                            name="accomplishName-<?php echo $i; ?>" value="<?php echo $details['name']; ?>">
                                    </div>
                                    <div class="flex flex-col flex-grow">
                                        <label for="first-name" class="resume-form-label">Organization /
                                            Event Name:</label>

                                        <input class="resume-form-input accomplishProvider" type="text"
                                            name="accomplishProvider-<?php echo $i; ?>" value="<?php echo $details['provider']; ?>">
                                    </div>
                                    <div class="flex flex-col flex-grow-[2]">
                                        <label for="first-name" class="resume-form-label">Date / Year:</label>
                                        <div class="flex resume-form-input px-0">
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow accomplishMonth"
                                                name="accomplishMonth-<?php echo $i; ?>">

                                                <?php
                                                $months = [
                                                    "01" => "January",
                                                    "02" => "February",
                                                    "03" => "March",
                                                    "04" => "April",
                                                    "05" => "May",
                                                    "06" => "June",
                                                    "07" => "July",
                                                    "08" => "August",
                                                    "09" => "September",
                                                    "10" => "October",
                                                    "11" => "November",
                                                    "12" => "December"
                                                ];
                                                foreach ($months as $value => $name) {
                                                    if ($value == $month) {
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';

                                                    }
                                                    echo "<option value='$value' $selected>$name</option>";
                                                }
                                                ?>
                                            </select>
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow accomplishYear"
                                                name="accomplishYear-<?php echo $i; ?>">
                                                <?php
                                                $startYear = 1925;
                                                $currentYear = date("Y");

                                                for ($increment = $currentYear + 1; $increment >= $startYear; $increment--) {
                                                    if ($increment == $year) {
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';

                                                    }
                                                    echo "<option value=\"$increment\" $selected>$increment</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="flex w-full space-x-8">
                                    <div class="flex flex-col flex-grow-[0 single-input-row">
                                        <label for="first-name" class="resume-form-label"> Description:</label>

                                        <input class="resume-form-input accomplishDesc" type="text"
                                            name="accomplishDesc-<?php echo $i; ?>" value="<?php echo $details['description']; ?>">
                                    </div>
                                </div>

                                <?php
                                $i++;
                            }
                        }
                    } else {
                        echo "Could not prepare ";
                    }
                    ?>

                    <template id="accomplishTemplate">
                        <input class="hidden cvSummarySno" type="text">
                        <input class="hidden cvSummaryEntryType" type="text" value="accomplish">

                        <!-- Row -->
                        <div class="flex w-full space-x-8">
                            <div class="flex flex-col flex-grow">
                                <label for="first-name" class="resume-form-label">Title / Achievement:</label>
                                <input class="resume-form-input accomplishName" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow">
                                <label for="first-name" class="resume-form-label">Organization /
                                    Event Name:</label>

                                <input class="resume-form-input accomplishProvider" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow-[2]">
                                <label for="first-name" class="resume-form-label">Date / Year:</label>
                                <div class="flex resume-form-input px-0">
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow accomplishMonth" name="">

                                        <option value="01" selected>January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow accomplishYear" name="">
                                        <?php
                                        $startYear = 1925;
                                        $currentYear = date("Y");

                                        for ($year = $currentYear + 1; $year >= $startYear; $year--) {
                                            if ($year == $currentYear) {
                                                echo "<option value=\"$year\" selected>$year</option>";
                                            } else {
                                                echo "<option value=\"$year\">$year</option>";
                                            }

                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <!-- Row -->
                        <div class="flex w-full space-x-8">
                            <div class="flex flex-col flex-grow-[0 single-input-row">
                                <label for="first-name" class="resume-form-label"> Description:</label>

                                <input class="resume-form-input accomplishDesc" type="text" />
                            </div>
                        </div>


                    </template>


                </div>
            </div>

            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8">
                <p class="my-4 text-lg">Certificates</p>

                <div class="space-y-6" id="certificateContainer">
                    <input class="hidden" id="cvSummarySno" type="text">
                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Certificate Name:</label>
                            <input id="certificateName" class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Issuer:</label>

                            <input id="certificateProvider" class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Date / Year:</label>
                            <div class="flex resume-form-input px-0">
                                <select id="certificateMonth" class="flex-grow px-2 bg-theme_bg_light_yellow" name=""
                                    id="">

                                    <option value="01" selected>January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select id="certificateYear" class="flex-grow px-2 bg-theme_bg_light_yellow" name=""
                                    id="">
                                    <?php
                                    $startYear = 1925;
                                    $currentYear = date("Y");

                                    for ($year = $currentYear + 1; $year >= $startYear; $year--) {
                                        if ($year == $currentYear) {
                                            echo "<option value=\"$year\" selected>$year</option>";
                                        } else {
                                            echo "<option value=\"$year\">$year</option>";
                                        }

                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow-[0 single-input-row">
                            <label for="first-name" class="resume-form-label"> Description:</label>

                            <input id="certificateDesc" class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex">
                        <a id="addCertificateBtn" class="bg-theme_green text-white px-4 py-2 rounded-lg">
                            Add
                        </a>
                    </div>

                    <!-- Added Data -->
                    <?php

                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `step4_achievements` WHERE step4_user_id = ? AND step4_entry_type = ?";
                    $stmt = mysqli_prepare($connect, $sql);
                    $entryType = "certificate";


                    if ($stmt) {
                        if (DEBUG_MODE) {
                            echo "prepared";
                        }
                        mysqli_stmt_bind_param($stmt, 'is', $user_id, $entryType);
                        if (!mysqli_stmt_execute($stmt)) {
                            echo "Error in executing query" . mysqli_error($connect);
                        } else {
                            if (DEBUG_MODE) {

                                echo "executed";
                            }
                            $result = mysqli_stmt_get_result($stmt);
                            $resultCount = mysqli_num_rows($result);
                            $i = 1 + $totalResultCount;
                            $totalResultCount += $resultCount;
                            // echo $totalResultCount;
                    
                            while ($row = mysqli_fetch_assoc($result)) {
                                // echo "<pre>";
                                // var_dump($row);
                                // echo "</pre>";
                    
                                $rowId = $row['step4_id'];
                                $entryType = $row['step4_entry_type'];
                                $date = $row['step4_date'];
                                $details = json_decode($row['step4_details'], true);

                                list($month, $year) = explode('-', $date);

                                ?>


                                <input class="hidden cvSummarySno" type="text" name="cvSummarySno-<?php echo $i; ?>">
                                <input class="hidden cvSummaryEntryType" type="text" value="certificate"
                                    name="cvSummaryEntryType-<?php echo $i; ?>">
                                <input class="hidden cvSummaryRowId" name="cvSummaryRowId-<?php echo $i; ?>" type="text"
                                    value="<?php echo $rowId ?>">

                                <!-- Row -->
                                <div class="flex w-full space-x-8">
                                    <div class="flex flex-col flex-grow">
                                        <label for="first-name" class="resume-form-label">Certificate Name:</label>
                                        <input class="resume-form-input certificateName" type="text"
                                            name="certificateName-<?php echo $i; ?>" value="<?php echo $details['name']; ?>">
                                    </div>
                                    <div class="flex flex-col flex-grow">
                                        <label for="first-name" class="resume-form-label">Issuer:</label>

                                        <input class="resume-form-input certificateProvider" type="text"
                                            name="certificateProvider-<?php echo $i; ?>"
                                            value="<?php echo $details['provider']; ?>">
                                    </div>
                                    <div class="flex flex-col flex-grow-[2]">
                                        <label for="first-name" class="resume-form-label">Date / Year:</label>
                                        <div class="flex resume-form-input px-0">
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow certificateMonth"
                                                name="certificateMonth-<?php echo $i; ?>">

                                                <?php
                                                $months = [
                                                    "01" => "January",
                                                    "02" => "February",
                                                    "03" => "March",
                                                    "04" => "April",
                                                    "05" => "May",
                                                    "06" => "June",
                                                    "07" => "July",
                                                    "08" => "August",
                                                    "09" => "September",
                                                    "10" => "October",
                                                    "11" => "November",
                                                    "12" => "December"
                                                ];
                                                foreach ($months as $value => $name) {
                                                    if ($value == $month) {
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';

                                                    }
                                                    echo "<option value='$value' $selected>$name</option>";
                                                }
                                                ?>
                                            </select>
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow certificateYear"
                                                name="certificateYear-<?php echo $i; ?>">
                                                <?php
                                                $startYear = 1925;
                                                $currentYear = date("Y");

                                                for ($i = $currentYear + 1; $i >= $startYear; $i--) {
                                                    if ($i == $year) {
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';

                                                    }
                                                    echo "<option value=\"$i\" $selected>$i</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="flex w-full space-x-8">
                                    <div class="flex flex-col flex-grow-[0 single-input-row">
                                        <label for="first-name" class="resume-form-label"> Description:</label>

                                        <input class="resume-form-input certificateDesc" type="text"
                                            name="certificateDesc-<?php echo $i; ?>" value="<?php echo $details['description']; ?>">
                                    </div>
                                </div>

                                <?php
                                $i++;
                            }
                        }
                    } else {
                        echo "Could not prepare ";
                    }
                    ?>

                    <template id="certificateTemplate">
                        <input class="hidden cvSummarySno" type="text">
                        <input class="hidden cvSummaryEntryType" type="text" value="certificate">

                        <!-- Row -->
                        <div class="flex w-full space-x-8">
                            <div class="flex flex-col flex-grow">
                                <label for="first-name" class="resume-form-label">Certificate Name:</label>
                                <input class="resume-form-input certificateName" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow">
                                <label for="first-name" class="resume-form-label">Issuer:</label>

                                <input class="resume-form-input certificateProvider" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow-[2]">
                                <label for="first-name" class="resume-form-label">Date / Year:</label>
                                <div class="flex resume-form-input px-0">
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow certificateMonth" name="">

                                        <option value="01" selected>January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow certificateYear" name="">
                                        <?php
                                        $startYear = 1925;
                                        $currentYear = date("Y");

                                        for ($year = $currentYear + 1; $year >= $startYear; $year--) {
                                            if ($year == $currentYear) {
                                                echo "<option value=\"$year\" selected>$year</option>";
                                            } else {
                                                echo "<option value=\"$year\">$year</option>";
                                            }

                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <!-- Row -->
                        <div class="flex w-full space-x-8">
                            <div class="flex flex-col flex-grow-[0 single-input-row">
                                <label for="first-name" class="resume-form-label"> Description:</label>

                                <input class="resume-form-input certificateDesc" type="text" />
                            </div>
                        </div>


                    </template>


                </div>
            </div>

            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8">
                <p class="my-4 text-lg">Language</p>

                <div class="space-y-6" id="langContainer">

                    <input class="hidden" id="cvSummarySno" type="text">


                    <!-- Row -->
                    <div class="flex w-full  space-x-4 items-end">

                        <div class="flex flex-col w-5/12">
                            <label for="first-name" class="resume-form-label">Languauge:</label>
                            <input id="langName" class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-0">
                            <label for="first-name" class="resume-form-label">Profiency:</label>
                            <select class="resume-form-input" name="" id="langLevel">
                                <option value="" selected disabled>Select</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Proficient">Proficient</option>
                                <option value="Advanced">Advanced</option>
                                <option value="Expert">Expert</option>

                            </select>
                        </div>
                        <div class="flex flex-col flex-grow-0">
                            <a id="addLangBtn" class="bg-theme_green text-white px-4 py-2 rounded-lg">
                                Add
                            </a>
                        </div>
                    </div>

                    <!-- Added Data -->
                    <?php

                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `step4_abilities` WHERE step4_user_id = ? AND step4_entry_type = ?";
                    $stmt = mysqli_prepare($connect, $sql);
                    $entryType = "lang";


                    if ($stmt) {
                        if (DEBUG_MODE) {
                            echo "prepared";
                        }
                        mysqli_stmt_bind_param($stmt, 'is', $user_id, $entryType);
                        if (!mysqli_stmt_execute($stmt)) {
                            echo "Error in executing query" . mysqli_error($connect);
                        } else {
                            if (DEBUG_MODE) {

                                echo "executed";
                            }
                            $result = mysqli_stmt_get_result($stmt);
                            $resultCount = mysqli_num_rows($result);
                            $i = 1 + $totalResultCount;
                            $totalResultCount += $resultCount;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $rowId = $row['step4_id'];
                                $name = $row['step4_name'];
                                $level = $row['step4_level'];

                                ?>

                                <input class="hidden cvSummarySno" type="text" name="cvSummarySno-<?php echo $i; ?>">
                                <input class="hidden cvSummaryEntryType" type="text" value="lang"
                                    name="cvSummaryEntryType-<?php echo $i; ?>">
                                <input class="hidden cvSummaryRowId" name="cvSummaryRowId-<?php echo $i; ?>" type="text"
                                    value="<?php echo $rowId ?>">
                                <!-- Row -->
                                <div class="flex w-full  space-x-4 items-end">

                                    <div class="flex flex-col w-5/12">
                                        <label for="first-name" class="resume-form-label">Language:</label>
                                        <input class="resume-form-input langName" type="text" name="langName-<?php echo $i; ?>"
                                            value="<?php echo $name; ?>">
                                    </div>
                                    <div class="flex flex-col flex-grow-0">
                                        <label for="first-name" class="resume-form-label">Profiency:</label>
                                        <select class="resume-form-input langLevel" name="langLevel-<?php echo $i; ?>">
                                            <?php
                                            // $level
                                            $level_types = [
                                                "Beginner",
                                                "Intermediate",
                                                "Proficient",
                                                "Advanced",
                                                "Expert",
                                            ];

                                            foreach ($level_types as $types) {
                                                if ($types == $level) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';

                                                }
                                                echo "<option value='$types' $selected>$types</option>";
                                            }

                                            ?>

                                        </select>
                                    </div>

                                </div>

                                <?php
                                $i++;
                            }
                        }
                    } else {
                        echo "Could not prepare ";
                    }
                    ?>
                    <!-- Template -->
                    <template id="langTemplate">
                        <input class="hidden cvSummarySno" type="text">
                        <input class="hidden cvSummaryEntryType" type="text" value="lang">
                        <!-- Row -->
                        <div class="flex w-full  space-x-4 items-end">

                            <div class="flex flex-col w-5/12">
                                <label for="first-name" class="resume-form-label">Languuage:</label>
                                <input class="resume-form-input langName" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow-0">
                                <label for="first-name" class="resume-form-label">Profiency:</label>
                                <select class="resume-form-input langLevel" name="">
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Proficient">Proficient</option>
                                    <option value="Advanced">Advanced</option>
                                    <option value="Expert">Expert</option>
                                </select>
                            </div>

                        </div>
                    </template>

                </div>
            </div>


        </div>

        <?php include_once('../components/resume_builder_submit.php'); ?>
    </section>
</form>

<script src="../assets/js/step4.js"></script>


<?php
include_once('../components/footer.php');
?>