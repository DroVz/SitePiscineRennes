<?php

class AdminUpdateSituation
{
    private $situationToUpdate;

    function __construct()
    {
        $situationID = intval($_GET["id"]);
        $situationPDO = new SituationPDO();
        $this->situationToUpdate = $situationPDO->getSituation($situationID);
    }

    function printUpdateSituationForm()
    {
        echo '
        <form method="post" action="index.php?action=adminRedirection&step=updateSituationAction">
        <label for="situationname">Libellé de la situation :</label>
        <input type="text" name="situationname" id="situationname" value="' .
            $this->situationToUpdate->getName() . '" required>
        <br><br>
        <label><input type="checkbox" name="active" value="1" ' .
            ($this->situationToUpdate->getActive() == 1 ? "checked" : "") . '>Situation disponible</label>
        <br><br>
        <input type="hidden" name="id_situation" value="' . $this->situationToUpdate->getIdSituation() . '">
        <button type="submit">Modifier la situation</button>
        </form>';
    }
}
