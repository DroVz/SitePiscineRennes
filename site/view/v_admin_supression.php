<?php
$title = "Piscines municipales de Rennes - Page Administrative - Supression Element";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Type = $_POST["SupressionType"];
    $ID = $_POST["SupressionID"];
    $TypeComprehension="";

    if(!empty($Type) || !empty($ID)) {
    
        $bd = new PDO('mysql:host=localhost;dbname=pools;charset=utf8', "root", "");

        switch($Type){

            case'activity':
                $TypeComprehension="id_activity";
                break;

            case'situation':
                $TypeComprehension="id_situation";
                break;
        }

        $sql = "DELETE FROM " . $Type . " WHERE " . $TypeComprehension . "=:ID ";
        $stmt = $bd->prepare($sql);
        $stmt->bindParam(':ID', $ID);
        $stmt->execute();

        header("Location: http://localhost/index.php?action=admin");
        exit(); 

    } else {
        header("Location: http://localhost/index.php?action=admin");

    }
}

?>
