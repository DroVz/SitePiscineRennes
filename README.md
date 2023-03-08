# SitePiscineRennes
Site Web pour les piscines de Rennes afin de gérer les abonnements des utilisateurs (Projet BTS)


===================================
Mise en place de la base de données
===================================

1. Depuis WAMP, accéder à l'outil PhpMyAdmin (clic gauche > phpMyAdmin > choisir la dernière version)
2. Sur la page de connexion, entrer les login ("root" par défaut) et mot de passe de l'administrateur (vide par défaut)
3. Dans le menu de gauche, choisir Nouvelle base de données
4. Dans le formulaire de création, appeler la nouvelle base "pools" et choisir le codage utf8_unicode_ci, puis cliquer sur Créer
5. Pour remplir la base de données à partir du script, cliquer sur Importer dans le menu supérieur
6. Choisir le fichier DB_restore_pools.sql présent dans ce dépôt, vérifier que utf-8 est bien sélectionné, et cliquer sur Exécuter tout en bas de l'écran
7. Si tout s'est bien passé, l'écran affiche une série de notifications avec une coche verte, et le site est prêt à l'emploi
