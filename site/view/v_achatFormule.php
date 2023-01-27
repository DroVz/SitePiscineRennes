<?php $title = "Choix de la formule"; ?>

<?php ob_start(); ?>

<main>
    <form method="POST" action="index.php?action=achat&step=final">
        <div id="choixFormule">
            <fieldset>
                <legend>Choisissez votre formule :</legend>
                <p>
                    <?php
                    foreach ($options as $option) {
                        echo '<input type="radio" name="formule" value="' . $option->getIdOffer() . '" id="' .
                            $option->getIdOffer() . '" required/> <label for="' . $option->getIdOffer() .
                            '">' . $option->getNbEntries() . ' entrées, ' . $option->getNbPeople() .
                            ' personne(s), code valable ' . $option->getValidity() . ' mois à partir de l\'achat - ' .
                            $option->getPrice() . ' €</label><br />';
                    }
                    ?>
                </p>
            </fieldset>
            <input type="submit" value="Obtenir mon code">
        </div>
    </form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>