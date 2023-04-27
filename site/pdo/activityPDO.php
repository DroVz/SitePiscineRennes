<?php
require_once('pdo/database.php');
require_once('model/activity.php');

class ActivityPDO
{
    private array $data = array();

    // Return 1 activity from database
    public function read(int $id_activity): Activity
    {
        $MySQLQuery = 'SELECT * FROM activity WHERE id_activity = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_activity]);
        $activite = null;
        if (array_key_exists($id_activity, $this->data)) {
            $activite = $this->data[$id_activity];
        } else {
            $activite = $this->returnActivities($stmt->fetchAll())[0];
        }
        return $activite;
    }

    // Return all active activities from database
    public function readAllActive(): array
    {
        $MySQLQuery = 'SELECT * FROM activity WHERE active = 1';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute();
        return $this->returnActivities($stmt->fetchAll());
    }

    // Return all activities from database
    public function readAll(): array
    {
        $MySQLQuery = 'SELECT * FROM activity';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute();
        return $this->returnActivities($stmt->fetchAll());
    }

    // Add new activity to database
    public function create(Activity $activity): int
    {
        $MySQLQuery = 'INSERT INTO activity (name, description, booking, active)
        VALUES (?, ?, ?, ?)';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([
            $activity->getName(),
            $activity->getDescription(),
            $activity->getBooking(),
            $activity->getActive()
        ]);
        return DBConnection::getInstance()->lastInsertId();
    }

    // TODO PROBABLEMENT NOT USED
    // Update existing activity
    public function update(Activity $activity): bool
    {
        $res = false;
        $MySQLQuery = 'UPDATE activity SET name=?, description=?, booking=?,
        active=? WHERE id_activity=?';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        if ($stmt->execute([
            $activity->getName(),
            $activity->getDescription(),
            $activity->getBooking(),
            $activity->getActive(),
            $activity->getIdActivity()
        ])) {
            $res = true;
        }
        return $res;
    }

    // Deactivate existing activity
    public function deactivate(Activity $activity): bool
    {
        $res = false;
        $MySQLQuery = 'UPDATE activity SET active=0 WHERE id_activity=?';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        if ($stmt->execute([$activity->getIdActivity()])) {
            $res = true;
        }
        return $res;
    }

    // Return all activities in $rows and update $data
    private function returnActivities(array $rows): array
    {
        $activities = [];
        foreach ($rows as $row) {
            $id_activity = $row['id_activity'];
            $name = $row['name'];
            $description = $row['description'];
            $booking = $row['booking'];
            $active = $row['active'];
            $activity = new Activity($name, $description, $booking, $active, $id_activity);
            $activities[] = $activity;
            $this->data[$id_activity] = $activity;
        }
        return $activities;
    }
}
