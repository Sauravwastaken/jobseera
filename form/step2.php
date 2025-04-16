<?php
include_once('../parts/_dbconnect.php');

$title = 'Build Your Resume - JobSeera';

$is_sub_folder = true;
$nav_included = true;

$form_step = 2;
include_once('../components/header.php');
include_once('../components/nav.php');


?>

<?php
$showresult = false;
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM `step2` WHERE step2_user_id = ?";
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
        while ($row = mysqli_fetch_assoc($result)) {

            extract($row);
            // var_dump($row);    

            $class_x = json_decode($step2_school_x_details, true);
            $class_xii = json_decode($step2_school_xii_details, true);
            $higher_education = json_decode($step2_higher_education_details, true);

            // echo '<pre>';
            // var_dump($higher_education);
            // echo '</pre>';
            // echo $higher_education;
            if ($higher_education) {
                $showresult = true;
            }


        }

    }
} else {
    echo "Could not prepare ";
}

?>

<form action="../parts/_step2_handle.php" method="POST">
    <section class="site-padding py-8">
        <?php include_once('../components/resume_builder_header.php'); ?>

        <!-- Main form container -->
        <div class="border border-theme_border_gray py-4 rounded-lg">
            <div class="px-8 md:px-6 sm:px-4">
                <p class="my-4 text-lg">Schooling</p>

                <div class="space-y-6" id="qualificationContainer">
                    <!-- Row -->
                    <div class="flex w-full gap-x-8 xl:flex-wrap xl:gap-y-6">
                        <div class="flex flex-col flex-grow">
                            <label for="" class="resume-form-label">Qualification:</label>
                            <input id="institutionName" class="resume-form-input" type="text" value="Class X"
                                disabled />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="x-school-name" class="resume-form-label">School Name:</label>

                            <input id="institutionName" class="resume-form-input" type="text" name="x-school-name"
                                value="<?php echo isset($class_x['school_name']) ? $class_x['school_name'] : ""; ?>"
                                required />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="x-percentage" class="resume-form-label">Percentage:</label>
                            <input id="percentage" class="resume-form-input" type="number" step="0.01"
                                name="x-percentage"
                                value="<?php echo isset($class_x['percentage']) ? $class_x['percentage'] : ""; ?>"
                                required />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full gap-x-8 xl:flex-wrap xl:gap-y-6">
                        <div class="flex flex-col single-input-row-xs">
                            <label for="x-joining-date" class="resume-form-label">Year of Joining:</label>
                            <input id="joiningYear" class="resume-form-input" type="text" name="x-joining-date"
                                value="<?php echo isset($class_x['joining_date']) ? $class_x['joining_date'] : "" ?>"
                                required />
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="x-passing-date" class="resume-form-label">Year of Passing:</label>
                            <input id="leavingYear" class="resume-form-input" type="text" name="x-passing-date"
                                value="<?php echo isset($class_x['passing_date']) ? $class_x['passing_date'] : "" ?>"
                                required />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full gap-x-8 xl:flex-wrap xl:gap-y-6">
                        <div class="flex flex-col flex-grow">
                            <label for="" class="resume-form-label">Qualification:</label>
                            <input id="institutionName" class="resume-form-input" type="text" value="Class XII"
                                disabled />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="xii-school-name" class="resume-form-label">School Name:</label>

                            <input id="institutionName" class="resume-form-input" type="text" name="xii-school-name"
                                value="<?php echo isset($class_xii['school_name']) ? $class_xii['school_name'] : "" ?>"
                                required />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="xii-percentage" class="resume-form-label">Percentage:</label>

                            <input id="percentage" class="resume-form-input" type="number" step="0.01"
                                name="xii-percentage"
                                value="<?php echo isset($class_xii['percentage']) ? $class_xii['percentage'] : "" ?>"
                                required />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full gap-x-8 xl:flex-wrap xl:gap-y-6">
                        <div class="flex flex-col single-input-row-xs">
                            <label for="xii-joining-date" class="resume-form-label">Year of Joining:</label>
                            <input id="joiningYear" class="resume-form-input" type="text" name="xii-joining-date"
                                value="<?php echo isset($class_xii['joining_date']) ? $class_xii['joining_date'] : ""; ?>"
                                required />
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="xii-passing-date" class="resume-form-label">Year of Passing:</label>
                            <input id="leavingYear" class="resume-form-input" type="text" name="xii-passing-date"
                                value="<?php echo isset($class_xii['passing_date']) ? $class_xii['passing_date'] : "" ?>"
                                required />
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex items-center space-x-2 flex-grow-0">
                            <input type="checkbox" name="" id="" />
                            <label for="first-name" class="resume-form-label">12th nahi kari</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8 md:px-6 sm:px-4">
                <p class="my-4 text-lg">Higher Education</p>

                <div class="space-y-6" id="higherEducationContainer">
                    <!-- Row -->
                    <div class="flex w-full gap-x-8 xl:flex-wrap xl:gap-y-6">

                        <div class="flex flex-col flex-grow !-ml-0">
                            <label for="first-name" class="resume-form-label">Qualification:</label>
                            <select class="resume-form-input" name="" id="qualificationType">
                                <option value="" selected readonly>Select</option>
                                <option value="Undergraduation" class="qualification-type-id-1">
                                    Undergraduation
                                </option>
                                <option value="Postgraduation" class="qualification-type-id-2">
                                    Postgraduation
                                </option>
                                <option value="Doctorate" class="qualification-type-id-3">
                                    Doctorate
                                </option>
                                <option value="Diploma" class="qualification-type-id-4">
                                    Diploma
                                </option>
                                <option value="Professional & Vocational Courses" class="qualification-type-id-5">
                                    Professional & Vocational Courses
                                </option>
                            </select>
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Course Name:</label>

                            <input class="resume-form-input" type="text" id="courseName" value="" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Branch:</label>

                            <input class="resume-form-input" id="branchName" type="text" value="" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">CGPA:</label>

                            <input class="resume-form-input" type="text" id="higherEducationCgpa" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full gap-x-8 xl:flex-wrap xl:gap-y-6">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Institution Name:</label>
                            <input class="resume-form-input" type="tel" id="higherEducationInstituteName" value="" />
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Year of Joining:</label>
                            <input class="resume-form-input" type="tel" id="higherEducationJoiningDate" value="" />
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Year of Passing:</label>
                            <input class="resume-form-input" type="text" id="higherEducationPassingDate" value="" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex">
                        <a id="higherEducationBtn" class="bg-theme_green text-white px-4 py-2 rounded-lg">
                            Add
                        </a>
                    </div>

                    <!-- Added Data -->
                    <?php
                    //  $higher_education_count = count($higher_education);
                    //  echo $higher_education_count;
                    //  for($i=0;$i<$higher_education_count;$i++) {
                    
                    if ($showresult) {
                        $sno = 1;

                        foreach ($higher_education as $qualification_type => $details) {
                            $id = "";

                            switch ($qualification_type) {
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

                            // echo '<pre>';
                            // var_dump($details);
                            // echo '</pre>';
                            ?>

                            <div class="flex w-full gap-x-8 xl:flex-wrap xl:gap-y-6">
                                <div class="flex flex-col flex-grow">
                                    <label for="first-name" class="resume-form-label">Qualification:</label>
                                    <input class="resume-form-input qualificationType" type="text"
                                        value="<?php echo isset($qualification_type) ? $qualification_type : "" ?>"
                                        name="qualificationType<?php echo $sno ?>" readonly>
                                </div>
                                <div class="flex flex-col flex-grow-[2]">
                                    <label for="first-name" class="resume-form-label">Course Name:</label>

                                    <input class="resume-form-input courseName" type="text" name="courseName-<?php echo $id; ?>"
                                        value="<?php echo isset($details['courseName']) ? $details['courseName'] : "" ?>">
                                </div>
                                <div class="flex flex-col flex-grow">
                                    <label for="first-name" class="resume-form-label">Branch:</label>

                                    <input class="resume-form-input branchName" type="text" name="branchName-<?php echo $id; ?>"
                                        value="<?php echo isset($details['branchName']) ? $details['branchName'] : "" ?>">
                                </div>
                                <div class="flex flex-col flex-grow">
                                    <label for="first-name" class="resume-form-label">CGPA:</label>

                                    <input class="resume-form-input higherEducationCgpa" type="text"
                                        name="higherEducationCgpa-<?php echo $id; ?>"
                                        value="<?php echo isset($details['higherEducationCgpa']) ? $details['higherEducationCgpa'] : "" ?>">
                                </div>
                            </div>
                            <div class="flex w-full gap-x-8 xl:flex-wrap xl:gap-y-6">
                                <div class="flex flex-col flex-grow">
                                    <label for="first-name" class="resume-form-label">Institution Name:</label>
                                    <input class="resume-form-input higherEducationInstituteName" type="tel" required=""
                                        name="higherEducationInstituteName-<?php echo $id; ?>"
                                        value="<?php echo isset($details['higherEducationInstituteName']) ? $details['higherEducationInstituteName'] : "" ?>">
                                </div>
                                <div class="flex flex-col single-input-row-xs">
                                    <label for="first-name" class="resume-form-label">Year of Joining:</label>
                                    <input class="resume-form-input higherEducationJoiningDate" type="tel" required=""
                                        name="higherEducationJoiningDate-<?php echo $id; ?>"
                                        value="<?php echo isset($details['higherEducationJoiningDate']) ? $details['higherEducationJoiningDate'] : "" ?>">
                                </div>
                                <div class="flex flex-col single-input-row-xs">
                                    <label for="first-name" class="resume-form-label">Year of Passing:</label>
                                    <input class="resume-form-input higherEducationPassingDate" type="text" required=""
                                        name="higherEducationPassingDate-<?php echo $id; ?>"
                                        value="<?php echo isset($details['higherEducationPassingDate']) ? $details['higherEducationPassingDate'] : "" ?>">
                                </div>
                            </div>

                            <?php $sno++;
                        }
                    } ?>

                    <!-- Row -->
                    <template id="higherEducationTemplate">
                        <!-- Row -->
                        <div class="flex w-full gap-x-8 xl:flex-wrap xl:gap-y-6">
                            <div class="flex flex-col flex-grow">
                                <label for="first-name" class="resume-form-label">Qualification:</label>
                                <input class="resume-form-input qualificationType" type="text" readonly />
                            </div>
                            <div class="flex flex-col flex-grow-[2]">
                                <label for="first-name" class="resume-form-label">Course Name:</label>

                                <input class="resume-form-input courseName" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow">
                                <label for="first-name" class="resume-form-label">Branch:</label>

                                <input class="resume-form-input branchName" type="text" />
                            </div>
                            <div class="flex flex-col flex-grow">
                                <label for="first-name" class="resume-form-label">CGPA:</label>

                                <input class="resume-form-input higherEducationCgpa" type="text" />
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="flex w-full gap-x-8 xl:flex-wrap xl:gap-y-6">
                            <div class="flex flex-col flex-grow">
                                <label for="first-name" class="resume-form-label">Institution Name:</label>
                                <input class="resume-form-input higherEducationInstituteName" type="tel" required />
                            </div>
                            <div class="flex flex-col single-input-row-xs">
                                <label for="first-name" class="resume-form-label">Year of Joining:</label>
                                <input class="resume-form-input higherEducationJoiningDate" type="tel" required />
                            </div>
                            <div class="flex flex-col single-input-row-xs">
                                <label for="first-name" class="resume-form-label">Year of Passing:</label>
                                <input class="resume-form-input higherEducationPassingDate" type="text" required />
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- <div class="relative my-6 h-2">
        <span class="resume-form-divider"></span>
      </div> -->
        </div>

        <?php include_once('../components/resume_builder_submit.php'); ?>
    </section>
</form>

<?php
include_once('../components/footer_scripts.php');
?>
<script src="../assets/js/step2.js"></script>
<?php
include_once('../components/footer.php');

?>