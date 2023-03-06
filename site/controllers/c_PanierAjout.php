<?php

class PanierAjout
{
    private $selectedOption;

    function __construct()
    {
        $optionPDO = new OfferPDO();
        if (isset($_POST['formule'])) {
            $this->selectedOption = $optionPDO->read($_POST["formule"]);
        }
    }

    public function checkOfferExists()
    {
        $result = true;
        if (empty($this->selectedOption)) {
            $result = false;
        }
        return $result;
    }

    function addToCart()
    {
        if ($this->checkOfferExists()) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            if (!isset($_SESSION['cart'][$_POST["formule"]])) {
                $_SESSION['cart'][$_POST["formule"]] = 0;
            }
            // TODO pour l'instant, impossible de mettre 2 fois la même formule dans un panier (c'est voulu)
            $_SESSION['cart'][$_POST["formule"]] = 1;
            echo '<p>Le produit a bien été ajouté au panier</br><a href="index.php?action=panierRedirection&step=view">Voir mon panier</a>
            </br><a href="index.php?action=achatRedirection&step=initial">Retour aux formules</a></p>';
        } else {
            echo "<p>Cette formule n'existe pas</p>";
        }
    }
}
