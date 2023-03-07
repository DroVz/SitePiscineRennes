<?php $title = "Vos réservations"; ?>
<?php require_once('controllers/c_Reservation.php') ;
      $ReservationController = new Reservation;
?>

<?php ob_start(); ?>

<main>
    <h1>Gérer ses réservations</h1>
    <p>
        <?php $ReservationController->printNbEntries()?>
    </p>
    <div>
        <h2>Vos réservations actuelles</h2>
        <ol>
            <?php $ReservationController->printBooking() ?>
        </ol>
        <p>
            <?php $ReservationController->printRemainingBooking()?>
        </p>
    </div>
    <div>
        <h2>Séances disponibles</h2>
        <ul>
            <?php $ReservationController->printAvailableLessons()?>
        </ul>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>