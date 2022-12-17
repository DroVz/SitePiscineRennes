<?php $title = "Piscines municipales de Rennes - Accueil"; ?>

<?php ob_start(); ?>

<main>
    <div id="choix__list">
        <img id="img__item1" src="img\piscine\piscineSaintGeorge.webp" alt="">
        <img id="img__item2" src="img\piscine\piscineBrequigny.webp" alt="">
        <img id="img__item3" src="img\piscine\piscineGayeulles.webp" alt="">
        <img id="img__item4" src="img\piscine\piscineVilleJean.webp" alt="">
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>