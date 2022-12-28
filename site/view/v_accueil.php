<?php $title = "Piscines municipales de Rennes - Accueil"; ?>

<?php ob_start(); ?>

<main>
    <h1>Liste des piscines</h1>
    <div>
        <ul>
            <?php
                foreach($piscines as $piscine) {
                    echo '<li>' . $piscine->getNom() . ' (' . $piscine->getAdresse() . ')</li>';
                }
            ?>
        </ul>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>