<?php
    $title = 'Build Your Resume - JobSeera';

    $is_sub_folder = true;
 
    $form_step = 2;
    include_once('../components/header.php');
    include_once('../components/nav.php'); 

?>

<form action="">
    <section class="site-padding py-8">
        <?php include_once('components/resume_builder_header.php') ;?>

        <!-- Main form container -->
        <div class="border border-theme_border_gray py-4 rounded-lg">
            <div class="px-8">
                <p class="my-4 text-lg">Schooling</p>

                <div class="space-y-6">
                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Qualification:</label>
                            <input class="resume-form-input" type="text"
                                value="<?php echo isset($_SESSION['first-name']) ? $_SESSION['first-name'] : '' ?>"
                                required />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Institution Name:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">CGPA:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col  single-input-row-xs ">
                            <label for="first-name" class="resume-form-label">Year of Joining:</label>
                            <input class="resume-form-input" type="tel" required />
                        </div>
                        <div class="flex flex-col  single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Year of Passing:</label>
                            <input class="resume-form-input" type="email" required />
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8">
                <p class="my-4 text-lg">Higher Education</p>

                <div class="space-y-6">
                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Qualification:</label>
                            <select class="resume-form-input" name="" id="">
                                <option value="">Select</option>
                            </select>

                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Course Name:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Branch:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">CGPA:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col  flex-grow ">

                            <label for="first-name" class="resume-form-label">Institution Name:</label>
                            <input class="resume-form-input" type="tel" required />
                        </div>
                        <div class="flex flex-col  single-input-row-xs ">
                            <label for="first-name" class="resume-form-label">Year of Joining:</label>
                            <input class="resume-form-input" type="tel" required />
                        </div>
                        <div class="flex flex-col  single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Year of Passing:</label>
                            <input class="resume-form-input" type="email" required />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex">
                        <button class="bg-theme_green text-white px-4 py-2 rounded-lg">
                            Add
                        </button>
                    </div>
                </div>
            </div>

            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8">

                <div class="space-y-6">
                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Qualification:</label>
                            <select class="resume-form-input" name="" id="">
                                <option value="">Select</option>
                            </select>

                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Course Name:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Branch:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">CGPA:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col  flex-grow ">

                            <label for="first-name" class="resume-form-label">Institution Name:</label>
                            <input class="resume-form-input" type="tel" required />
                        </div>
                        <div class="flex flex-col  single-input-row-xs ">
                            <label for="first-name" class="resume-form-label">Year of Joining:</label>
                            <input class="resume-form-input" type="tel" required />
                        </div>
                        <div class="flex flex-col  single-input-row-xs">
                            <label for="first-name" class="resume-form-label">Year of Passing:</label>
                            <input class="resume-form-input" type="email" required />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once('components/resume_builder_submit.php'); ?>

    </section>
</form>

<?php
    include_once('components/footer.php');
?>