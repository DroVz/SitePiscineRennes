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
    public function create($id_lesson,$id_code): void
    {
        $MySQLQuery = 'INSERT INTO lesson_code (id_lesson, id_code, booking_date)
        VALUES ('. $id_lesson .', '. $id_code .', NOW())';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute();
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
            $lessonPDO = new LessonPDO();
            $lessonPDO->connection = new DBConnection();
            $lesson = $lessonPDO->read($row['id_lesson']);
            $codePDO = new CodePDO();
            $code = $codePDO->read($row['id_code']);
            $booking_date = $row['booking_date'];
            $booking = new Booking($lesson, $code, $booking_date);
            $bookings[] = $booking;
        }
        return $bookings;
    }
}
