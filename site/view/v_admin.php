<?php $title = "Piscines municipales de Rennes - Page Administrative"; ?>

<?php ob_start(); ?>

<main>
    <h1>Gestion Des Options</h1>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Libelle</th>
                    <th>Description</th>
                    <th>Réservation</th>
                    <th>En Activité</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($activite as $activite) {
                        $estactif="";
                        $areservation="";

                        if ($activite['reservation'] == 1) 
                            $areservation="possible"; 
                        else 
                            $areservation="n/a";

                        if ($activite['actif'] == 1) 
                            $estactif="actif"; 
                        else 
                            $estactif="innactif";

                        echo '<tr><td>' . $activite['libelle'] . '</td><td>' . $activite['description'] . '</td><td class="' . $areservation . '">' . $areservation . '</td><td class="' . $estactif . '">' . $estactif . '</td></tr>'; 
                    }                   
                ?>
            </tbody>
        </table>

        <br><br>
        <form method="post" action="view/v_admin_ajoutactivite.php">
        <input type="text" name="libelle" placeholder="Libellé de l'activité">
        <input type="text" name="description" placeholder="Description de l'activité">
        <label><input type="checkbox" name="reservation" value="1"> Réservation disponible</label>
        <label><input type="checkbox" name="actif" value="1" checked> Activité disponible</label>
        <br> <button type="submit">Ajouter une activité</button>

        </form>


        
    </div>

    <br><br><br>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Libelle</th>
                    <th>En Activité</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($situation as $situation) {
                        echo '<tr><td>' . $situation['libelle'] . '</td><td>' . $situation['actif'] . '</td></tr>';
                    }                    
                ?>
            </tbody>
        </table>

        <form method="post" action="add_situation.php">
            <button type="submit">Ajouter une situation</button>
        </form>
    </div>
    
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/layout.php') ?>
