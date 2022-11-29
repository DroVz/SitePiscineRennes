<html>
<head>

</head>

<body>

    <?php
        // SI le code a été trouvé dans la BD
        if(!$infosCode == null) {
            $lesInfos = $infosCode[0];

            // TODO voir comment ajouter un certain nombre de mois à une date, ça marche pas encore
            $dateValidite = $lesInfos['date_generation'];
            date('Y-m-d',strtotime(' +12 month',strtotime($dateValidite)));


            echo '<h1>Informations du code '. $lesInfos['code'] .'</h1>';
            echo '<ul>
                <li>Date de génération : ' . $lesInfos['date_generation'] . '</li>
                <li>Activité : ' . $lesInfos['libelle_activite'] . '</li>
                <li>Description de l\'activité : ' . $lesInfos['description_activite'] . '</li>
                <li>Nombre d\'entrées : ' . $lesInfos['nb_entrees'] . '</li>
                <li>Code valable pour ' . $lesInfos['nb_personnes'] . ' personne(s)</li>
                <li>Code valable jusqu\'au ' . $dateValidite . '</li>
                <li>Votre situation : ' . $lesInfos['libelle_situation'] . '</li>
                <li>Réservation nécessaire : ' . ($lesInfos['reservation'] ? 'oui': 'non') . '</li>
                </ul>';
        }
        



        // SINON
        else {
            echo 'Le code ' . $code . ' n\'existe pas dans la base';
        }
        



    ?>
</body>
</html>