<?php
class BookingController {
    public function addBooking(string $id_lesson, string $id_code){
        $bookingPDO = new bookingPDO();
        $bookingPDO->create($id_lesson,$id_code);
    }
    public function dellBooking(string $id_lesson, string $id_code){

        $bookingPDO = new bookingPDO();
        $bookingPDO->delete($id_lesson,$id_code);
    }
}





?>