<?php

class Admin
{
    private $activities;
    private $situations;

    function __construct()
    {
        $activityPDO = new ActivityPDO();
        $this->activities = $activityPDO->readAll();
        $situationPDO = new SituationPDO();
        $this->situations = $situationPDO->getSituations();
    }

    function printActivityLines()
    {
        foreach ($this->activities as $activity) {
            $estactif = "";
            $areservation = "";
            if ($activity->getBooking() == 1)
                $areservation = "possible";
            else
                $areservation = "n/a";
            if ($activity->getActive() == 1)
                $estactif = "actif";
            else
                $estactif = "inactif";
            echo '<tr><td>' . $activity->getName() . '</td><td>' . $activity->getDescription() .
                '</td> <td class="' . $areservation . '">' . $areservation . '</td><td class="' .
                $estactif . '">' . $estactif . '</td> <td>' . $activity->getIdActivity() .
                '</td><td><a href="index.php?action=adminRedirection&step=updateActivity&id=' .
                $activity->getIdActivity() . '">ModifierActivité</a></td> </tr>';
        }
    }

    function printSituationLines()
    {
        foreach ($this->situations as $situation) {
            if ($situation->getActive() == 1)
                $estactif = "actif";
            else
                $estactif = "inactif";
            echo '
                <tr>
                    <td>' . $situation->getName() . '</td>
                    <td class="' . $estactif . '">' . $estactif . '</td>
                    <td>' . $situation->getIdSituation() . '</td>
                    <td><a href="index.php?action=adminRedirection&step=updateSituation&id=' .
                $situation->getIdSituation() . '">ModifierSituation</a></td></tr>';
        }
    }
}
