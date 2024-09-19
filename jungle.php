<?php
include('db.php');
$pdo = getDBConnection();

// Récupérer tous les animaux de la jungle
$stmt = $pdo->prepare("SELECT * FROM animals WHERE habitat_id= 'Jungle'");
$stmt->execute();
$animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'templateAnimaux.php'; // Inclure le template
?>