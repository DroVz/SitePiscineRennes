<?php require_once('controllers/admin/c_AdminUpdateSituation.php') ?>
<?php $title = "Piscines municipales de Rennes - Page Administrative - Modification Situation"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateSituation = new AdminUpdateSituation ?>

<main>
    <h1>Modifier une situation</h1>
    <?php $ControllerAdminUpdateSituation->printUpdateSituationForm(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>