<?php

class AdminAddActivity
{
    private $newActivity;

    function __construct()
    {
        $activityname = $_POST["activityname"];
        $description = $_POST["description"];
        $active = isset($_POST["active"]) ? 1 : 0;
        $booking = isset($_POST["booking"]) ? 1 : 0;
        $this->newActivity = new Activity($activityname, $description, $booking, $active);
    }

    function printAddActivityResult()
    {
        $activityPDO = new ActivityPDO();
        if ($activityPDO->create($this->newActivity)) {
            echo "<p>L'activité a été ajoutée</p>";
        } else {
            echo "<p>Echec de l'enregistrement</p>";
        }
    }
}
