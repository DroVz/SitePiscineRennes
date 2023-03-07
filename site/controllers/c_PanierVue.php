<?php

class PanierVue
{
    private array $choices;
    private float $totalPrice;

    function __construct()
    {
        if (isset($_SESSION['cart'])) {
            $ids = array_keys($_SESSION['cart']);
            $offerPDO = new OfferPDO();
            $this->choices = [];
            foreach ($ids as $id) {
                $this->choices[] = $offerPDO->read($id);
            }
        }
    }

    function displayChoices()
    {
        echo '<h1>Mon panier</h1>';
        if (empty($this->choices)) {
            echo '<p>Votre panier est vide.</p>';
        } else {
            foreach ($this->choices as $choice) {
                echo '<div>
                <h2>Formule choisie</h2>
                <ul>
                <li>Activité : ' . $choice->getActivity()->getName() . '</li>
                <li>Description de l\'activité : ' . $choice->getActivity()->getDescription() . '</li>
                <li>Nombre d\'entrées : ' . $choice->getNbEntries() . '</li>
                <li>Nombre de personnes : ' . $choice->getNbPeople() . '</li>
                <li>Situation : ' . $choice->getSituation()->getName() . '</li>
                <li>Réservation nécessaire : ' . ($choice->getActivity()->getBooking() ? 'oui' : 'non') . '</li>        
                <li>Code valable ' . $choice->getValidity() . ' mois </li>
                <li>Prix unitaire : ' . number_format($choice->getPrice(), 2, ",", " ") . ' €</li>
                <li>Nombre : ' . $_SESSION['cart'][$choice->getIdOffer()] . '</li>
                <li>Prix total : ' . number_format($choice->getPrice() * $_SESSION['cart'][$choice->getIdOffer()], 2, ",", " ") . ' €</li>                
                </ul>
                <form method=POST action="index.php?action=panierRedirection&step=remove">
                <input type="hidden" name="formule" value=' . $choice->getIdOffer() . '>
                <input type=submit value="Supprimer"/>
                </form>
                </div>';
            }
            echo '<div>
            <h2>Votre commande</h2>
            <p>Nombre d\'articles : ' . sizeof($this->choices) . '</p>
            <p>Total TTC : ' . number_format($this->findTotalPrice(), 2, ",", " ") . ' €</p>
            <form method=POST action="index.php?action=panierRedirection&step=payment">
            <input type=submit value="Procéder au paiement"/>
            </form>
            </div>';
        }
    }

    function findTotalPrice()
    {
        $this->totalPrice = 0;
        foreach ($this->choices as $choice) {
            $this->totalPrice += $choice->getPrice();
        }
        return $this->totalPrice;
    }
}
