<?php

require_once('pdo/database.php');
require_once('model/reservation.php');

class ReservationPDO {
    public DBConnection $connection;

    // Return all reservations associated with a given code
    function getReservations(Code $code) : array
    {
        $MySQLQuery = 'SELECT id_seance, id_code, date_reservation
        FROM code_seance WHERE id_code = ?';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$code->getId_code()]);
        $reservations = [];
        while ($row = $stmt->fetch()) {
            $seancePDO = new SeancePDO();
            $seancePDO->connection = new DBConnection();
            $seance = $seancePDO->getSeance($row['id_piscine']);
            $codePDO = new CodePDO();
            $codePDO->connection = new DBConnection();
            $code = $codePDO->getCode($row['id_code']);
            $date_reservation = $row['date_reservation'];
            $reservation = new Reservation($seance, $code, $date_reservation);
            $reservations[] = $reservation;
        }
        return $reservations;
    }

    // TODO revoir cette fonction, qui n'est plus utilisée actuellement
    function isPickedSeance(int $id_seance, array $reservations) : bool
    {
        $seances_reservees = [];
        foreach($reservations as $reservation) {
            $seances_reservees[] = $reservation->id_seance;      
        }
        if(in_array($id_seance, $seances_reservees)) {
            return true;
        }
        return false;
    }
}