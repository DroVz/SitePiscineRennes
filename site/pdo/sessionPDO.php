<?php

require_once('pdo/database.php');
require_once('model/session.php');

class SessionPDO
{
    public DBConnection $connection;
    private array $data = array();

    // Return 1 session from database
    public function read(int $id_session): Session
    {
        $MySQLQuery = 'SELECT * FROM session WHERE id_session = ?;';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$id_session]);
        $session = null;
        if (array_key_exists($id_session, $this->data)) {
            $session = $this->data[$id_session];
        } else {
            $session = $this->returnSessions($stmt->fetchAll())[0];
        }
        return $session;
    }

    // Return all available sessions for a given activity
    public function readAll(Activity $activity): array
    {
        $MySQLQuery = 'SELECT s.id_session, s.id_pool, s.id_activity, s.date_time, s.coach, s.capacity
        FROM session s
        LEFT JOIN session_code sc ON (s.id_session = sc.id_session)
        WHERE s.id_activity = ? AND s.active = 1
        GROUP BY s.id_session
        ORDER BY s.id_pool';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$activity->getIdActivity()]);
        return $this->returnSessions($stmt->fetchAll());
    }

    // TODO Add new session to database
    public function create(): void
    {
    }

    // TODO Update existing session
    public function update(): void
    {
    }

    // TODO Delete session from database
    public function delete(): void
    {
    }


    // TODO devrait vraiment être public ?
    public function getBookingNb(Session $session): int
    {
        $MySQLQuery = 'SELECT COUNT(*) as bookingNb
        FROM session_code sc
        WHERE sc.id_session = ?';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$session->getId_session()]);
        while ($row = $stmt->fetch()) {
            $occupation = $row['bookingNb'];
        }
        return $occupation;
    }

    // TODO devrait vraiment être public ?
    public function alreadyBooked(Code $code, Session $session): bool
    {
        $MySQLQuery = 'SELECT * FROM session_code sc WHERE sc.id_code = ? AND sc.id_session = ?;';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$code->getId_code(), $session->getId_session()]);
        if ($row = $stmt->fetch()) {
            return true;
        } else {
            return false;
        }
    }

    // Return all sessions in $rows and update $data
    private function returnSessions(array $rows): array
    {
        $sessions = [];
        foreach ($rows as $row) {
            $id_session = $row['id_session'];
            $poolPDO = new PoolPDO();
            $poolPDO->connection = new DBConnection();
            $pool = $poolPDO->read($row["id_pool"]);
            $activityPDO = new ActivityPDO();
            $activityPDO->connection = new DBConnection();
            $activity = $activityPDO->read($row["id_activity"]);
            $datetime = $row['date_time'];
            $coach = $row['coach'];
            $capacity = $row['capacity'];
            $session = new Session($pool, $activity, $datetime, $coach, $capacity, 1, $id_session);
            $sessions[] = $session;
            $this->data[$id_session] = $session;
        }
        return $sessions;
    }
}
