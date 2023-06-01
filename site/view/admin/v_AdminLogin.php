<?php $title = "Piscines municipales de Rennes - Page admin login"; ?>

<?php ob_start(); ?>

<main>
    <h1>Espace admin</h1>
    <form method="post" action="index.php">
        <div class="colDiv">
            <div class="vDiv divAlignRight">
                <label for="login">* Login</label>
                <label for="pwd">* Mot de passe</label>
            </div>
            <div class="vDiv divAlignLeft">
                <input id="login" type="text" name="login" required>
                <input id="pwd" type="password" name="pwd" required>
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="login">
                <input class="btnSubmit" type="submit" value="Connexion">
            </div>
        </div>
    </form>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>