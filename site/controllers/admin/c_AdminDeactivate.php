<?php

class AdminDeactivate
{
    private $situation;
    private $activity;

    function __construct()
    {
        $type = $_POST["elementType"];
        $id = $_POST["elementID"];
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
            $activityPDO = new ActivityPDO();
            $activityPDO->deactivate($this->activity);
            echo "L'activité a été désactivée";
        } else if ($this->situation != null) {
            $situationPDO = new SituationPDO();
            $situationPDO->deactivate($this->situation);
            echo "La situation a été désactivée";
        }
    }
}
