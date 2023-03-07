<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $libelle = $_POST["libelle"];
    $description = $_POST["description"];
    $reservation = isset($_POST["reservation"]) ? 1 : 0;
    $actif = isset($_POST["actif"]) ? 1 : 0;

    if(!empty($libelle) || !empty($description)) {
    
    $bd = new PDO('mysql:host=localhost;dbname=piscines;charset=utf8', "root", "");


    $stmt = $bd->prepare("INSERT INTO activite (libelle, description, reservation, actif) VALUES (:libelle, :description, :reservation, :actif)");
    $stmt->bindParam(':libelle', $libelle);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':reservation', $reservation);
    $stmt->bindParam(':actif', $actif);
    $stmt->execute();

    header("Location: http://localhost/index.php?action=admin");
    exit(); 

} else {
    
    echo "Les champs libellé et description sont obligatoires";
    sleep(2);

}





}

?>
