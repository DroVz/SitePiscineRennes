<?php
require_once('pdo/database.php');
require_once('model/booking.php');

class BookingPDO
{
    public DBConnection $connection;

    // Return all reservations associated with a given code
    function readAll(Code $code): array
    {
        $MySQLQuery = 'SELECT id_session, id_code, booking_date
        FROM session_code WHERE id_code = ?';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$code->getId_code()]);
        return $this->returnBookings($stmt->fetchAll());
    }

    // TODO Add new reservation to database
    public function create(): void
    {
    }

    // TODO Update existing reservation
    public function update(): void
    {
    }

    // TODO Delete reservation from database
    public function delete(): void
    {
    }

    // Return all reservations in $rows
    private function returnBookings(array $rows): array
    {
        $bookings = [];
        foreach ($rows as $row) {
            $sessionPDO = new SessionPDO();
            $session = $sessionPDO->read($row['id_session']);
            $codePDO = new CodePDO();
            $code = $codePDO->read($row['id_code']);
            $booking_date = $row['booking_date'];
            $booking = new Booking($session, $code, $booking_date);
            $bookings[] = $booking;
        }
        return $bookings;
    }
}
