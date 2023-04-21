
<?php require_once('controllers/c_CodeVerification.php') ?>
<?php $title = "Vérification de code"; ?>
<?php ob_start(); ?>
<?php  $ControllerCodeVerification = new CodeVerification ?>

<main>
    <form method="POST"  action="index.php">
        <div class="CheckCodeSwimmingPool">
            <article>
                    <h2>Saisissez votre code :</h2>
                    <?php $ControllerCodeVerification->printDefaultValue() ?>
            </article>
            <!-- Information de redirection -->
            <input type="hidden" name="step" value="info">
            <input type="hidden" name="action" value="codeRedirection">
            <button type="submit">Valider</button>

        </div>
    </form>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>
