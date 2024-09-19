<?php
include('db.php');
$pdo = getDBConnection();

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $title = $_POST['title'];
    $message = $_POST['message'];

    // Valider les données (tu peux ajouter des validations supplémentaires)
    if (!empty($email) && !empty($title) && !empty($message)) {
        try {
            // Insérer les données dans la base de données
            $stmt = $pdo->prepare("INSERT INTO contact_messages (email, titre, message) VALUES (?, ?, ?)");
            $stmt->execute([$email, $title, $message]);

            // Rediriger vers une page de confirmation
            header("Location: confirmation.php");
            exit();
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi du message : " . $e->getMessage();
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}
?>