<?php $title = "Piscines municipales de Rennes - Accueil"; ?>

<?php ob_start(); ?>

<main>
    <div id="piscineBody">
        <h1>Liste des piscines</h1>
        <div>
            <img src="img/brequigny.png" alt=""/>
            <img src="img/brequigny.png" alt=""/>
            <img src="img/saintGeorges.png" alt=""/>
            <img src="img/logo.png" alt=""/>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>

 <!-- <div>
        <ul>
        //
             //   foreach($piscines as $piscine) {
             //       echo '<li>' . $piscine->getNom() . ' (' . $piscine->getAdresse() . ')</li>';
             //   }
            ?>
        </ul>
    </div>