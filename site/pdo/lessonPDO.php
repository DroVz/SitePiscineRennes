<?php

require_once('pdo/database.php');
require_once('model/lesson.php');

class LessonPDO
{
    private array $data = array();

    // Return 1 lesson from database
    public function read(int $id_lesson): Lesson
    {
        $MySQLQuery = 'SELECT * FROM lesson WHERE id_lesson = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_lesson]);
        $lesson = null;
        if (array_key_exists($id_lesson, $this->data)) {
            $lesson = $this->data[$id_lesson];
        } else {
            $lesson = $this->returnLessons($stmt->fetchAll())[0];
        }
        return $lesson;
    }

    // Return all available lessons for a given activity
    public function readAll(Activity $activity): array
    {
        $MySQLQuery = 'SELECT l.id_lesson, l.id_pool, l.id_activity, l.date_time, l.coach, l.capacity
        FROM lesson l
        LEFT JOIN lesson_code lc ON (l.id_lesson = lc.id_lesson)
        WHERE l.id_activity = ? AND l.active = 1
        GROUP BY l.id_lesson
        ORDER BY l.id_pool';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$activity->getIdActivity()]);
        return $this->returnLessons($stmt->fetchAll());
    }

    // Return booking number for a given lesson
    public function getBookingNb(Lesson $lesson): int
    {
        $MySQLQuery = 'SELECT COUNT(*) as bookingNb
        FROM lesson_code lc
        WHERE lc.id_lesson = ?';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$lesson->getId_lesson()]);
        while ($row = $stmt->fetch()) {
            $occupation = $row['bookingNb'];
        }
        return $occupation;
    }

    // return true if given code has already a booking for given lesson
    public function alreadyBooked(Code $code, Lesson $lesson): bool
    {
        $MySQLQuery = 'SELECT * FROM lesson_code lc WHERE sc.id_code = ? AND sc.id_lesson = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$code->getId_code(), $lesson->getId_lesson()]);
        if ($row = $stmt->fetch()) {
            return true;
        } else {
            return false;
        }
    }

    // Return all lessons in $rows and update $data
    private function returnLessons(array $rows): array
    {
        $lessons = [];
        foreach ($rows as $row) {
            $id_lesson = $row['id_lesson'];
            $poolPDO = new PoolPDO();
            $pool = $poolPDO->read($row["id_pool"]);
            $activityPDO = new ActivityPDO();
            $activity = $activityPDO->read($row["id_activity"]);
            $datetime = $row['date_time'];
            $coach = $row['coach'];
            $capacity = $row['capacity'];
            $lesson = new Lesson($pool, $activity, $datetime, $coach, $capacity, 1, $id_lesson);
            $lessons[] = $lesson;
            $this->data[$id_lesson] = $lesson;
        }
        return $lessons;
    }
}
