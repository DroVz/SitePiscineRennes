<?php ob_start(); ?>
<?php $title = "Piscines municipales de Rennes - Page Administrative - Modification Activité"; ?>


<main>
    <h1>Modifier une activité</h1>

    <?php   
    
    $bd = new PDO('mysql:host=localhost;dbname=pools;charset=utf8', "root", "");

   
        if(isset($_GET['id'])) {
            $id_activity = htmlspecialchars($_GET['id']);
            $query = $bd->prepare('SELECT * FROM activity WHERE id_activity = :id');
            $query->bindParam(':id', $id_activity);
            $query->execute();
            $activity = $query->fetch();
        }
    ?>

    <form method="post" action="v_admin_modifieractivitéaction.php">
        <label for="activityname">Libellé de l'activité:</label>
        <input type="text" name="activityname" id="activityname" value="<?php echo $activity['name'] ?>" required>

        <br><br>

        <label for="description">Description de l'activité:</label>
        <input type="text" name="description" id="description" value="<?php echo $activity['description'] ?>" required>

        <br><br>

        <label><input type="checkbox" name="booking" value="1" <?php if ($activity['booking'] == 1) echo "checked"; ?>> Réservation disponible</label>

        <br><br>

        <label><input type="checkbox" name="active" value="1" <?php if ($activity['active'] == 1) echo "checked"; ?>> Activité disponible</label>

        <br><br>

        <input type="hidden" name="id_activity" value="<?php echo $id_activity ?>">

        <button type="submit">Modifier l'activité</button>

    </form>

</main>

<?php $content = ob_get_clean(); ?>
<?php require('C:\wamp64\www\view\layout.php') ?>

