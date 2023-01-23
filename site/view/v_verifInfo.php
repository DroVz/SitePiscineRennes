<?php $title = "Informations sur votre code"; ?>

<?php ob_start(); ?>

<main>
    <?php
        // SI le code a été trouvé dans la BD
        // TODO On ne devrait peut-être pas faire ces calculs ici, dans la vue !
        // Des choses sont certainement à déplacer dans le contrôleur
        if(!$code == null) {
            $strMois = " +" . $code->getFormule()->getDuree_validite() . " month";
            $dateValidite = $code->getDate_generation();
            $dateValidite = date('d/m/Y à 23:59', strtotime($strMois, strtotime($dateValidite)));

            echo '<h1>Informations du code '. $code->getCode() .'</h1>';
            echo '<div>
                <h2>Formule</h2>
                <ul>
                <li>Activité : ' . $code->getFormule()->getActivite()->getLibelle() . '</li>
                <li>Description de l\'activité : ' . $code->getFormule()->getActivite()->getDescription() . '</li>
                <li>Nombre d\'entrées : ' . $code->getFormule()->getNb_entrees() . '</li>
                <li>Nombre de personnes : ' . $code->getFormule()->getNb_personnes() . '</li>
                <li>Votre situation : ' . $code->getFormule()->getSituation()->getLibelle() . '</li>
                <li>Réservation nécessaire : ' . ($code->getFormule()->getActivite()->getReservation() ? 'oui': 'non') . '</li>
                </ul>
                </div>
                <div>
                <h2>Validité</h2>
                <ul>
                <li>Date d\'achat : ' . date('d/m/Y à H:i', strtotime($code->getDate_generation())) . '</li>              
                <li>Code valable ' . $code->getFormule()->getDuree_validite() . ' mois </li>
                <li>Code valable jusqu\'au ' . $dateValidite . '</li>
                <li>Entrées restantes : ' . $code->getEntrees_restantes() . '</li>                
                </ul>
            </div>';
            // Si le code correspond à une formule nécessitant une réservation
            if($code->getFormule()->getActivite()->getReservation()) {
                echo '<form method="POST" action="index.php?action=verif&step=reservation">
                <input type="hidden" id="id_code" name="id_code" value=' . $code->getId_code() . ' /input>
                <input type="hidden" id="id_activite" name="id_activite" value=' . $code->
                    getFormule()->getActivite()->getId_activite() . ' /input>
                <input type="hidden" id="nb_entrees" name="nb_entrees" value=' . $code->
                    getFormule()->getNb_entrees() . ' /input>
                <input type=submit value="Gérer les réservations"/>
                </form>';
            };
        } 
        // SINON
        else {
            echo 'Le code ' . $str_code . ' n\'existe pas.';
        }
    ?>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>