<?php $title = "Ajout au panier"; ?>
<?php ob_start(); ?>

<main>
    <div>
        <?php
        echo '<p>Le produit a bien été ajouté au panier</br><a href="index.php?action=panier&step=view">Voir mon panier</a>
        </br><a href="index.php?action=achat&step=initial">Retour aux formules</a></p>';
        ?>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>