<html>
<head>

</head>

<body>

    <form method="POST" action="paiement.php">
        <div id = "choixFormule">
            <fieldset>
                <legend>Choisissez votre formule :</legend>
                <p>
                    <?php
                        foreach($formules as $formule)
                        {
                                echo '<input type="radio" name="formule" value="' . $formule['id_formule'] . '" id="' .
                                $formule['id_formule'] . '" required/> <label for="' . $formule['id_formule'] .
                                '">' . $formule['nb_entrees'] . ' entrées, ' . $formule['nb_personnes'] .
                                ' personne(s), code valable ' . $formule['duree_validite'] . ' mois à partir de l\'achat - ' .
                                $formule['prix'] . ' €</label><br />';
                        }
                    ?>
                </p>
            </fieldset>
            <input type="submit" value="Obtenir mon code">
        </div>

    </form>

</body>

</html>