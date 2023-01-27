<?php $title = "Vérification de code"; ?>
<?php ob_start(); ?>

<main>
<form method="POST" action="index.php?action=verif&step=info">
    <div class="CheckCodeSwimmingPool">
        <article>
                <h2>Saisissez votre code :</h2>
                <input type="text" name="code" id="code" maxlength=9 placeholder="XXXX-XXXX"/>
        </article>
        <button type="submit" >Valider</button>
    </div>
</form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>
