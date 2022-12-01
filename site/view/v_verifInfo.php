<?php $title = "Informations sur votre code"; ?>

<?php ob_start(); ?>

<div>
<?php
// SI le code a été trouvé dans la BD
    if(!$infosCode == null) {
        $lesInfos = $infosCode[0];
        $strMois = " +" . $lesInfos['duree_validite'] . " month";
        $dateValidite = $lesInfos['date_generation'];
        $dateValidite = date('d/m/Y à 23:59', strtotime($strMois, strtotime($dateValidite)));


        echo '<h1>Informations du code '. $lesInfos['code'] .'</h1>';
        echo '<div>
            <h2>Formule</h2>
            <ul>
            <li>Activité : ' . $lesInfos['libelle_activite'] . '</li>
            <li>Description de l\'activité : ' . $lesInfos['description_activite'] . '</li>
            <li>Nombre d\'entrées : ' . $lesInfos['nb_entrees'] . '</li>
            <li>Nombre de personnes : ' . $lesInfos['nb_personnes'] . '</li>
            <li>Votre situation : ' . $lesInfos['libelle_situation'] . '</li>
            <li>Réservation nécessaire : ' . ($lesInfos['reservation'] ? 'oui': 'non') . '</li>
            </ul>
            </div>
            <div>
            <h2>Validité</h2>
            <ul>
            <li>Date d\'achat : ' . date('d/m/Y à H:i', strtotime($lesInfos['date_generation'])) . '</li>              
            <li>Code valable ' . $lesInfos['duree_validite'] . ' mois </li>
            <li>Code valable jusqu\'au ' . $dateValidite . '</li>
            <li>Entrées restantes : ' . $lesInfos['entrees_restantes'] . '</li>                
            </ul>
        </div>';
        // Si le code correspond à une formule nécessitant une réservation
        if($lesInfos['reservation']) {
            echo '<form method="POST" action="index.php?action=verifReservation">
            <input type="hidden" id="id_code" name="id_code" value=' . $lesInfos['id_code'] . ' /input>
            <input type="hidden" id="id_activite" name="id_activite" value=' . $lesInfos['id_activite'] . ' /input>
            <input type="hidden" id="nb_entrees" name="nb_entrees" value=' . $lesInfos['nb_entrees'] . ' /input>
            <input type=submit value="Gérer les réservations"/>
            </form>';
        };
    } 
    // SINON
    else {
        echo 'Le code ' . $code . ' n\'existe pas dans la base';
    }
?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>