<nav class="flex justify-between items-center site-padding py-10">
    <div class="w-full">
        <a href="#" class="font-semibold text-2xl">JobSeera</a>
    </div>
    <ul class="flex space-x-4 w-full justify-center text-lg text-theme_dim_gray">
        <li>
            <a href="<?php echo isset($is_sub_folder) ? '../' : ''?>index.php"
                class="hover:text-black transition-colors duration-200">
                Home
            </a>
        </li>
        <li>
            <a href="#" class="hover:text-black transition-colors duration-200">
                About
            </a>
        </li>
        <li>
            <a href="#" class="hover:text-black transition-colors duration-200">
                Templates
            </a>
        </li>
        <li>
            <a href="#" class="hover:text-black transition-colors duration-200">
                Contact
            </a>
        </li>
    </ul>

    <ul class="flex items-center space-x-6 justify-end w-full">
        <?php
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
              
?>
        <a href="<?php echo isset($is_sub_folder) ? '../' : ''?>parts/_logout.php"
            class="<?php echo (isset($nav_included) && $nav_included) ? 'bg-theme_green text-white' : 'bg-white'; ?> px-4 py-2 rounded-lg">Log
            out</a>
        <?php } else { ?>
        <a href="login.php"
            class="<?php echo (isset($nav_included) && $nav_included) ? 'text-black' : 'text-white'; ?>">Log in</a>
        <a href="signup.php"
            class="<?php echo (isset($nav_included) && $nav_included) ? 'bg-theme_green text-white' : 'bg-white'; ?> px-4 py-2 rounded-lg">Sign
            up</a>
        <?php } ?>
    </ul>
</nav>