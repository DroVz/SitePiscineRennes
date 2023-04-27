<?php require_once('controllers/c_PanierVue.php') ?>
<?php $title = "Mon panier"; ?>
<?php ob_start(); ?>

<?php $controllerPanierVue = new PanierVue() ?>

<main>
    <h1>Mon panier</h1>
    <div id="divCart">
        <div>
            <?php $controllerPanierVue->displayChoices(); ?>
        </div>
        <aside>
            <?php $controllerPanierVue->displayOptions(); ?>
        </aside>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>