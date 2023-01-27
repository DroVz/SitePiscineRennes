<?php $title = "Achat de code"; ?>

<?php ob_start(); ?>

<main>
    <h1>Choisissez votre activité et votre situation</h1>
    <form method="post" action="index.php?action=achat&step=option">
        <div id="choixActivite">
            <fieldset>
                <legend>Choisir une activité :</legend>
                <?php
                foreach ($activities as $activity) {
                    echo '<input type="radio" name="activity" value="' . $activity->getIdActivity() . '" id="' .
                        $activity->getIdActivity() . '" required/> <label for="' . $activity->getIdActivity() .
                        '">' . $activity->getName() . ' (' . $activity->getDescription() . ')' . '</label><br />';
                }
                ?>
            </fieldset>
        </div>
        <div id="choixSituation">
            <fieldset>
                <legend>Quelle est votre situation ?</legend>
                <?php
                foreach ($situations as $situation) {
                    echo '<input type="radio" name="situation" value="' . $situation->getIdSituation() . '" id="' .
                        $situation->getIdSituation() . '" required/> <label for="' . $situation->getIdSituation() .
                        '">' . $situation->getName() . '</label><br />';
                }
                ?>
            </fieldset>
        </div>
        <input type="submit" value="Choisir la formule">
    </form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>