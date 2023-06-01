<?php $title = "Paiement"; ?>
<?php $controllerRedirection = Redirection::getInstance(); ?>

<?php ob_start(); ?>

<main>
    <h1>Choix du moyen de paiement</h1>
    <div id="divPaymentSelect">
        <form>
            <input type=button class="btnPayment" name="divCB" value="Carte bancaire" onclick="paymentClickEvent(this)" />
            <input type=button class="btnPayment" name="divPP" value="PayPal" onclick="paymentClickEvent(this)" />
        </form>
    </div>
    <div id="divPayment">
        <div class="divInvisible divPaymentOption" id="divCB">
            <h2>Informations de carte bancaire</h2>
            <form method="POST" action="index.php">
                <div class="colDiv">
                    <div class="vDiv divAlignRight">
                        <label for="cbNum">* Numéro</label>
                        <label for="cbDate">* Date d'expiration</label>
                        <label for="cbCvv">* CVC / CVV</label>
                        <label for="cbNom">* Nom sur la carte</label>
                    </div>
                    <div class="vDiv divAlignLeft">
                        <input type="text" id="cbNum" value="1111-2222-3333-4444" readonly>
                        <input type="text" id="cbDate" value="11/28" readonly>
                        <input type="text" id="cbCvv" value="123" readonly>
                        <input type="text" id="cbNom" value="Mme Katrinne Dupont" readonly>
                        <input type="hidden" name="action" value="panierRedirection">
                        <input type="hidden" name="step" value="paymentDone">
                        <input type=submit value="Valider le paiement par carte bancaire">
                    </div>
                </div>
            </form>
        </div>
        <div class="divInvisible divPaymentOption" id="divPP">
            <h2>Informations de compte PayPal</h2>
            <form method="POST" action="index.php">
                <div class="colDiv">
                    <div class="vDiv divAlignRight">
                        <label for="ppMail">* E-mail du compte PayPal</label>
                        <label for="ppMdp">* Mot de passe</label>
                    </div>
                    <div class="vDiv divAlignLeft">
                        <input type="text" id="ppMail" value="katrinne.dupont@mail.fr" readonly>
                        <input type="password" id="ppMdp" value="password" readonly>
                        <input type="hidden" name="action" value="panierRedirection">
                        <input type="hidden" name="step" value="paymentDone">
                        <input type=submit value="Valider le paiement avec PayPal">
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>