<?php $title = "Choisissez votre activité"; ?>

<?php ob_start(); ?>

<h1>Choisissez votre activité et votre situation</h1>

<form method="post" action="index.php">
    <div id="choixActivite">
        <fieldset>
            <legend>Choisir une activité :</legend>
            <?php
            foreach($activites as $activite)
            {
                echo '<input type="radio" name="activite" value="' . $activite['id_activite'] . '" id="' .
                $activite['id_activite'] . '" required/> <label for="' . $activite['id_activite'] .
                '">' . $activite['libelle'] . ' (' . $activite['description'] . ')' . '</label><br />';
            }
            ?>
        </fieldset>      
    </div>
    <div id="choixSituation">
        <fieldset>
            <legend>Quelle est votre situation ?</legend>
            <?php
            foreach($situations as $situation)
            {
                echo '<input type="radio" name="situation" value="' . $situation['id_situation'] . '" id="' .
                $situation['id_situation'] . '" required/> <label for="' . $situation['id_situation'] .
                '">' . $situation['libelle'] . '</label><br />';
            }    
            ?>
        </fieldset>
    </div>
    <input type="hidden" id="action" name="action" value="nouveaucode">
    <input type="submit" value="Choisir la formule">
    
</form>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php') ?>