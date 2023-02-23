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

    // Return all activities from database
    public function readAll(): array
    {
        $MySQLQuery = 'SELECT * FROM activity WHERE active = 1';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute();
        return $this->returnActivities($stmt->fetchAll());
    }

    // TODO Add new activity to database
    public function create(): void
    {
    }

    // TODO Update existing activity
    public function update(): void
    {
    }

    // TODO Delete activity from database
    public function delete(): void
    {
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
