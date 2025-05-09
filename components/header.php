<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($title) ? $title : 'JobSeera'; ?></title>
    <link rel="stylesheet" href="<?php echo isset($is_sub_folder) ? '../' : '' ?>assets/css/style.css" />

    <link rel="shortcut icon" href="<?php echo isset($is_sub_folder) ? '../' : '' ?>assets/images/logo.webp"
        type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />



</head>

<body class="bg-theme_bg_light_yellow font-urbanist">