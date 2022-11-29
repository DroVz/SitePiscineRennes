<!DOCTYPE html>

<!-- index.php sera un super-contrôleur général (routeur ?), qui fera appel à des contrôleurs séparés,
un pour chaque page. C'est la vue qui aura du html à terme, il n'y en aura pas dans index !
Les contrôleurs séparés feront appel aux vues. Mais pour l'instant je code un
site façon dégueu, on réorganisera après -->

<head>

</head>

<body>
    <header>
    <!-- à terme déplacé dans un fichier séparé -->
        <nav>
            <ul>
                <li><a href="/index.php">Accueil</a></li>
                <li><a href="/formule.php">Achat de code</a></li>
                <li><a href="/verification.php">Vérification de code</a></li>
                <li><a href="/admin.php">Espace admin</a></li>
            </ul>
        </nav>    
    </header>


    <footer>

    </footer>

</body>
</html>