<?php 

class Reservation {
    private Code $code;
    private Activity $activity;
    private array $bookings;
    private array $availableLessons; 
    private int $remainingBookings;
    private int $nbEntries;

    public function __construct()
    {
        $bookingPDO = new BookingPDO();
               
        // Récupération du code de l'activité
        $id_code = $_POST['id_code'];

        // On récupère les infos du code
        $codePDO = new CodePDO();
        $this->code = $codePDO->read(intval($id_code));

        $this->activity = $this->code->getOffer()->getActivity();
        $this->nbEntries = $this->code->getOffer()->getNbEntries();

        // On récupère les réservations existantes pour le code
        $this->bookings = $bookingPDO->readAll($this->code);
        $this->remainingBookings = $this->nbEntries - count($this->bookings);

        // On veut aussi connaître toutes les séances disponibles pour l'activité choisie
        $lessonPDO = new LessonPDO();
        $this->availableLessons = $lessonPDO->readAll($this->activity);

    }

    public function printBooking(){
        foreach ($this->bookings as $booking) {
            $pool_name = $booking->getSession()->getPool()->getName();
            $coach = $booking->getSession()->getCoach();
            $day = date('d/m/Y', strtotime($booking->getSession()->getDateTime()));
            $beginTime = date('h:i', strtotime($booking->getSession()->getDateTime()));
           
            echo '<li id ="'. $booking->getSession()->getId_lesson() .'" >
            <form  method="POST"  action="index.php">
                <input type="hidden" name="action" value="bookingRedirection">
                <input type="hidden" name="step" value="dellBooking">
                <input type="hidden" name="id_code" value="'.  $this->code->getId_code() .'" />
                <input type="hidden" name="lesson_id" value="'. $booking->getSession()->getId_lesson() .'" />
                <button type="submit" class="blueLink"> 
                    Le ' . $day . ' à ' . $beginTime . ' à ' . $pool_name . ' (coach : ' . $coach . ').
                </button>
            </form>
        </li>';
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
            if ($lesson->alreadyBooked($this->code) == false){
              
                $pool_name = $lesson->getPool()->getName();
                $coach = $lesson->getCoach();
                $day = date('d/m/Y', strtotime($lesson->getDateTime()));
                $beginTime = date('h:i', strtotime($lesson->getDateTime()));
                $bookingNb = $lesson->getBookingNb();
                $capacity = $lesson->getCapacity();
                $alreadyBooked = $lesson->alreadyBooked($this->code);
    
                echo '<li id ="'. $lesson->getId_lesson() .'" >
                    <form  method="POST"  action="index.php">
                        <input type="hidden" name="action" value="bookingRedirection">
                        <input type="hidden" name="step" value="addBooking">
                        <input type="hidden" name="id_code" value="'.  $this->code->getId_code() .'" />
                        <input type="hidden" name="lesson_id" value="'. $lesson->getId_lesson() .'" />
                        <button type="submit" class="blueLink"> 
                            Le ' . $day . ' à ' . $beginTime . ' à ' . $pool_name . ' (coach : ' . $coach . '). - Occupation : ' . $bookingNb . '/' . $capacity .'
                        </button>
                    </form>
                </li>';
            }
        }
    }
}
// onclick="setBookingEvent(\''.$lesson->getId_lesson().'\')"