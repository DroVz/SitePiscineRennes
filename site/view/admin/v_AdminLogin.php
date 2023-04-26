<?php $title = "Piscines municipales de Rennes - Page admin login"; ?>

<?php ob_start(); ?>

<main>
    <h1>Espace admin</h1>
    <form method="post" action="index.php?action=adminRedirection&step=login">
        <label for="login">Login</label><input id="login" type="text" name="login" required>
        <label for="pwd">Mot de passe</label><input id="pwd" type="password" name="pwd" required>
        <input type="submit" value="Connexion">
    </form>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>