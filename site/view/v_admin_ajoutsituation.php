<?php
$title = "Piscines municipales de Rennes - Page Administrative - Ajout Situation";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $libelle = $_POST["situationname"];
    $actif = isset($_POST["active"]) ? 1 : 0;

    if(!empty($libelle) || !empty($description)) {
    
    $bd = new PDO('mysql:host=localhost;dbname=pools;charset=utf8', "root", "");


    $stmt = $bd->prepare("INSERT INTO situation (name, active) VALUES (:libelle, :actif)");
    $stmt->bindParam(':libelle', $libelle);
    $stmt->bindParam(':actif', $actif);
    $stmt->execute();

    header("Location: /index.php?action=admin");
    exit(); 

} else {
    
    
    header("Location: /index.php?action=admin");

}
}

?>
