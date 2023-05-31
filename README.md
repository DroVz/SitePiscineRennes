# Site "Les piscines rennaises" 
Site Web développé en php, html-css et js. 
L'objectif a été de mettre en avant les piscines rennaises et ainsi permettre aux utilisateurs l'achat de séance de natation.

# Fonctionnalités 
- Une page d'accueil, qui met en avant différentes piscines 
- Un espace d'achat pour choisir différentes formules
- Un pannier pour valider les formules choisies
- La possibilité de réserver des créneaux en fonction de la formule 
- Un onglet pour vérifier la validité de son code d'access
- Une partie administrateur pour pouvoir modifier le contenu des formules 

# Cadre du projet 
Ce projet a été réalisé dans le cadre de ma deuxième année de BTS SIO. 
Il a été fait en groupe de 3 personnes.

Mise en place de la base de données
===================================

1. Depuis WAMP, accéder à l'outil PhpMyAdmin (clic gauche > phpMyAdmin > choisir la dernière version)
2. Sur la page de connexion, entrer les login ("root" par défaut) et mot de passe de l'administrateur (vide par défaut)
3. Dans le menu de gauche, choisir Nouvelle base de données
4. Dans le formulaire de création, appeler la nouvelle base "pools" et choisir le codage utf8_unicode_ci, puis cliquer sur Créer
5. Pour remplir la base de données à partir du script, cliquer sur Importer dans le menu supérieur
6. Choisir le fichier DB_restore_pools.sql présent dans ce dépôt, vérifier que utf-8 est bien sélectionné, et cliquer sur Exécuter tout en bas de l'écran
7. Si tout s'est bien passé, l'écran affiche une série de notifications avec une coche verte, et le site est prêt à l'emploi
