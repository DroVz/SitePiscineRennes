<?php

// require_once('pdo/sessionPDO.php');

class Session
{
    public int $id_session;
    public Pool $pool;
    public Activity $activity;
    public string $date_time;
    public string $coach;
    public int $capacity;
    public int $active;

    public function __construct(
        Pool $pool,
        Activity $activity,
        string $date_time,
        string $coach,
        int $capacity,
        int $active,
        int $id_session = -1
    ) {
        $this->id_session = $id_session;
        $this->pool = $pool;
        $this->activity = $activity;
        $this->date_time = $date_time;
        $this->coach = $coach;
        $this->capacity = $capacity;
        $this->active = $active;
    }

    public function getId_session(): int
    {
        return $this->id_session;
    }

    public function getPool(): Pool
    {
        return $this->pool;
    }

    public function getActivity(): Activity
    {
        return $this->activity;
    }

    public function getDateTime(): string
    {
        return $this->date_time;
    }

    public function getCoach(): string
    {
        return $this->coach;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function getBookingNb(): int
    {
        $seancePDO = new SessionPDO();
        $seancePDO->connection = new DBConnection();
        return $seancePDO->getBookingNb($this);
    }

    public function alreadyBooked(Code $code): bool
    {
        $seancePDO = new SessionPDO();
        $seancePDO->connection = new DBConnection();
        return $seancePDO->alreadyBooked($code, $this);
    }
}
