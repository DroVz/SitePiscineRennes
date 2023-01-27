<?php $title = "Votre code"; ?>

<?php ob_start(); ?>

<main>
    <p>
        <?php
        echo 'Votre code : ' . $newCode->getCodeString();
        ?>
    </p>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>