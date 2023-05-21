<?php

class CodeObtention
{
    private array $choices;
    private array $purchasedCodes;

    function __construct()
    {
        // TODO réduire le gaspillage, il y a un constructeur identique dans c_PanierVue
        $ids = array_keys($_SESSION['cart']);
        $offerPDO = new OfferPDO();
        $this->choices = [];
        foreach ($ids as $id) {
            $this->choices[] = $offerPDO->read($id);
        }
        $this->generateAllCodes();
    }

    public function displayPurchasedCodes()
    {
        // TODO réduire le gaspillage, CodeInformation fait déjà la même chose
        foreach ($this->purchasedCodes as $purchasedCode) {
            $strMois = " +" . $purchasedCode->getOffer()->getValidity() . " month";
            $dateValidite = $purchasedCode->getGenerationDate();
            $dateValidite = date('d/m/Y à 23:59', strtotime($strMois, strtotime($dateValidite)));
            echo '<div>
            <h2>Votre code : ' . $purchasedCode->getCodeString() . '</h2>
            <ul>
            <li>Activité : ' . $purchasedCode->getOffer()->getActivity()->getName() . '</li>
            <li>Description de l\'activité : ' . $purchasedCode->getOffer()->getActivity()->getDescription() . '</li>
            <li>Nombre d\'entrées : ' . $purchasedCode->getOffer()->getNbEntries() . '</li>
            <li>Nombre de personnes : ' . $purchasedCode->getOffer()->getNbPeople() . '</li>
            <li>Situation : ' . $purchasedCode->getOffer()->getSituation()->getName() . '</li>
            <li>Réservation nécessaire : ' . ($purchasedCode->getOffer()->getActivity()->getBooking() ? 'oui' : 'non') . '</li>        
            <li>Date d\'achat : ' . date('d/m/Y à H:i', strtotime($purchasedCode->getGenerationDate())) . '</li>              
            <li>Code valable ' . $purchasedCode->getOffer()->getValidity() . ' mois </li>
            <li>Code valable jusqu\'au ' . $dateValidite . '</li>
            <li>Entrées restantes : ' . $purchasedCode->getRemainingEntries() . '</li>             
            </ul>
            </div>';
        }
    }

    public function emptyCart(): void
    {
        unset($_SESSION['cart']);
    }

    public function generateAllCodes()
    {
        foreach ($this->choices as $choice) {
            $newCode = $this->generateCode($choice);
            $this->purchasedCodes[] = $newCode;
        }
    }

    public function generateCode(Offer $offer): Code
    {
        $codePDO = new CodePDO();
        $newCode = $codePDO->newCode($offer);
        $code_id = $codePDO->create($newCode);
        return $codePDO->read($code_id);
    }
}
