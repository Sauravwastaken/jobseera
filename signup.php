<?php
session_start();
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    header('location: index.php');
    exit();
}
$title = 'Signup - JobSeera';
include_once('components/header.php');

$nav_included = true;
include_once('components/nav.php');

include_once('parts/_google_config.php');

$client->addScope("email");
$client->addScope("profile");

$url = $client->createAuthUrl();


?>

<section class="site-padding flex justify-between py-20 h-[80vh]">
    <div class="flex flex-col items-center justify-center basis-1/2 2md:basis-full">
        <div class="w-7/12 flex justify-center flex-col text-center 2xl:w-9/12 xl:11/12 ">
            <h1 class="text-4xl font-medium">Create an Account</h1>
            <p class="text-theme_dim_gray text-sm font-medium my-2">
                Welcome to JobSeera
            </p>

            <p class="text-red-500 font-medium" id="errorMsgSignUp">

                <?php echo isset($_GET['error_msg_signup']) ? $_GET['error_msg_signup'] : ''; ?>

            </p>

            <form id="SignupForm" class="loginSignupForm" action="parts/_signup_handle.php" method="post">
                <a href="<?php echo $url; ?>"
                    class="flex items-center justify-center border-2 border-theme_gray p-2 rounded-lg space-x-2 my-4 2md:w-fit 2md:mx-auto 2md:px-12 sm:px-6">
                    <img class="w-6 h-6"
                        src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-webinar-optimizing-for-success-google-business-webinar-13.png"
                        alt="google logo" />
                    <p class="text-sm">Sign up with google</p>
                </a>

                <div class="relative my-2">
                    <span
                        class="absolute h-[2px] w-4/5 bg-theme_gray left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 -z-10"></span>
                    <p class="bg-theme_bg_light_yellow w-fit block mx-auto px-6 py-2 z-10">
                        or
                    </p>
                </div>

                <div class="flex flex-col space-y-4 text-theme_dim_gray font-semibold my-4">
                    <ul class="text-red-500 font-medium" id="errorMsgP">
                        <li>
                            <?php echo isset($_GET['error_msg']) ? $_GET['error_msg'] : ''; ?>
                        </li>
                    </ul>
                    <input class="bg-theme_bg_light_yellow border border-theme_gray p-2 rounded-lg focus:outline-none"
                        type="text" name="user-name" id="user-name" placeholder="Your name" max-length="50"
                        title="Please enter only letters"
                        value="<?php echo isset($_GET['user_name']) ? $_GET['user_name'] : ''; ?>" required />
                    <input class="bg-theme_bg_light_yellow border border-theme_gray p-2 rounded-lg focus:outline-none"
                        type="email" name="user-email" id="user-email" placeholder="Your email"
                        value="<?php echo isset($_GET['user_email']) ? $_GET['user_email'] : ''; ?>" required />
                    <div class="relative">
                        <input
                            class="w-full bg-theme_bg_light_yellow border border-theme_gray p-2 rounded-lg focus:outline-none"
                            type="password" name="user-password" id="user-password" placeholder="Your password"
                            required />

                        <i class="absolute right-5 top-1/2 -translate-y-1/2 z-10 stroke-theme_dim_gray stroke-[1.5px] w-5 h-5"
                            id="signUpShowPassword" data-feather="eye"></i>
                        <i class="absolute right-5 top-1/2 -translate-y-1/2 z-10 stroke-theme_dim_gray stroke-[1.5px] w-5 h-5 hidden"
                            id="signUpHidePassword" data-feather="eye-off"></i>
                    </div>
                </div>
                <button type="submit" class="w-4/5 px-8 py-2 rounded-lg bg-[#50958C] text-white mt-4 mb-2">
                    Create Account
                </button>
            </form>
            <p class=" text-theme_dim_gray">
                Already have an account?
                <a href="login.php" class="text-black">Log in</a>
            </p>
        </div>
    </div>
    <!-- Image Container -->
    <div class="basis-1/2 2md:hidden">
        <img class="w-full h-full object-cover" src="assets/images/signup-hero.jpg" alt="signup hero" />
    </div>
</section>


<?php
include_once('components/footer_scripts.php');
?>
<script src="assets/js/script.js"></script>
<?php
include_once('components/footer.php');

?>