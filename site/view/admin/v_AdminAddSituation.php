<?php require_once('controllers/admin/c_AdminAddSituation.php') ?>
<?php $title = "Piscines municipales de Rennes - Page Administrative - Ajout Situation"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminAddSituation = new AdminAddSituation ?>

<?php $ControllerAdminAddSituation->printAddSituationResult() ?>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>