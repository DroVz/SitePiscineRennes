<?php $title = "Vos réservations"; ?>
<?php require_once('controllers/c_Reservation.php') ;
      $ReservationController = new Reservation;
?>

<?php ob_start(); ?>

<main class="BookingPage" >
    <div class="groupBox">
        <h1>Gérer ses réservations</h1>
        <div>
            <?php $ReservationController->printNbEntries()?>
        </div>
        <div>
            <h2>Vos réservations actuelles :</h2>
            <ul id="bookingReserve">
                <?php $ReservationController->printBooking() ?>
            </ul>
            <p>
                <?php $ReservationController->printRemainingBooking()?>
            </p>
        </div>
        <div>
            <h2>Séances disponibles :</h2>
            <ul>
                <?php $ReservationController->printAvailableLessons()?>
            </ul>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>