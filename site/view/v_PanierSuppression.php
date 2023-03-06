<?php require_once('controllers/c_PanierSuppression.php') ?>
<?php $title = "Suppression du panier"; ?>
<?php $controllerRedirection = Redirection::getInstance(); ?>

<?php ob_start(); ?>

<?php $controllerPanierSuppression = new PanierSuppression() ?>

<main>
    <div>
        <?php $controllerPanierSuppression->removeFromCart(); ?>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>