<?php $title = "Votre code"; ?>

<?php ob_start(); ?>

<main>
    <p>
        <?php
            echo 'Votre code : ' . $str_code;
        ?>
    </p>
</main>

    <?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>