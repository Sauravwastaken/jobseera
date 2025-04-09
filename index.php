<?php
include_once 'config.paths.php';

include_once('components/header.php');
include_once('components/nav.php');


?>

<section class="site-padding h-[680px]">
    <div class="flex flex-col justify-center h-full space-y-6">
        <h1 class="text-6xl leading-snug">
            Unlock Your <br />Career with <br />the Right Key
        </h1>
        <p class="text-lg text-theme_dim_gray">
            Your next big opportunity is just one <br />
            powerful resume away—make it count
        </p>
        <ul class="flex items-center space-x-6">
            <a href="form/step1.php" class="bg-theme_orange text-white px-4 py-2 rounded-lg">Get Started</a>
            <a href="#" class="underline">Know more</a>
        </ul>
    </div>
    <div class="bg-theme_green h-[800px] w-[600px] -z-10 absolute top-0 right-0">
        <div class="absolute bottom-0 -left-[400px] w-[600px] h-[550px]">
            <img class="h-full w-full object-cover rounded-3xl" src="assets/images/hero.jpg" alt="" />
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="bg-theme_gray mt-20 site-padding pb-96">
    <div class="flex justify-center items-center py-12">
        <h2 class="text-4xl">Why Choose JobSeera?</h2>
    </div>
    <!-- Cards -->

    <div>
        <!-- Cards container -->
        <div class="flex justify-between flex-wrap">
            <!-- Card 1 -->
            <div
                class="bg-white flex-1 flex items-center justify-center text-center flex-col h-80 m-4 rounded-xl shadow-lg">
                <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                    <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                </div>
                <p class="text-2xl my-2 font-medium">ATS-Friendly Resumes</p>
                <p class="text-theme_dim_gray w-4/5 font-medium">
                    Generates resumes optimized for Applicant Tracking Systems (ATS) to ensure better parsing and
                    higher chances of getting noticed by recruiters.
                </p>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white flex-1 flex items-center justify-center text-center flex-col h-80 m-4 rounded-xl shadow-lg">
                <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                    <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                </div>
                <p class="text-2xl my-2 font-medium">Customizable Templates</p>
                <p class="text-theme_dim_gray w-4/5 font-medium">
                    Offers multiple resume templates with customizable sections, fonts, and layout options to suit
                    individual preferences.
                </p>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-white flex-1 flex items-center justify-center text-center flex-col h-80 m-4 rounded-xl shadow-lg">
                <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                    <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                </div>
                <p class="text-2xl my-2 font-medium">Real-Time Preview</p>
                <p class="text-theme_dim_gray w-4/5 font-medium">
                    Provides a live preview of the resume while editing, allowing users to see the changes
                    instantly.
                </p>
            </div>
        </div>
        <div class="flex justify-between flex-wrap">

            <!-- Card 4 -->
            <div
                class="bg-white flex-1 flex items-center justify-center text-center flex-col h-80 m-4 rounded-xl shadow-lg">
                <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                    <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                </div>
                <p class="text-2xl my-2 font-medium">Multiple Export Options</p>
                <p class="text-theme_dim_gray w-4/5 font-medium">
                    Allows exporting resumes in PDF and DOCX formats, making it easy to share or upload.
                </p>
            </div>

            <!-- Card 5 -->
            <div
                class="bg-white flex-1 flex items-center justify-center text-center flex-col h-80 m-4 rounded-xl shadow-lg">
                <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                    <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                </div>
                <p class="text-2xl my-2 font-medium">Skill-Based Highlighting</p>
                <p class="text-theme_dim_gray w-4/5 font-medium">
                    Emphasizes key skills in a dedicated section, enhancing the visibility of strengths.
                </p>
            </div>

            <!-- Card 6 -->
            <div
                class="bg-white flex-1 flex items-center justify-center text-center flex-col h-80 m-4 rounded-xl shadow-lg">
                <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                    <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                </div>
                <p class="text-2xl my-2 font-medium">User-Friendly Interface</p>
                <p class="text-theme_dim_gray w-4/5 font-medium">
                    Clean, intuitive, and responsive UI, making it easy for users to create resumes quickly and
                    efficiently.
                </p>
            </div>
        </div>


    </div>
    </div>
</section>

<?php include_once('components/footer.php'); ?>