<?php 

class Reservation {
    private $bookings;
    private $remainingBookings;
    private $availableLessons; 
    private $code;
    private $nbEntries;

    public function __construct()
    {
         // TODO : Faire un singleton de la connexion à la bd 
                // Récupération du numéro du code dans la base depuis le formulaire précédent
                // Récupération du code de l'activité
                $id_code = $_POST['id_code'];

                $id_activity = $_POST['id_activity'];
                $this->nbEntries = $_POST['nb_entries'];

                // On récupère les infos du code
                $codePDO = new CodePDO();
                $this->code = $codePDO->read($id_code);

                // On récupère les infos de l'activité
                $activityPDO = new ActivityPDO();
                $activity = $activityPDO->read($id_activity);

                // On récupère les réservations existantes pour le code
                $bookingPDO = new BookingPDO();
                $this->bookings = $bookingPDO->readAll($this->code);
                $this->remainingBookings = $this->nbEntries - count($this->bookings);

                // On a besoin des infos des piscines
                $poolPDO = new PoolPDO();
                $pools = $poolPDO->readAll();

                // On veut aussi connaître toutes les séances disponibles pour l'activité choisie
                $lessonPDO = new LessonPDO();
                $this->availableLessons = $lessonPDO->readAll($activity);

    }

    public function printBooking(){
        foreach ($this->bookings as $booking) {
            $pool_name = $booking->getSession()->read()->getName();
            $coach = $booking->getSession()->getCoach();
            $day = date('d/m/Y', strtotime($booking->getSession()->getDateTime()));
            $beginTime = date('h:i', strtotime($booking->getSession()->getDateTime()));

            echo '<li>Le ' . $day . ' à ' . $beginTime . ' à ' . $pool_name . ' (coach : ' . $coach . ')</li>';
        }
    }
    public function printRemainingBooking(){
        echo '<p> Il vous reste ' . $this->remainingBookings . ' séances à réserver </p>';
    }
    public function printNbEntries(){
        echo 'Votre code est valable pour ' . $this->nbEntries . ' entrées.' ;
    }
    public function printAvailableLessons(){
        foreach ($this->availableLessons as $lesson) {
            $pool_name = $lesson->getPool()->getName();
            $coach = $lesson->getCoach();
            $day = date('d/m/Y', strtotime($lesson->getDateTime()));
            $beginTime = date('h:i', strtotime($lesson->getDateTime()));
            $bookingNb = $lesson->getBookingNb();
            $capacity = $lesson->getCapacity();
            $alreadyBooked = $lesson->alreadyBooked($this->code);

            echo '<li id ="'.$lesson->getId_lesson.'li" ><button class="blueLink" onclick="setBookingEvent('.$lesson->getId_lesson.')"> Le ' . $day . ' à ' . $beginTime . ' à ' . $pool_name . ' (coach : ' . $coach . '). 
             - Occupation : ' . $bookingNb . '/' . $capacity .
                ($alreadyBooked ? ' - Vous avez déjà réservé pour cette séance' : '') . '</button></li>';
        }
    }

}