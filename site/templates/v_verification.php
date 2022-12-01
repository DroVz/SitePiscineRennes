<?php $title = "Choisissez votre activité"; ?>

<?php ob_start(); ?>

    <form method="POST" action="index.php">
        <p>
            <label for="code">Saisissez votre code :</label>
            <input type="text" name="code" id="code" maxlength=6 placeholder="Votre code"/>
        </p>
        <p>  
            <input type="hidden" id="action" name="action" value="infocode">  
            <input type="submit" value="Voir les infos du code" />
        </p>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php') ?>