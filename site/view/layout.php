<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title><?= $title ?></title>
      <link href="view/style/style.css" rel="stylesheet" />
   </head>

   <body>
        <!-- Je remets le header ici pour l'instant mais à revoir -->
        <header>    
            <nav>
                <img src="img/logo.png" alt="">
                <a href="/index.php?action=accueil">Accueil</a>
                <a href="/index.php?action=achat">Formules</a>
                <a href="/index.php?action=verif">Mon code</a>
            </nav>    
        </header>

        <?= $content ?>
        
   </body>
</html>