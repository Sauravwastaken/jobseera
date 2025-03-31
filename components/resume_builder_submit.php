<div class="flex justify-center items-center py-6 space-x-2">
    <?php
        
        echo $form_step > 1;
    ?>

    <a href="<?php echo ($form_step > 1) ? "step".($form_step - 1) .".php" : '';?>"
        class="bg-theme_orange primary-btn text-lg px-6">
        Previous
    </a>
    <a href="step<?php echo $form_step 
    + 1; ?>.php">
        <button type="submit" class="bg-theme_orange primary-btn text-lg px-6">
            Next
        </button>
    </a>
</div>