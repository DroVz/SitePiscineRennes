<?php

class ChoixFormule
{
    private $offers;

    function __construct()
    {
        $id_activity = $_POST["activity"];
        $activity = $this->getActivity($id_activity);
        $id_situation = $_POST["situation"];
        $situation = $this->getSituation($id_situation);
        $offerPDO = new OfferPDO();
        $this->offers = $offerPDO->readAll($activity, $situation);
    }

    function getActivity(int $id_activity)
    {
        $activityPDO = new ActivityPDO();
        return $activityPDO->read($_POST["activity"]);
    }

    function getSituation(int $id_situation)
    {
        $situationPDO = new SituationPDO();
        return $situationPDO->getSituation($_POST["situation"]);
    }

    function printOffers()
    {
        foreach ($this->offers as $offer) {
            echo '<input type="radio" name="formule" value="' . $offer->getIdOffer() . '" id="' .
                $offer->getIdOffer() . '" required/> <label for="' . $offer->getIdOffer() .
                '">' . $offer->getNbEntries() . ' entrées, ' . $offer->getNbPeople() .
                ' personne(s), code valable ' . $offer->getValidity() . ' mois à partir de l\'achat - ' .
                number_format($offer->getPrice(), 2, ",", " ") . ' €</label><br />';
        }
    }
}
