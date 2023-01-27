<?php

require_once('pdo/database.php');
require_once('model/reservation.php');

class ReservationPDO
{
    public DBConnection $connection;

    // Return all reservations associated with a given code
    function readAll(Code $code): array
    {
        $MySQLQuery = 'SELECT id_seance, id_code, date_reservation
        FROM code_seance WHERE id_code = ?';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$code->getId_code()]);
        return $this->returnReservations($stmt->fetchAll());
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

    // Return all reservations in $rows and update $data
    private function returnReservations(array $rows): array
    {
        $reservations = [];
        foreach ($rows as $row) {
            $seancePDO = new SeancePDO();
            $seancePDO->connection = new DBConnection();
            $seance = $seancePDO->getSeance($row['id_seance']);
            $codePDO = new CodePDO();
            $codePDO->connection = new DBConnection();
            $code = $codePDO->read($row['id_code']);
            $date_reservation = $row['date_reservation'];
            $reservation = new Reservation($seance, $code, $date_reservation);
            $reservations[] = $reservation;
        }
        return $reservations;
    }
}
