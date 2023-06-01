<?php

class AdminUpdateSituation
{
    private $situationToUpdate;

    function __construct()
    {
        $situationID = intval($_POST["id"]);
        $situationPDO = new SituationPDO();
        $this->situationToUpdate = $situationPDO->getSituation($situationID);
    }

    function printUpdateSituationForm()
    {
        echo '
        <form method="post" action="index.php">
        <label for="situationname">Libellé de la situation :</label>
        <input type="text" name="situationname" id="situationname" value="' .
            $this->situationToUpdate->getName() . '" required>
        <br><br>
        <label><input type="checkbox" name="active" value="1" ' .
            ($this->situationToUpdate->getActive() == 1 ? "checked" : "") . '>Situation disponible</label>
        <br><br>
        <input type="hidden" name="action" value="adminRedirection">
        <input type="hidden" name="step" value="updateSituationAction">
        <input type="hidden" name="id_situation" value="' . $this->situationToUpdate->getIdSituation() . '">
        <button type="submit">Modifier la situation</button>
        </form>';
    }
}
