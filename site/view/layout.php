<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title><?= $title ?></title>
      <link href="view/style.css" rel="stylesheet" />
      <script src="view/script.js"></script>
      <script src="view/script.js"></script>
   </head>

   <body>
        <!-- Je remets le header ici pour l'instant mais à revoir -->
        <header>    
            <nav>
                <img src="view/img/logo.jpeg" alt="">
                <img src="view/img/logo.jpeg" alt="">
                <ul>
                    <li><a href="/index.php?action=accueil">Accueil</a></li>
                    <li><a href="/index.php?action=achat">Achat de code</a></li>
                    <li><a href="/index.php?action=verif">Vérification de code</a></li>
                    <li><a href="/index.php?action=admin">Gestion</a></li>
                </ul>
            </nav>    
        </header>

        <?= $content ?>
   </body>
</html>