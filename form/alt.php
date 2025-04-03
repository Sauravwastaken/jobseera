<?php

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM `step3` WHERE step3_user_id = ?";
$stmt = mysqli_prepare($connect, $sql);


if ($stmt) {
    if (DEBUG_MODE) {
        echo "prepared";
    }
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    if (!mysqli_stmt_execute($stmt)) {
        echo "Error in executing query" . mysqli_error($connect);
    } else {
        if (DEBUG_MODE) {

            echo "executed";
        }
        $result = mysqli_stmt_get_result($stmt);
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $rowId = $row['step3_id'];


            // echo "<pre>";
            // var_dump($row);  

            // echo "</pre>";
            // // // extract($row);        
            // // echo "hi";


            $entryType = $row['step3_entry_type'] ?? '';
            $startDate = [];
            $endDate = [];
            $jobDescription = $row["step3_description"] ?? '';
            $jobDetailsJson = $row["step3_details"] ?? '';
            $jobDetails = json_decode($jobDetailsJson, true);

            list($startDate['startMonth'], $startDate['startYear']) = explode('-', $row['step3_start_date']);

            list($endDate['endMonth'], $endDate['endYear']) = explode('-', $row['step3_end_date']);



            // echo $startDate;
            // echo "<pre>";
            // var_dump($startDate);  

            // echo "</pre>"; 



            //   exit();
            ?>
            <?php echo '<br>';
            echo "coutn:";
            echo $i;
            ?>
            <input class="hidden workExperienceSno" name="workExperienceSno-<?php echo $i; ?>" type="text"
                value="<?php echo $i; ?>">
            <input class="hidden workExperienceEntryType" name="workExperienceEntryType-<?php echo $i; ?>" type="text"
                value="work_experience">
            <input class="hidden workExperienceRowId" name="workExperienceRowId-<?php echo $i; ?>" type="text"
                value="<?php echo $rowId ?>">
            <!-- Row -->
            <div class="flex w-full space-x-8">

                <div class="flex flex-col flex-grow">

                    <label for="first-name" class="resume-form-label">Job Title / Role:</label>
                    <input class="resume-form-input jobTitle" type="text" name="jobTitle-<?php echo $i; ?>"
                        value="<?php echo isset($jobDetails['jobTitle']) ? $jobDetails['jobTitle'] : ''; ?>">
                </div>
                <div class="flex flex-col flex-grow">
                    <label for="first-name" class="resume-form-label">Company / Organization Name:</label>

                    <input class="resume-form-input companyName" type="text" name="companyName-<?php echo $i; ?>"
                        value="<?php echo isset($jobDetails['companyName']) ? $jobDetails['companyName'] : ''; ?>">
                </div>
                <div class="flex flex-col flex-grow-[2]">
                    <label for="first-name" class="resume-form-label">Location:</label>
                    <input class="resume-form-input jobLocation" type="text" name="jobLocation-<?php echo $i; ?>"
                        value="<?php echo isset($jobDetails['jobLocation']) ? $jobDetails['jobLocation'] : ''; ?>">
                </div>
            </div>

            <!-- Row -->
            <div class="flex w-full space-x-8">
                <div class="flex flex-col flex-grow">
                    <label for="first-name" class="resume-form-label">Employment Type:</label>
                    <select class="resume-form-input employementType" name="employementType-<?php echo $i; ?>" id="">
                        <option value="">Select</option>
                        <option value="Internship" selected>Internship</option>

                    </select>
                </div>
                <div class="flex flex-col single-input-row-xs">
                    <label for="first-name" class="resume-form-label">Start Date:</label>

                    <div class="flex resume-form-input px-0">
                        <select class="flex-grow px-2 bg-theme_bg_light_yellow startDateMonth"
                            name="startDateMonth-<?php echo $i; ?>" id="">
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
                                if ($value == $startDate['startMonth']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';

                                }
                                echo "<option value='$value' $selected>$name</option>";
                            }
                            ?>


                        </select>
                        <select class="flex-grow px-2 bg-theme_bg_light_yellow startDateYear" name="startDateYear-<?php echo $i; ?>"
                            id="">
                            <?php
                            $startYear = 1925;
                            $currentYear = date("Y");

                            for ($year = $currentYear + 1; $year >= $startYear; $year--) {
                                if ($startDate['startYear'] == $year) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';

                                }
                                echo "<option value=\"$year\" $selected>$year</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col single-input-row-xs">
                    <label for="first-name" class="resume-form-label">End Date:</label>
                    <div class="flex resume-form-input px-0">
                        <select class="flex-grow px-2 bg-theme_bg_light_yellow endDateMonth" name="endDateMonth-<?php echo $i; ?>"
                            id="">

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
                                if ($value == $endDate['endMonth']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';

                                }
                                echo "<option value='$value' $selected>$name</option>";
                            }
                            ?>
                        </select>
                        <select class="flex-grow px-2 bg-theme_bg_light_yellow endDateYear" name="endDateYear-<?php echo $i; ?>"
                            id="">
                            <?php
                            $startYear = 1925;
                            $currentYear = date("Y");

                            for ($year = $currentYear + 1; $year >= $startYear; $year--) {
                                if ($endDate['endYear'] == $year) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';

                                }
                                echo "<option value=\"$year\" $selected>$year</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col flex-grow-[2]">
                    <label for="first-name" class="resume-form-label">Technology Used:</label>

                    <input class="resume-form-input techUsed" type="text" name="techUsed-<?php echo $i; ?>"
                        value="<?php echo isset($jobDetails['techUsed']) ? $jobDetails['techUsed'] : ''; ?>">
                </div>
            </div>

            <!-- Row -->
            <div class="flex w-full space-x-8">
                <div class="flex flex-col flex-grow-[0 single-input-row">
                    <label for="first-name" class="resume-form-label">Descritpion:</label>

                    <input class="resume-form-input jobDescription" type="text" name="jobDescription-<?php echo $i; ?>"
                        value="<?php echo isset($jobDescription) ? $jobDescription : ''; ?>">
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