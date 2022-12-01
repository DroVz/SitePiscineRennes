<?php $title = "Vos réservations"; ?>

<?php ob_start(); ?>


    <h1>Gérer ses réservations</h1>
    <p>
        <?php echo 'Votre code est valable pour ' . $nb_entrees . ' entrées.'?>
    </p>

    <div>
        <h2>Vos réservations actuelles</h2>

        <ol>
            <?php
            foreach($reservations as $reservation) {            
                $nom_piscine = $reservation['nom'];
                $prof = $reservation['professeur'];
                $jour = date('d/m/Y', strtotime($reservation['dateheure']));
                $heuredeb = date('h:i', strtotime($reservation['dateheure']));

                echo '<li>Le ' . $jour . ' à ' . $heuredeb . ' à ' . $nom_piscine . ' (coach : ' . $prof . ')</li>';
            }
            ?>
        </ol>
        <p>
            <?php
                echo 'Il vous reste ' . $reservationsRestantes . ' séances à réserver'
            ?>
        </p>
    </div>
    
    <div>
        <h2>Séances disponibles</h2>
        <ul>
            <?php
            foreach($seancesDispo as $seance) {
                $nom_piscine = $seance['nom'];
                $prof = $seance['professeur'];
                $jour = date('d/m/Y', strtotime($seance['dateheure']));
                $heuredeb = date('h:i', strtotime($seance['dateheure']));
                $alreadyPicked = isPickedSeance($seance['id_seance'], $reservations);

                echo '<li>Le ' . $jour . ' à ' . $heuredeb . ' à ' . $nom_piscine . ' (coach : ' . $prof . '). 
                Occupation : ' . $seance['occupation'] . '/' . $seance['capacite'] .
                ($alreadyPicked ? ' - Séance déjà réservée !': '') . '</li>';
            }
            ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>