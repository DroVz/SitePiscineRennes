<?php require_once('controllers/c_AdminUpdateActivityAction.php') ?>
<?php $title = "Piscines municipales de Rennes - Page administrateur - Modification Activité Effectué"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateActivityAction = new AdminUpdateActivityAction ?>

<main>
    <?php $ControllerAdminUpdateActivityAction->executeActivityUpdate(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>