<?php $title = "Piscines municipales de Rennes - Accueil"; ?>
<?php ob_start();?>
<main>
    <div id="Corp">
        <?php 
            foreach($piscines as $piscine){
                echo ' <img src="'. $piscine->getImage() .'" alt="" onclick="updatePiscineImage('. $piscine->getNom() .')">';
            }
        ?>    
    </div>
    <div id="Bot">
    <?php echo  '<h1>'. $selectPiscine->getNom() .'</h1>'; ?>
        <div>
            <div  class="info">
                <article>
                    <h2> Adresse : </h2>
                   <?php echo '<p>'. $selectPiscine->getAdresse() .'<p>' ?>
                    <h2> Descriptif : </h2>
                    <?php echo '<p>'. $selectPiscine->getDescriptif() .'<p></br>' ?>
                </article>
            </div>
           <?php echo ' <img src="'. $selectPiscine->getMap() .'" alt="">'; ?>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>
<!-- function updatePiscineImage(piscineName) {
  // récupérer l'élément image à mettre à jour
  var img = document.getElementById("piscine-image");
  
  //mise à jour de l'image en fonction du nom de la piscine
  switch (piscineName) {
    case "Piscine 1":
      img.src = "path/to/piscine1-image.jpg";
      break;
    case "Piscine 2":
      img.src = "path/to/piscine2-image.jpg";
      break;
    case "Piscine 3":
      img.src = "path/to/piscine3-image.jpg";
      break;
    default:
      img.src = "path/to/default-image.jpg";
  }
} -->
