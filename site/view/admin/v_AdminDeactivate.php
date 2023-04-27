<?php require_once('controllers/admin/c_AdminDeactivate.php') ?>
<?php $title = "Piscines municipales de Rennes - Page administrateur - Désactivation d'une activité"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminDeactivate = new AdminDeactivate ?>

<main>
    <h1>Désactivation</h1>
    <?php $ControllerAdminDeactivate->printDeactivateResult(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>