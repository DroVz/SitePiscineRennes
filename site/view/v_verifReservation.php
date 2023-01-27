<?php $title = "Vos réservations"; ?>

<?php ob_start(); ?>

<main>
    <h1>Gérer ses réservations</h1>
    <p>
        <?php echo 'Votre code est valable pour ' . $nbEntries . ' entrées.' ?>
    </p>
    <div>
        <h2>Vos réservations actuelles</h2>
        <ol>
            <?php
            foreach ($bookings as $booking) {
                $pool_name = $booking->getSession()->read()->getName();
                $coach = $booking->getSession()->getCoach();
                $day = date('d/m/Y', strtotime($booking->getSession()->getDateTime()));
                $beginTime = date('h:i', strtotime($booking->getSession()->getDateTime()));

                echo '<li>Le ' . $day . ' à ' . $beginTime . ' à ' . $pool_name . ' (coach : ' . $coach . ')</li>';
            }
            ?>
        </ol>
        <p>
            <?php
            echo 'Il vous reste ' . $remainingBookings . ' séances à réserver';
            ?>
        </p>
    </div>
    <div>
        <h2>Séances disponibles</h2>
        <ul>
            <?php
            foreach ($availableSessions as $session) {
                $pool_name = $session->getPool()->getName();
                $coach = $session->getCoach();
                $day = date('d/m/Y', strtotime($session->getDateTime()));
                $beginTime = date('h:i', strtotime($session->getDateTime()));
                $bookingNb = $session->getBookingNb();
                $capacity = $session->getCapacity();
                $alreadyBooked = $session->alreadyBooked($code);

                echo '<li>Le ' . $day . ' à ' . $beginTime . ' à ' . $pool_name . ' (coach : ' . $coach . '). 
                 - Occupation : ' . $bookingNb . '/' . $capacity .
                    ($alreadyBooked ? ' - Vous avez déjà réservé pour cette séance' : '') . '</li>';
            }
            ?>
        </ul>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>