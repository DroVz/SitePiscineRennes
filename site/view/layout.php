<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title><?= $title ?></title>
      <link href="view/style.css" rel="stylesheet" />
    </head>
    
    <body>
        <!-- Je remets le header ici pour l'instant mais à revoir -->
        <header>    
            <nav>
                <ul id="navigation__list">
                    <img src="img/logo.png" alt="">
                    <li class="navigation__list--element first__element color__background--FFFFFF">
                        <a class="color__text--0078F7" href="/index.php?action=accueil">
                            Accueil
                        </a>
                    </li>
                    <li class="navigation__list--element color__background--FFFFFF">
                        <a class="color__text--0078F7" href="/index.php?action=achat">
                            Formules
                        </a>
                    </li>
                    <li class="navigation__list--element color__background--FFFFFF">
                        <a class="color__text--0078F7" href="/index.php?action=verif">
                            Vérification de code
                        </a>
                    </li>
                    <li class="navigation__list--element color__background--0078F7">
                        <a class="color__text--FFFFFF" href="/index.php?action=verif">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>    
        </header>

        <?= $content ?>
        
        <!-- Chargement des scripts -->
        <script src="view/script.js"></script>
    </body>
</html>
onmouseover ="fSwitchColor(this)"onmouseout="fSwitchColor(this)"