<?php
class BookingController {
    public function addBooking($id_lesson, Code $id_code){

        $bookingPDO = new bookingPDO();
        $bookingPDO->create($id_lesson,$id_code);
    }
}





?>