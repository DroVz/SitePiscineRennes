<?php
$title = "Piscines municipales de Rennes - Page Administrative - Ajout Activité";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $libelle = $_POST["activityname"];
    $description = $_POST["description"];
    $reservation = isset($_POST["booking"]) ? 1 : 0;
    $actif = isset($_POST["active"]) ? 1 : 0;

    if(!empty($libelle) || !empty($description)) {
    
    $bd = new PDO('mysql:host=localhost;dbname=pools;charset=utf8', "root", "");


    $stmt = $bd->prepare("INSERT INTO activity (name, description, booking, active) VALUES (:libelle, :description, :reservation, :actif)");
    $stmt->bindParam(':libelle', $libelle);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':reservation', $reservation);
    $stmt->bindParam(':actif', $actif);
    $stmt->execute();

    header("Location: /index.php?action=admin");
    exit(); 

} else {
    

    header("Location: /index.php?action=admin");
    
}
}

?>
