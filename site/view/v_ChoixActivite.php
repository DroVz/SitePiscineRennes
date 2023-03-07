<?php require_once('controllers/c_ChoixActivite.php') ?>
<?php $title = "Achat de code"; ?>

<?php ob_start(); ?>

<?php $ControllerChoixActivite = new ChoixActivite ?>

<main>
    <h1>Choisissez votre activité et votre situation</h1>
    <form method="post" action="index.php?action=achatRedirection&step=offer">
        <div id="choixActivite">
            <fieldset>
                <legend>Choisir une activité :</legend>
                <?php $ControllerChoixActivite->printActivites(); ?>
            </fieldset>
        </div>
        <div id="choixSituation">
            <fieldset>
                <legend>Quelle est votre situation ?</legend>
                <?php $ControllerChoixActivite->printSituations(); ?>
            </fieldset>
        </div>
        <input type="submit" value="Choisir la formule">
    </form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>