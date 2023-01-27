<?php $title = "Piscines municipales de Rennes - Page Administrative"; ?>

<?php ob_start(); ?>

<main>
    <form method="post" action=>
    <h1> Gestion Des Options </h1>
    <div>
        <ul>


                <table>
                

                <p>-Libelle&emsp;&emsp;Description&emsp;&emsp;réservation&emsp;&emsp;En Activité</p>

                <fieldset>
                <?php
                foreach($activite as $activite) {
                    echo '<li>' . $activite['libelle'] ."&emsp;"."&emsp;". $activite['description'] ."&emsp;"."&emsp;". $activite['reservation'] ."&emsp;"."&emsp;". $activite['actif'] .  '</li>'.'<input type="radio" name="activite" value="' . $activite['id_activite'] . '" >'; 
                }
                    
               ?>
                </fieldset>
                <br><br> <input type="submit" value="Modifier Une Activité"> &emsp; <input type="" value="Supprimer Une Activité">

                </table>

                <br><br><br>
               
                <table>

                

               <p>-Libelle&emsp;&emsp;En Activité</p>
                
               <fieldset>
               <?php
               
                foreach($situation as $situation) {
                    echo '<li>' . $situation['libelle'] ."&emsp;"."&emsp;". $situation['actif'] .  '</li>'.'<input type="radio" name="situation" value="' . $situation['id_situation'] . '">';
                    
                }
                
                ?>
                </fieldset>
                <br><br> <input type="submit" value="Modifier Une Situation"> &emsp; <input type="" value="Supprimer Une Situation">

                </table>

                <br><br><br>
               
                <table>
                
                <p>-Nombre d'entrées &emsp;&emsp; Nombre de Personnes&emsp;&emsp;Durée De Validité&emsp;&emsp;Prix&emsp;&emsp;En Activité</p>

                <fieldset>
               <?php
               
                foreach($formule as $formule) {
                    echo '<li>' .$formule['nb_entrees'] ."&emsp;"."&emsp;".$formule['nb_personnes'] ."&emsp;"."&emsp;".$formule['duree_validite'] ."&emsp;"."&emsp;".$formule['prix'] ."&emsp;"."&emsp;".$formule['actif'] . '</li>'.'<input type="radio" name="Formule" value="' . $formule['id_formule'] . '">';
                
                }
                

                ?>
                </fieldset>
                <br><br> <input type="submit" value="Modifier Une Formule"> &emsp; <input type="" value="Supprimer Une Formule">
                </table>
        </ul>
    </div>
    </form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>