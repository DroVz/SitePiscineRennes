<?php
    require_once('controllers/PiscineController.php');
    require_once('model/piscine.php');
    require_once('pdo/piscinePDO.php');
     function accueil() {
        $piscinePDO = new PiscinePDO();
        $piscinePDO->connection = new DBConnection();
        $piscines = $piscinePDO->getPiscines();  
        $selectPiscine =  $piscines[0];
        require('view/v_accueil.php');
     }
    class AccueilController {
        public function updatePiscineImage(string $name) {
            $controller = new PiscineController;
            $selectPiscine = $controller->getPiscineByName($name);
        }

    }