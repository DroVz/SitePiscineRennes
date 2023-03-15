<?php 

class CodeInformation {

    public $code;
    public $strMois;
    public $dateValidite;

    function __construct()
    {
        $codePDO = new CodePDO();
        $idCode = $codePDO->getId($_POST["code"]);

        $this->code =  $codePDO->read($idCode);
        $strMois = " +" . $this->code->getOffer()->getValidity() . " month";
        $dateValidite = $this->code->getGenerationDate();
        $dateValidite = date('d/m/Y à 23:59', strtotime($strMois, strtotime($dateValidite)));
    }
    
    function printCode(){
        echo '<h1>Informations du code ' . $this->code->getCodeString() . '</h1>';
    }

    function printOptionDescription() {
        echo '<li>Activité : ' . $this->code->getOffer()->getActivity()->getName() . '</li>
              <li>Description de l\'activité : ' . $this->code->getOffer()->getActivity()->getDescription() . '</li>
              <li>Nombre d\'entrées : ' . $this->code->getOffer()->getNbEntries() . '</li>
              <li>Nombre de personnes : ' . $this->code->getOffer()->getNbPeople() . '</li>
              <li>Votre situation : ' . $this->code->getOffer()->getSituation()->getName() . '</li>
              <li>Réservation nécessaire : ' . ($this->code->getOffer()->getActivity()->getBooking() ? 'oui' : 'non') . '</li>';
    }
    function printValidity(){
       echo '<li>Date d\'achat : ' . date('d/m/Y à H:i', strtotime($this->code->getGenerationDate())) . '</li>              
             <li>Code valable ' . $this->code->getOffer()->getValidity() . ' mois </li>
             <li>Code valable jusqu\'au ' . $this->dateValidite . '</li>
             <li>Entrées restantes : ' . $this->code->getRemainingEntries() . '</li>' ;
    }
    function printBookingInformations(){
        if ($this->code->getOffer()->getActivity()->getBooking()) {
            echo '<form  method="POST" action="index.php?action=codeRedirection&step=booking">
                  <input type="hidden" id="id_code" name="id_code" value=' . $this->code->getId_code() . ' /input>
                  <input type="hidden" id="id_activity" name="id_activity" value=' . $this->code->getOffer()->getActivity()->getIdActivity() . ' /input>
                  <input type="hidden" id="nb_entries" name="nb_entries" value=' . $this->code->getOffer()->getNbEntries() . ' /input>
                  <input class="blueLink" type=submit value="Gérer les réservations"/>
                  </form>';
        }
    }
}
