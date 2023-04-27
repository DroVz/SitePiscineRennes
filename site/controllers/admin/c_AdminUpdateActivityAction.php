<?php

class AdminUpdateActivityAction
{
    function __construct()
    {
    }

    function executeActivityUpdate()
    {
        if (isset($_POST['id_activity'])) {
            $id_activity = htmlspecialchars($_POST['id_activity']);
            $name = htmlspecialchars($_POST['activityname']);
            $description = htmlspecialchars($_POST['description']);
            $booking = isset($_POST['booking']) ? 1 : 0;
            $active = isset($_POST['active']) ? 1 : 0;
            $updatedActivity = new Activity($name, $description, $booking, $active, $id_activity);
            $activityPDO = new ActivityPDO();
            if ($activityPDO->update($updatedActivity)) {
                echo "L'activité a bien été modifiée.";
            } else {
                echo "Une erreur est survenue lors de la modification de l'activité.";
            }
        }
    }
}
