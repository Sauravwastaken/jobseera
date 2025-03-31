<?php
    $title = 'Build Your Resume - JobSeera';
    $is_sub_folder = true;
 
    $form_step = 3;
    include_once('../components/header.php');
    include_once('../components/nav.php'); 

?>

<form action="">
    <section class="site-padding py-8">
        <?php include_once('../components/resume_builder_header.php') ;?>

        <!-- Main form container -->
        <div class="border border-theme_border_gray py-4 rounded-lg">
            <div class="px-8">
                <p class="my-4 text-lg">Work Experience</p>

                <div class="space-y-6">
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
                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Company / Organization Name:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Location:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Employment Type:</label>
                            <select class="resume-form-input" name="" id="">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Start Date:</label>

                            <div class="flex resume-form-input px-0">
                                <select class="flex-grow px-2 bg-theme_bg_light_yellow" name="" id="">

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
                                <select class="flex-grow px-2 bg-theme_bg_light_yellow" name="" id="">
                                    <?php
                                            $startYear = 1925;
                                            $currentYear = date("Y");
                                        
                                            for ($year = $currentYear + 1; $year >= $startYear; $year--) {
                                                if($year == $currentYear) {
                                                    echo "<option value=\"$year\" selected>$year</option>";
                                                } else{
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
                                <select class="flex-grow px-2 bg-theme_bg_light_yellow" name="" id="">

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
                                <select class="flex-grow px-2 bg-theme_bg_light_yellow" name="" id="">
                                    <?php
                                            $startYear = 1925;
                                            $currentYear = date("Y");
                                        
                                            for ($year = $currentYear + 1; $year >= $startYear; $year--) {
                                                if($year == $currentYear) {
                                                    echo "<option value=\"$year\" selected>$year</option>";
                                                } else{
                                                    echo "<option value=\"$year\">$year</option>";
                                                }
                                               
                                            }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Technology Used:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow-[0 single-input-row">
                            <label for="first-name" class="resume-form-label">Responsibilites:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex">
                        <button class="bg-theme_green text-white px-4 py-2 rounded-lg">
                            Add
                        </button>
                    </div>

                    <!-- Added Data -->

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Job Title / Role:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Company / Organization Name:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Location:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Employment Type:</label>
                            <select class="resume-form-input" name="" id="">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Start Date:</label>
                            <input class="resume-form-input" type="tel" required />
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">End Date:</label>
                            <input class="resume-form-input" type="date" required />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Technology Used:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow-[0 single-input-row">
                            <label for="first-name" class="resume-form-label">Responsibilites:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8">
                <p class="my-4 text-lg">Projects</p>

                <div class="space-y-6">
                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Project Name:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Technology Used:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Project Link:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Project Type:</label>
                            <select class="resume-form-input" name="" id="">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Start Date:</label>
                            <input class="resume-form-input" type="tel" required />
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">End Date:</label>
                            <input class="resume-form-input" type="date" required />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow-[0 single-input-row">
                            <label for="first-name" class="resume-form-label">Features / Description:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex">
                        <button class="bg-theme_green text-white px-4 py-2 rounded-lg">
                            Add
                        </button>
                    </div>

                    <!-- Added Data -->

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Project Name:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Technology Used:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Project Link:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Project Type:</label>
                            <select class="resume-form-input" name="" id="">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Start Date:</label>
                            <input class="resume-form-input" type="tel" required />
                        </div>
                        <div class="flex flex-col single-input-row-xs">
                            <label for="first-name" class="resume-form-label">End Date:</label>
                            <input class="resume-form-input" type="date" required />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow-[0 single-input-row">
                            <label for="first-name" class="resume-form-label">Features / Description:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once('../components/resume_builder_submit.php'); ?>
    </section>
</form>

<?php
    include_once('../components/footer.php');
?>