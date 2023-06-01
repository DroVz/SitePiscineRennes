<?php
require_once('pdo/database.php');
require_once('model/booking.php');

class BookingPDO
{
    public DBConnection $connection;

    // Return all reservations associated with a given code
    function readAll(Code $code): array
    {
        try {
            
            $id_code = $code->getId_code();
            $req = DBConnection::getInstance()->prepare('SELECT id_lesson, id_code, booking_date
                                                        FROM lesson_code 
                                                        WHERE id_code = :id_code') ;

            $req->bindParam(':id_code', $id_code, PDO::PARAM_INT);
            $req->execute();

        } catch(Exception $ex) {
            echo '<script> console.log('. $ex .') </script>';
        }

        return $this->returnBookings($req->fetchAll());
    }

    public function create($id_lesson,$id_code): void
    {
        try {
            $req = DBConnection::getInstance()->prepare('INSERT INTO lesson_code (id_lesson, id_code, booking_date)
                                                         VALUES (:id_lesson, :id_code, NOW())') ;

            $req->bindParam(':id_lesson', $id_lesson, PDO::PARAM_INT);
            $req->bindParam(':id_code', $id_code, PDO::PARAM_INT);
            $req->execute();
        } catch(Exception $ex) {
            echo '<script> console.log('. $ex .') </script>';
        }
    }

    // TODO Update existing reservation
    public function update(): void
    {
    }

    public function delete($id_lesson, $id_code): void
    {
        try {
            $req = DBConnection::getInstance()->prepare('DELETE FROM lesson_code WHERE id_lesson = :id_lesson AND id_code = :id_code') ;
            $req->bindParam(':id_lesson', $id_lesson, PDO::PARAM_INT);
            $req->bindParam(':id_code', $id_code, PDO::PARAM_INT);
            $req->execute();
        } catch(Exception $ex) {
            echo '<script> console.log('. $ex .') </script>';
        }
    }

    // Return all reservations in $rows
    private function returnBookings(array $rows): array
    {
        $bookings = [];
        foreach ($rows as $row) {
            $lessonPDO = new LessonPDO();
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