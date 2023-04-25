<?php

class AdminUpdateSituationAction
{
    function __construct()
    {
    }

    function executeSituationUpdate()
    {
        if (isset($_POST['id_situation'])) {
            $id_situation = htmlspecialchars($_POST['id_situation']);
            $name = htmlspecialchars($_POST['situationname']);
            $active = isset($_POST['active']) ? 1 : 0;
            $updatedSituation = new Situation($name, $active, $id_situation);
            $situationPDO = new SituationPDO();
            if ($situationPDO->update($updatedSituation)) {
                echo "La situation a bien été modifiée.";
            } else {
                echo "Une erreur est survenue lors de la modification de la situation.";
            }
        }
    }
}
