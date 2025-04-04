<?php
include_once('../parts/_dbconnect.php');

$title = 'Build Your Resume - JobSeera';
$is_sub_folder = true;
$nav_included = true;
$form_step = 1;
include_once('../components/header.php');
include_once('../components/nav.php');
$showResult = false;

?>

<?php
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM `step1` WHERE step1_user_id = ?";
$stmt = mysqli_prepare($connect, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    if (!mysqli_stmt_execute($stmt)) {
        echo "Error in executing query" . mysqli_error($connect);
    } else {
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {


            extract($row);

            $locationArray = json_decode($location, true);
            $linksArray = json_decode($links, true);
            if ($linksArray) {
                $showResult = true;
            }
        }



    }
} else {
    echo "Could not prepare ";
}

?>

<form action="../parts/_step<?php echo $form_step; ?>_handle.php" method="POST">
    <section class="site-padding py-8">
        <?php include_once('../components/resume_builder_header.php'); ?>

        <!-- Main form container -->
        <div class="border border-theme_border_gray py-4 rounded-lg">
            <div class="px-8">
                <p class="my-4 text-lg">Personal Details</p>

                <div class="space-y-6">
                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">First Name:</label>
                            <input class="resume-form-input" type="text" id="first-name" name="first-name"
                                value="<?php echo isset($first_name) ? $first_name : '' ?>" required />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="last-name" class="resume-form-label">Last Name:</label>
                            <input class="resume-form-input" type="text" id="last-name" name="last-name"
                                value="<?php echo isset($last_name) ? $last_name : '' ?>" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="phone" class="resume-form-label">Phone No:</label>
                            <input class="resume-form-input" type="tel" id="phone" name="phone"
                                value="<?php echo isset($phone) ? $phone : '' ?>" required />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="email" class="resume-form-label">Email Id:</label>
                            <input class="resume-form-input" type="email" id="email" name="email"
                                value="<?php echo isset($email) ? $email : '' ?>" required />
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8">
                <p class="my-4 text-lg">Location</p>

                <div class="space-y-6">
                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="location-state" class="resume-form-label">State:</label>
                            <input list="states" class="resume-form-input" type="text" id="location-state"
                                name="location-state"
                                value="<?php echo isset($locationArray['state']) ? $locationArray['state'] : '' ?>" />
                            <datalist id="states">
                                <option value="Andhra Pradesh"></option>
                                <option value="Arunachal Pradesh"></option>
                                <option value="Assam"></option>
                                <option value="Bihar"></option>
                                <option value="Chhattisgarh"></option>
                                <option value="Goa"></option>
                                <option value="Gujarat"></option>
                                <option value="Haryana"></option>
                                <option value="Himachal Pradesh"></option>
                                <option value="Jharkhand"></option>
                                <option value="Karnataka"></option>
                                <option value="Kerala"></option>
                                <option value="Madhya Pradesh"></option>
                                <option value="Maharashtra"></option>
                                <option value="Manipur"></option>
                                <option value="Meghalaya"></option>
                                <option value="Mizoram"></option>
                                <option value="Nagaland"></option>
                                <option value="Odisha"></option>
                                <option value="Punjab"></option>
                                <option value="Rajasthan"></option>
                                <option value="Sikkim"></option>
                                <option value="Tamil Nadu"></option>
                                <option value="Telangana"></option>
                                <option value="Tripura"></option>
                                <option value="Uttar Pradesh"></option>
                                <option value="Uttarakhand"></option>
                                <option value="West Bengal"></option>
                            </datalist>
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="location-city" class="resume-form-label">City:</label>
                            <input class="resume-form-input" type="text" id="location-city" name="location-city"
                                value="<?php echo isset($locationArray['city']) ? $locationArray['city'] : ''; ?>" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="location-area" class="resume-form-label">Area / Locality:</label>
                            <input class="resume-form-input" type="text" id="location-area" name="location-area"
                                value="<?php echo isset($locationArray['area']) ? $locationArray['area'] : '' ?> " />
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8">
                <p class="my-4 text-lg">Links</p>

                <div class="space-y-6" id="linkAddDataContainer">
                    <!-- Row -->
                    <div class="flex w-full space-x-4">
                        <div class="flex flex-col flex-grow-0">
                            <select class="resume-form-input" name="link-select" id="link-select">
                                <option value="" disabled selected>Select</option>

                                <option id="select-option-1" value="Linkedin" class="link-id-1">Linkedin</option>
                                <option id="select-option-2" value="Github" class="link-id-2">Github</option>
                                <option id="select-option-3" value="Portfolio" class="link-id-3">Portfolio</option>
                                <option id="select-option-4" value="Instagram" class="link-id-4">Instagram</option>
                                <option id="select-option-5" value="LeetCode" class="link-id-5">LeetCode</option>
                                <option id="select-option-6" value="Behance" class="link-id-6">Behance</option>
                                <option id="select-option-7" value="Other" class="link-id-7">Other</option>
                            </select>
                        </div>
                        <div class="flex flex-col w-5/12">
                            <input class="resume-form-input" type="text" name="link-select-input" id="link-select-input"
                                placeholder="Link" />
                        </div>
                        <div class="flex flex-col flex-grow-0">
                            <a id="linkSelectBtn" class="bg-theme_green text-white px-4 py-2 rounded-lg">
                                Add
                            </a>
                        </div>
                    </div>

                    <!-- Added Data -->
                    <template id="linkSelectTemplate">

                        <div class="flex w-full space-x-0">
                            <div class="flex flex-col single-input-row-lg space-y-2">
                                <label class="resume-form-label"></label>
                                <input class="resume-form-input" type="text" value="" />
                                <input class="hidden link-id" type="text">
                            </div>
                        </div>
                    </template>

                    <?php
                    if ($showResult) {
                        $sno = 1;
                        // $count = count($linksArray);
                        foreach ($linksArray as $links => $link) {
                            // echo $links;
                            // echo $link;
                            $id = substr($links, -1);
                            switch ($id) {
                                case 1:
                                    $linkName = "Linkedin";
                                    break;

                                case 2:
                                    $linkName = "Github";
                                    break;

                                case 3:
                                    $linkName = "Portfolio";
                                    break;

                                case 4:
                                    $linkName = "Instagram";
                                    break;

                                case 5:
                                    $linkName = "LeetCode";
                                    break;

                                case 6:
                                    $linkName = "Behance";
                                    break;

                                case 7:
                                    $linkName = "Link";
                                    break;

                                default:
                                    $linkName = "Link";
                                    break;
                            }

                            ?>
                            <div class="flex w-full space-x-0">
                                <div class="flex flex-col single-input-row-lg space-y-2">

                                    <label class="resume-form-label" for="<?php echo $links; ?>"><?php echo $linkName; ?></label>
                                    <input class="resume-form-input" type="text" value="<?php echo $link ?>"
                                        name="<?php echo $links; ?>">
                                    <input class="hidden link-id" type="text" name="link-id-sno-<?php echo $sno; ?>"
                                        value="<?php echo $id; ?>">
                                </div>
                            </div>
                            <?php $sno++;
                        }
                    } ?>
                </div>
            </div>
        </div>

        <?php include_once('../components/resume_builder_submit.php'); ?>
    </section>
</form>

<script src="../assets/js/step1.js"></script>
<?php
include_once('../components/footer.php');
?>