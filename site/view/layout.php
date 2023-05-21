<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="../view/style.css" rel="stylesheet" />
    <script src="view/script.js"></script>
</head>

<body>
    <header>
        <nav>
            <a class=a-nostyle href="/index.php?action=accueil"><img src="view/img/logo.jpeg" alt=""></a>
            <ul>
                <li><a href="/index.php?action=accueil">Accueil</a></li>
                <li><a href="/index.php?action=achat">Formules</a></li>
                <li><a href="/index.php?action=panier">Panier</a></li>
                <li><a class="blueLink" href="/index.php?action=verif">Mon Code</a></li>
            </ul>
        </nav>
    </header>

    <?= $content ?>

    <footer>
        <a class="a-nostyle white-font" href="/index.php?action=adminRedirection">Espace administrateur</a>
        <a class="a-nostyle white-font">Conditions générales de vente</a>
        <a class="a-nostyle white-font">Conditions générales d'utilisation</a>
        <a class="a-nostyle white-font">Politique en matière de cookies</a>
    </footer>
</body>

</html>