# Zoo Arcadia

## Description du projet

Le projet **Zoo Arcadia** est une application web qui permet aux visiteurs de consulter les informations sur les animaux, les habitats, et les services proposés par le zoo. Il met également en avant la protection animale et l’écologie. Ce projet a été réalisé à la demande du propriétaire du zoo, José, pour augmenter la notoriété et améliorer l’image de marque.

## Fonctionnalités

- **Gestion des habitats** : Afficher, éditer, supprimer des habitats via l’administration.
- **Gestion des animaux** : Consultation des animaux dans chaque habitat, détails et statistiques de clics.
- **Gestion des services** : Affichage des services comme le petit train, les visites guidées, la restauration.
- **Suivi vétérinaire** : Gestion des comptes rendus de santé pour chaque animal.
- **Système de commentaires** : Gestion des avis laissés par les visiteurs.

## Environnement de travail

### Langages et technologies utilisés

- **PHP**: Utilisé pour la logique serveur, la gestion des formulaires et la connexion avec la base de données. Les fichiers comme admin.php, veterinaire.php, et edit_habitat.php gèrent respectivement l’administration des animaux, la gestion des vétérinaires et l’édition des habitats.
- **MySQL** : Utilisé pour la gestion locale des données pendant le développement. Les fichiers zoo_arcadia24.sql et zoo_arcadia24_export.sql contiennent les structures des tables et les données.
- **PostgreSQL** : Utilisé pour le déploiement en production via Heroku, pour une gestion plus robuste des données en ligne.
- **MongoDB** : Utilisé pour le suivi des clics sur les animaux, via un fichier comme increment_click.php.
- **JavaScript avec jQuery** : Utilisé dans les fichiers popupAvis.js, admin.js, et veterinaire.js pour rendre les pages plus dynamiques, soumettre des formulaires AJAX et gérer les événements utilisateur.
- **CSS personnalisé**: Les styles du projet sont gérés dans le fichier style.css, avec un design sur-mesure pour rendre l’application visuellement attrayante.
- **Heroku** : Utilisé pour déployer l’application web avec PostgreSQL. Le fichier Procfile gère la configuration du déploiement.
- **Git** : Utilisé pour la gestion des versions afin de suivre les modifications du projet. Un fichier .gitignore est utilisé pour exclure certains fichiers comme le dossier vendor contenant les dépendances.
- **Composer** : Utilisé pour gérer les dépendances PHP, définies dans le fichier composer.json. Le fichier composer.lock assure une version stable des bibliothèques.

### Système d’exploitation et environnements

Le projet **Zoo Arcadia** est conçu pour fonctionner sur les principaux systèmes d’exploitation suivants :

- **macOS**
- **Windows**
- **Linux**

### Prérequis pour macOS (environnement utilisé)

Utilisez Homebrew pour installer les dépendances comme PHP, MySQL, PostgreSQL, MongoDB et Composer.
Installer les dépendances avec Homebrew :

````bash
brew install php mysql postgresql composer mongodb

## Installation et Configuration de la base de données

### Environnement de développement (MySQL)

**Étape 1** : Installation de MySQL et phpMyAdmin

- **macOS**: Utilisez Homebrew ou apt pour installer MySQL.
 ```bash
  brew install mysql # macOS

**Étape 2**: Configuration MySQL

1. Connectez-vous à phpMyAdmin via votre serveur local (XAMPP/WAMP ou autre).
2. Créez la base de données pour le projet :
   sql :
   CREATE DATABASE zoo_arcadia24;
3. Importez le fichier zoo_arcadia24.sql dans phpMyAdmin pour charger la structure et les données.

**Étape 3** : Configuration dans db.php pour MySQL
Dans le fichier db.php, configurez la connexion à MySQL :

```php
<?php
// Connexion à MySQL (en développement)
$host = 'localhost';
$dbname = 'zoo_arcadia24';
$user = 'root'; // ou votre utilisateur MySQL
$password = ''; // laissez vide si pas de mot de passe pour root

    try {
         $dsn = "mysql:host=$host;dbname=$dbname";
         $pdo = new PDO($dsn, $user, $password);
         pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
         echo 'Erreur de connexion : ' . $e->getMessage();
    }

### Environnement de production (PostgreSQL sur Heroku)

Après avoir terminé le développement avec MySQL, la base de données a été migrée vers PostgreSQL pour la compatibilité avec Heroku.

**Étape 1** : Ajout de PostgreSQL à Heroku

1. Allez sur votre tableau de bord Heroku.
2. Sous l’onglet Resources, ajoutez l’add-on Heroku Postgres.
3. Récupérez l’URL de connexion PostgreSQL en utilisant :
```bash
heroku config:get DATABASE_URL

**Étape 2** : Migration de MySQL vers PostgreSQL
Pour migrer la base de données MySQL vers PostgreSQL, utilisez pgLoader ou exportez manuellement les données avec un fichier SQL compatible. Voici un exemple de commande pgloader pour automatiser la migration :

bash
pgloader mysql://root@localhost/zoo_arcadia24 postgresql://u8efhg884d8386:pe2558945dd4e3c38dc769c6bdaebab8bce3f207becf430a77b6134ac639c658e@clhtb6lu92mj2.cluster-czz5s0kz4scl.eu-west-1.rds.amazonaws.com:5432/db1k84ugma13ke

**Étape 3** : Configuration dans db.php pour PostgreSQL
Pour se connecter à PostgreSQL sur Heroku, modifiez le fichier db.php :

php
<?php
// Connexion à PostgreSQL (en production sur Heroku)
$db_url = getenv('DATABASE_URL');
    $db_parts = parse_url($db_url);

    $host = $db_parts['host'];
    $dbname = ltrim($db_parts['path'], '/');
    $user = $db_parts['user'];
    $password = $db_parts['pass'];

    try {
        $dsn = "pgsql:host=$host;dbname=$dbname";
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }

**Étape 4** : Déployer sur Heroku
Une fois PostgreSQL configuré, déployez le projet sur Heroku :

bash
git push heroku main
````
