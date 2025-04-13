<h1 class="mx-auto w-fit text-5xl text-center">Create a Resume</h1>
<!-- Progress bar -->

<div class="flex justify-between py-6 relative">
    <?php
    $data = [
        "Personal Details",
        "Education Details",
        "Work Experience /<br> Projects",
        "Skills & Summary"
    ];

    switch ($form_step) {
        case 1:
            $icon = "user";
            break;
        case 2:
            $icon = "book-open";
            break;
        case 3:
            $icon = "briefcase";
            break;
        case 4:
            $icon = "award";
            break;
        default:
            $icon = "check";
            break;
    }

    foreach ($data as $index => $value):
        $currentStep = ($form_step == $index + 1) ? true : false;

        ?>

        <div class="bg-theme_bg_light_yellow w-fit flex flex-col items-center py-8 space-y-6 ">
            <div
                class="w-fit p-4 rounded-full <?php echo ($currentStep) ? 'bg-theme_green outline-[3px] outline-dashed outline-offset-[3px] outline-theme_green' : "bg-theme_light_green"; ?>">

                <i data-feather="<?php echo ($currentStep == $form_step) ? $icon : "check"; ?>"
                    class="w-5 h-5 <?php echo ($currentStep) ? 'stroke-white' : ""; ?>"></i>
            </div>
            <p class="text-center"><?php echo $value; ?></p>
        </div>

    <?php endforeach; ?>

    <span class="absolute -z-10 top-[80px] h-[1px] w-full bg-theme_green"></span>
</div>