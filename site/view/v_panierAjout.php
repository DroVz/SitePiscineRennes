<?php require_once('controllers/c_PanierAjout.php') ?>
<?php $title = "Ajout au panier"; ?>
<?php $controllerRedirection = Redirection::getInstance(); ?>

<?php ob_start(); ?>

<?php $controllerPanierAjout = new PanierAjout() ?>

<main>
    <div>
        <?php $controllerPanierAjout->addToCart(); ?>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>