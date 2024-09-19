<?php
// Connexion à la base de données
include('db.php');
$pdo = getDBConnection();

// Récupérer tous les animaux de la savane
$stmt = $pdo->prepare("SELECT * FROM animals WHERE habitat_id= 'Savane'");
$stmt->execute();
$animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'templateAnimaux.php'; 
?>