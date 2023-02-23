<?php $title = "Informations sur votre code"; ?>
<?php ob_start(); ?>
<?php $ControllerCodeInformation = new CodeInformation()?>

<main>
   

<?php $ControllerCodeInformation->printCode(); ?>

    <div>
        <h2>Formule</h2>
        <ul>
            <?php $ControllerCodeInformation->printOptionDescription() ?>
        </ul>
    </div>
    <div>
        <h2>Validité</h2>
        <ul>
           <?php $ControllerCodeInformation->printValidity() ?>              
        </ul>
    </div>
    <!-- Si le code correspond à une formule nécessitant une réservation -->
    <?php $ControllerCodeInformation->printBookingInformations() ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>