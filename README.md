# Projet Symfony - Web Reservations
## Description
Ce projet est un template qui peut être copié et utilisé pour créer
un site web de réservations en ligne. Il est spécialement conçu pour pouvoir
gérer des comptes clients et des réservations pour tout type de commerces :
restaurants, coiffeurs, etc.

## Collaborateurs
Alexandre Bergeron

## Installation
Étape 1 : Clonage du dépôt
```bash
git clone https://github.com/BERGERON-Alexandre-2225012aa/web_reservations.git
```

Étape 2 : Installation des dépendances  

Une fois le dépôt cloné, lancer un terminal à l'intérieur du dossier local et exécuter la commande suivante
```bash
composer install
```

Étape 3 : Création d'un user mysql  

Une fois le projet bien initialisé et les dépendances installées, il faut créer un user local mysql.  
Si c'est déjà fait ou que vous aviez déjà un user sur une base de données hébergée, il suffit juste de modifier cette ligne dans le fichier **./.env**
avec les identifiants de votre user :

```bash
DATABASE_URL="mysql://my_user:my_password@my_server/my_db?serverVersion=8.0.41&charset=utf8mb4"
```

Étape 4 : Création de la base de données

Une fois les informations de connexion renseignées, lancez les commandes suivantes dans votre terminal :

```bash
php bin/console doctrine:database:create

php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

Étape 5 : Lancement du serveur

Tout est normalement établi ! Vous pouvez maintenant lancer la commande suivante pour démarrer le serveur :
```bash
symfony server:start
```
Et pour l'arrêter :
```bash
symfony server:stop
```