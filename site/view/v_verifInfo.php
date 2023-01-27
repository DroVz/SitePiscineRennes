<?php $title = "Informations sur votre code"; ?>

<?php ob_start(); ?>

<main>
    <?php

    // SI le code a été trouvé dans la BD
    // TODO On ne devrait peut-être pas faire ces calculs ici, dans la vue !
    // Des choses sont certainement à déplacer dans le contrôleur
    if (!$code == null) {
        $strMois = " +" . $code->getOffer()->getValidity() . " month";
        $dateValidite = $code->getGenerationDate();
        $dateValidite = date('d/m/Y à 23:59', strtotime($strMois, strtotime($dateValidite)));

        echo '<h1>Informations du code ' . $code->getCodeString() . '</h1>';
        echo '<div>
                <h2>Formule</h2>
                <ul>
                <li>Activité : ' . $code->getOffer()->getActivity()->getName() . '</li>
                <li>Description de l\'activité : ' . $code->getOffer()->getActivity()->getDescription() . '</li>
                <li>Nombre d\'entrées : ' . $code->getOffer()->getNbEntries() . '</li>
                <li>Nombre de personnes : ' . $code->getOffer()->getNbPeople() . '</li>
                <li>Votre situation : ' . $code->getOffer()->getSituation()->getName() . '</li>
                <li>Réservation nécessaire : ' . ($code->getOffer()->getActivity()->getBooking() ? 'oui' : 'non') . '</li>
                </ul>
                </div>
                <div>
                <h2>Validité</h2>
                <ul>
                <li>Date d\'achat : ' . date('d/m/Y à H:i', strtotime($code->getGenerationDate())) . '</li>              
                <li>Code valable ' . $code->getOffer()->getValidity() . ' mois </li>
                <li>Code valable jusqu\'au ' . $dateValidite . '</li>
                <li>Entrées restantes : ' . $code->getRemainingEntries() . '</li>                
                </ul>
            </div>';
        // Si le code correspond à une formule nécessitant une réservation
        if ($code->getOffer()->getActivity()->getBooking()) {
            echo '<form method="POST" action="index.php?action=verif&step=booking">
                <input type="hidden" id="id_code" name="id_code" value=' . $code->getId_code() . ' /input>
                <input type="hidden" id="id_activity" name="id_activity" value=' . $code->getOffer()->getActivity()->getIdActivity() . ' /input>
                <input type="hidden" id="nb_entries" name="nb_entries" value=' . $code->getOffer()->getNbEntries() . ' /input>
                <input type=submit value="Gérer les réservations"/>
                </form>';
        }
    }
    // SINON
    else {
        echo 'Le code ' . $str_code . ' n\'existe pas.';
    }
    ?>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>