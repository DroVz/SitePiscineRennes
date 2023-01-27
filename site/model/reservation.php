<?php

class Reservation {
    public Seance $seance;
    public Code $code;
    public string $date_reservation;

    public function __construct(Seance $seance, Code $code, string $date_reservation) {
        $this->seance = $seance;
        $this->code = $code;
        $this->date_reservation = $date_reservation;
    }

    public function getSeance() : Seance {
        return $this->seance; 
    }

    public function getCode() : Code {
        return $this->code; 
    }

    public function getDate_reservation() : string {
        return $this->date_reservation; 
    }
 }