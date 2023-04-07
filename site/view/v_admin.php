<?php $title = "Piscines municipales de Rennes - Page Administrative"; ?>

<?php ob_start(); ?>

<main>
    <h1>Gestion Des Options</h1>

    <div>
        <h2>Activités</h2>

        <table>
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Description</th>
                    <th>Réservation</th>
                    <th>En Activité</th>
                    <th>ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($activity as $activity) {
                        $estactif="";
                        $areservation="";

                        if ($activity['booking'] == 1) 
                            $areservation="possible"; 
                        else 
                            $areservation="n/a";

                        if ($activity['active'] == 1) 
                            $estactif="actif"; 
                        else 
                            $estactif="innactif";

                            echo '<tr> <td>' . $activity['name'] . '</td><td>' . $activity['description'] . '</td> <td class="' . $areservation . '">' . $areservation . '</td><td class="' . $estactif . '">' . $estactif . '</td> <td>' . $activity['id_activity'] . '</td> <td><a href="view/v_admin_modifieractivité.php?id=' . $activity['id_activity'] . '">ModifierActivité</a></td> </tr>';
                    }                   
                ?>
            </tbody>
        </table>

        <br><br>

        <form method="post" action="view/v_admin_ajoutactivite.php">
            <input type="text" name="activityname" placeholder="Libellé de l'activité">
            <input type="text" name="description" placeholder="Description de l'activité">
            <label><input type="checkbox" name="booking" value="1"> Réservation disponible</label>
            <label><input type="checkbox" name="active" value="1" checked> Activité disponible</label>
            <br> 
            <button type="submit">Ajouter une activité</button>
        </form>

    </div>

    <br><br><br>

    <div>
        <h2>Situations</h2>

        <table>
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>En Activité</th>
                    <th>ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($situation as $situation) {  
                        
                        if ($activity['active'] == 1) 
                        $estactif="actif"; 
                    else 
                       $estactif="innactif";
                
                        echo '<tr>
                         <td>' . $situation['name'] . '</td>
                         <td class="' . $estactif . '">' . $estactif . '</td>
                         <td>' . $situation['id_situation'] . '</td>
                         <td><a href="view/v_admin_modifiersituation.php?id=' . $situation['id_situation'] . '">ModifierSituation</a></td>
                        </tr>';
                    }                    
                ?>
            </tbody>
        </table>

        <br><br>

        <form method="post" action="view/v_admin_ajoutsituation.php">
            <input type="text" name="situationname" placeholder="Libellé de la situation">
            <label><input type="checkbox" name="active" value="1" checked> Activité disponible</label>
            <br> 
            <button type="submit">Ajouter une situation</button>
        </form>

    </div>
    
    <br><br>

    <h3> Suppression </h3>

<form method="post" action="view/v_admin_suppression.php">

    <label for="SuppressionType">Type d'élément à supprimer:</label>
    <select name="SuppressionType" id="SuppressionType" required>
        <option value="activity">Activité</option>
        <option value="situation">Situation</option>
    </select>

    <br><br>

    <label for="SuppressionID">ID de l'élément à supprimer:</label>
    <input type="text" name="SuppressionID" id="SuppressionID" required>

    <br><br>

    <button type="submit">Supprimer un élément</button>

</form>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('C:\wamp64\www\view\layout.php') ?>
