<?php $title = "Paiement"; ?>
<?php $controllerRedirection = Redirection::getInstance(); ?>

<?php ob_start(); ?>

<main>
    <h1>Choix du moyen de paiement</h1>
    <div id="divPayment">
        <div id="PaymentChoice--div">
            <form>
                <input type=button class="btnPayment" name="cb" value="Carte bancaire" onclick="PaymentClickEvent(this)" />
                <input type=button class="btnPayment" name="pp" value="Paypal" onclick="PaymentClickEvent(this)" />
            </form>
        </div>
        <div id="divCB">
            <p>Informations de carte bancaire</p>
            <form method="POST" action="index.php?action=panierRedirection&step=paymentDone">
                <label for="cbNum">Numéro</label><input type="text" id="cbNum" value="1111-2222-3333-4444" readonly></br>
                <label for="cbDate">Date d'expiration</label><input type="text" id="cbDate" value="11/28" readonly></br>
                <label for="cbCvv">CVC / CVV</label><input type="text" id="cbCvv" value="123" readonly></br>
                <label for="cbNom">Nom sur la carte</label><input type="text" id="cbCvv" value="Mme Katrinne Dupont" readonly></br>
                <input type=submit value="Valider le paiement par carte bancaire">
            </form>
        </div>
        <div id="divPP">
            <p>Informations de compte PayPal</p>
            <form method="POST" action="index.php?action=panierRedirection&step=paymentDone">
                <label for="ppMail">E-mail du compte PayPal</label><input type="text" id="ppMail" value="katrinne.dupont@mail.fr" readonly></br>
                <label for="ppMdp">Date d'expiration</label><input type="password" id="ppMdp" value="password" readonly></br>
                <input type=submit value="Valider le paiement avec PayPal">
            </form>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>