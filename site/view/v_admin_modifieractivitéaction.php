<?php
$title = "Piscines municipales de Rennes - Page Administrative - Modification Activité Effectué";

$bd = new PDO('mysql:host=localhost;dbname=pools;charset=utf8', "root", "");

if(isset($_POST['id_activity'])) {
    $id_activity = htmlspecialchars($_POST['id_activity']);

    $query = $bd->prepare('UPDATE activity SET name = :name, description = :description, booking = :booking, active = :active WHERE id_activity = :id');
    $query->bindParam(':name', $_POST['activityname']);
    $query->bindParam(':description', $_POST['description']);
    $query->bindParam(':booking', $_POST['booking']);
    $query->bindParam(':active', $_POST['active']);
    $query->bindParam(':id', $id_activity);

    if($query->execute()) {
        echo "L'activité a bien été modifiée.";
    } else {
        echo "Une erreur est survenue lors de la modification de l'activité.";
    }
}
?>
