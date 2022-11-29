<?php
    include_once('model/model.php');
    $conn = getConnection();

    $formule = $_POST["formule"];

    // appel à fonction pour
    // 1. générer un code
    // 2. boucler tant que le code n'est pas nouveau (fonction doit rechercher les codes existants)
    $generatedCode = "";
    while ($generatedCode == null || alreadyExists($conn, $generatedCode)) {
        $generatedCode = generateCode();
    };

    // 3. une fois qu'on a un code qui n'existe pas déjà, faire un update de la base
    addCode($conn, $formule, $generatedCode);

    // 4. donner le code à l'utilisateur (c'est la vue qui s'en occupe)
    require('v_paiement.php');
    