<?php require_once('controllers/admin/c_AdminUpdateSituationAction.php') ?>
<?php $title = "Piscines municipales de Rennes - Page Administrative - Modification Situation Effectué"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateSituationAction = new AdminUpdateSituationAction ?>

<main>
    <?php $ControllerAdminUpdateSituationAction->executeSituationUpdate(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>