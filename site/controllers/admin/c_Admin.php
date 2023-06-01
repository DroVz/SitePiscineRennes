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
                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="updateActivity">
                <input type="hidden" name="type" value="activity">
                <input type="hidden" name="id" value="'. $activity->getIdActivity() .'">
                <td> <button type="submit">
                <img class="adminIcon" src="view/img/edit.ico" />
                </button></td>
                </form>
                ';
            if ($activity->getActive() == 1) {
                echo '
                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="deactivate">
                <input type="hidden" name="type" value="activity">
                <input type="hidden" name="id" value="'. $activity->getIdActivity() .'">
                <td> <button type="submit">
                <img class="adminIcon" src="view/img/delete.ico" />
                </button></td>
                </form>
                </td></tr>
                ';
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

                    <form method="post" action="index.php">
                    <input type="hidden" name="action" value="adminRedirection">
                    <input type="hidden" name="step" value="updateSituation">
                    <input type="hidden" name="id" value="'. $situation->getIdSituation() .'">
                    <td> <button type="submit">
                    <img class="adminIcon" src="view/img/edit.ico" />
                    </button></td>
                    </form>
                    </td>
                    ';
        
            if ($situation->getActive() == 1) {
                echo '
                    <form method="post" action="index.php">
                    <input type="hidden" name="action" value="adminRedirection">
                    <input type="hidden" name="step" value="deactivate">
                    <input type="hidden" name="type" value="situation">
                    <input type="hidden" name="id" value="'. $situation->getIdSituation() .'">
                    <td> <button type="submit">
                    <img class="adminIcon" src="view/img/delete.ico" />
                    </button></td>
                    </form>
                    </td></tr>
                    ';
            } else {
                echo '<td></td></tr>';
            }
        }
    }
}
