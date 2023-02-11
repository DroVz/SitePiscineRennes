<?php

function panier()
{
    require_once('model/offer.php');
    require_once('pdo/offerPDO.php');

    $step = htmlspecialchars($_GET['step']);
    if (empty($step)) {
        $step = 'add';
    }

    switch ($step) {
        case 'add':
            $optionPDO = new OfferPDO();
            $optionPDO->connection = new DBConnection();
            if (isset($_POST['formule'])) {
                $option = $optionPDO->read($_POST["formule"]);
            }
            if (empty($option)) {
                die("Cette formule n'existe pas");
            }
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            if (!isset($_SESSION['cart'][$_POST["formule"]])) {
                $_SESSION['cart'][$_POST["formule"]] = 0;
            }
            $_SESSION['cart'][$_POST["formule"]] += 1;
            require('view/v_panierAjout.php');
            break;
        case 'remove':
            unset($_SESSION['cart'][$_POST["formule"]]);
            $ids = array_keys($_SESSION['cart']);
            $optionPDO = new OfferPDO();
            $optionPDO->connection = new DBConnection();
            $choices = [];
            foreach ($ids as $id) {
                $choices[] = $optionPDO->read($id);
            }
            require('view/v_panierVue.php');
            break;
        case 'view':
            $ids = array_keys($_SESSION['cart']);
            $optionPDO = new OfferPDO();
            $optionPDO->connection = new DBConnection();
            $choices = [];
            foreach ($ids as $id) {
                $choices[] = $optionPDO->read($id);
            }
            require('view/v_panierVue.php');
            break;
    }
}
