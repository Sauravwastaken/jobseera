<?php
    $title = 'Build Your Resume - JobSeera';
    $is_sub_folder = true;
 
    $form_step = 4;

    include_once('../components/header.php');
    include_once('../components/nav.php'); 

?>

<form action="">
    <section class="site-padding py-8">
        <?php include_once('components/resume_builder_header.php') ;?>

        <!-- Main form container -->
        <div class="border border-theme_border_gray py-4 rounded-lg">
            <div class="px-8">
                <p class="my-4 text-lg">Skills</p>

                <div class="space-y-6">

                    <!-- Row -->
                    <div class="flex w-full  space-x-4 items-end">

                        <div class="flex flex-col w-5/12">
                            <label for="first-name" class="resume-form-label">Skills:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-0">
                            <label for="first-name" class="resume-form-label">Profiency:</label>
                            <select class="resume-form-input" name="" id="">
                                <option value="">Select</option>

                                <option value="">Instagram</option>
                                <option value="">Facebook</option>
                                <option value="">Other</option>
                            </select>
                        </div>
                        <div class="flex flex-col flex-grow-0">
                            <button class="bg-theme_green text-white px-4 py-2 rounded-lg">
                                Add
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8">
                <p class="my-4 text-lg">Accomplishments</p>

                <div class="space-y-6">
                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Title / Achievement:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Organization / Event Name:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Date / Year:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow-[0 single-input-row">
                            <label for="first-name" class="resume-form-label"> Description:</label>

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
                            <label for="first-name" class="resume-form-label">Title / Achievement:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Organization / Event Name:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Date / Year:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow-[0 single-input-row">
                            <label for="first-name" class="resume-form-label"> Description:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>

            <div class="px-8">
                <p class="my-4 text-lg">Certifications</p>

                <div class="space-y-6">
                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Certification Name:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Issuing Organization:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Date / Year:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow-[0 single-input-row">
                            <label for="first-name" class="resume-form-label"> Description:</label>

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
                            <label for="first-name" class="resume-form-label">Certification Name:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="first-name" class="resume-form-label">Issuing Organization:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-[2]">
                            <label for="first-name" class="resume-form-label">Date / Year:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="flex w-full space-x-8">
                        <div class="flex flex-col flex-grow-[0 single-input-row">
                            <label for="first-name" class="resume-form-label"> Description:</label>

                            <input class="resume-form-input" type="text" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative my-6 h-2">
                <span class="resume-form-divider"></span>
            </div>
            <div class="px-8">
                <p class="my-4 text-lg">Language</p>

                <div class="space-y-6">

                    <!-- Row -->
                    <div class="flex w-full  space-x-4 items-end">

                        <div class="flex flex-col w-5/12">
                            <label for="first-name" class="resume-form-label">Language:</label>
                            <input class="resume-form-input" type="text" />
                        </div>
                        <div class="flex flex-col flex-grow-0">
                            <label for="first-name" class="resume-form-label">Profiency:</label>
                            <select class="resume-form-input" name="" id="">
                                <option value="">Select</option>

                                <option value="">Instagram</option>
                                <option value="">Facebook</option>
                                <option value="">Other</option>
                            </select>
                        </div>
                        <div class="flex flex-col flex-grow-0">
                            <button class="bg-theme_green text-white px-4 py-2 rounded-lg">
                                Add
                            </button>
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