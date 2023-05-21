<?php

class AdminDeactivate
{
    private $situation;
    private $activity;

    function __construct()
    {
        $type = $_GET["type"];
        $id = $_GET["id"];
        switch ($type) {
            case 'activity':
                $activityPDO = new ActivityPDO();
                $this->activity = $activityPDO->read($id);
                break;
            case 'situation':
                $situationPDO = new SituationPDO();
                $this->situation = $situationPDO->getSituation($id);
                break;
        }
    }

    function printDeactivateResult()
    {
        if ($this->activity != null) {
            $this->activity->setActive(0);
            $activityPDO = new ActivityPDO();
            $activityPDO->update($this->activity);
            echo "L'activité a été désactivée";
        } else if ($this->situation != null) {
            $this->situation->setActive(0);
            $situationPDO = new SituationPDO();
            $situationPDO->update($this->situation);
            echo "La situation a été désactivée";
        }
    }
}
