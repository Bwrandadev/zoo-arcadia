<?php
include('db.php'); // Connexion à la base de données
$pdo = getDBConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'ajouter') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    // Insertion dans la base de données
    $stmt = $pdo->prepare("INSERT INTO habitats (nom, description, image_url) VALUES (?, ?, ?)");
    if ($stmt->execute([$nom, $description, $image_url])) {
        echo "Habitat ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'habitat.";
    }

    // Redirection vers la page admin après l'ajout
    header('Location: admin.php#gestion-habitats');
    exit();
}
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Suppression de l'habitat
    $stmt = $pdo->prepare("DELETE FROM habitats WHERE id = ?");
    if ($stmt->execute([$id])) {
        echo "Habitat supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'habitat.";
    }

    // Redirection après suppression
    header('Location: admin.php#gestion-habitats');
    exit();
}
?>