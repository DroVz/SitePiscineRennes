<?php $title = "Piscines municipales de Rennes - Accueil"; ?>
<?php ob_start(); ?>
<main>
    <div class="SelectSwimmingPool">
        <?php
        foreach ($pools as $pool) {
            echo ' <img class="SwimmingPool--Img" src="' . $pool->getPicture() . '" value="' . $pool->getName() . '*' . $pool->getAddress() . '*' . $pool->getDescription() . '*' . $pool->getMap() . '" alt="" onclick="PiscineClickEvent(this)">';
        }
        ?>
    </div>

    <div class="FocusSwimmingPool">
        <?php echo  '<h1 id="FocusSwimmingPool--Title">' . $selectPool->getName() . '</h1>'; ?>
        <div>
            <div class="info">
                <article>
                    <h2> Adresse : </h2>
                    <?php echo '<p id="FocusSwimmingPool--Address">' . $selectPool->getAddress() . '<p>' ?>
                    <h2> Descriptif : </h2>
                    <?php echo '<p id="FocusSwimmingPool--Descriptif">' . $selectPool->getDescription() . '<p></br>' ?>
                </article>
            </div>
            <?php echo ' <img id="FocusSwimmingPool--Map" src="' . $selectPool->getMap() . '" alt="">'; ?>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>