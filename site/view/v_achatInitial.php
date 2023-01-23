<?php $title = "Achat de code"; ?>

<?php ob_start(); ?>

<main>
    <h1>Choisissez votre activité et votre situation</h1>
    <form method="post" action="index.php?action=achat&step=formule">
        <div id="choixActivite">
            <fieldset>
                <legend>Choisir une activité :</legend>
                <?php
                foreach($activites as $activite)
                {
                    echo '<input type="radio" name="activite" value="' . $activite->getId_activite() . '" id="' .
                    $activite->getId_activite() . '" required/> <label for="' . $activite->getId_activite() .
                    '">' . $activite->getLibelle() . ' (' . $activite->getDescription() . ')' . '</label><br />';
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
                    echo '<input type="radio" name="situation" value="' . $situation->getId_situation() . '" id="' .
                    $situation->getId_situation() . '" required/> <label for="' . $situation->getId_situation() .
                    '">' . $situation->getLibelle() . '</label><br />';
                }    
                ?>
            </fieldset>
        </div>
        <input type="submit" value="Choisir la formule">        
    </form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>