<?php require_once('controllers/c_PanierVue.php') ?>
<?php $title = "Mon panier"; ?>
<?php ob_start(); ?>

<?php $controllerPanierVue = new PanierVue() ?>

<main>
    <div>
        <?php $controllerPanierVue->displayChoices(); ?>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>