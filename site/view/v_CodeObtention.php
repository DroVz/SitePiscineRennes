<?php require_once('controllers/c_CodeObtention.php') ?>
<?php $title = "Votre code"; ?>

<?php ob_start(); ?>

<?php $controllerCodeObtention = new CodeObtention() ?>

<main>
    <p>
        <?php $controllerCodeObtention->displayPurchasedCodes() ?>
        <?php $controllerCodeObtention->emptyCart() ?>
    </p>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>