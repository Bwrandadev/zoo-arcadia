<?php
include('db.php');
$pdo = getDBConnection();

session_start();
if (!isset($_SESSION['users_id']) || $_SESSION['role_id'] != 1) {
    header("Location: connexion.php");
    exit();
}

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'add_service') {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Vérifier si le fichier image est bien uploadé
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image['name']);

    
        if (move_uploaded_file($image['tmp_name'], $target_file)) {
            // Préparer la requête d'insertion
            $stmt = $pdo->prepare("INSERT INTO services (name, description, image_url) VALUES (?, ?, ?)");
            if ($stmt->execute([$name, $description, $target_file])) {
                echo "Service ajouté avec succès.";
                header('Location: admin.php');
                exit();
            } else {
                echo "Erreur lors de l'insertion dans la base de données.";
            }
        } else {
            echo "Erreur lors de l'upload de l'image.";
        }
    } else {
        echo "Aucune image n'a été téléchargée.";
    }
}
?>