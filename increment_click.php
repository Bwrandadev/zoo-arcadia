<?php
require 'vendor/autoload.php'; // Charger l'autoloader de Composer

// Connexion à MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->zoo_arcadia24; // Nom de ta base MongoDB
$collection = $db->animals_clicks; // Collection pour stocker les clics

// ID de l'animal cliqué, reçu via une requête GET
$animalId = $_GET['id'];

// Incrémenter le compteur de clics pour cet animal
$collection->updateOne(
    ['animal_id' => $animalId],  // Sélectionner l'animal par ID
    ['$inc' => ['clicks' => 1]], // Incrémenter le champ "clicks"
    ['upsert' => true]           // Créer le document s'il n'existe pas
);

// Rediriger vers la page précédente après l'incrémentation
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>