<?php $title = "Vos réservations"; ?>

<?php ob_start(); ?>

<main>
    <h1>Gérer ses réservations</h1>
    <p>
        <?php echo 'Votre code est valable pour ' . $nb_entrees . ' entrées.' ?>
    </p>
    <div>
        <h2>Vos réservations actuelles</h2>
        <ol>
            <?php
            foreach ($reservations as $reservation) {
                $nom_piscine = $reservation->getSeance()->read()->getNom();
                $prof = $reservation->getSeance()->getProfesseur();
                $jour = date('d/m/Y', strtotime($reservation->getSeance()->getDateheure()));
                $heuredeb = date('h:i', strtotime($reservation->getSeance()->getDateheure()));

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
            foreach ($seancesDispo as $seance) {
                $nom_piscine = $seance->getPiscine()->getNom();
                $prof = $seance->getProfesseur();
                $jour = date('d/m/Y', strtotime($seance->getDateheure()));
                $heuredeb = date('h:i', strtotime($seance->getDateheure()));
                $occupation = $seance->getOccupation();
                $capacite = $seance->getCapacite();
                $alreadyReserved = $seance->alreadyReserved($code);

                echo '<li>Le ' . $jour . ' à ' . $heuredeb . ' à ' . $nom_piscine . ' (coach : ' . $prof . '). 
                 - Occupation : ' . $occupation . '/' . $capacite .
                    ($alreadyReserved ? ' - Vous avez déjà réservé pour cette séance' : '') . '</li>';
            }
            ?>
        </ul>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>