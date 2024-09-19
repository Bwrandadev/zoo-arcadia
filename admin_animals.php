<?php
include('db.php');
$pdo = getDBConnection();

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'add_animal') {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $species = $_POST['espece'];
    $habitat = $_POST['habitat'];

    // Insérer l'animal dans la base de données
    $stmt = $pdo->prepare("INSERT INTO animals (name, espece, habitat) VALUES (?, ?, ?)");
    if ($stmt->execute([$name, $species, $habitat])) {
        echo "Animal ajouté avec succès.";
        header('Location: admin.php');
        exit();
    } else {
        echo "Erreur lors de l'ajout de l'animal.";
    }
}
?>