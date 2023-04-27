<?php require_once('controllers/admin/c_AdminAddActivity.php') ?>
<?php $title = "Piscines municipales de Rennes - Page administrateur - Ajout activité"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminAddActivity = new AdminAddActivity ?>

<?php $ControllerAdminAddActivity->printAddActivityResult() ?>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>