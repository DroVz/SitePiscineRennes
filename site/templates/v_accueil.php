<?php $title = "Piscines municipales de Rennes - Accueil"; ?>

<?php ob_start(); ?>

<h1>Liste des piscines</h1>
<?= 'A venir' ?>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php') ?>