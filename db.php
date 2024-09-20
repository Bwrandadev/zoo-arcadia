<?php
function getDBConnection() {
    // Récupérer l'URL JawsDB à partir des variables d'environnement
    $url = parse_url(getenv("JAWSDB_URL"));

    // Extraire les paramètres de connexion à partir de l'URL
    $host = $url["host"]; // Hôte (serveur MySQL)
    $dbname = substr($url["path"], 1); // Nom de la base de données
    $username = $url["user"]; // Nom d'utilisateur
    $password = $url["pass"]; // Mot de passe

    try {
        // Créer une nouvelle connexion PDO avec les paramètres extraits
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