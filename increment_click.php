<?php
require 'vendor/autoload.php'; // Charger l'autoload de Composer pour MongoDB

// Connexion à MongoDB Atlas
$mongoClient = new MongoDB\Client("mongodb+srv://bwrandadev:Mayden123102@cluster0.rtdwd.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
$clicksCollection = $mongoClient->zoo_arcadia24->animals_clicks; // La collection des clics

// Récupérer l'ID de l'animal à partir des paramètres GET
$animalId = (int) $_GET['id'];

// Incrémenter le compteur de clics pour cet animal
$clicksCollection->updateOne(
    ['animal_id' => $animalId],
    ['$inc' => ['clicks' => 1]],
    ['upsert' => true]  // Créer l'entrée si elle n'existe pas
);

// Rediriger vers la page précédente
header("Location: animal_detail.php?id=$animalId");
exit();
?>