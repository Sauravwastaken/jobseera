<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('../parts/_dbconnect.php');


$user_id = $_SESSION['user_id'];

function fetchStepData($connect, $stepTable, $user_id, $column)
{
    $sql = "SELECT * FROM `$stepTable` WHERE $column = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);

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
$step4_achievements = fetchStepData($connect, 'step4_achievements', $user_id, 'step4_user_id');

// Example debug:
// echo "<pre>";
// var_dump($step1_data);
// var_dump($step2_data);
// var_dump($step3_data);
// var_dump($step4_abilities);
// var_dump($step4_achievements);
// echo "</pre>";

$first_name = $step1_data[0]['first_name'] . " " . $step1_data[0]['last_name'];
$address = json_decode($step1_data[0]['location'], true);
$address = $address['area'] . ", " . $address['city'] . ", " . $address['state'];
$phone = $step1_data[0]['phone'];
$links = json_decode($step1_data[0]['links'], true);
// var_dump($links);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        @font-face {
            font-family: "EBGaramond";
            src: url("../assets/fonts/EBGaramond/EBGaramond-ExtraBoldItalic.ttf") format("truetype");
            font-weight: 800;
            font-style: italic;
        }

        */ * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'EBGaramond', serif;
        }

        a {
            color: black;
        }
    </style>
</head>

<body>
    <section style="padding:20px 20px">


        <!-- Personal Details -->
        <div>
            <div>
                <p><?php echo $first_name; ?></p>
            </div>

            <table style="width:100%">
                <tr>
                    <td style="vertical-align: top;">
                        <?php echo $address; ?><br>
                        +91 <?php echo $phone; ?>
                    </td>
                    <td style="text-align:right">
                        <?php
                        foreach ($links as $link):

                            ?>
                            <a href="<?php echo $link; ?>"><?php echo $link; ?></a><br>
                        <?php endforeach; ?>



                    </td>
                </tr>


            </table>

        </div>

        <br>
        <br>
        <hr>
    </section>
</body>

</html>