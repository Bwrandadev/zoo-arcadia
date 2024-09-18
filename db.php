<?php
function getDBConnection() {
// Paramètres de connexion
$host = 'localhost'; // Adresse du serveur (localhost si c'est en local)
$dbname = 'zoo_arcadia24'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur (par défaut, 'root' sur les serveurs locaux)
$password = ''; // Mot de passe (souvent vide en local, sinon ce que tu as défini)

try {
    // Créer une nouvelle connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurer PDO pour afficher les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher le message d'erreur
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    return null;
}
}
?>