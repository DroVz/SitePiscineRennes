<?php

class PanierSuppression
{
    function __construct()
    {
    }

    function removeFromCart()
    {
        unset($_SESSION['cart'][$_POST["formule"]]);
        echo '<p>Le produit a été supprimé du panier</br><a href="index.php?action=panierRedirection&step=view">Voir mon panier</a>
            </br><a href="index.php?action=achatRedirection&step=initial">Retour aux formules</a></p>';
    }
}
