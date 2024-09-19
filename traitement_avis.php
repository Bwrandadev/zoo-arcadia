<?php
include('db.php');
$pdo = getDBConnection();

// Vérifier si le formulaire d'avis est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Valider les données du formulaire
    if (!empty($email) && !empty($message)) {
        try {
            // Insérer les données dans la table 'avis' avec le statut 'pending'
            $stmt = $pdo->prepare("INSERT INTO avis (email, message) VALUES (?, ?)");
            $stmt->execute([$email, $message]);

            // Rediriger vers une page de confirmation
            header("Location: confirmation.php");
            exit();
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'avis : " . $e->getMessage();
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}
?>