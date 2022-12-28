<?php $title = "Choix de la formule"; ?>

<?php ob_start(); ?>

<main>
    <form method="POST" action="index.php?action=achat&step=final">
        <div id = "choixFormule">
            <fieldset>
                <legend>Choisissez votre formule :</legend>
                <p>
                    <?php
                        foreach($formules as $formule)
                        {
                            echo '<input type="radio" name="formule" value="' . $formule->getId_formule() . '" id="' .
                            $formule->getId_formule() . '" required/> <label for="' . $formule->getId_formule() .
                            '">' . $formule->getNb_entrees() . ' entrées, ' . $formule->getNb_personnes() .
                            ' personne(s), code valable ' . $formule->getDuree_validite() . ' mois à partir de l\'achat - ' .
                            $formule->getPrix() . ' €</label><br />';
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