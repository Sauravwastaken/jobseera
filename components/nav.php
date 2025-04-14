<nav class="flex justify-between items-center site-padding py-10">
    <a href="<?php echo isset($is_sub_folder) ? '../' : '' ?>index.php" class="w-full flex items-center space-x-2">
        <img class="w-12 h-12" src="<?php echo isset($is_sub_folder) ? '../' : '' ?>assets/images/logo.png" alt="logo">
        <p class="font-semibold text-2xl">JobSeera</p>
    </a>
    <ul class="flex space-x-4 w-full justify-center text-lg text-theme_dim_gray lg:hidden">
        <li>
            <a href="<?php echo isset($is_sub_folder) ? '../' : '' ?>index.php"
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
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {

            ?>
            <a href="<?php echo isset($is_sub_folder) ? '../' : '' ?>parts/_logout.php"
                class="<?php echo (isset($nav_included) && $nav_included) ? 'bg-theme_green text-white' : 'bg-white'; ?> px-4 py-2 rounded-lg lg:bg-theme_green text-white">Log
                out</a>
        <?php } else { ?>
            <a href="login.php"
                class="<?php echo (isset($nav_included) && $nav_included) ? 'text-black' : 'text-white'; ?>lg:text-black">Log
                in</a>
            <a href="signup.php"
                class="<?php echo (isset($nav_included) && $nav_included) ? 'bg-theme_green text-white' : 'bg-white'; ?> px-4 py-2 rounded-lg lg:bg-theme_green lg:text-white">Sign
                up</a>
        <?php } ?>
    </ul>
</nav>