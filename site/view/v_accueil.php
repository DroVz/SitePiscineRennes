<?php $title = "Piscines municipales de Rennes - Accueil"; ?>
<?php ob_start(); ?>
<?php  $ControllerHomePage = new HomePage?>

<main>
    <div class="SelectSwimmingPool">
        <img class="banner" src="view\img\bannerRennes.webp" alt="">
        <div class="line"></div>
        <?php $ControllerHomePage->printPools() ?>
    </div>

    <div class="FocusSwimmingPool">
        <?php $ControllerHomePage->printPoolName() ?>
        <div>
            <div class="info">
                <article>
                    <h2> Adresse : </h2>
                    <?php $ControllerHomePage->printPoolAddress() ?>
                    <h2> Description : </h2>
                    <?php $ControllerHomePage->printDescription() ?>
                </article>
            </div>
            <?php $ControllerHomePage->printMap() ?>
        </div>
      <a class="StyleButton" href="/index.php?action=achat"  >Voir les offres</a>
    </div>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>