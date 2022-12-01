<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title><?= $title ?></title>
      <link href="style.css" rel="stylesheet" /> 
   </head>

   <body>
        <!-- Je remets le header ici pour l'instant mais à revoir -->
        <header>
    
            <nav>
                <ul>
                    <li><a href="/index.php?action=accueil">Accueil</a></li>
                    <li><a href="/index.php?action=formule">Achat de code</a></li>
                    <li><a href="/index.php?action=verification">Vérification de code</a></li>
                </ul>
            </nav>    
        </header>

        <?= $content ?>
   </body>
</html>