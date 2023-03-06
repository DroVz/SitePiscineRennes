<?php $title = "Votre code"; ?>


<?php ob_start(); ?>

<main>
    <p>
        <?php
        echo 'Votre code : ' . $newCode->getCodeString();
        ?>
    </p>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>

<!-- // TODO ne sera sans doute plus utilisé tel quel, maintenant qu'on a un panier
   A renommer en "v_paiement" ou quelque chose comme ça -->