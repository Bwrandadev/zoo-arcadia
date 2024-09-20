<?php
function getDBConnection() {
    // Récupérer l'URL PostgreSQL à partir des variables d'environnement
    $url = parse_url(getenv("DATABASE_URL"));

    // Extraire les paramètres de connexion
    $host = $url["host"];
    $port = $url["port"];
    $dbname = substr($url["path"], 1); // Retirer le "/" avant le nom de la base
    $username = $url["user"];
    $password = $url["pass"];

    try {
        // Créer une nouvelle connexion PDO pour PostgreSQL
        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
        
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