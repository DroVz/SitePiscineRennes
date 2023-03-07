<?php $title = "Paiement"; ?>
<?php $controllerRedirection = Redirection::getInstance(); ?>

<?php ob_start(); ?>

<main>
    <div>
        <h2>Choix du moyen de paiement</h2>
        <div style=display:flex;align-content:space-around;width:80vh>
            <form>
                <input type=button style=border-style:solid;height:20vh;width:30vh name="cb" value="Carte bancaire" onclick="PaymentClickEvent(this)" />
                <input type=button style=border-style:solid;height:20vh;width:30vh name="pp" value="Paypal" onclick="PaymentClickEvent(this)" />
            </form>
        </div>
    </div>
    <div id="CB--div">
        <p>Informations de carte bancaire</p>
        <form method="POST" action="index.php?action=panierRedirection&step=paymentDone">
            <input type=submit value="Valider le paiement par carte bancaire">
        </form>
    </div>
    <div id="PayPal--div">
        <p>Informations de compte PayPal</p>
        <form method="POST" action="index.php?action=panierRedirection&step=paymentDone">
            <input type=submit value="Valider le paiement avec PayPal">
        </form>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>