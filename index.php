<?php
include_once 'config.paths.php';

include_once('components/header.php');
include_once('components/nav.php');


?>

<section class="site-padding h-[680px] lg:flex lg:flex-col-reverse lg:h-auto lg:py-12">
    <div class="flex flex-col justify-center h-full space-y-6 lg:h-auto lg:py-12 lg:text-center">
        <h1 class="text-6xl leading-snug xl:text-5xl xl:leading-snug  md:text-4xl sm:text-3xl ">
            Unlock Your <br class="lg:hidden"/>Career with <br  />the Right Key
        </h1>
        <p class="text-lg text-theme_dim_gray">
            Your next big opportunity is just one <br />
            powerful resume away—make it count
        </p>
        <ul class="flex items-center space-x-6 lg:justify-center">
            <?php

            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
                $href = 'form/step1.php';
            } else {
                $href = 'signup.php';

            }
            ?>
            <a href="<?php echo $href; ?>" class=" bg-theme_orange text-white px-4 py-2 rounded-lg">Get Started</a>
            <a href="#" class="underline">Know more</a>
        </ul>
    </div>
    <div class="bg-theme_green h-[800px] w-[600px] max-w-[30%] -z-10 absolute top-0 right-0 lg:relative lg:flex lg:justify-center lg:max-w-full lg:h-full lg:w-full lg:bg-theme_bg_light_yellow  ">
        <div
            class="absolute bottom-0 -left-[400px] w-[600px] h-[550px] 3xl:-left-[350px] 2xl:-left-[300px] xl:w-[550px] xl:h-[550px] xl:-left-[300px] 2lg:w-[500px] 2lg:h-[550px] 2lg:-left-[250px] lg:relative lg:left-0  sm:h-[350px] xs:h[300px]">
            <img class="h-full w-full object-cover rounded-3xl  " src="assets/images/hero.webp" alt="" />
        </div>
    </div>
</section>
<?php
if (isset($nothing)) {
    ?>
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
                <div class="landing-card ">
                    <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                        <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                    </div>
                    <p class="text-2xl my-2 font-medium w-max">ATS-Friendly Resumes</p>
                    <p class="text-theme_dim_gray w-4/5 font-medium">
                        Generates resumes optimized for Applicant Tracking Systems (ATS) to ensure better parsing and
                        higher chances of getting noticed by recruiters.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="landing-card">
                    <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                        <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                    </div>
                    <p class="text-2xl my-2 font-medium w-max">Customizable Templates</p>
                    <p class="text-theme_dim_gray w-4/5 font-medium">
                        Offers multiple resume templates with customizable sections, fonts, and layout options to suit
                        individual preferences.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="landing-card">
                    <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                        <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                    </div>
                    <p class="text-2xl my-2 font-medium w-max">Real-Time Preview</p>
                    <p class="text-theme_dim_gray w-4/5 font-medium">
                        Provides a live preview of the resume while editing, allowing users to see the changes
                        instantly.
                    </p>
                </div>
            </div>
            <div class="flex justify-between flex-wrap">

                <!-- Card 4 -->
                <div class="landing-card">
                    <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                        <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                    </div>
                    <p class="text-2xl my-2 font-medium w-max">Multiple Export Options</p>
                    <p class="text-theme_dim_gray w-4/5 font-medium">
                        Allows exporting resumes in PDF and DOCX formats, making it easy to share or upload.
                    </p>
                </div>

                <!-- Card 5 -->
                <div class="landing-card">
                    <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                        <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                    </div>
                    <p class="text-2xl my-2 font-medium w-max">Skill-Based Highlighting</p>
                    <p class="text-theme_dim_gray w-4/5 font-medium">
                        Emphasizes key skills in a dedicated section, enhancing the visibility of strengths.
                    </p>
                </div>

                <!-- Card 6 -->
                <div class="landing-card">
                    <div class="bg-theme_gray border-[.1px] border-gray-300 p-6 rounded-full mb-6">
                        <img class="w-9 h-9" src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="" />
                    </div>
                    <p class="text-2xl my-2 font-medium w-max">User-Friendly Interface</p>
                    <p class="text-theme_dim_gray w-4/5 font-medium">
                        Clean, intuitive, and responsive UI, making it easy for users to create resumes quickly and
                        efficiently.
                    </p>
                </div>
            </div>


        </div>
        </div>
    </section>
<?php } ?>
<section class="site-padding py-32 flex justify-between w-full lg:flex-col lg:py-8 ">
    <div class="flex  flex-col flex-1 ">
        <img class="w-1/2 shadow-sm shadow-theme_dim_gray lg:mx-auto 2md:w-3/5 sm:w-4/5 xs:w-11/12" src="assets/images/resume.jpg" alt="resume">
    </div>
    <div class="flex  flex-col flex-1 justify-around lg:justify-center lg:text-center lg:space-y-8">
        <div class="lg:py-10">

            <h2 class="text-4xl leading-snug md:text-3xl sm:2xl xs:xl">Resume builder designed to maximize ATS score and visibility</h2>
            <p class="text-lg my-4 text-theme_dim_gray">Smart suggestions and powerful formatting built into every step.</p>
<?php 
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) { 
$href = 'form/step1.php'; 
} else { 
$href= 'signup.php';
}
?>
            <a href="<?php echo $href; ?>" class="flex items-center lg:justify-center bg-theme_orange text-white px-4 py-2 rounded-lg w-fit lg:mx-auto">
                <p class="">

                    Create your resume now
                </p>
                <i class="w-4 h-4" data-feather="chevron-right"></i>
            </a>
        </div>

        <div>
            <ul class="flex gap-x-8 text-center lg:justify-center sm:flex-col sm:gap-y-8 py-8">
                <li class="leading-[2.5]">
                    <p class="text-2xl ">97+</p>
                    <p class="text-theme_dim_gray">ATS Score</p>
                </li>
                <li class="relative">  
                    <p class="absolute w-[2px] h-full bg-theme_gray top-0 sm:w-1/5 sm:-translate-x-1/2 sm:left-1/2 sm:h-[2px]"></p>
                </li>
                <li class="leading-[2.5]">
                    <p class="text-2xl ">3x</p>
                    <p class="text-theme_dim_gray">Job opportunities</p>
                </li>
                <li class="relative">  
                    <p class="absolute w-[2px] h-full bg-theme_gray top-0 sm:w-1/5 sm:-translate-x-1/2 sm:left-1/2 sm:h-[2px]"></p>
                </li>
                <li class="leading-[2.5]">
                    <p class="text-2xl ">&lt; 5 min</p>
                    <p class="text-theme_dim_gray">Resume ready</p>
                </li>
            </ul>
        </div>
    </div>
</section>

<?php
include_once('components/footer_scripts.php');
include_once('components/footer.php');

?>
