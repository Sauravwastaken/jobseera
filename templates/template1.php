<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once(__DIR__ . '/../parts/_dbconnect.php');




$user_id = $_SESSION['user_id'];

function fetchStepData($connect, $stepTable, $user_id, $column, $condition = false)
{


    if ($condition) {
        $sql = "SELECT * FROM `$stepTable` WHERE $column = ? AND step4_entry_type = ?";

    } else {
        $sql = "SELECT * FROM `$stepTable` WHERE $column = ?";
    }

    $stmt = mysqli_prepare($connect, $sql);
    if ($condition) {
        $conditionValue = "skill";
        mysqli_stmt_bind_param($stmt, 'is', $user_id, $conditionValue);

    } else {

        mysqli_stmt_bind_param($stmt, 'i', $user_id);
    }

    if (!mysqli_stmt_execute($stmt)) {
        echo "Could not execute for $stepTable";
        return [];
    }

    $result = mysqli_stmt_get_result($stmt);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}
$user_id = $_SESSION['user_id'];

$step1_data = fetchStepData($connect, 'step1', $user_id, 'step1_user_id');
$step2_data = fetchStepData($connect, 'step2', $user_id, 'step2_user_id');
$step3_data = fetchStepData($connect, 'step3', $user_id, 'step3_user_id');
$step4_abilities = fetchStepData($connect, 'step4_abilities', $user_id, 'step4_user_id');
$step4_skills = fetchStepData($connect, 'step4_abilities', $user_id, 'step4_user_id', true);
$step4_achievements = fetchStepData($connect, 'step4_achievements', $user_id, 'step4_user_id');

// Example debug:
// echo "<pre>";
// var_dump($step1_data);
// var_dump($step2_data);
// var_dump($step3_data);
// var_dump($step4_abilities);
// var_dump($step4_achievements);
// echo "</pre>";

$name = $step1_data[0]['first_name'] . " " . $step1_data[0]['last_name'];
$address = json_decode($step1_data[0]['location'], true);
$address = $address['area'] . ", " . $address['city'] . ", " . $address['state'];
$phone = $step1_data[0]['phone'];
$links = json_decode($step1_data[0]['links'], true);
// var_dump($links);
// var_dump($step2_data[0]);
$school_details_x = $step2_data[0]['step2_school_x_details'];
$school_details_x = json_decode($school_details_x, true);
$school_details_xii = $step2_data[0]['step2_school_xii_details'];
$school_details_xii = json_decode($school_details_xii, true);
$higher_education_details = $step2_data[0]['step2_higher_education_details'];
$higher_education_details = json_decode($higher_education_details, true);

usort($higher_education_details, function ($a, $b) {
    return $b['higherEducationJoiningDate'] <=> $a['higherEducationJoiningDate'];
});


// Step 4
// echo "<pre>";
// var_dump($step4_achievements);
// echo "</pre>";
foreach ($step4_achievements as $key => $value) {
    $step4_achievements[$key]['step4_details'] = json_decode($step4_achievements[$key]['step4_details'], true);
}
foreach ($step3_data as $key => $value) {
    $step3_data[$key]['step3_details'] = json_decode($step3_data[$key]['step3_details'], true);
}
// echo "<pre>";
// var_dump($step4_achievements);
// echo "</pre>";
// exit();
?>

<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        <?php include(__DIR__ . "/template1_css.php"); ?>
    </style>

</head>

<body>
    <section>


        <!-- Personal Details -->
        <div>

            <div>
                <p class="heading"><?php echo $name; ?> </p>



            </div>



            <table class="w-full">
                <tr>
                    <td class="align-top">
                        <?php echo $address; ?><br>
                        +91 <?php echo $phone; ?>
                    </td>
                    <td class="text-right">
                        <?php
                        foreach ($links as $link):

                            ?>
                            <a href="<?php echo $link; ?>"><?php echo $link; ?></a><br>
                        <?php endforeach; ?>
                    </td>
                </tr>
            </table>

            <br>
        </div>


        <!-- Work Experience Details -->
        <div>



            <?php
            // var_dump($step4_achievements);
            $isHeadingPrinted = false;
            foreach ($step3_data as $index => $value):


                if ($value['step3_entry_type'] == "job"):
                    $entryType = $value['step3_entry_type'];
                    // var_dump($value);
            
                    list($startMonth, $startYear) = explode('-', $value['step3_start_date']);
                    list($endMonth, $endYear) = explode('-', $value['step3_end_date']);

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
                    foreach ($months as $index => $name) {
                        if ($startMonth == $index) {
                            $startMonth = $name;
                        }
                        if ($endMonth == $index) {
                            $endMonth = $name;

                        }
                    }

                    if (!$isHeadingPrinted):

                        ?>
                        <table class="no-page-break w-full">

                            <table class="w-full" style="margin-top: 2px;">

                                <tr>
                                    <td colspan="2">

                                        <p class="heading">Experience </p>

                                        <p style="height: 1px; background-color: black; width: 100%;   margin:2px 0 10px 0"></p>
                                    </td>


                                </tr>
                            </table>
                            <table class="w-full">

                                <tr>
                                    <td>
                                        <p class="sub-heading"><?php echo $value['step3_details']["companyName"] ?></p>
                                    </td>
                                    <td style="text-align:right;">
                                        <p><?php echo $startMonth . " " . $startYear . " - " . $endMonth . " " . $endYear; ?></p>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td style="line-height: .6;">
                                        <p class="text-base">
                                            <?php echo $value['step3_details'][$entryType . 'Title']; ?>
                                        </p>
                                    </td>

                                </tr>
                            </table>

                            <table>
                                <tr>
                                    <td class="w-full" colspan="2">
                                        <ul>
                                            <li class="ml-4 text-base" style="line-height: .8;">
                                                <?php echo $value['step3_description']; ?>
                                            </li>
                                        </ul>

                                    </td>

                                </tr>
                            </table>
                        </table>


                        <?php
                        $isHeadingPrinted = true;
                    else: ?>
                        <table class="no-page-break w-full " style="margin:2px 0">

                            <table class="w-full">

                                <tr>
                                    <td>
                                        <a href="<?php echo $value['step3_details'][$entryType . 'Location'] ?>"
                                            class="sub-heading"><?php echo $value['step3_details'][$entryType . "Title"] ?></a>
                                    </td>
                                    <td style="text-align:right;">
                                        <p><?php echo $startMonth . " " . $startYear . " - " . $endMonth . " " . $endYear; ?></p>
                                    </td>
                                </tr>
                            </table>

                            <table>
                                <tr>
                                    <td class="w-full" colspan="2">
                                        <ul>
                                            <li class="ml-4 text-base" style="line-height: .9;">
                                                <?php echo $value['step3_description']; ?>
                                            </li>
                                        </ul>

                                    </td>

                                </tr>
                            </table>
                        </table>


                    <?php endif; endif; endforeach; ?>
            </table>




        </div>


        <!-- Projects Details -->
        <div>



            <?php
            // var_dump($step4_achievements);
            $isHeadingPrinted = false;
            foreach ($step3_data as $index => $value):


                if ($value['step3_entry_type'] == "project"):
                    $entryType = $value['step3_entry_type'];
                    // var_dump($value);
            
                    list($startMonth, $startYear) = explode('-', $value['step3_start_date']);
                    list($endMonth, $endYear) = explode('-', $value['step3_end_date']);

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
                    foreach ($months as $index => $name) {
                        if ($startMonth == $index) {
                            $startMonth = $name;
                        }
                        if ($endMonth == $index) {
                            $endMonth = $name;

                        }
                    }

                    if (!$isHeadingPrinted):

                        ?>
                        <table class="no-page-break w-full">

                            <table class="w-full" style="margin-top: 2px;">

                                <tr>
                                    <td colspan="2">

                                        <p class="heading">Projects </p>

                                        <p style="height: 1px; background-color: black; width: 100%;   margin:2px 0 10px 0"></p>
                                    </td>


                                </tr>
                            </table>
                            <table class="w-full">

                                <tr>
                                    <td>
                                        <a href="<?php echo $value['step3_details'][$entryType . 'Location'] ?>"
                                            class="sub-heading"><?php echo $value['step3_details'][$entryType . "Title"] ?></a>
                                    </td>
                                    <td style="text-align:right;">
                                        <p><?php echo $startMonth . " " . $startYear . " - " . $endMonth . " " . $endYear; ?></p>
                                    </td>
                                </tr>
                            </table>

                            <table>
                                <tr>
                                    <td class="w-full" colspan="2">
                                        <ul>
                                            <li class="ml-4 text-base" style="line-height: .9;">
                                                <?php echo $value['step3_description']; ?>
                                            </li>
                                        </ul>

                                    </td>

                                </tr>
                            </table>
                        </table>


                        <?php
                        $isHeadingPrinted = true;
                    else: ?>
                        <table class="no-page-break w-full " style="margin:2px 0">

                            <table class="w-full">

                                <tr>
                                    <td>
                                        <a href="<?php echo $value['step3_details'][$entryType . 'Location'] ?>"
                                            class="sub-heading"><?php echo $value['step3_details'][$entryType . "Title"] ?></a>
                                    </td>
                                    <td style="text-align:right;">
                                        <p><?php echo $startMonth . " " . $startYear . " - " . $endMonth . " " . $endYear; ?></p>
                                    </td>
                                </tr>
                            </table>

                            <table>
                                <tr>
                                    <td class="w-full" colspan="2">
                                        <ul>
                                            <li class="ml-4 text-base" style="line-height: .9;">
                                                <?php echo $value['step3_description']; ?>
                                            </li>
                                        </ul>

                                    </td>

                                </tr>
                            </table>
                        </table>


                    <?php endif; endif; endforeach; ?>
            </table>




        </div>

        <!-- Education Details -->
        <div>

            <div>
                <p class="heading">Education </p>

                <p style="height: 1px; background-color: black; width: 100%;   margin:2px 0 10px 0"></p>

            </div>
            <?php
            foreach ($higher_education_details as $key => $value):
                // echo $key;
                // echo "<pre>";
                // var_dump($value['courseName']);
                // echo "</pre>";
            
                ?>

                <table class="w-full " style="margin:10px 0">
                    <tr>
                        <td class="">
                            <!-- higherEducationInstituteName -->

                            <p class="sub-heading"><?php echo $value['courseName'] . " " . $value['branchName'] ?></p>
                            <p class="text-base">
                                <?php echo $value['higherEducationInstituteName']; ?>
                            </p>
                            <ul class="ml-4">
                                <li>CGPA: <?php echo $value['higherEducationCgpa']; ?></li>
                            </ul>

                        </td>
                        <td class="text-right align-top">

                            <p>April <?php echo $value['higherEducationJoiningDate']; ?> - March
                                <?php echo $value['higherEducationPassingDate']; ?>
                            </p>
                        </td>
                    </tr>
                </table>

            <?php endforeach; ?>

            <table class="w-full " style="margin:10px 0">
                <tr>
                    <td class="">

                        <p class="sub-heading">12th Passed from CBSE Board</p>
                        <p class="text-base">
                            <?php echo $school_details_xii['school_name']; ?><br>
                        </p>
                        <ul class="ml-4">
                            <li>Academic Marks: <?php echo $school_details_xii['percentage']; ?>%</li>
                        </ul>

                    </td>
                    <td class="text-right align-top">

                        <p>April <?php echo $school_details_xii['joining_date']; ?> - March
                            <?php echo $school_details_xii['passing_date']; ?>
                        </p>
                    </td>
                </tr>
            </table>
            <table class="w-full " style="margin:10px 0">
                <tr>
                    <td class="">

                        <p class="sub-heading">10th Passed from HBSE Board</p>
                        <p class="text-base">
                            <?php echo $school_details_x['school_name']; ?><br>
                        </p>
                        <ul class="ml-4">
                            <li>Academic Marks: <?php echo $school_details_x['percentage']; ?>%</li>
                        </ul>

                    </td>
                    <td class="text-right align-top">

                        <p>April <?php echo $school_details_x['joining_date']; ?> - March
                            <?php echo $school_details_x['passing_date']; ?>
                        </p>
                    </td>
                </tr>
            </table>
        </div>


        <!-- Skills Details -->
        <div>

            <table class="no-page-break w-full">
                <table class="w-full" style="margin-top: 2px;">
                    <tr>
                        <td colspan="2">
                            <p class="heading">Skills </p>
                            <p style="height: 1px; background-color: black; width: 100%;   margin:2px 0 10px 0"></p>
                        </td>
                    </tr>
                </table>
            </table>

            <table class="w-full" style="margin-left:20px;font-weight:bold;line-height:.9">

                <?php

                $i = 0;
                foreach ($step4_skills as $index => $value):
                    echo $index;
                    ?>

                    <tr>
                        <?php
                        if (isset($step4_skills[$i]['step4_name'])) {

                            ?>
                            <td>
                                <ul>
                                    <li>
                                        <?php echo $step4_skills[$i]['step4_name']; ?>
                                    </li>
                                </ul>

                            </td>
                            <?php
                        } else {
                            break;
                        }
                        $i++; ?>

                        <?php
                        if (isset($step4_skills[$i]['step4_name'])) {

                            ?>
                            <td>
                                <ul>
                                    <li>
                                        <?php echo $step4_skills[$i]['step4_name']; ?>
                                    </li>
                                </ul>

                            </td>
                            <?php
                        } else {
                            break;
                        }
                        $i++; ?>
                    </tr>

                    <?php
                endforeach; ?>

            </table>









        </div>



        <!-- Accomplishments Details -->
        <div>



            <?php
            // var_dump($step4_achievements);
            $isHeadingPrinted = false;
            foreach ($step4_achievements as $index => $value):


                if ($value['step4_entry_type'] == "accomplish"):

                    list($month, $year) = explode('-', $value['step4_date']);

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
                    foreach ($months as $index => $name) {
                        if ($month == $index) {
                            $month = $name;
                        }
                    }

                    if (!$isHeadingPrinted):

                        ?>
                        <table class="no-page-break w-full">

                            <table class="w-full" style="margin-top: 2px;">

                                <tr>
                                    <td colspan="2">

                                        <p class="heading">Accomplishments </p>

                                        <p style="height: 1px; background-color: black; width: 100%;   margin:2px 0 10px 0"></p>
                                    </td>


                                </tr>
                            </table>
                            <table class="w-full">

                                <tr>
                                    <td>
                                        <p class="sub-heading"><?php echo $value['step4_details']['name'] ?></p>
                                    </td>
                                    <td style="text-align:right;">
                                        <p><?php echo $month . " " . $year; ?></p>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td style="line-height: .5;">
                                        <p class="text-base">
                                            <?php echo $value['step4_details']['provider']; ?>
                                        </p>
                                    </td>

                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="w-full" colspan="2">
                                        <p class="text-base" style="line-height: .9;">
                                            <?php echo $value['step4_details']['description']; ?>
                                        </p>
                                    </td>

                                </tr>
                            </table>
                        </table>


                        <?php
                        $isHeadingPrinted = true;
                    else: ?>
                        <table class="no-page-break w-full " style="margin:2px 0">

                            <table class="w-full">

                                <tr>
                                    <td>
                                        <p class="sub-heading"><?php echo $value['step4_details']['name'] ?></p>
                                    </td>
                                    <td style="text-align:right;">
                                        <p><?php echo $month . " " . $year; ?></p>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td style="line-height: .5;">
                                        <p class="text-base">
                                            <?php echo $value['step4_details']['provider']; ?>
                                        </p>
                                    </td>

                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="w-full" colspan="2">
                                        <p class="text-base" style="line-height: .9;">
                                            <?php echo $value['step4_details']['description']; ?>
                                        </p>
                                    </td>

                                </tr>
                            </table>
                        </table>


                    <?php endif; endif; endforeach; ?>
            </table>




        </div>


        <!-- Certification Details -->
        <div>



            <?php
            // var_dump($step4_achievements);
            $isHeadingPrinted = false;
            foreach ($step4_achievements as $index => $value):


                if ($value['step4_entry_type'] == "certificate"):

                    list($month, $year) = explode('-', $value['step4_date']);

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
                    foreach ($months as $index => $name) {
                        if ($month == $index) {
                            $month = $name;
                        }
                    }

                    if (!$isHeadingPrinted):

                        ?>
                        <table class="no-page-break">

                            <table class="w-full" style="margin-top: 2px;">

                                <tr>
                                    <td colspan="2">

                                        <p class="heading">Certification </p>

                                        <p style="height: 1px; background-color: black; width: 100%;   margin:2px 0 10px 0"></p>
                                    </td>


                                </tr>
                            </table>
                            <table class="w-full">

                                <tr>
                                    <td>
                                        <p class="sub-heading"><?php echo $value['step4_details']['name'] ?></p>
                                    </td>
                                    <td style="text-align:right;">
                                        <p><?php echo $month . " " . $year; ?></p>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td style="line-height: .5;">
                                        <p class="text-base">
                                            <?php echo $value['step4_details']['provider']; ?>
                                        </p>
                                    </td>

                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="w-full" colspan="2">
                                        <p class="text-base" style="line-height: .9;">
                                            <?php echo $value['step4_details']['description']; ?>
                                        </p>
                                    </td>

                                </tr>
                            </table>
                        </table>


                        <?php
                        $isHeadingPrinted = true;
                    else: ?>
                        <table class="no-page-break w-full " style="margin:2px 0">

                            <table class="w-full">

                                <tr>
                                    <td>
                                        <p class="sub-heading"><?php echo $value['step4_details']['name'] ?></p>
                                    </td>
                                    <td style="text-align:right;">
                                        <p><?php echo $month . " " . $year; ?></p>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td style="line-height: .5;">
                                        <p class="text-base">
                                            <?php echo $value['step4_details']['provider']; ?>
                                        </p>
                                    </td>

                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="w-full" colspan="2">
                                        <p class="text-base" style="line-height: .9;">
                                            <?php echo $value['step4_details']['description']; ?>
                                        </p>
                                    </td>

                                </tr>
                            </table>
                        </table>


                    <?php endif; endif; endforeach; ?>
            </table>




        </div>

        <!-- Languuage -->
        <div>

            <div>
                <p class="heading">Language </p>

                <p style="height: 1px; background-color: black; width: 100%;   margin:2px 0 10px 0"></p>

            </div>


            <table class="w-full " style="margin:10px 0">
                <tr>
                    <td class="">
                        <ul class="ml-4">
                            <?php
                            foreach ($step4_abilities as $value):

                                if ($value['step4_entry_type'] == "lang"):
                                    // echo $value['step4_name'];
                                    ?>
                                    <li><?php echo $value['step4_name'] . " - " . $value['step4_level']; ?></li>
                                <?php endif;
                            endforeach; ?>
                        </ul>

                    </td>
                </tr>
            </table>



        </div>
    </section>
</body>

</html>