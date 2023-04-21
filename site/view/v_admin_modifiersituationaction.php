<?php
$title = "Piscines municipales de Rennes - Page Administrative - Modification Situation Effectué";

$bd = new PDO('mysql:host=localhost;dbname=pools;charset=utf8', "root", "");

if(isset($_POST['id_situation'])) {
    $id_situation = htmlspecialchars($_POST['id_situation']);

    $query = $bd->prepare('UPDATE situation SET name = :name, active = :active WHERE id_situation = :id');
    $query->bindParam(':name', $_POST['situationname']);
    $query->bindParam(':active', $_POST['active']);
    $query->bindParam(':id', $id_situation);

    if($query->execute()) {
        echo "La Situation a bien été modifiée.";
    } else {
        echo "Une erreur est survenue lors de la modification de la Situation.";
    }
}
?>
