<?php ob_start(); ?>
<?php $title = "Piscines municipales de Rennes - Page Administrative - Modification Situation"; ?>

<main>
    <h1>Modifier une situation</h1>

    <?php   
    
    $bd = new PDO('mysql:host=localhost;dbname=pools;charset=utf8', "root", "");

   
        if(isset($_GET['id'])) {
            $id_situation = htmlspecialchars($_GET['id']);
            $query = $bd->prepare('SELECT * FROM situation WHERE id_situation = :id');
            $query->bindParam(':id', $id_situation);
            $query->execute();
            $situation = $query->fetch();
        }
    ?>

    <form method="post" action="v_admin_modifiersituationaction.php">
        <label for="situationname">Libellé de l'activité:</label>
        <input type="text" name="situationname" id="situationname" value="<?php echo $situation['name'] ?>" required>

        <br><br>

        <label><input type="checkbox" name="active" value="1" <?php if ($situation['active'] == 1) echo "checked"; ?>> Activité disponible</label>

        <br><br>

        <input type="hidden" name="id_situation" value="<?php echo $id_situation ?>">

        <button type="submit">Modifier la situation </button>

    </form>

</main>

<?php $content = ob_get_clean(); ?>
<?php require('\view\layout.php') ?>

