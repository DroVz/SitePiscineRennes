<?php require_once('controllers/c_ChoixFormule.php') ?>
<?php $title = "Choix de la formule"; ?>
<?php $controllerRedirection = Redirection::getInstance(); ?>

<?php ob_start(); ?>

<?php $controllerChoixFormule = new ChoixFormule() ?>

<main>
    <h1>Choix de la formule</h1>
    <form method="POST" action="index.php?action=panierRedirection&step=add">
        <div id="choixFormule">
            <fieldset>
                <legend>Choisissez votre formule :</legend>
                <p>
                    <?php $controllerChoixFormule->printOffers(); ?>
                </p>
            </fieldset>
            <input type="submit" value="Ajouter au panier">
        </div>
    </form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>