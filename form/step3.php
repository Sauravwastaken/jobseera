<?php
include_once('../parts/_dbconnect.php');
$title = 'Build Your Resume - JobSeera';
$is_sub_folder = true;
$nav_included = true;

$form_step = 3;
include_once('../components/header.php');
include_once('../components/nav.php');

?>




<form action="../parts/_step3_handle.php" method="POST">
    <section class="site-padding py-8">
        <?php include_once('../components/resume_builder_header.php'); ?>

        <!-- Main form container -->
        <div class="border border-theme_border_gray py-4 rounded-lg">
            <div class="px-8">
                <p class="my-4 text-lg">Work Experience</p>

                <div class="space-y-6" id="jobContainer">
                    <!-- <input class="hidden" id="workExperienceSno" type="text"> -->
                    <!-- <input class="hidden" id="workExperienceEntryType" type="text"> -->


                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex items-center space-x-2 flex-grow-0">

                            <input type="checkbox" name="" id="" />
                            <label for="first-name" class="resume-form-label">No work experience</label>
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Job Title / Role:</label>
                            <input id="jobTitle" class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Company / Organization Name:</label>

                            <input id="companyName" class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Location:</label>
                            <input id="jobLocation" class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Employment Type:</label>
                            <select id="jobType" class="resume-form-input" name="" id="">
                                <option value="" selected disabled>Select</option>
                                <option value="Full-Time">Full-Time</option>
                                <option value="Part-Time">Part-Time</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Internship">Internship</option>
                                <option value="Self-Employed">Self-Employed</option>
                            </select>
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Start Date:</label>

                            <div class="flex resume-form-input px-0">
                                <select id="jobStartDateMonth" class="flex-grow px-2 bg-theme_bg_light_yellow" name=""
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
                                <select id="jobStartDateYear" class="flex-grow px-2 bg-theme_bg_light_yellow" name=""
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
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">End Date:</label>
                            <div class="flex resume-form-input px-0">
                                <select id="jobEndDateMonth" class="flex-grow px-2 bg-theme_bg_light_yellow" name=""
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
                                <select id="jobEndDateYear" class="flex-grow px-2 bg-theme_bg_light_yellow" name=""
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
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Technology Used:</label>

                            <input id="jobTechUsed" class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow-[0 single-input-row">
                            <label for="first-name" class="resume-form-label">Responsibilites:</label>

                            <input id="jobDescription" class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex">
                        <a id='addJobBtn' class="bg-theme_green text-white px-4 py-2 rounded-lg">
                            Add
                        </a>
                    </div>

                    <!-- Added Data -->


                    <?php

                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `step3` WHERE step3_user_id = ? AND step3_entry_type = ?";
                    $stmt = mysqli_prepare($connect, $sql);
                    $entryType = "job";


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
                                <?php
                                // echo "coutn:";
                                // echo $i;
                                ?>
                                <input class="hidden workExperienceSno" name="workExperienceSno-<?php echo $i; ?>" type="text"
                                    value="<?php echo $i; ?>">
                                <input class="hidden workExperienceEntryType" name="workExperienceEntryType-<?php echo $i; ?>"
                                    type="text" value="<?php echo $entryType; ?>">
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

                                        <input class="resume-form-input companyName" type="text"
                                            name="companyName-<?php echo $i; ?>"
                                            value="<?php echo isset($jobDetails['companyName']) ? $jobDetails['companyName'] : ''; ?>">
                                    </div>
                                    <div class="flex flex-col flex-grow-[2]">
                                        <label for="first-name" class="resume-form-label">Location:</label>
                                        <input class="resume-form-input jobLocation" type="text"
                                            name="jobLocation-<?php echo $i; ?>"
                                            value="<?php echo isset($jobDetails['jobLocation']) ? $jobDetails['jobLocation'] : ''; ?>">
                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="flex w-full space-x-8">
                                    <div class="flex flex-col flex-grow">
                                        <label for="first-name" class="resume-form-label">Employment Type:</label>
                                        <select class="resume-form-input jobType" name="jobType-<?php echo $i; ?>" id="">
                                            <?php
                                            $employment_types = [
                                                "Full-Time",
                                                "Part-Time",
                                                "Freelance",
                                                "Internship",
                                                "Self-Employed"
                                            ];


                                            foreach ($employment_types as $types) {
                                                if ($types == $jobDetails['jobType']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';

                                                }
                                                echo "<option value='$types' $selected>$types</option>";
                                            }


                                            ?>

                                        </select>
                                    </div>
                                    <div class="flex flex-col single-input-row-xs">
                                        <label for="first-name" class="resume-form-label">Start Date:</label>

                                        <div class="flex resume-form-input px-0">
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow jobStartDateMonth"
                                                name="jobStartDateMonth-<?php echo $i; ?>" id="">
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
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow jobStartDateYear"
                                                name="jobStartDateYear-<?php echo $i; ?>" id="">
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
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow jobEndDateMonth"
                                                name="jobEndDateMonth-<?php echo $i; ?>" id="">

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
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow jobEndDateYear"
                                                name="jobEndDateYear-<?php echo $i; ?>" id="">
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

                                        <input class="resume-form-input jobTechUsed" type="text"
                                            name="jobTechUsed-<?php echo $i; ?>"
                                            value="<?php echo isset($jobDetails['jobTechUsed']) ? $jobDetails['jobTechUsed'] : ''; ?>">
                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="flex w-full space-x-8">
                                    <div class="flex flex-col flex-grow-[0 single-input-row">
                                        <label for="first-name" class="resume-form-label">Descritpion:</label>

                                        <input class="resume-form-input jobDescription" type="text"
                                            name="jobDescription-<?php echo $i; ?>"
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


                    <template id="jobTemplate">
                        <input class="hidden workExperienceSno" name="workExperienceSno" type="text">

                        <input class="hidden workExperienceEntryType" name="workExperienceEntryType" type="text">

                        <!-- Row -->
                        <div class="flex w-full space-x-8">

                            <div class="flex flex-col flex-grow">

                                <label for="first-name" class="resume-form-label">Job Title / Role:</label>
                                <input class="resume-form-input jobTitle" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow">
                                <label for="first-name" class="resume-form-label">Company / Organization Name:</label>

                                <input class="resume-form-input companyName" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow-[2]">
                                <label for="first-name" class="resume-form-label">Location:</label>
                                <input class="resume-form-input jobLocation" type="text" />
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="flex w-full space-x-8">
                            <div class="flex flex-col flex-grow">
                                <label for="first-name" class="resume-form-label">Employment Type:</label>
                                <select class="resume-form-input jobType" name="" id="">

                                    <option value="Full-Time">Full-Time</option>
                                    <option value="Part-Time">Part-Time</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Internship" selected>Internship</option>
                                    <option value="Self-Employed">Self-Employed</option>

                                </select>
                            </div>
                            <div class="flex flex-col single-input-row-xs">
                                <label for="first-name" class="resume-form-label">Start Date:</label>

                                <div class="flex resume-form-input px-0">
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow jobStartDateMonth" name=""
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
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow jobStartDateYear" name=""
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
                            <div class="flex flex-col single-input-row-xs">
                                <label for="first-name" class="resume-form-label">End Date:</label>
                                <div class="flex resume-form-input px-0">
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow jobEndDateMonth" name=""
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
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow jobEndDateYear" name=""
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
                            <div class="flex flex-col flex-grow-[2]">
                                <label for="first-name" class="resume-form-label">Technology Used:</label>

                                <input class="resume-form-input jobTechUsed" type="text" />
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="flex w-full space-x-8">
                            <div class="flex flex-col flex-grow-[0 single-input-row">
                                <label for="first-name" class="resume-form-label">Descritpion:</label>

                                <input class="resume-form-input jobDescription" type="text" />
                            </div>
                        </div>

                    </template>
                </div>
            </div>


            <!-- Paste here -->
            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8">
                <p class="my-4 text-lg">Projects</p>

                <div class="space-y-6" id="projectContainer">
                    <!-- <input class="hidden" id="workExperienceSno" type="text">
                    <input class="hidden" id="workExperienceEntryType" type="text"> -->


                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex items-center space-x-2 flex-grow-0">

                            <input type="checkbox" name="" id="" />
                            <label for="first-name" class="resume-form-label">No projects</label>
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Project Name:</label>
                            <input id="projectTitle" class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Technology Used:</label>

                            <input id="projectTechUsed" class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Link:</label>
                            <input id="projectLocation" class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Project Type:</label>
                            <select id="projectType" class="resume-form-input" name="">
                                <option value="" selected disabled>Select</option>
                                <option value="Personal">Personal</option>
                                <option value="Open Source">Open Source</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Client Work">Client Work</option>
                                <option value="Academic">Academic</option>
                                <option value="Research">Research</option>
                                <option value="Hackathon">Hackathon</option>
                                <option value="Startup">Startup</option>
                                <option value="Enterprise">Enterprise</option>
                                <option value="Other">Other</option>

                            </select>
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Start Date:</label>

                            <div class="flex resume-form-input px-0">
                                <select id="projectStartDateMonth" class="flex-grow px-2 bg-theme_bg_light_yellow"
                                    name="" id="">

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
                                <select id="projectStartDateYear" class="flex-grow px-2 bg-theme_bg_light_yellow"
                                    name="" id="">
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
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">End Date:</label>
                            <div class="flex resume-form-input px-0">
                                <select id="projectEndDateMonth" class="flex-grow px-2 bg-theme_bg_light_yellow" name=""
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
                                <select id="projectEndDateYear" class="flex-grow px-2 bg-theme_bg_light_yellow" name=""
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
                            <label for="first-name" class="resume-form-label">Responsibilites:</label>

                            <input id="projectDescription" class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex">
                        <a id='addProjectBtn' class="bg-theme_green text-white px-4 py-2 rounded-lg">
                            Add
                        </a>
                    </div>

                    <!-- Added Data -->
                    <?php

                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `step3` WHERE step3_user_id = ? AND step3_entry_type = ?";
                    $stmt = mysqli_prepare($connect, $sql);
                    $entryType = "project";


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
                            $i = 1 + $resultCount;
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
                                $projectDescription = $row["step3_description"] ?? '';
                                $projectDetailsJson = $row["step3_details"] ?? '';
                                $projectDetails = json_decode($projectDetailsJson, true);

                                list($startDate['startMonth'], $startDate['startYear']) = explode('-', $row['step3_start_date']);

                                list($endDate['endMonth'], $endDate['endYear']) = explode('-', $row['step3_end_date']);



                                // echo $startDate;
                                // echo "<pre>";
                                // var_dump($startDate);  
                    
                                // echo "</pre>"; 
                    


                                //   exit();
                                ?>


                                <input class="hidden workExperienceSno" name="workExperienceSno-<?php echo $i; ?>" type="text">

                                <input class="hidden workExperienceEntryType" name="workExperienceEntryType-<?php echo $i; ?>"
                                    type="text" value="<?php echo $entryType; ?>">
                                <input class="hidden workExperienceRowId" name="workExperienceRowId-<?php echo $i; ?>" type="text"
                                    value="<?php echo $rowId ?>">
                                <!-- Row -->
                                <div class="flex w-full space-x-8">

                                    <div class="flex flex-col flex-grow">

                                        <label for="first-name" class="resume-form-label">Project Name:</label>
                                        <input class="resume-form-input projectTitle" type="text"
                                            name="projectTitle-<?php echo $i; ?>"
                                            value="<?php echo isset($projectDetails['projectTitle']) ? $projectDetails['projectTitle'] : ''; ?>">
                                    </div>
                                    <div class="flex flex-col flex-grow">
                                        <label for="first-name" class="resume-form-label">Technology Used:</label>

                                        <input class="resume-form-input projectTechUsed" type="text"
                                            name="projectTechUsed-<?php echo $i; ?>"
                                            value="<?php echo isset($projectDetails['projectTechUsed']) ? $projectDetails['projectTechUsed'] : ''; ?>">
                                    </div>
                                    <div class="flex flex-col flex-grow-[2]">
                                        <label for="first-name" class="resume-form-label">Link:</label>
                                        <input class="resume-form-input projectLocation" type="text"
                                            name="projectLocation-<?php echo $i; ?>"
                                            value="<?php echo isset($projectDetails['projectLocation']) ? $projectDetails['projectLocation'] : ''; ?>">
                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="flex w-full space-x-8">
                                    <div class="flex flex-col single-input-row-xs">
                                        <label for="first-name" class="resume-form-label">Project Type:</label>
                                        <select class="resume-form-input projectType" name="projectType-<?php echo $i; ?>">
                                            <?php
                                            $project_types = [
                                                "Personal",
                                                "Open Source",
                                                "Freelance",
                                                "Client Work",
                                                "Academic",
                                                "Research",
                                                "Hackathon",
                                                "Startup",
                                                "Enterprise",
                                                "Other"
                                            ];



                                            foreach ($project_types as $types) {
                                                if ($types == $projectDetails['projectType']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';

                                                }
                                                echo "<option value='$types' $selected>$types</option>";
                                            }


                                            ?>

                                        </select>
                                    </div>
                                    <div class="flex flex-col single-input-row-xs">
                                        <label for="first-name" class="resume-form-label">Start Date:</label>

                                        <div class="flex resume-form-input px-0">
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow projectStartDateMonth"
                                                name="projectStartDateMonth-<?php echo $i; ?>" id="">

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
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow projectStartDateYear"
                                                name="projectStartDateYear-<?php echo $i; ?>" id="">
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
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow projectEndDateMonth"
                                                name="projectEndDateMonth-<?php echo $i; ?>" id="">

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
                                            <select class="flex-grow px-2 bg-theme_bg_light_yellow projectEndDateYear"
                                                name="projectEndDateYear-<?php echo $i; ?>" id="">
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

                                </div>

                                <!-- Row -->
                                <div class="flex w-full space-x-8">
                                    <div class="flex flex-col flex-grow-[0 single-input-row">
                                        <label for="first-name" class="resume-form-label">Descritpion:</label>

                                        <input class="resume-form-input projectDescription" type="text"
                                            name="projectDescription-<?php echo $i; ?>"
                                            value="<?php echo isset($projectDescription) ? $projectDescription : ''; ?>">
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

                    <template id="projectTemplate">
                        <input class="hidden workExperienceSno" name="workExperienceSno" type="text">

                        <input class="workExperienceEntryType" name="workExperienceEntryType" type="text">

                        <!-- Row -->
                        <div class="flex w-full space-x-8">

                            <div class="flex flex-col flex-grow">

                                <label for="first-name" class="resume-form-label">Project Name:</label>
                                <input class="resume-form-input projectTitle" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow">
                                <label for="first-name" class="resume-form-label">Technology Used:</label>

                                <input class="resume-form-input projectTechUsed" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow-[2]">
                                <label for="first-name" class="resume-form-label">Link:</label>
                                <input class="resume-form-input projectLocation" type="text" />
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="flex w-full space-x-8">
                            <div class="flex flex-col single-input-row-xs">
                                <label for="first-name" class="resume-form-label">Project Type:</label>
                                <select class="resume-form-input projectType" name="">
                                    <option value="Personal">Personal</option>
                                    <option value="Open Source">Open Source</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Client Work">Client Work</option>
                                    <option value="Academic">Academic</option>
                                    <option value="Research">Research</option>
                                    <option value="Hackathon">Hackathon</option>
                                    <option value="Startup">Startup</option>
                                    <option value="Enterprise">Enterprise</option>
                                    <option value="Other">Other</option>

                                </select>
                            </div>
                            <div class="flex flex-col single-input-row-xs">
                                <label for="first-name" class="resume-form-label">Start Date:</label>

                                <div class="flex resume-form-input px-0">
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow projectStartDateMonth"
                                        name="" id="">

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
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow projectStartDateYear" name=""
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
                            <div class="flex flex-col single-input-row-xs">
                                <label for="first-name" class="resume-form-label">End Date:</label>
                                <div class="flex resume-form-input px-0">
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow projectEndDateMonth" name=""
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
                                    <select class="flex-grow px-2 bg-theme_bg_light_yellow projectEndDateYear" name=""
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
                                <label for="first-name" class="resume-form-label">Descritpion:</label>

                                <input class="resume-form-input projectDescription" type="text" />
                            </div>
                        </div>

                    </template>
                </div>
            </div>

            <!-- Paste here -->



        </div>

        <?php include_once('../components/resume_builder_submit.php'); ?>
    </section>
</form>
<?php
include_once('../components/footer_scripts.php');
?>
<script src="../assets/js/step3.js"></script>
<?php
include_once('../components/footer.php');

?>