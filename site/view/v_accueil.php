<?php $title = "Piscines municipales de Rennes - Accueil"; ?>
<?php ob_start(); ?>
<main>
    <div class="SelectSwimmingPool">
        <?php
        foreach ($piscines as $piscine) {
            echo ' <img class="SwimmingPool--Img" src="' . $piscine->getImage() . '" value="' . $piscine->getNom() . '*' . $piscine->getAdresse() . '*' . $piscine->getDescriptif() . '*' . $piscine->getMap() . '" alt="" onclick="PiscineClickEvent(this)">';
        }
        ?>
    </div>

    <div class="FocusSwimmingPool">
        <?php echo  '<h1 id="FocusSwimmingPool--Title">' . $selectPiscine->getNom() . '</h1>'; ?>
        <div>
            <div class="info">
                <article>
                    <h2> Adresse : </h2>
                    <?php echo '<p id="FocusSwimmingPool--Address">' . $selectPiscine->getAdresse() . '<p>' ?>
                    <h2> Descriptif : </h2>
                    <?php echo '<p id="FocusSwimmingPool--Descriptif">' . $selectPiscine->getDescriptif() . '<p></br>' ?>
                </article>
            </div>
            <?php echo ' <img id="FocusSwimmingPool--Map" src="' . $selectPiscine->getMap() . '" alt="">'; ?>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>