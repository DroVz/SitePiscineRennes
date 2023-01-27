<?php $title = "Piscines municipales de Rennes - Page Administrative"; ?>

<?php ob_start(); ?>

<main>
    <form method="post" action=>
        <h1> Gestion Des Options </h1>
        <div>
            <ul>


                <table>


                    <p>-Libelle&emsp;&emsp;Description&emsp;&emsp;réservation&emsp;&emsp;En Activité</p>

                    <fieldset>
                        <?php
                        foreach ($activity as $activity) {
                            echo '<li>' . $activity['libelle'] . "&emsp;" . "&emsp;" . $activity['description'] . "&emsp;" . "&emsp;" . $activity['reservation'] . "&emsp;" . "&emsp;" . $activity['actif'] .  '</li>' . '<input type="radio" name="activite" value="' . $activity['id_activite'] . '" >';
                        }

                        ?>
                    </fieldset>
                    <br><br> <input type="submit" value="Modifier Une Activité"> &emsp; <input type="" value="Supprimer Une Activité">

                </table>

                <br><br><br>

                <table>



                    <p>-Libelle&emsp;&emsp;En Activité</p>

                    <fieldset>
                        <?php

                        foreach ($situation as $situation) {
                            echo '<li>' . $situation['libelle'] . "&emsp;" . "&emsp;" . $situation['actif'] .  '</li>' . '<input type="radio" name="situation" value="' . $situation['id_situation'] . '">';
                        }

                        ?>
                    </fieldset>
                    <br><br> <input type="submit" value="Modifier Une Situation"> &emsp; <input type="" value="Supprimer Une Situation">

                </table>

                <br><br><br>

                <table>

                    <p>-Nombre d'entrées &emsp;&emsp; Nombre de Personnes&emsp;&emsp;Durée De Validité&emsp;&emsp;Prix&emsp;&emsp;En Activité</p>

                    <fieldset>
                        <?php

                        foreach ($option as $option) {
                            echo '<li>' . $option['nb_entrees'] . "&emsp;" . "&emsp;" . $option['nb_personnes'] . "&emsp;" . "&emsp;" . $option['duree_validite'] . "&emsp;" . "&emsp;" . $option['prix'] . "&emsp;" . "&emsp;" . $option['actif'] . '</li>' . '<input type="radio" name="Formule" value="' . $option['id_formule'] . '">';
                        }


                        ?>
                    </fieldset>
                    <br><br> <input type="submit" value="Modifier Une Formule"> &emsp; <input type="" value="Supprimer Une Formule">
                </table>
            </ul>
        </div>
    </form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>