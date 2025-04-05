<h1 class="mx-auto w-fit text-5xl">Create a Resume</h1>
<!-- Progress bar -->

<div class="flex justify-between py-6 relative">
    <?php
    $data = [
        "Personal Details",
        "Education Details",
        "Work Experience /<br> Projects",
        "Skills & Summary"
    ];

    foreach ($data as $index => $value):
        $currentStep = ($form_step == $index + 1) ? true : false;
        ?>

        <div class="bg-theme_bg_light_yellow w-fit flex flex-col items-center py-8 space-y-6 ">
            <div
                class="   w-fit p-4 rounded-full <?php echo ($currentStep) ? 'bg-theme_green outline-[3px] outline-dashed outline-offset-[3px] outline-theme_green' : "bg-theme_light_green"; ?>  ">
                <i data-feather="check" class="w-5 h-5 <?php echo ($currentStep) ? 'stroke-white' : ""; ?>"></i>
            </div>
            <p class="text-center"><?php echo $value; ?></p>
        </div>

    <?php endforeach; ?>

    <span class="absolute -z-10 top-[80px] h-[1px] w-full bg-theme_green"></span>
</div>