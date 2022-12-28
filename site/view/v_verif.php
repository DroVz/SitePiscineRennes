<?php $title = "Vérification de code"; ?>

<?php ob_start(); ?>

<main>
    <form method="POST" action="index.php?action=verif&step=info">
        <p>
            <label for="code">Saisissez votre code :</label>
            <input type="text" name="code" id="code" maxlength=9 placeholder="XXXX-XXXX"/>
        </p>
        <p>  
            <input type="submit" value="Voir les infos du code" />
        </p>
    </form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>