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
            <form  method="POST"  action="index.php">
                <input type="hidden" name="action" value="bookingRedirection">
                <input type="hidden" name="step" value="dellBooking">
                <ul id="bookingReserve">
                    <?php $ReservationController->printBooking() ?>
                </ul>
            </form>
            <p>
                <?php $ReservationController->printRemainingBooking()?>
            </p>
        </div>
        <div>
            <h2>Séances disponibles :</h2>
            <form  method="POST"  action="index.php">
                <input type="hidden" name="action" value="bookingRedirection">
                <input type="hidden" name="step" value="addBooking">
                <ul id="bookingFree">
                    <?php $ReservationController->printAvailableLessons()?>
                </ul>
            </form>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>