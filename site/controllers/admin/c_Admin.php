<?php

class Admin
{
    private $activities;
    private $situations;
    private $login;

    function __construct()
    {
        $activityPDO = new ActivityPDO();
        $this->activities = $activityPDO->readAll();
        $situationPDO = new SituationPDO();
        $this->situations = $situationPDO->getSituations();
        $this->login = $_SESSION['login'];
    }

    function printInfoConnection()
    {
        echo '<p>Connecté en tant que ' . $this->login . '</p>';
    }

    function printActivityLines()
    {
        foreach ($this->activities as $activity) {
            $estactif = "";
            $areservation = "";
            if ($activity->getBooking() == 1)
                $areservation = "oui";
            else
                $areservation = "non";
            if ($activity->getActive() == 1)
                $estactif = "actif";
            else
                $estactif = "inactif";
            echo '<tr>
                <td>' . $activity->getIdActivity() . '</td>
                <td>' . $activity->getName() . '</td>
                <td>' . $activity->getDescription() . '</td>
           

                <td class="' . $areservation . '">' . $areservation . '</td>
                <td class="' . $estactif . '">' . $estactif . '</td>
                
                <td><a class="a-nostyle" href="index.php?action=adminRedirection&step=updateActivity&id=' .
                $activity->getIdActivity() . '"><img class="adminIcon" src="view/img/edit.ico" /></a></td>';
            if ($activity->getActive() == 1) {
                echo '<td><a class="a-nostyle" href="index.php?action=adminRedirection&step=deactivate&type=activity&id=' .
                    $activity->getIdActivity() . '"><img class="adminIcon" src="view/img/delete.ico" /></a></td></tr>';
            } else {
                echo '<td></td></tr>';
            }
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
                    <td><a class="a-nostyle" href="index.php?action=adminRedirection&step=updateSituation&id=' .
                $situation->getIdSituation() . '"><img class="adminIcon" src="view/img/edit.ico" /></a></td>';
            if ($situation->getActive() == 1) {
                echo '<td><a class="a-nostyle" href="index.php?action=adminRedirection&step=deactivate&type=situation&id=' .
                    $situation->getIdSituation() . '"><img class="adminIcon" src="view/img/delete.ico" /></a></td></tr>';
            } else {
                echo '<td></td></tr>';
            }
        }
    }
}
