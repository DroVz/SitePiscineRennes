<?php require_once('controllers/c_AdminUpdateActivity.php') ?>
<?php $title = "Piscines municipales de Rennes - Page Administrative - Modification Activité"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateActivity = new AdminUpdateActivity ?>

<main>
    <h1>Modifier une activité</h1>
    <?php $ControllerAdminUpdateActivity->printUpdateActivityForm(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>