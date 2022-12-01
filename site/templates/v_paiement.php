<?php $title = "Votre code"; ?>

<?php ob_start(); ?>

    <p>
        <?php
            echo 'Votre code : ' . $generatedCode;
        ?>
    </p>

    <?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php') ?>