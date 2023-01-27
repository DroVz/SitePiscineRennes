<?php

class Booking
{
    public Session $session;
    public Code $code;
    public string $booking_date;

    public function __construct(Session $session, Code $code, string $booking_date)
    {
        $this->session = $session;
        $this->code = $code;
        $this->booking_date = $booking_date;
    }

    public function getSession(): Session
    {
        return $this->session;
    }

    public function getCode(): Code
    {
        return $this->code;
    }

    public function getBookingDate(): string
    {
        return $this->booking_date;
    }
}
