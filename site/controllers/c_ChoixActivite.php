<?php

class ChoixActivite
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

    function printActivites()
    {
        foreach ($this->activities as $activity) {
            echo '<input type="radio" name="activity" value="' . $activity->getIdActivity() . '" id="' .
                $activity->getIdActivity() . '" required/> <label for="' . $activity->getIdActivity() .
                '">' . $activity->getName() . ' (' . $activity->getDescription() . ')' . '</label><br />';
        }
    }

    function printSituations()
    {
        foreach ($this->situations as $situation) {
            echo '<input type="radio" name="situation" value="' . $situation->getIdSituation() . '" id="' .
                $situation->getIdSituation() . '" required/> <label for="' . $situation->getIdSituation() .
                '">' . $situation->getName() . '</label><br />';
        }
    }
}
