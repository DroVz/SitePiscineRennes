<?php

class Booking
{
    public Lesson $lesson;
    public Code $code;
    public string $booking_date;

    public function __construct(Lesson $lesson, Code $code, string $booking_date)
    {
        $this->lesson = $lesson;
        $this->code = $code;
        $this->booking_date = $booking_date;
    }

    public function getSession(): Lesson
    {
        return $this->lesson;
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
