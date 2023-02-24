<?php $title = "Mon panier"; ?>
<?php ob_start(); ?>

<main>
    <div>
        <?php
        echo '<h1>Mon panier</h1>';
        if (empty($choices)) {
            echo '<p>Votre panier est vide.</p>';
        } else {
            foreach ($choices as $choice) {
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
                <li>Prix unitaire : ' . $choice->getPrice() . ' €</li>
                <li>Nombre : ' . $_SESSION['cart'][$choice->getIdOffer()] . '</li>
                <li>Prix total : ' . $choice->getPrice() * $_SESSION['cart'][$choice->getIdOffer()] . ' €</li>                
                </ul>
                <form method=POST action="index.php?action=panier&step=remove">
                <input type="hidden" name="formule" value=' . $choice->getIdOffer() . '>
                <input type=submit value="Supprimer"/>
                </form>
            </div>';
            }
        }
        ?>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>